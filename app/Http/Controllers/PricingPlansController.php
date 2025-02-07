<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Resources\Web\ModulesResource;
use App\Http\Resources\Web\PricingPlansResource;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\PricingPlan;
use App\Models\PricingPlanModule;
use Laravel\Cashier\Cashier;

class PricingPlansController extends Controller
{
    public function __construct() {}

    public function index(Request $request, $type)
    {
        if ($type == 'doctor') {
            $pricing_plans = PricingPlan::with('modules')->doctor()->active()->get();
            $pricing_plans = PricingPlansResource::collection($pricing_plans);
            $modules = PricingPlanModule::doctor()->orderBy('sort_order', 'asc')->get();
            $modules = ModulesResource::collection($modules);
        } else if ($type == 'clinic') {
            $pricing_plans = PricingPlan::with('modules')->clinic()->active()->get();
            $pricing_plans = PricingPlansResource::collection($pricing_plans);
            $modules = PricingPlanModule::clinic()->orderBy('sort_order', 'asc')->get();
            $modules = ModulesResource::collection($modules);
        } else {
        }
        // dd( $pricing_plans , $modules );
        return Inertia::render('PricingPlan/Listing', [
            'pricing_plans' => $pricing_plans,
            'modules' => $modules
        ]);
    }

    public function show(Request $request, $type, $slug)
    {
        $settings = generalSettings();
        $user = auth()->user();
        if (!$user) {
            session([$type . '-' . 'pricing-plan' => $slug]);
            return redirect()->route('register', ['tab' => $type]);
        }
        $logged_in_as = $request->session()->get('logged_in_as');
        if ($type == 'doctor') {
            config(['cashier.model' => 'App\Models\Doctor']);
            $doctor = $user->doctor;
            if ($doctor && $logged_in_as == 'doctor') {
                $pricing_plan = PricingPlan::with('modules')->doctor()->active()->where('slug', $slug)->first();
                if ($pricing_plan->is_paid && $settings['stripe_key']) {
                    $intent = $doctor->createSetupIntent();
                }
                $pricing_plan = new PricingPlansResource($pricing_plan);
                $modules = PricingPlanModule::doctor()->orderBy('sort_order', 'asc')->get();
                $modules = ModulesResource::collection($modules);
            } else {
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Please Switch To Doctor Profile For Doctor Subscriptions',
                ]);
                return redirect()->back();
            }
        } else if ($type == 'clinic') {
            config(['cashier.model' => 'App\Models\Clinic']);
            $clinic = $user->clinic;
            if ($clinic && $logged_in_as == 'clinic') {
                $pricing_plan = PricingPlan::with('modules')->clinic()->where('slug', $slug)->active()->first();
                if ($pricing_plan->is_paid && $settings['stripe_key']) {
                    $intent = $clinic->createSetupIntent();
                }
                $pricing_plan = new PricingPlansResource($pricing_plan);
                $modules = PricingPlanModule::clinic()->orderBy('sort_order', 'asc')->get();
                $modules = ModulesResource::collection($modules);
            } else {
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Please Switch To Clinic Profile For Clinic Subscriptions',
                ]);
                return redirect()->back();
            }
        } else {
            abort(404);
        }

        return Inertia::render('PricingPlan/Detail', [
            'pricing_plan' => $pricing_plan,
            'modules' => $modules,
            'intent' => $intent ?? null
        ]);
    }

    public function subscription(Request $request, $type, $slug)
    {
        $user = auth()->user();
        if (!$user) {
            session([$type . '-' . 'pricing-plan' => $slug]);
            return redirect()->route('register', ['tab' => $type]);
        }
        $logged_in_as = $request->session()->get('logged_in_as');
        if ($type == 'doctor') {
            config(['cashier.model' => 'App\Models\Doctor']);
            Cashier::useCustomerModel(Doctor::class);
            $doctor = $user->doctor;
            if ($doctor && $logged_in_as == 'doctor') {
                $pricing_plan = PricingPlan::with('modules')->doctor()->where('slug', $slug)->active()->first();
                if ($pricing_plan->is_paid) {
                    $subscription = $doctor->newSubscription($pricing_plan->slug, $pricing_plan->stripe_plan)->create($request->token);
                    $doctor->update(['pricing_plan_id' => $pricing_plan->id]);
                } else {
                    $doctor->update(['pricing_plan_id' => $pricing_plan->id]);
                }
            }
        }
        if ($type == 'clinic') {
            config(['cashier.model' => 'App\Models\Clinic']);
            Cashier::useCustomerModel(Clinic::class);
            $clinic = $user->clinic;
            if ($clinic && $logged_in_as == 'clinic') {
                $pricing_plan = PricingPlan::with('modules')->clinic()->where('slug', $slug)->active()->first();
                if ($pricing_plan->is_paid) {
                    $subscription = $clinic->newSubscription($pricing_plan->slug, $pricing_plan->stripe_plan)->create($request->token);
                    $clinic->update(['pricing_plan_id' => $pricing_plan->id]);
                } else {
                    $clinic->update(['pricing_plan_id' => $pricing_plan->id]);
                }
            }
        }
        request()->session()->flash('alert', [
            'type' => 'info',
            'message' => 'Successfully Activated Subscription',
        ]);
        return redirect(route('pricing', ['type' => $type]));
    }
}
