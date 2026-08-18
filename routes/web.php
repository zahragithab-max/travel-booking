<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Train;

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminTrainController;
use App\Http\Controllers\AdminFlightController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| صفحه اصلی
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| هواپیما
|--------------------------------------------------------------------------
*/

Route::get('/flight', function () {
    return view('flight');
});


/*
|--------------------------------------------------------------------------
| قطار
|--------------------------------------------------------------------------
*/

Route::get('/train', function () {
    return view('train');
});


/*
|--------------------------------------------------------------------------
| جستجو
|--------------------------------------------------------------------------
*/

Route::get('/search', function () {

    return view('search', [
        'from' => request('from'),
        'to' => request('to'),
        'departure' => request('departure'),
        'returnDate' => request('return'),
        'passengers' => request('passengers'),
    ]);

});


/*
|--------------------------------------------------------------------------
| نتایج جستجوی هواپیما
|--------------------------------------------------------------------------
*/

use Morilog\Jalali\Jalalian;

Route::get('/results', function (Request $request) {

    $query = Flight::where('origin', $request->query('from'))
        ->where('destination', $request->query('to'))
        ->where('active', true);

    // فیلتر تاریخ فقط اگه تاریخ معتبر فرستاده شده باشه
    if ($request->query('departure')) {
        try {
            $miladiDate = Jalalian::fromFormat('Y/m/d', $request->query('departure'))
                ->toCarbon()
                ->format('Y-m-d');

            $query->where('flight_date', $miladiDate);
        } catch (\Exception $e) {
            // فرمت نامعتبر بود، فیلتر تاریخ نادیده گرفته میشه
        }
    }

    $flights = $query->get();

    return view('results', [
        'flights'    => $flights,
        'from'       => $request->query('from'),
        'to'         => $request->query('to'),
        'departure'  => $request->query('departure'),
        'returnDate' => $request->query('return'),
        'passengers' => $request->query('passengers'),
    ]);

});

/*
|--------------------------------------------------------------------------
| جزئیات پرواز
|--------------------------------------------------------------------------
*/

Route::get('/flight-details', function (Request $request) {

    $flight = Flight::findOrFail($request->query('flight_id'));

    return view('flight-details', [

        'flight' => $flight,

        'flight_id' => $flight->id,

        'from' => $flight->origin,

        'to' => $flight->destination,

        'departure' => $flight->flight_date,

        'returnDate' => $request->query('return'),

        'passengers' => $request->query('passengers', 1),

        'airline' => $flight->airline,

        'time' => $flight->departure_time,

        'arrival' => $flight->arrival_time,

        'price' => $flight->price,

        'vip_price' => $flight->vip_price,

    ]);

});


/*
|--------------------------------------------------------------------------
| انتخاب صندلی هواپیما
|--------------------------------------------------------------------------
*/

Route::get('/seat-selection', function (Request $request) {

    $flight = Flight::findOrFail(
        $request->query('flight_id')
    );

    return view('seat-selection', [

        'flight_id' => $flight->id,

        'from' => $flight->origin,

        'to' => $flight->destination,

        'departure' => $flight->flight_date,

        'returnDate' => $request->query('return'),

        'passengers' => $request->query('passengers'),

        'airline' => $flight->airline,

        'time' => $flight->departure_time,

        'arrival' => $flight->arrival_time,

        'price' => $flight->price,

        'vip_price' => $flight->vip_price,

    ]);

});


/*
|--------------------------------------------------------------------------
| اطلاعات مسافر
|--------------------------------------------------------------------------
*/

Route::get('/passenger', function (Request $request) {

    $flightId = $request->query('flight_id');
    $trainId = $request->query('train_id');

    $departure = $request->query('departure');

    // اگر پرواز است و تاریخ از URL نیامده،
    // تاریخ را مستقیم از دیتابیس بگیر
    if ($flightId && !$departure) {

        $flight = Flight::findOrFail($flightId);

        $departure = $flight->flight_date;
    }

    // اگر قطار است و تاریخ از URL نیامده،
    // تاریخ را مستقیم از دیتابیس بگیر
    if ($trainId && !$departure) {

        $train = Train::findOrFail($trainId);

        $departure = $train->departure_date;
    }

    return view('passenger', [

        'train_id' => $trainId,

        'flight_id' => $flightId,

        'from' => $request->query('from'),

        'to' => $request->query('to'),

        'departure' => $departure,

        'returnDate' => $request->query('return'),

        'passengers' => $request->query('passengers', 1),

        'airline' => $request->query(
            'airline',
            'قطار'
        ),

        'time' => $request->query('time'),

        'arrival' => $request->query('arrival'),

        'price' => $request->query('price'),

        'ticket_type' => $request->query('ticket_type'),

        'seat' => $request->query('seat'),

        'train_name' => $request->query('train_name'),

        'company' => $request->query('company'),

        'wagon' => $request->query('wagon'),

    ]);

});

/*
|--------------------------------------------------------------------------
| تأیید اطلاعات مسافر
|--------------------------------------------------------------------------
*/

Route::get('/passenger-confirm', function (Request $request) {

    return view('passenger-confirm', [

        // شناسه قطار
        'train_id' => $request->query('train_id'),

        // شناسه پرواز
        'flight_id' => $request->query('flight_id'),

        // اطلاعات مسافر
        'first_name' => $request->query('first_name'),

        'last_name' => $request->query('last_name'),

        'national_code' => $request->query('national_code'),

        'mobile' => $request->query('mobile'),

        // مسیر
        'from' => $request->query('from'),

        'to' => $request->query('to'),

        // تاریخ حرکت
        'departure' => $request->query('departure'),

        // تاریخ برگشت
        'returnDate' => $request->query('return'),

        // تعداد مسافر
        'passengers' => $request->query('passengers', 1),

        // شرکت
        'airline' => $request->query('airline', 'قطار'),

        // ساعت‌ها
        'time' => $request->query('time'),

        'arrival' => $request->query('arrival'),

        // قیمت
        'price' => $request->query('price'),

        // نوع بلیط
        'ticket_type' => $request->query('ticket_type'),

        // صندلی
        'seat' => $request->query('seat'),

    ]);

});


/*
|--------------------------------------------------------------------------
| پرداخت
|--------------------------------------------------------------------------
*/

Route::get('/payment', function (Request $request) {

    return view('payment', [

        'train_id' => $request->query('train_id'),

        'flight_id' => $request->query('flight_id'),

        'first_name' => $request->query('first_name'),

        'last_name' => $request->query('last_name'),

        'national_code' => $request->query('national_code'),

        'mobile' => $request->query('mobile'),

        'from' => $request->query('from'),

        'to' => $request->query('to'),

        'departure' => $request->query('departure'),

        'returnDate' => $request->query('return'),

        'passengers' => $request->query('passengers', 1),

        'airline' => $request->query('airline', 'قطار'),

        'time' => $request->query('time'),

        'arrival' => $request->query('arrival'),

        'price' => $request->query('price'),

        'ticket_type' => $request->query('ticket_type'),

        'seat' => $request->query('seat'),

    ]);

});



/*
|--------------------------------------------------------------------------
| ثبت نهایی رزرو
|--------------------------------------------------------------------------
*/

Route::get('/booking-success', function (Request $request) {

    // کاربر باید وارد حساب باشد
    if (!auth()->check()) {
        return redirect('/login');
    }

    /*
    |--------------------------------------------------------------------------
    | شناسه قطار / هواپیما
    |--------------------------------------------------------------------------
    */

    $trainId = $request->query('train_id');
    $flightId = $request->query('flight_id');

    $seat = $request->query('seat');


    /*
    |--------------------------------------------------------------------------
    | پیدا کردن تاریخ حرکت
    |--------------------------------------------------------------------------
    */

    $departure = $request->query('departure');


    // اگر تاریخ از فرم آمده باشد همان را استفاده می‌کنیم
    if (empty($departure)) {

        // قطار
        if ($trainId) {

            $train = Train::findOrFail($trainId);

            $departure = $train->departure_date;
        }

        // هواپیما
        elseif ($flightId) {

            $flight = Flight::findOrFail($flightId);

            $departure = $flight->flight_date;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | اگر هنوز تاریخ نداریم
    |--------------------------------------------------------------------------
    */

    if (empty($departure)) {

        abort(
            422,
            'تاریخ حرکت برای این رزرو پیدا نشد.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | جلوگیری از رزرو دوباره صندلی قطار
    |--------------------------------------------------------------------------
    */

    if ($trainId && $seat) {

        $alreadyReserved = Booking::where('train_id', $trainId)
            ->where('seat', $seat)
            ->exists();


        if ($alreadyReserved) {

            return redirect(
                '/train-seat-selection?' .
                http_build_query([

                    'train' => $trainId,

                    'from' => $request->query('from'),

                    'to' => $request->query('to'),

                    'departure' => $departure,

                    'passengers' => $request->query(
                        'passengers',
                        1
                    ),

                    'ticket_type' => $request->query(
                        'ticket_type'
                    ),

                ])
            )->with(
                'error',
                'این صندلی قبلاً رزرو شده است.'
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | کد رهگیری
    |--------------------------------------------------------------------------
    */

    $trackingCode =
        'SF-1405-' . rand(10000, 99999);


    /*
    |--------------------------------------------------------------------------
    | ثبت رزرو
    |--------------------------------------------------------------------------
    */

    $booking = Booking::create([

        'user_id' => auth()->id(),

        'train_id' => $trainId,

        'flight_id' => $flightId,

        'first_name' =>
            $request->query('first_name'),

        'last_name' =>
            $request->query('last_name'),

        'from' =>
            $request->query('from'),

        'to' =>
            $request->query('to'),

        'departure' =>
            $departure,

        'return_date' =>
            $request->query('return'),

        'passengers' =>
            $request->query('passengers', 1),

        'airline' =>
            $request->query(
                'airline',
                'قطار'
            ),

        'time' =>
            $request->query('time', ''),

        'arrival' =>
            $request->query('arrival', ''),

        'ticket_type' =>
            $request->query('ticket_type'),

        'seat' =>
            $seat,

        'price' =>
            $request->query('price'),

        'tracking_code' =>
            $trackingCode,

    ]);
/*
    |--------------------------------------------------------------------------
    | ذخیره رزرو در Session
    |--------------------------------------------------------------------------
    */

    session()->put('booking', [

        'id' =>
            $booking->id,

        'first_name' =>
            $booking->first_name,

        'last_name' =>
            $booking->last_name,

        'from' =>
            $booking->from,

        'to' =>
            $booking->to,

        'departure' =>
            $booking->departure,

        'returnDate' =>
            $booking->return_date,

        'passengers' =>
            $booking->passengers,

        'airline' =>
            $booking->airline,

        'time' =>
            $booking->time,

        'arrival' =>
            $booking->arrival,

        'price' =>
            $booking->price,

        'ticket_type' =>
            $booking->ticket_type,

        'seat' =>
            $booking->seat,

        'tracking_code' =>
            $booking->tracking_code,

        'train_id' =>
            $booking->train_id,

        'flight_id' =>
            $booking->flight_id,

    ]);


    /*
    |--------------------------------------------------------------------------
    | صفحه موفقیت
    |--------------------------------------------------------------------------
    */

    return view('booking-success', [

        'first_name' =>
            $booking->first_name,

        'last_name' =>
            $booking->last_name,

        'from' =>
            $booking->from,

        'to' =>
            $booking->to,

        'departure' =>
            $booking->departure,

        'returnDate' =>
            $booking->return_date,

        'passengers' =>
            $booking->passengers,

        'airline' =>
            $booking->airline,

        'time' =>
            $booking->time,

        'arrival' =>
            $booking->arrival,

        'price' =>
            $booking->price,

        'ticket_type' =>
            $booking->ticket_type,

        'seat' =>
            $booking->seat,

        'tracking_code' =>
            $booking->tracking_code,

        'train_id' =>
            $booking->train_id,

        'flight_id' =>
            $booking->flight_id,

    ]);

});




/*
|--------------------------------------------------------------------------
| سفرهای من
|--------------------------------------------------------------------------
*/

Route::get('/my-trips', function () {

    if (!auth()->check()) {
        return redirect('/login');
    }


    $booking = session('booking');


    return view('my-trips', [

        'booking' => $booking,

    ]);

});


/*
|--------------------------------------------------------------------------
| ثبت نام
|--------------------------------------------------------------------------
*/

Route::get('/register', function () {

    return view('register');

});
Route::post('/register', function (Request $request) {

    $validated = $request->validate([

        'name' => 'required|string|max:255',

        'email' => 'required|email|unique:users,email',

        'password' => 'required|string|min:6',

    ]);


    $user = User::create([

        'name' => $validated['name'],

        'email' => $validated['email'],

        'password' => $validated['password'],

    ]);


    auth()->login($user);

    $request->session()->regenerate();


    return redirect('/');

});


/*
|--------------------------------------------------------------------------
| ورود
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {

    return view('login');

});


Route::post('/login', function (Request $request) {

    $credentials = $request->validate([

        'email' => 'required|email',

        'password' => 'required',

    ]);


    if (auth()->attempt($credentials)) {

        $request->session()->regenerate();

        return redirect('/');

    }


    return back()
        ->withErrors([

            'email' =>
                'ایمیل یا رمز عبور اشتباه است.',

        ])
        ->withInput();

});


/*
|--------------------------------------------------------------------------
| خروج
|--------------------------------------------------------------------------
*/

Route::post('/logout', function (Request $request) {

    auth()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();


    return redirect('/');

});


/*
|--------------------------------------------------------------------------
| پروفایل
|--------------------------------------------------------------------------
*/

Route::get('/profile', function () {

    if (!auth()->check()) {
        return redirect('/login');
    }


    return view('profile', [

        'user' => auth()->user(),

    ]);

});


/*
|--------------------------------------------------------------------------
| ویرایش پروفایل
|--------------------------------------------------------------------------
*/

Route::get('/profile/edit', function () {

    if (!auth()->check()) {
        return redirect('/login');
    }


    return view('profile-edit', [

        'user' => auth()->user(),

    ]);

});


Route::post('/profile/edit', function (Request $request) {

    if (!auth()->check()) {
        return redirect('/login');
    }


    $user = auth()->user();


    $validated = $request->validate([

        'name' => 'required|string|max:255',

        'email' =>
            'required|email|unique:users,email,' .
            $user->id,

    ]);


    $user->update($validated);


    return redirect('/profile');

});


/*
|--------------------------------------------------------------------------
| نتایج قطار
|--------------------------------------------------------------------------
*/

Route::get('/train-results', function (Request $request) {

    $trains = Train::where(
    
        'origin',
    
        $request->query('from')
    
    )
    
        ->where(
    
            'destination',
    
            $request->query('to')
    
        )
    
        ->where(
    
            'is_active',
    
            true
    
        )
    
        ->get();
    
    
    
    
    
    return view('train-results', [
    
    
    
        'trains' => $trains,
    
    
    
        'from' => $request->query('from'),
    
    
    
        'to' => $request->query('to'),
    
    
    
        'passengers' => $request->query(
    
            'passengers'
    
        ),
    
    
    
    ]);
    
    });

/*
|--------------------------------------------------------------------------
| جزئیات قطار
|--------------------------------------------------------------------------
*/
Route::get('/train-details', function (Request $request) {

    $train = Train::findOrFail($request->query('train'));

    if (!$train->is_active) {
        abort(404);
    }

    return view('train-details', [

        'train' => $train,

        'from' => $train->origin,

        'to' => $train->destination,

        'departure' => $train->departure_date,

        'passengers' => $request->query('passengers', 1),

    ]);

});
/*
|--------------------------------------------------------------------------
| انتخاب صندلی قطار
|--------------------------------------------------------------------------
*/

Route::get('/train-seat-selection', function (
    Request $request
) {

    $train = Train::findOrFail(
        $request->query('train')
    );


    if (!$train->is_active) {
        abort(404);
    }


    /*
    |--------------------------------------------------------------------------
    | تعداد مسافران
    |--------------------------------------------------------------------------
    */

    $passengers = $request->query('passengers');

    // اگر عدد فارسی باشد، به انگلیسی تبدیلش می‌کنیم
    if ($passengers !== null) {

        $passengers = strtr(
            (string) $passengers,
            [
                '۰' => '0',
                '۱' => '1',
                '۲' => '2',
                '۳' => '3',
                '۴' => '4',
                '۵' => '5',
                '۶' => '6',
                '۷' => '7',
                '۸' => '8',
                '۹' => '9',

                '٠' => '0',
                '١' => '1',
                '٢' => '2',
                '٣' => '3',
                '٤' => '4',
                '٥' => '5',
                '٦' => '6',
                '٧' => '7',
                '٨' => '8',
                '٩' => '9',
            ]
        );

    }


    $passengers = (int) $passengers;


    if ($passengers < 1) {
        $passengers = 1;
    }


    /*
    |--------------------------------------------------------------------------
    | صندلی‌های رزروشده
    |--------------------------------------------------------------------------
    */

    $reservedSeats = Booking::where(
        'train_id',
        $train->id
    )
        ->pluck('seat')
        ->filter()
        ->toArray();


    /*
    |--------------------------------------------------------------------------
    | ظرفیت
    |--------------------------------------------------------------------------
    */

    $capacity = (int) $train->capacity;


    /*
    |--------------------------------------------------------------------------
    | تعداد صندلی هر کوپه
    |--------------------------------------------------------------------------
    */

    $seatsPerCoach =
        str_contains($train->wagon, '۶')
            ? 6
            : 4;


    /*
    |--------------------------------------------------------------------------
    | تعداد کوپه
    |--------------------------------------------------------------------------
    */

    $coachCount =
        (int) ceil(
            $capacity / $seatsPerCoach
        );


    $coaches = [];


    /*
    |--------------------------------------------------------------------------
    | ساخت کوپه‌ها
    |--------------------------------------------------------------------------
    */

    for (
        $coachNumber = 1;
        $coachNumber <= $coachCount;
        $coachNumber++
    ) {

        $seats = [];


        for (
            $seatNumber = 1;
            $seatNumber <= $seatsPerCoach;
            $seatNumber++
        ) {

            $globalSeatNumber =
                (($coachNumber - 1) *
                    $seatsPerCoach)
                + $seatNumber;


            if (
                $globalSeatNumber >
                $capacity
            ) {
                break;
            }


            /*
            |--------------------------------------------------------------------------
            | مقدار واقعی صندلی
            |--------------------------------------------------------------------------
            */

            $seatValue =
                $coachNumber .
                '-' .
                $seatNumber;


            /*
            |--------------------------------------------------------------------------
            | وضعیت رزرو
            |--------------------------------------------------------------------------
            */

            $isReserved =
                in_array(
                    $seatValue,
                    $reservedSeats
                );


            $seats[] = [

                'number' =>
                    $seatNumber,

                'value' =>
                    $seatValue,
'reserved' =>
                    $isReserved,

            ];

        }


        $freeSeats =
            collect($seats)
                ->where(
                    'reserved',
                    false
                )
                ->count();


        $coaches[] = [

            'id' =>
                $coachNumber,

            'type' =>
                $train->wagon,

            'free_seats' =>
                $freeSeats,

            'seats' =>
                $seats,

        ];

    }


    /*
    |--------------------------------------------------------------------------
    | صفحه انتخاب صندلی
    |--------------------------------------------------------------------------
    */

    return view(
        'train-seat-selection',
        [

            'train' =>
                $train,

            'from' =>
                $request->query('from'),

            'to' =>
                $request->query('to'),

            'departure' =>
                $request->query('departure'),

            'passengers' =>
                $passengers,

            'ticket_type' =>
                $request->query('ticket_type'),

            'train_name' =>
                $train->name,

            'company' =>
                $train->company,

            'wagon' =>
                $train->wagon,

            'price' =>
                $train->price,

            'coaches' =>
                $coaches,

        ]
    );

});




/*
|--------------------------------------------------------------------------
| صفحات عمومی
|--------------------------------------------------------------------------
*/

Route::get('/support', function () {
    return view('support');
});


Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});


Route::get('/terms', function () {
    return view('terms');
});


/*
|--------------------------------------------------------------------------
| پنل مدیریت
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {

    return view('admin.dashboard');

})->middleware('admin');
/*
|--------------------------------------------------------------------------
| مدیریت کاربران
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/users',
    [AdminUserController::class, 'index']
)->middleware('admin');


Route::get(
    '/admin/users/{id}/edit',
    [AdminUserController::class, 'edit']
)->middleware('admin');


Route::put(
    '/admin/users/{id}',
    [AdminUserController::class, 'update']
)->middleware('admin');


Route::delete(
    '/admin/users/{id}',
    [AdminUserController::class, 'destroy']
)->middleware('admin');


/*
|--------------------------------------------------------------------------
| مدیریت رزروها
|--------------------------------------------------------------------------
*/

Route::get('/admin/bookings', function () {

    $bookings = Booking::latest()->get();


    return view('admin.bookings', [

        'bookings' => $bookings,

    ]);

})->middleware('admin');


Route::delete('/admin/bookings/{id}', function ($id) {

    $booking = \App\Models\Booking::findOrFail($id);

    $booking->delete();

    return redirect('/admin/bookings')
        ->with('success', 'رزرو با موفقیت حذف شد.');

})->name('admin.bookings.delete');


Route::get('/admin/bookings/{id}', function ($id) {

    $booking = Booking::findOrFail($id);

    return view('admin.booking-details', [
        'booking' => $booking,
    ]);

})->middleware('admin')->name('admin.bookings.show');


/*
|--------------------------------------------------------------------------
| مدیریت قطارها
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/trains',
    [AdminTrainController::class, 'index']
)->middleware('admin');


Route::get(
    '/admin/trains/create',
    [AdminTrainController::class, 'create']
)
    ->middleware('admin')
    ->name('admin.trains.create');


Route::post(
    '/admin/trains',
    [AdminTrainController::class, 'store']
)
    ->middleware('admin')
    ->name('admin.trains.store');


Route::get(
    '/admin/trains/{id}/edit',
    [AdminTrainController::class, 'edit']
)->middleware('admin');


Route::put(
    '/admin/trains/{id}',
    [AdminTrainController::class, 'update']
)->middleware('admin');


Route::delete(
    '/admin/trains/{id}',
    [AdminTrainController::class, 'destroy']
)->middleware('admin');


/*
|--------------------------------------------------------------------------
| مدیریت پروازها
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/flights',
    [AdminFlightController::class, 'index']
)
    ->middleware('admin')
    ->name('admin.flights');


Route::get(
    '/admin/flights/create',
    [AdminFlightController::class, 'create']
)
    ->middleware('admin')
    ->name('admin.flights.create');


Route::post(
    '/admin/flights',
    [AdminFlightController::class, 'store']
)
    ->middleware('admin')
    ->name('admin.flights.store');


Route::get(
    '/admin/flights/{id}/edit',
    [AdminFlightController::class, 'edit']
)
    ->middleware('admin')
    ->name('admin.flights.edit');


Route::put(
    '/admin/flights/{id}',
    [AdminFlightController::class, 'update']
)
    ->middleware('admin')
    ->name('admin.flights.update');


Route::delete(
    '/admin/flights/{id}',
    [AdminFlightController::class, 'destroy']
)
    ->middleware('admin')
    ->name('admin.flights.destroy');


/*
|--------------------------------------------------------------------------
| پشتیبانی مدیریت
|--------------------------------------------------------------------------
*/

Route::get('/admin/support', function () {

    return view('admin.support');

})->middleware('admin');


Route::get('/test-payment', function (Request $request) {

    return view('test-payment', [

        'amount' => $request->query('price'),

        'order_id' => uniqid(),

        'booking_data' => $request->query(),

    ]);

});


Route::get('/payment/success', function (Request $request) {

    return redirect('/booking-success?' . http_build_query(
        $request->query()
    ));

})->name('payment.success');


Route::get('/payment/failed', function () {

    return view('payment-failed');

})->name('payment.failed');





Route::get(
    '/payment/start',
    [PaymentController::class, 'start']
)->name('payment.start');


Route::get(
    '/payment/callback',
    [PaymentController::class, 'callback']
)->name('payment.callback');