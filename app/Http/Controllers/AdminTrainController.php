<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class AdminTrainController extends Controller
{
    public function index()
    {
        $trains = Train::latest()->get();

        return view('admin.trains', [
            'trains' => $trains,
        ]);
    }


    public function create()
    {
        return view('admin.train-create');
    }


    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | تبدیل تاریخ شمسی به میلادی
        |--------------------------------------------------------------------------
        */

        if ($request->filled('departure_date')) {

            try {

                $gregorianDate = Jalalian::fromFormat(
                    'Y/m/d',
                    $request->departure_date
                )
                ->toCarbon()
                ->format('Y-m-d');


                $request->merge([
                    'departure_date' => $gregorianDate
                ]);

            } catch (\Exception $e) {

                return back()
                    ->withErrors([
                        'departure_date' => 'تاریخ حرکت وارد شده صحیح نیست.'
                    ])
                    ->withInput();

            }

        }


        /*
        |--------------------------------------------------------------------------
        | اعتبارسنجی
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'name' => 'required|string|max:255',

            'company' => 'required|string|max:255',

            'origin' => 'required|string|max:255',

            'destination' => 'required|string|max:255',

            'departure_date' => 'required|date',

            'wagon' => 'required|string|max:255',

            'departure_time' => 'required',

            'arrival_time' => 'required',

            'duration' => 'required|string|max:255',

            'price' => 'required|numeric|min:0',

            'capacity' => 'required|integer|min:1',

            'available_seats' => 'required|integer|min:0|lte:capacity',

            'is_active' => 'required|boolean',

        ]);


        /*
        |--------------------------------------------------------------------------
        | ذخیره قطار
        |--------------------------------------------------------------------------
        */

        Train::create($validated);


        return redirect('/admin/trains')
            ->with('success', 'قطار جدید با موفقیت اضافه شد.');
    }


    public function edit($id)
    {
        $train = Train::findOrFail($id);

        return view('admin.train-edit', [
            'train' => $train,
        ]);
    }


    public function update(Request $request, $id)
    {
        $train = Train::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | تبدیل تاریخ شمسی به میلادی
        |--------------------------------------------------------------------------
        */

        if ($request->filled('departure_date')) {

            try {

                $gregorianDate = Jalalian::fromFormat(
                    'Y/m/d',
                    $request->departure_date
                )
                ->toCarbon()
                ->format('Y-m-d');


                $request->merge([
                    'departure_date' => $gregorianDate
                ]);

            } catch (\Exception $e) {

                return back()
                    ->withErrors([
                        'departure_date' => 'تاریخ حرکت وارد شده صحیح نیست.'
                    ])
                    ->withInput();

            }

        }


        /*
        |--------------------------------------------------------------------------
        | اعتبارسنجی
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
'name' => 'required|string|max:255',

            'company' => 'required|string|max:255',

            'origin' => 'required|string|max:255',

            'destination' => 'required|string|max:255',

            'departure_date' => 'required|date',

            'wagon' => 'required|string|max:255',

            'departure_time' => 'required',

            'arrival_time' => 'required',

            'duration' => 'required|string|max:255',

            'price' => 'required|numeric|min:0',

            'capacity' => 'required|integer|min:1',

            'available_seats' => 'required|integer|min:0|lte:capacity',

            'is_active' => 'required|boolean',

        ]);


        /*
        |--------------------------------------------------------------------------
        | به‌روزرسانی قطار
        |--------------------------------------------------------------------------
        */

        $train->update($validated);


        return redirect('/admin/trains')
            ->with('success', 'اطلاعات قطار با موفقیت ویرایش شد.');
    }


    public function destroy($id)
    {
        $train = Train::findOrFail($id);

        $train->delete();

        return redirect('/admin/trains')
            ->with('success', 'قطار با موفقیت حذف شد.');
    }
}

