<?php

namespace App\Services\Gateway\instamojo;


use Facades\App\Services\BasicCurl;
use Facades\App\Services\BasicService;

class Payment
{
    public static function prepareData($order, $gateway)
    {
        $basic = (object) config('basic');
        $api_key = trim($gateway->parameters->api_key ?? '');
        $auth_token = trim($gateway->parameters->auth_token ?? '');

        $url = 'https://instamojo.com/api/1.1/payment-requests/';
        $headers = [
            "X-Api-Key:$api_key",
            "X-Auth-Token:$auth_token"
        ];
        $postParam = [
            'purpose' => 'Payment to ' . $basic->site_title ?? 'Photoica',
            'amount' => $order->amount,
            'buyer_name' => optional($order->user)->username ?? 'User Name',
            'redirect_url' => route('success'),
            'webhook' => route('ipn', [$gateway->code, $order->transaction]),
            'email' => optional($order->user)->email ?? 'example@example.com',
            'send_email' => true,
            'allow_repeated_payments' => false
        ];

        $response = BasicCurl::curlPostRequestWithHeaders($url, $headers, $postParam);
        $response = json_decode($response);


        if ($response->success) {
            $send['redirect'] = true;
            $send['redirect_url'] = $response->payment_request->longurl;
        } else {
            $send['error'] = true;
            $send['message'] = "Invalid Request";
        }
        return json_encode($send);
    }

    public static function ipn($request, $gateway, $order = null, $trx = null, $type = null)
    {
        $salt = trim($gateway->parameters->salt);
        $imData = $request;
        $macSent = $imData['mac'];
        unset($imData['mac']);
        ksort($imData, SORT_STRING | SORT_FLAG_CASE);
        $mac = hash_hmac("sha1", implode("|", $imData), $salt);

        if ($macSent == $mac && $imData['status'] == "Credit" && $order->status == '0') {
            BasicService::preparePaymentUpgradation($order);
            if ($order->type == 'wallet') {
                $data['redirect'] = route('wallet');
            } else {
                $appointment_id = $order->appointment->id;
                $appointment_type = $order->appointment->appointment_type->type;
                if ($order->appointment->doctor_id) {
                    $user_name = $order->appointment->doctor->user_name;
                    $data['redirect'] = '/doctor/profile/' . $user_name . '/book_appointment?type=' . $appointment_type . '&paymentSuccess=true&appointmentId=' . $appointment_id;
                } elseif ($order->appointment->clinic_id) {
                    $user_name = $order->appointment->clinic->user_name;
                    $data['redirect'] = '/clinic/profile/' . $user_name . '/book_appointment?type=' . $appointment_type . '&paymentSuccess=true&appointmentId=' . $appointment_id;
                }
            }
        }
    }
}
