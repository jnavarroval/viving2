<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\EventsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Events\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\EventsImport;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Clinic;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ClinicEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null , $clinic)
    {
        if ($req != null) {
            $clinic_events =  $clinic->clinic_events();
            if ($req->trash && $req->trash == 'with') {
                $clinic_events =  $clinic_events->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_events =  $clinic_events->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_events = $clinic_events->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_events = $clinic_events->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinic_events = $clinic_events->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinic_events = $clinic_events->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_events = $clinic_events->get();
                return $clinic_events;
            }
            $clinic_events = $clinic_events->get();
            return $clinic_events;
        }
        $clinic_events = $clinic->clinic_events()->withAll()->orderBy('id', 'desc')->get();
        return $clinic_events;
    }


    /*********View All Events  ***********/
    public function index(Request $request , Clinic $clinic)
    {
        $clinic_events = $this->getter($request , null , $clinic);
        return view('super_admins.clinics.clinic_events.index' , compact('clinic_events' , 'clinic'));
    }

    /*********View Create Form of Event  ***********/
    public function create(Clinic $clinic)
    {
        $tags = Tag::active()->get();
        $event_categories = EventCategory::active()->get();
        return view('super_admins.clinics.clinic_events.create', compact('clinic' , 'tags' , 'event_categories'));
    }

    /*********Store Event  ***********/
    public function store(CreateRequest $request , Clinic $clinic)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $request->merge(['created_by_user_id'=>auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request,'image','clinic_events');
            $clinic_event = $clinic->clinic_events()->create($data);
            $clinic_event->slug = Str::slug($clinic_event->name . ' ' . $clinic_event->id, '-');
            $clinic_event->save();
            foreach ($request->sponsers as $sponser) {
                $image_url = uploadArrayFile($sponser ,'image','event_sponsers');
                $clinic_event->sponsers()->create([
                    'name' => $sponser['name'],
                    'image' => $image_url
                ]);
              }
            $clinic_event->tags()->sync($request->tag_ids);
            $clinic_event = $clinic->clinic_events()->withAll()->find($clinic_event->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_events.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_events.index' , $clinic->id)->with('message', 'Event Created Successfully')->with('message_type', 'success');
    }

    /*********View Event  ***********/
    public function show(Clinic $clinic ,Event $clinic_event)
    {
        if($clinic->id != $clinic_event->clinic_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        return view('super_admins.clinics.clinic_events.show', compact('clinic_event' , 'clinic'));
    }

    /*********View Edit Form of Event  ***********/
    public function edit(Clinic $clinic ,Event $clinic_event)
    {
        if($clinic->id != $clinic_event->clinic_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $tags = Tag::active()->get();
        $event_categories = EventCategory::active()->get();
        return view('super_admins.clinics.clinic_events.edit', compact('clinic_event', 'clinic' , 'tags' , 'event_categories'));
    }

    /*********Update Event  ***********/
    public function update(CreateRequest $request,Clinic $clinic , Event $clinic_event)
    {
        if($clinic->id != $clinic_event->clinic_id){
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
                $data['image'] = uploadCroppedFile($request,'image','clinic_events',$clinic_event->image);
            } else {
                $data['image'] = $clinic_event->image;
            }
            $clinic_event->sponsers()->delete();
            foreach ($request->sponsers as $sponser) {
                if(isset($sponser['image'])){
                    if (is_string($sponser['image']) && $sponser['image'] != 'undefined') {
                        $image_url = $sponser['previous_image'];
                    }else{
                        $image_url = uploadArrayFile($sponser ,'image','event_sponsers');
                    }
                }
                $clinic_event->sponsers()->create([
                    'name' => $sponser['name'],
                    'image' => $image_url
                ]);
              }
              $clinic_event->update($data);
              $clinic_event = Event::find($clinic_event->id);
              $slug = Str::slug($clinic_event->name . ' ' . $clinic_event->id, '-');
              $clinic_event->update([
                  'slug' => $slug
              ]);
            $clinic_event->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_events.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_events.index' , $clinic->id)->with('message', 'Event Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $clinic_events = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "clinic_events." . $extension;
        return Excel::download(new EventsExport($clinic_events), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new EventsImport, $file);
        return redirect()->back()->with('message', 'Event Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Event ***********/
    public function destroy(Clinic $clinic ,Event $clinic_event)
    {
        if($clinic->id != $clinic_event->clinic_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $clinic_event->delete();
        return redirect()->back()->with('message', 'Event Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Event ***********/
    public function destroyPermanently(Request $request,Clinic $clinic ,$clinic_event)
    {
        if($clinic->id != $clinic_event->clinic_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $clinic_event = Event::withTrashed()->find($clinic_event);
        if ($clinic_event) {
            if ($clinic_event->trashed()) {
                if ($clinic_event->image && file_exists(public_path($clinic_event->image))) {
                    unlink(public_path($clinic_event->image));
                }
                $clinic_event->forceDelete();
                return redirect()->back()->with('message', 'Event Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Event is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Event Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Event***********/
    public function restore(Request $request,Clinic $clinic, $clinic_event)
    {
        if($clinic->id != $clinic_event->clinic_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $clinic_event = Event::withTrashed()->find($clinic_event);
        if ($clinic_event->trashed()) {
            $clinic_event->restore();
            return redirect()->back()->with('message', 'Event Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Event Not Found')->with('message_type', 'error');
        }
    }
}
