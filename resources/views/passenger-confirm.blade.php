<!DOCTYPE html>
<html lang="fa" dir="rtl">

@php
    use App\Helpers\JalaliHelper;
@endphp

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        تأیید رزرو | سفرینو
    </title>

    <link
        rel="stylesheet"
        href="/css/app.css"
    >

</head>


<body>


<header class="site-header">

    <div class="container navbar">

        <a
            href="/"
            class="logo"
        >
            سفرینو ✈
        </a>


        <nav class="nav-links">

            <a href="/">
                صفحه اصلی
            </a>

            <a href="/flight">
                هواپیما
            </a>

            <a href="/train">
                قطار
            </a>

            <a href="/my-trips">
                🎫 سفرهای من
            </a>


            @if(auth()->check())

                <a href="/profile">
                    👤 {{ auth()->user()->name }}
                </a>


                <form
                    action="/logout"
                    method="POST"
                    style="display:inline;"
                >

                    @csrf

                    <button
                        type="submit"
                        class="login-btn"
                    >
                        🚪 خروج
                    </button>

                </form>

            @else

                <a
                    href="/login"
                    class="login-btn"
                >
                    ورود / ثبت‌نام
                </a>

            @endif

        </nav>

    </div>

</header>



<main>

<section class="section">

<div class="container">


<div class="section-title">

    <h2>
        تأیید اطلاعات و رزرو نهایی ✅
    </h2>

    <p>
        لطفاً اطلاعات خود را قبل از رزرو بررسی کنید.
    </p>

</div>



<div class="card">

<div class="card-body">


<h3>
    اطلاعات مسافر
</h3>


<p>
    نام:
    {{ $first_name }}
</p>


<p>
    نام خانوادگی:
    {{ $last_name }}
</p>


<p>
    کد ملی:
    {{ $national_code }}
</p>


<p>
    شماره موبایل:
    {{ $mobile }}
</p>


</div>

</div>



<br>



<div class="card">

<div class="card-body">


<h3>

    @if($train_id)
        اطلاعات قطار 🚆
    @else
        اطلاعات پرواز ✈️
    @endif

</h3>


<p>

    مسیر:

    {{ $from }}

    →

    {{ $to }}

</p>


<p>

    @if($train_id)

        شرکت ریلی:

    @else

        شرکت هواپیمایی:

    @endif

    {{ $airline }}

</p>


<p>

    تاریخ رفت:

    {{ JalaliHelper::date($departure) }}

</p>


@if($returnDate)

<p>

    تاریخ برگشت:

    {{ JalaliHelper::date($returnDate) }}

</p>

@endif


<p>

    ساعت حرکت:

    {{ $time }}

</p>


<p>

    ساعت رسیدن:

    {{ $arrival }}

</p>


<p>

    نوع بلیط:

    @if($ticket_type === 'VIP' || $ticket_type === 'vip')

        👑 VIP

    @else

        🎫 ساده

    @endif

</p>


<p>

    صندلی:

    <strong>
        {{ $seat }}
    </strong>

</p>


<p>

    تعداد مسافر:

    {{ $passengers }}

    نفر

</p>


<div class="price">

    {{ number_format((int) $price) }}

    تومان

</div>



<br>



<form
    action="/payment"
    method="GET"
>


    {{-- شناسه قطار --}}

    <input
        type="hidden"
        name="train_id"
        value="{{ $train_id }}"
    >


    {{-- شناسه هواپیما --}}

    <input
        type="hidden"
        name="flight_id"
        value="{{ $flight_id }}"
    >


    <input
        type="hidden"
        name="first_name"
        value="{{ $first_name }}"
    >


    <input
        type="hidden"
        name="last_name"
        value="{{ $last_name }}"
    >


    <input
        type="hidden"
        name="national_code"
        value="{{ $national_code }}"
    >


    <input
        type="hidden"
        name="mobile"
        value="{{ $mobile }}"
    >


    <input
        type="hidden"
        name="from"
        value="{{ $from }}"
    >


    <input
        type="hidden"
        name="to"
        value="{{ $to }}"
    >
<input
        type="hidden"
        name="departure"
        value="{{ $departure }}"
    >


    <input
        type="hidden"
        name="return"
        value="{{ $returnDate }}"
    >


    <input
        type="hidden"
        name="passengers"
        value="{{ $passengers }}"
    >


    <input
        type="hidden"
        name="airline"
        value="{{ $airline }}"
    >


    <input
        type="hidden"
        name="time"
        value="{{ $time }}"
    >


    <input
        type="hidden"
        name="arrival"
        value="{{ $arrival }}"
    >


    <input
        type="hidden"
        name="price"
        value="{{ $price }}"
    >


    <input
        type="hidden"
        name="ticket_type"
        value="{{ $ticket_type }}"
    >


    <input
        type="hidden"
        name="seat"
        value="{{ $seat }}"
    >



    <button
        type="submit"
        class="search-btn"
    >

        تأیید و رفتن به پرداخت 💳

    </button>


</form>


</div>

</div>


</div>

</section>

</main>



<footer class="site-footer">

<div class="container">

<div class="copyright">

    © ۱۴۰۵ سفرینو - تمامی حقوق محفوظ است.

</div>

</div>

</footer>


</body>

</html>

