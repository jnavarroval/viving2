<?php

namespace App\Services\Gateway\paytm;

use App\Models\Fund;
use Facades\App\Services\BasicService;
use Facades\App\Services\BasicCurl;


class Payment
{
    public static function prepareData($order, $gateway)
    {
        $val['MID'] = trim($gateway->parameters->MID);
        $val['WEBSITE'] = trim($gateway->parameters->WEBSITE);
        $val['CHANNEL_ID'] = trim($gateway->parameters->CHANNEL_ID);
        $val['INDUSTRY_TYPE_ID'] = trim($gateway->parameters->INDUSTRY_TYPE_ID);
        $val['ORDER_ID'] = $order->transaction;
        $val['TXN_AMOUNT'] = round($order->final_amount, 2);
        $val['CUST_ID'] = $order->user_id;
        $val['CALLBACK_URL'] = route('ipn', [$gateway->code, $order->transaction]);
        $val['CHECKSUMHASH'] = (new PayTM())->getChecksumFromArray($val, trim($gateway->parameters->merchant_key));
        $send['val'] = $val;
        $send['view'] = 'user.payment.redirect';
        $send['method'] = 'post';

        $send['url'] = trim($gateway->parameters->process_transaction_url);
        return json_encode($send);
    }

    public static function ipn($request, $gateway, $order = null, $trx = null, $type = null)
    {
        define('PAYTM_ENVIRONMENT', trim($gateway->parameters->environment_url));
        define('PAYTM_MID', trim($gateway->parameters->MID));
        define('PAYTM_MERCHANT_KEY', trim($gateway->parameters->merchant_key));
        define('PAYTM_WEBSITE', trim($gateway->parameters->WEBSITE));

        $order = Fund::with('gateway')
            ->whereHas('gateway', function ($query) {
                $query->where('code', 'paytm');
            })
            ->where('transaction', $request->ORDERID)
            ->orderBy('id', 'desc')
            ->first();

        //        dd($request->all());
        /* initialize an array */
        $paytmParams = array();

        /* body parameters */
        $paytmParams["body"] = array(
            "mid" => PAYTM_MID,
            "orderId" => $request->ORDERID,
        );

        $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), PAYTM_MERCHANT_KEY);

        /* head parameters */
        $paytmParams["head"] = array(
            "signature" => $checksum
        );

        /* prepare JSON string for request */
        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

        $url = PAYTM_ENVIRONMENT . "/v3/order/status";

        $getcURLResponse = self::getcURLRequest($url, $paytmParams);


        if ($getcURLResponse && isset($getcURLResponse['body']['resultInfo']['resultStatus'])) {
            if ($getcURLResponse['body']['resultInfo']['resultStatus'] == 'TXN_SUCCESS' && $getcURLResponse['body']['txnAmount'] == round($order->final_amount, 2)) {
                BasicService::preparePaymentUpgradation($order);

                $data['status'] = 'success';
                $data['msg'] = 'Transaction was successful.';
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
                return $data;
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'it seems some issue in server to server communication. Kindly connect with administrator';
                $data['redirect'] = route('failed');
                return $data;
            }
        } else {
            $data['status'] = 'error';
            $data['msg'] = $request->RESPMSG;
            $data['redirect'] = route('failed');
            return $data;
        }
    }

    public static function getcURLRequest($url, $postData = array(), $headers = array("Content-Type: application/json"))
    {
        $post_data_string = json_encode($postData, JSON_UNESCAPED_SLASHES);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        return json_decode($response, true);
    }
}
