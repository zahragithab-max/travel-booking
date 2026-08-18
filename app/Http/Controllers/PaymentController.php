<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
 

    public function start(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $price = (int) $request->query('price');

        if ($price <= 0) {
            abort(422, 'مبلغ پرداخت نامعتبر است.');
        }

   

        $bookingData = $request->query();

        session()->put('pending_booking', $bookingData);


     

        $amount = $price * 10;


     

        $data = [

            'merchant_id' => env('ZARINPAL_MERCHANT_ID'),

            'amount' => $amount,

            'callback_url' => route('payment.callback'),

            'description' => 'پرداخت بلیط سفرینو',

            'metadata' => [

                'mobile' => $request->query('mobile', ''),

            ],

        ];


     

        $jsonData = json_encode(
            $data,
            JSON_UNESCAPED_UNICODE
        );


        $ch = curl_init(
            'https://sandbox.zarinpal.com/pg/v4/payment/request.json'
        );


        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            $jsonData
        );

        curl_setopt(
            $ch,
            CURLOPT_RETURNTRANSFER,
            true
        );

        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonData),
            ]
        );


        $result = curl_exec($ch);

        $curlError = curl_error($ch);

        curl_close($ch);


     

        if ($curlError) {

            abort(
                500,
                'خطا در اتصال به زرین‌پال: ' . $curlError
            );

        }


        $result = json_decode(
            $result,
            true
        );



        if (
            isset($result['data']['code']) &&
            $result['data']['code'] == 100
        ) {

            $authority =
                $result['data']['authority'];



            session()->put(
                'payment_authority',
                $authority
            );


            return redirect(
                'https://sandbox.zarinpal.com/pg/StartPay/' .
                $authority
            );
        }


      

        $message =
            $result['errors']['message']
            ?? 'خطا در ایجاد تراکنش زرین‌پال.';


        abort(
            500,
            $message
        );
    }


  

    public function callback(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }



        $status =
            $request->query('Status');


        $authority =
            $request->query('Authority');



        if (
            $status !== 'OK' ||
            !$authority
        ) {

            return redirect('/payment/failed');

        }



        $bookingData =
            session('pending_booking');


        if (!$bookingData) {

            abort(
                422,
                'اطلاعات رزرو پیدا نشد.'
            );

        }



        $price =
            (int) ($bookingData['price'] ?? 0);


        if ($price <= 0) {

            abort(
                422,
                'مبلغ رزرو نامعتبر است.'
            );

        }


        $amount = $price * 10;



        $data = [

            'merchant_id' =>
                env('ZARINPAL_MERCHANT_ID'),

            'amount' =>
                $amount,

            'authority' =>
                $authority,

        ];


        $jsonData = json_encode(
            $data,
            JSON_UNESCAPED_UNICODE
        );


        $ch = curl_init(
            'https://sandbox.zarinpal.com/pg/v4/payment/verify.json'
        );


        curl_setopt(
            $ch,
            CURLOPT_USERAGENT,
            'ZarinPal Rest Api v4'
        );

        curl_setopt(
            $ch,
            CURLOPT_CUSTOMREQUEST,
            'POST'
        );

        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            $jsonData
        );

        curl_setopt(
            $ch,
            CURLOPT_RETURNTRANSFER,
            true
        );

        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonData),
            ]
        );


        $result = curl_exec($ch);

        $curlError = curl_error($ch);

        curl_close($ch);


        if ($curlError) {

            abort(
                500,
                'خطا در تأیید پرداخت: ' . $curlError
            );

        }
$result = json_decode(
            $result,
            true
        );


     

        if (
            isset($result['data']['code']) &&
            in_array(
                $result['data']['code'],
                [100, 101]
            )
        ) {

            

            $bookingData['payment_authority'] =
                $authority;

            $bookingData['payment_status'] =
                'paid';


            session()->forget(
                'pending_booking'
            );

            session()->forget(
                'payment_authority'
            );


          
            return redirect(
                '/booking-success?' .
                http_build_query($bookingData)
            );
        }


        return redirect('/payment/failed');
    }
}

