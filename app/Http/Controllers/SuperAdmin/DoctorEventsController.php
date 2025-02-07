<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\EventsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Events\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\EventsImport;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Doctor;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DoctorEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null , $doctor)
    {
        if ($req != null) {
            $doctor_events =  $doctor->doctor_events();
            if ($req->trash && $req->trash == 'with') {
                $doctor_events =  $doctor_events->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_events =  $doctor_events->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_events = $doctor_events->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_events = $doctor_events->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_events = $doctor_events->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_events = $doctor_events->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_events = $doctor_events->get();
                return $doctor_events;
            }
            $doctor_events = $doctor_events->get();
            return $doctor_events;
        }
        $doctor_events = $doctor->doctor_events()->withAll()->orderBy('id', 'desc')->get();
        return $doctor_events;
    }


    /*********View All Events  ***********/
    public function index(Request $request , Doctor $doctor)
    {
        $doctor_events = $this->getter($request , null , $doctor);
        return view('super_admins.doctors.doctor_events.index' , compact('doctor_events' , 'doctor'));
    }

    /*********View Create Form of Event  ***********/
    public function create(Doctor $doctor)
    {
        $tags = Tag::active()->get();
        $event_categories = EventCategory::active()->get();
        return view('super_admins.doctors.doctor_events.create', compact('doctor' , 'tags' , 'event_categories'));
    }

    /*********Store Event  ***********/
    public function store(CreateRequest $request , Doctor $doctor)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $request->merge(['created_by_user_id'=>auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request,'image','doctor_events');
            $doctor_event = $doctor->doctor_events()->create($data);
            $doctor_event->slug = Str::slug($doctor_event->name . ' ' . $doctor_event->id, '-');
            $doctor_event->save();
            foreach ($request->sponsers as $sponser) {
                $image_url = uploadArrayFile($sponser ,'image','event_sponsers');
                $doctor_event->sponsers()->create([
                    'name' => $sponser['name'],
                    'image' => $image_url
                ]);
              }
            $doctor_event->tags()->sync($request->tag_ids);
            $doctor_event = $doctor->doctor_events()->withAll()->find($doctor_event->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_events.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_events.index' , $doctor->id)->with('message', 'Event Created Successfully')->with('message_type', 'success');
    }

    /*********View Event  ***********/
    public function show(Doctor $doctor ,Event $doctor_event)
    {
        if($doctor->id != $doctor_event->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_events.show', compact('doctor_event' , 'doctor'));
    }

    /*********View Edit Form of Event  ***********/
    public function edit(Doctor $doctor ,Event $doctor_event)
    {
        if($doctor->id != $doctor_event->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $tags = Tag::active()->get();
        $event_categories = EventCategory::active()->get();
        return view('super_admins.doctors.doctor_events.edit', compact('doctor_event', 'doctor' , 'tags' , 'event_categories'));
    }

    /*********Update Event  ***********/
    public function update(CreateRequest $request,Doctor $doctor , Event $doctor_event)
    {
        if($doctor->id != $doctor_event->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
            $data = $request->all();
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','doctor_events',$doctor_event->image);
            } else {
                $data['image'] = $doctor_event->image;
            }
            $doctor_event->sponsers()->delete();
            foreach ($request->sponsers as $sponser) {
                if(isset($sponser['image'])){
                    if (is_string($sponser['image']) && $sponser['image'] != 'undefined') {
                        $image_url = $sponser['previous_image'];
                    }else{
                        $image_url = uploadArrayFile($sponser ,'image','event_sponsers');
                    }
                }
                $doctor_event->sponsers()->create([
                    'name' => $sponser['name'],
                    'image' => $image_url
                ]);
              }
              $doctor_event->update($data);
              $doctor_event = Event::find($doctor_event->id);
              $slug = Str::slug($doctor_event->name . ' ' . $doctor_event->id, '-');
              $doctor_event->update([
                  'slug' => $slug
              ]);
            $doctor_event->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_events.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_events.index' , $doctor->id)->with('message', 'Event Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_events = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_events." . $extension;
        return Excel::download(new EventsExport($doctor_events), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new EventsImport, $file);
        return redirect()->back()->with('message', 'Event Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Event ***********/
    public function destroy(Doctor $doctor ,Event $doctor_event)
    {
        if($doctor->id != $doctor_event->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $doctor_event->delete();
        return redirect()->back()->with('message', 'Event Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Event ***********/
    public function destroyPermanently(Request $request,Doctor $doctor ,$doctor_event)
    {
        if($doctor->id != $doctor_event->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $doctor_event = Event::withTrashed()->find($doctor_event);
        if ($doctor_event) {
            if ($doctor_event->trashed()) {
                if ($doctor_event->image && file_exists(public_path($doctor_event->image))) {
                    unlink(public_path($doctor_event->image));
                }
                $doctor_event->forceDelete();
                return redirect()->back()->with('message', 'Event Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Event is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Event Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Event***********/
    public function restore(Request $request,Doctor $doctor, $doctor_event)
    {
        if($doctor->id != $doctor_event->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $doctor_event = Event::withTrashed()->find($doctor_event);
        if ($doctor_event->trashed()) {
            $doctor_event->restore();
            return redirect()->back()->with('message', 'Event Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Event Not Found')->with('message_type', 'error');
        }
    }
}
