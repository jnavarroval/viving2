<?php

namespace App\Http\Controllers\Auth;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\User\Auth\ForgotPasswordEmail;
use App\Notifications\Auth\ResetPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['logout']);
        $this->middleware('guest')->except(['logout']);
    }

    public function showLoginForm(Request $request)
    {
        $redirect_url = null;
        if ($request->is_redirect) {
            $redirect_url = url()->previous() ?? null;
        }
        return Inertia::render('Auth/Login', ['redirect_url' => $redirect_url]);
    }

    public function showRegisterForm(Request $request)
    {
        return Inertia::render('Auth/Register');
    }

    public function showForgotPasswordForm(Request $request)
    {
        return Inertia::render('Auth/ForgotPassword');
    }

    public function submitForgotPasswordForm(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users,email'
            ]
        );

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $token = Str::random(64);
            DB::table('password_resets')->where('email', $request->email)->delete(); // revoke previous tokens
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            $user->update(['forgot_pass_token' => $token]);
            Notification::send($user, new ResetPassword($token));
            return back()->withErrors([
                'message' => 'Email Sent Successfully Please Check Your Inbox!',
                'type' => 'success'
            ]);
        }
        return back()->withErrors([
            'Restricted' => 'Zugriff verweigert Melden Sie sich in Ihrem Anmeldebereich an'
        ]);
    }

    public function showResetPasswordForm(Request $request)
    {
        return Inertia::render('Auth/ResetPassword');
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'token' => 'required|exists:password_resets,token',
        ]);
        $password_reset = DB::table('password_resets')->where('token', $request->token)->first();
        if ($password_reset) {
            $user = User::where('email', $password_reset->email)->first();
            if ($user) {
                $user_data = [];
                $user_data['password'] = Hash::make($request->password);
                $user->update($user_data);
                DB::table('password_resets')->where('email', $user->email)->delete();
                request()->session()->flash('alert', [
                    'type' => 'success',
                    'message' => 'Password reset successfully',
                ]);
                return redirect(route('login'));
            }
            return back()->withErrors([
                'message' => 'Invalid Token User'
            ]);
        } else {
            return back()->withErrors([
                'message' => 'Invalid Token Provided'
            ]);
        }
    }

    public function submitLoginForm(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->where('id', '!=', 1)->first();
        if ($user) {
            $email = $request->email;
            $password = $request->password;
            if (!$user->is_active) {
                return back()->withErrors([
                    'Invalid' => 'User is Inactive'
                ]);
            }
            if ($user->hasRole(Role::$Patient)) {
                $request->merge(['login_as' => 'patient']);
            } else if ($user->hasRole(Role::$Doctor)) {
                $request->merge(['login_as' => 'doctor']);
            } else if ($user->hasRole(Role::$Clinic)) {
                $request->merge(['login_as' => 'clinic']);
            }

            if (Auth::attempt(['email' => $email, 'password' => $password])) {

                $request->session()->regenerate();
                $request->session()->put('logged_in_as', $request->login_as);
                request()->session()->flash('alert', [
                    'type' => 'success',
                    'message' => 'Successfully Login, Welcome Back',
                ]);
                if ($user->hasVerifiedEmail()) {
                    if ($request->login_as == 'doctor') {
                        if ($user->doctor) {
                            $user->doctor->update([
                                'is_online' => 1
                            ]);
                        }
                        return redirect()->intended(route('account')); // redirect as doctor
                    } else if ($request->login_as == 'clinic') {
                        if ($user->clinic) {
                            $user->clinic->update([
                                'is_online' => 1
                            ]);
                        }
                        return redirect()->intended(route('account')); // redirect as clinic
                    } else {
                        if ($request->redirectUrl) {
                            return Inertia::location($request->redirectUrl);
                        } else {
                            if ($user->patient) {
                                $user->patient->update([
                                    'is_online' => 1
                                ]);
                            }
                            return redirect()->intended(route('home')); // redirect as patient
                        }
                    }
                } else {
                    return redirect()->intended(route('verification.notice')); // redirect as patient

                }
            } else {
                return back()->withErrors([
                    'Invalid' => 'The provided email and password do not match'
                ]);
            }
        } else {
            return back()->withErrors([
                'Invalid' => 'User Does Not Exist'
            ]);
        }
    }

    public function submitRegisterForm(Request $request)
    {
// dd($request->all());
        $is_auto_approve = GeneralSetting::where('name', 'is_auto_approve')->first();
        $redirect_path = 'account';
        if ($request->login_as == 'doctor') {
            $user_name_rule = 'required|alpha_dash|max:55|unique:doctors,user_name';
            $redirect_path = 'account';
        } else if ($request->login_as == 'clinic') {
            $user_name_rule = 'required|string|max:55|unique:clinics,user_name';
            $redirect_path = 'account';
        } else if ($request->login_as == 'patient') {
            $user_name_rule = 'required|alpha_dash|max:55|unique:patients,user_name';
            $redirect_path = 'home';
        } else {
            $user_name_rule = 'required|alpha_dash|max:55|unique:doctors,user_name';
            $redirect_path = 'account';
        }
        $request->validate(
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:8|confirmed',
                'terms' => 'required|in:1',
                'login_as'=>'required|in:patient,doctor,clinic',
                'user_name' => $user_name_rule,
            ]
        );
        $data = $request->all();
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
        $data['password'] = Hash::make($request->password);
        $data['is_active'] = 1;
        $user = User::create($data);
        $user->roles()->attach([$request->login_as]);
        if ($request->login_as == 'doctor') {
            $pricing_plan = getDoctorDefaultPricingPlan();
            $user->doctor()->create(['pricing_plan_id' => $pricing_plan->id ?? null, 'first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'zip_code' => $data['zip_code'] ?? null,  'user_name' => $data['user_name'] ?? null]);
        }
        if ($request->login_as == 'patient') {
            $user->patient()->create(['first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'zip_code' => $data['zip_code'] ?? null,  'user_name' => $data['user_name'] ?? null]);
        }
        if ($request->login_as == 'clinic') {
            $pricing_plan = getClinicDefaultPricingPlan();
            $user->clinic()->create(['pricing_plan_id' => $pricing_plan->id ?? null, 'first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'zip_code' => $data['zip_code'] ?? null,  'user_name' => $data['user_name'] ?? null]);
        }
        if ($is_auto_approve->value == 1) {
            $user->markEmailAsVerified();
        } else {
            $user->sendEmailVerificationNotification();
        }


        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            $request->session()->put('logged_in_as', $request->login_as);
            request()->session()->flash('alert', [
                'type' => 'success',
                'message' => 'Successfully Registered',
            ]);
            if ($request->login_as == 'patient') {
                return redirect()->intended(route('home'));
            }
            return redirect()->intended(route($redirect_path));
        } else {
            return back()->withErrors([
                'email' => 'Invalid Request'
            ]);
        }
    }

    public function logout(Request $request)
    {
        if ($request->session()->get('logged_in_as') == 'doctor') {
            if (auth()->user()->doctor) {
                auth()->user()->doctor->update(['is_online' => 0]);
            }
        } else if ($request->session()->get('logged_in_as') == 'clinic') {
            if (auth()->user()->clinic) {
                auth()->user()->clinic->update(['is_online' => 0]);
            }
        } else {
            if (auth()->user()->patient) {
                auth()->user()->patient->update(['is_online' => 0]);
            }
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget('logged_in_as');
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Successfully Logged Out',
        ]);
        return redirect()->intended(route('login'));
    }
}
