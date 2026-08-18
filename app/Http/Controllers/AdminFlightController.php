<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;

class AdminFlightController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | لیست پروازها
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $flights = Flight::latest()->get();

        return view('admin.flights', [
            'flights' => $flights,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | صفحه افزودن پرواز
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.flight-create');
    }


    /*
    |--------------------------------------------------------------------------
    | تبدیل تاریخ پرواز
    |--------------------------------------------------------------------------
    */

    private function convertFlightDate(Request $request)
    {
        if (!$request->filled('flight_date')) {
            return;
        }

        $date = trim($request->input('flight_date'));


        /*
        |--------------------------------------------------------------------------
        | تبدیل اعداد فارسی و عربی به انگلیسی
        |--------------------------------------------------------------------------
        */

        $date = str_replace(
            [
                '۰','۱','۲','۳','۴','۵','۶','۷','۸','۹',
                '٠','١','٢','٣','٤','٥','٦','٧','٨','٩'
            ],
            [
                '0','1','2','3','4','5','6','7','8','9',
                '0','1','2','3','4','5','6','7','8','9'
            ],
            $date
        );


        /*
        |--------------------------------------------------------------------------
        | اگر تاریخ از قبل میلادی و استاندارد باشد
        | مثال: 2026-09-16
        |--------------------------------------------------------------------------
        */

        try {

            if (
                preg_match(
                    '/^\d{4}-\d{2}-\d{2}$/',
                    $date
                )
            ) {

                Carbon::createFromFormat(
                    'Y-m-d',
                    $date
                );

                $request->merge([
                    'flight_date' => $date
                ]);

                return;
            }

        } catch (\Exception $e) {

            throw new \Exception(
                'تاریخ میلادی وارد شده صحیح نیست.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | اگر تاریخ شمسی باشد
        | مثال: 1405/06/25
        |--------------------------------------------------------------------------
        */

        try {

            $date = str_replace(
                '-',
                '/',
                $date
            );


            $jalaliDate = Jalalian::fromFormat(
                'Y/m/d',
                $date
            );


            $gregorianDate = $jalaliDate
                ->toCarbon()
                ->format('Y-m-d');


            /*
            | در نهایت همیشه مقدار میلادی ذخیره می‌شود
            */

            $request->merge([
                'flight_date' => $gregorianDate
            ]);

        } catch (\Exception $e) {

            throw new \Exception(
                'تاریخ پرواز وارد شده صحیح نیست.'
            );

        }
    }


    /*
    |--------------------------------------------------------------------------
    | افزودن پرواز
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        | اول تاریخ را تبدیل می‌کنیم
        | بعد validate انجام می‌شود
        */

        try {

            $this->convertFlightDate($request);

        } catch (\Exception $e) {
return back()
                ->withErrors([
                    'flight_date' =>
                        'تاریخ پرواز وارد شده صحیح نیست.'
                ])
                ->withInput();

        }


        /*
        |--------------------------------------------------------------------------
        | اعتبارسنجی
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'airline' => [
                'required',
                'string',
                'max:255',
            ],

            'flight_number' => [
                'required',
                'string',
                'max:255',
            ],

            'origin' => [
                'required',
                'string',
                'max:255',
            ],

            'destination' => [
                'required',
                'string',
                'max:255',
            ],

            'flight_date' => [
                'required',
                'date',
            ],

            'departure_time' => [
                'required',
            ],

            'arrival_time' => [
                'required',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'vip_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'capacity' => [
                'required',
                'integer',
                'min:1',
            ],

            'available_seats' => [
                'required',
                'integer',
                'min:0',
                'lte:capacity',
            ],

            'flight_class' => [
                'required',
                'in:economy,business',
            ],

            'active' => [
                'required',
                'boolean',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | ذخیره
        |--------------------------------------------------------------------------
        */

        Flight::create($validated);


        return redirect()
            ->route('admin.flights')
            ->with(
                'success',
                'پرواز جدید با موفقیت اضافه شد.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ویرایش
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);

        return view('admin.flight-edit', [
            'flight' => $flight,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | بروزرسانی
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);


        try {

            $this->convertFlightDate($request);

        } catch (\Exception $e) {

            return back()
                ->withErrors([
                    'flight_date' =>
                        'تاریخ پرواز وارد شده صحیح نیست.'
                ])
                ->withInput();

        }


        /*
        |--------------------------------------------------------------------------
        | اعتبارسنجی
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'airline' => [
                'required',
                'string',
                'max:255',
            ],

            'flight_number' => [
                'required',
                'string',
                'max:255',
            ],

            'origin' => [
                'required',
                'string',
                'max:255',
            ],
'destination' => [
                'required',
                'string',
                'max:255',
            ],

            'flight_date' => [
                'required',
                'date',
            ],

            'departure_time' => [
                'required',
            ],

            'arrival_time' => [
                'required',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'vip_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'capacity' => [
                'required',
                'integer',
                'min:1',
            ],

            'available_seats' => [
                'required',
                'integer',
                'min:0',
                'lte:capacity',
            ],

            'flight_class' => [
                'required',
                'in:economy,business',
            ],

            'active' => [
                'required',
                'boolean',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | ذخیره تغییرات
        |--------------------------------------------------------------------------
        */

        $flight->update($validated);


        return redirect()
            ->route('admin.flights')
            ->with(
                'success',
                'اطلاعات پرواز با موفقیت ویرایش شد.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | حذف
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);

        $flight->delete();

        return redirect()
            ->route('admin.flights')
            ->with(
                'success',
                'پرواز با موفقیت حذف شد.'
            );
    }
}

