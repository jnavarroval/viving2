<?php

use App\Models\BookAppointment;
use App\Models\NotificationSetting;
use App\Models\User;
use App\Notifications\UserNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function generateResponse($arr, $success, $message, $errors, $type = 'paginated')
{
    if ($type == 'paginated') {
        if (!isset($arr['data'])) {
            $arr['data'] = [];
        }
        $arr['success'] = $success;
        $arr['message'] = $message;
        $arr['errors'] = $errors;
        return $arr;
    } else {
        $response = [];
        $response['data'] = $arr;
        $response['success'] = $success;
        $response['message'] = $message;
        $response['errors'] = $errors;
        return $response;
    }
}
function uploadFile($request, $key, $folder, $previous_file = null)
{
    if ($previous_file && file_exists(public_path($previous_file))) {
        unlink(public_path($previous_file));
    }
    if ($request->file($key)) {
        $file = $request->file($key);
        $name = strtotime(now()) . $file->getClientOriginalName();
        $file->move(public_path() . '/files' . '/' . $folder, $name);
        $url = '/files' . '/' . $folder . '/' . $name;
        return $url;
    } else {
        return null;
    }
}
function uploadArrayFile($request, $key, $folder, $previous_file = null)
{
    if ($previous_file && file_exists(public_path($previous_file))) {
        unlink(public_path($previous_file));
    }
    if ($request[$key]) {
        $file = $request[$key];
        $name = strtotime(now()) . $file->getClientOriginalName();
        $file->move(public_path() . '/files' . '/' . $folder, $name);
        $url = '/files' . '/' . $folder . '/' . $name;
        return $url;
    } else {
        return null;
    }
}

function uploadCroppedFile($request, $key, $folder, $previous_file = null)
{
    // if ($previous_file && file_exists(public_path($previous_file))) {
    //     unlink(public_path($previous_file));
    // }
    if ($request->{$key}) {
        $image_parts = explode(";base64,", $request->{$key});
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $path = '/images' . '/' . $folder;
        $imageFullPath = $path . '/' . $imageName;
        if (!is_dir(public_path($path))) {
            mkdir(public_path($path));
        }
        file_put_contents(public_path() . $imageFullPath, $image_base64);
        $url = $imageFullPath;
        return $url;
    } else if ($previous_file) {
        return $previous_file;
    } else {
        return null;
    }
}

function translations($json)
{
    if (!file_exists($json)) {
        if (file_exists(resource_path('lang/en.json'))) {
            return json_decode(file_get_contents(resource_path('lang/en.json')), true);
        } else {
            return [];
        }
    }
    return json_decode(file_get_contents($json), true);
}

function filterArray($arr)
{
    $temp = [];
    foreach ($arr as $item) {
        if ($item) {
            $temp[] = $item;
        }
    }
    return $temp;
}

// function updateGeneralCacheSettings()
// {
//     $general_settings = generalSettings();
//     \Illuminate\Support\Facades\Cache::put('general_settings', $general_settings);
//     return $general_settings;
// }

function getClinicDefaultPricingPlan()
{
    $pricing_plan = \App\Models\PricingPlan::active()->clinic()->default()->first();
    return $pricing_plan;
}
function getDoctorDefaultPricingPlan()
{
    $pricing_plan = \App\Models\PricingPlan::active()->doctor()->default()->first();
    return $pricing_plan;
}

function allLanguages()
{
    $languages = \App\Models\Language::active()->get();
    return $languages;
}
function generalSettings()
{
    $settings = \App\Models\GeneralSetting::select('name', 'value')->pluck('value', 'name')->toArray();
    return $settings;
}
function checkPermission($to_check, $permissions)
{
    if (is_array($to_check)) {
        foreach ($to_check as $val) {
            if (array_key_exists($val, $permissions) && $permissions[$val]) {
                return true;
            }
        }
    } else {
        if (array_key_exists($to_check, $permissions) && $permissions[$to_check]) {
            return true;
        }
    }
    return false;
}


function getModelFillables($modelName, $directory = "SJ")
{
    $model = 'App\Models' . $modelName;
    return \Illuminate\Support\Facades\App::make($model)->getFillable();
}




function ConvertToReadableTime($seconds)
{
    $minutes = 0;
    if ($seconds < 60) {
        $return_time = (int)$seconds . ' Secs';
    } else {
        $minutes = (int)$seconds / 60;
    }
    if ($minutes != 0) {
        if ($minutes < 60) {
            $return_time = (int)$minutes . ' Min';
        } else if ($minutes >= 60 && $minutes <= 1440) {
            $minutes = $minutes / 60;
            $return_time = (int)$minutes . ' Hours';
        } else {
            $minutes = $minutes / 1440;
            $return_time = (int)$minutes . ' Days';
        }
    }
    return $return_time;
}


function fileExtensionValidator(array $allowed_extensions, $file)
{
    $error = collect();
    $error['file'] = ['The file must be a file of type: ' . implode(', ', $allowed_extensions)];
    if (!in_array(strtolower($file->getClientOriginalExtension()), $allowed_extensions)) {
        return [
            'status' => false,
            'error' => $error
        ];
    }
    return [
        'status' => true,
        'error' => null
    ];
}
function pagesTranslations()
{
    $pages_contents = \App\Models\PagesContent::all();
    $all_page_content = [];
    foreach ($pages_contents as $pages_content) {
        $temp['name'] = $pages_content->name;
        $temp['value'] = $pages_content->getTranslation('value', session()->get('locale') ?? app()->getLocale());
        $temp['page'] = $pages_content->page;
        $temp['type'] = $pages_content->type;
        $all_page_content[] = $temp;
    }
    return $all_page_content;
}



function dateTimeDiff($first_value, $second_value)
{
    $first_value = Carbon::parse($first_value);
    $second_value = Carbon::parse($second_value);
    return $first_value->diffInDays($second_value);
}


function template($asset = false)
{
    $activeTheme = config('basic.theme');
    if ($asset) return 'assets/themes/' . $activeTheme . '/';
    return 'themes.' . $activeTheme . '.';
}


function recursive_array_replace($find, $replace, $array)
{
    if (!is_array($array)) {
        return str_replace($find, $replace, $array);
    }
    $newArray = [];
    foreach ($array as $key => $value) {
        $newArray[$key] = recursive_array_replace($find, $replace, $value);
    }
    return $newArray;
}




function getFile($image, $clean = '')
{
    return file_exists($image) && is_file($image) ? asset($image) . $clean : asset(config('location.default'));
}

function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

function loopIndex($object)
{
    return ($object->currentPage() - 1) * $object->perPage() + 1;
}

function getAmount($amount, $length = 0)
{
    if (0 < $length) {
        return number_format($amount + 0, $length);
    }
    return $amount + 0;
}


function strRandom($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function diffForHumans($date)
{
    $lang = session()->get('lang');
    \Carbon\Carbon::setlocale($lang);
    return \Carbon\Carbon::parse($date)->diffForHumans();
}

function dateTime($date, $format = 'd M, Y h:i A')
{
    return date($format, strtotime($date));
}
if (!function_exists('putPermanentEnv')) {
    function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();
        $escaped = preg_quote('=' . env($key), '/');
        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}

function checkTo($currencies, $selectedCurrency = 'USD')
{
    foreach ($currencies as $key => $currency) {
        if (property_exists($currency, strtoupper($selectedCurrency))) {
            return $key;
        }
    }
}

function code($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}
function invoice()
{

    return time() . code(4);
}
function wordTruncate($string, $offset = 0, $length = null): string
{
    $words = explode(" ", $string);
    isset($length) ? array_splice($words, $offset, $length) : array_splice($words, $offset);
    return implode(" ", $words);
}

function linkToEmbed($string)
{
    if (strpos($string, 'youtube') !== false) {
        $words = explode("/", $string);
        if (strpos($string, 'embed') == false) {
            array_splice($words, -1, 0, 'embed');
        }
        $words = str_ireplace('watch?v=', '', implode("/", $words));
        return $words;
    }
    return $string;
}


function getPercent($total, $current)
{
    if ($current > 0 && $total > 0) {
        $percent = (($current * 100) / $total) ?: 0;
    } else {
        $percent = 0;
    }
    return round($percent, 0);
}

function flagLanguage($data)
{
    return  '{' . rtrim($data, ',') . '}';
}

function getIpInfo()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);

    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;


    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');

    return $data;
}



function resourcePaginate($data, $callback)
{
    return $data->setCollection($data->getCollection()->map($callback));
}


function clean($string)
{
    $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
function camelToWord($str)
{
    $arr =  preg_split('/(?=[A-Z])/', $str);
    return trim(join(' ', $arr));
}


function in_array_any($needles, $haystack)
{
    return (bool) array_intersect($needles, $haystack);
}


function triggerNotification($notification_type, $event_type, $resource_id, $account_role = null)
{
    $notification_setting = NotificationSetting::where('setting_name', $notification_type)->first();

    $is_enable_pusher = $notification_setting && $notification_setting->is_push_notification_send == 1;
    $is_enable_database = $notification_setting && $notification_setting->is_in_app_notification_send == 1;
    $is_enable_email = $notification_setting && $notification_setting->is_email_send == 1;



    $user = Auth::user();
    $logged_in_as = session()->get('logged_in_as') ?? $account_role;
    $sender_type_id =  $user[$logged_in_as]->id ?? null;
    $booked_appointment_id = null;
    $mail_subject = '';
    $email_template_view = '';
    $booked_appointment = null;
    $receiver_user = '';
    $sender_user = '';
    if ($notification_type == 'chat_message') {
        $chat = Chat::find($resource_id);
        if ($event_type == 'new_message') {
            $message = $user[$logged_in_as]->name . ' has sent you a new message.';
        } else {
            $message = 'You have a new message';
        }
        foreach ($chat->participants as $participant) {
            if ($participant->user_id != auth()->user()->id) {
                $route =  route('chats', [
                    'sender_type' => $logged_in_as,
                    'sender_type_id' => $sender_type_id,
                ]);
                $mail_subject = 'You have unread messages.';
                $email_template_view = 'emails.chats.new_message';
                $receiver_user = User::find((int)$participant->user_id);
            }
        }
    }
    if ($notification_type == 'bookings') {
        $booking = BookAppointment::find($resource_id);
        $booked_appointment_id = $booking->id;
        if ($event_type == 'appointment_booked') {
            if ($booking->is_discovery_call == 1) {
                $message = $user[$logged_in_as]->name . 'has requested a' . 'Discovery Call' . 'appointment with you .';
            } else {
                $booking_name =  $booking->appointment_type->category->name ?? null;

                $message = $user[$logged_in_as]->name . 'has requested a' . $booking_name . 'appointment with you .';
            }
            $mail_subject = 'You have received a booking request.';
            $email_template_view = 'emails.doctors.new_bookings';
            $booked_appointment = $booking;
            $route =  route('doctor.appointment_log.detail',['id' => $booked_appointment_id] );
           if($booking->doctor){
               $receiver_user = User::find((int)$booking->doctor->user_id);
           }else{
            $receiver_user = User::find((int)$booking->clinic->user_id);
           }
        }


        if ($event_type == 'accept_booked') {
            $booking_name =  $booking->appointment_type->category->name ?? null;
            $message =  'Your ' .  $booking_name . 'appointment with ' .  $booking->doctor->name . ' has been canceled .';
            $route =  route('doctor.appointment_log.detail',['id' => $booked_appointment_id] );
            $mail_subject = 'Your booking has been confirmed';
            $email_template_view = 'emails.patients.booking_accepted';
            $booked_appointment = $booking;
            $receiver_user = User::find((int)$booking->patient->user_id);
            $sender_user  = User::find((int)$booking->doctor->user_id);
        }


        if ($event_type == 'cancel_seeker_booked') {
            $booking_name =  $booking->appointment_type->category->name ?? null;
            $message =  'Your' .  $booking_name . 'appointment with' .  $booking->patient->name . 'has been canceled .';
            $route =  route('appointment-log');
            $receiver_user = User::find((int)$booking->doctor->user_id);
        }
        if ($event_type == 'reschedule_seeker_booked') {
            $booking_name =  $booking->appointment_type->category->name ?? null;

            $message =  $booking->patient->name .  'has requested a reschedule to your' . $booking_name . 'appointment';
            $route =  route('appointment-log');
            $mail_subject = 'Reschedule request made for one of your appointments.';
            $email_template_view = 'emails.doctors.reschedule_request';
            $booked_appointment = $booking;

            $receiver_user = User::find((int)$booking->doctor->user_id);
        }
        if ($event_type == 'reschedule_doctor_accept_booked') {
            $booking_name =  $booking->appointment_type->category->name ?? null;
            $message =  $booking->patient->name .  'has accepted a reschedule to your' . $booking_name . 'appointment';
            $route =  route('appointment-log');


            $mail_subject = 'Reschedule request accepted.';
            $email_template_view = 'emails.patients.reschedule_request_accepted';


            $booked_appointment = $booking;
            $receiver_user = User::find((int)$booking->patient->user_id);
        }
        if ($event_type == 'doctor_refuse_booked') {
            $booking_name =  $booking->appointment_type->category->name ?? null;

            $message =  $booking->doctor->name .  ' has declined your ' . $booking_name . ' booking. You will be refunded within 5 business days. Don`t give up! Try booking another date and time.';
            $mail_subject = 'Your appointment with ' . $booking->doctor->name . ' has been cancelled.';
            $email_template_view = 'emails.patients.cancel_booking';
            $route =  route('doctor.appointment_log.detail',['id' => $booked_appointment_id] );
            $route =  route('appointment-log');
            $receiver_user = User::find((int)$booking->patient->user_id);
            $sender_user  = User::find((int)$booking->doctor->user_id);
        }
        if ($event_type == 'reschedule_doctor_refuse_booked') {
            $booking_name =  $booking->appointment_type->category->name ?? null;

            $message =  $booking->doctor->name .  'has declined your reschedule request for your' . $booking_name . 'appointment';
            $route =  route('appointment-log');
            $mail_subject = 'Reschedule request declined.';
            $email_template_view = 'emails.patients.refuse_reschedule_request';
            $booked_appointment = $booking;
            $receiver_user = User::find((int)$booking->patient->user_id);
        }
        if ($event_type == 'doctor_request_reschedule') {
            $booking_name =  $booking->appointment_type->category->name ?? null;
            $message =  $booking->doctor->name .  'has requested a reschedule to your' . $booking_name . 'appointment';
            $route =  route('appointment-log');

            $mail_subject = 'Reschedule request made for one of your appointments.';
            $email_template_view = 'emails.patients.reschedule_request';
            $booked_appointment = $booking;
            $receiver_user = User::find((int)$booking->patient->user_id);
        }
        if ($event_type == 'cancel_doctor_booked') {
            $booking_name =  $booking->appointment_type->category->name ?? null;

            $message =  'Your' .  $booking_name . 'appointment with' .  $booking->doctor->name . 'has been canceled .';
            $route =  route('appointment-log');
            $receiver_user = User::find((int)$booking->patient->user_id);
        }

        if ($event_type == 'reschedule_seeker_accept_booked') {
            $booking_name =  $booking->appointment_type->category->name ?? null;
            $message =  $booking->doctor->name .  'has accepted a reschedule to your' . $booking_name . 'appointment';
            $route =  route('appointment-log');

            $mail_subject = 'Reschedule request accepted.';
            $email_template_view = 'emails.doctors.reschedule_request_accepted';
            $booked_appointment = $booking;
            $receiver_user = User::find((int)$booking->doctor->user_id);
        }
        if ($event_type == 'reschedule_seeker_refuse_booked') {
            $booking_name =  $booking->appointment_type->category->name ?? null;
            $message =  $booking->doctor->name .  'has accepted a rejected to your' . $booking_name . 'appointment';
            $route =  route('appointment-log');

            $mail_subject = 'Reschedule request declined.';
            $email_template_view = 'emails.doctors.reschedule_request_accepted';
            $booked_appointment = $booking;

            $receiver_user = User::find((int)$booking->doctor->user_id);
        }
        if ($event_type == 'doctor_accept_appeal_contest') {
            $booking_name =  $booking->appointment_type->category->name ?? null;
            $message = 'There has been an update with one of your contested appointments.';
            $route =  route('appointment-log');

            $mail_subject = 'There has been an update to one of your contested appointments.';
            $email_template_view = 'emails.patients.contest_updated';
            $booked_appointment = $booking;


            $receiver_user = User::find((int)$booking->patient->user_id);
        }
        if ($event_type == 'complete_appointment') {
            $booking_name =  $booking->appointment_type->category->name ?? null;
            $message =  'How was your ' .  $booking_name . ' appointment with ' .  $booking->doctor->name . ' ? Let us know by rating your experience!';
            $route =  route('appointment-log.write-review', ['appointment_id' => $resource_id]);
            $receiver_user = User::find((int)$booking->patient->user_id);
            $mail_subject = 'Your appointment has been completed';
            $email_template_view = 'emails.patients.complete_appointment';
            $booked_appointment = $booking;
        }
    }

    if ($notification_type == 'account_creation') {
        if ($event_type == 'doctor_account') {
            $message =  'Welcome to the My Source Network community! Let community members know who you are and your area of expertise!';
            $route =  route('account');
            $receiver_user = User::find((int)$resource_id);
        }
        if ($event_type == 'patient_account') {
            $message =  'Welcome to the My Source Network community! Get started by exploring Practitioners near you.';
            $route =  route('doctors.listing');
            $receiver_user = User::find((int)$resource_id);
        }
    }



    if ($notification_type == 'bookings' &&  $event_type == 'accept_booked') {
        $mail_subject = 'Your booking has been confirmed';
        $email_template_view = 'emails.healers.booking_accepted';
        $data = [
            'message' => $message,
            'url' => $route,
            'sender_type' => "App\\Models\\" . ucfirst($logged_in_as),
            'sender_type_id' => $sender_type_id,
            'notification_type' => $notification_type,
            'booked_appointment_id' => $booked_appointment_id,
            'mail_subject' => $mail_subject,
            'email_template_view' => $email_template_view,
            'receiver_user' => $receiver_user,
            'booked_appointment' => $booked_appointment,
        ];
        $sender_user->notify(new UserNotification($data));
        $receiver_user->notify(new UserNotification($data));
    }
    if ($notification_type == 'bookings' &&  $event_type == 'healer_refuse_booked') {
        $mail_subject = 'Your appointment with ' . $booked_appointment->customer->name . ' has been cancelled.';
        $email_template_view = 'emails.healers.cancel_booking';
        $data = [
            'message' => $message,
            'url' => $route,
            'sender_type' => "App\\Models\\" . ucfirst($logged_in_as),
            'sender_type_id' => $sender_type_id,
            'notification_type' => $notification_type,
            'booked_appointment_id' => $booked_appointment_id,
            'mail_subject' => $mail_subject,
            'email_template_view' => $email_template_view,
            'receiver_user' => $receiver_user,
            'booked_appointment' => $booked_appointment,
        ];
        $sender_user->notify(new UserNotification($data));
        $receiver_user->notify(new UserNotification($data));
    }

    $notification_data = [
        'message' => $message,
        'url' => $route,
        'sender_type' => "App\\Models\\" . ucfirst($logged_in_as),
        'sender_type_id' => $sender_type_id,
        'notification_type' => $notification_type,
        'booked_appointment_id' => $booked_appointment_id,
        'mail_subject' => $mail_subject,
        'email_template_view' => $email_template_view,
        'receiver_user' => $receiver_user,
        'booked_appointment' => $booked_appointment,
    ];
    // dd($notification_data);
    $receiver_user->notify(new UserNotification($notification_data, ['mail']));

    if ($is_enable_pusher) {
        $receiver_user->notify(new UserNotification($notification_data, ['broadcast']));
    }
    if ($is_enable_database) {
        $receiver_user->notify(new UserNotification($notification_data, ['database']));
    }
    if ($is_enable_email) {
        $receiver_user->notify(new UserNotification($notification_data, ['mail']));
    }


}
