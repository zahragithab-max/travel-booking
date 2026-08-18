<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        افزودن پرواز | سفرینو
    </title>

    <link
        rel="stylesheet"
        href="/css/app.css"
    >

    {{-- تقویم شمسی --}}
    <link
        rel="stylesheet"
        href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"
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

            <a href="/admin">
                پنل مدیریت
            </a>

            <a href="/admin/flights">
                مدیریت پروازها
            </a>

            <a href="/">
                سایت اصلی
            </a>

        </nav>

    </div>

</header>



<main>

<section class="section">

<div class="container">


<div class="section-title">

    <h2>
        ➕ افزودن پرواز جدید
    </h2>

    <p>
        اطلاعات کامل پرواز را وارد کنید.
    </p>

</div>



{{-- پیام خطا --}}

@if ($errors->any())

    <div
        style="
            background: #fee2e2;
            color: #991b1b;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: right;
        "
    >

        <strong>
            ❌ لطفاً اطلاعات زیر را بررسی کنید:
        </strong>

        <ul style="margin-top:10px;">

            @foreach ($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif



<div class="card">

<div class="card-body">


<form
    action="{{ route('admin.flights.store') }}"
    method="POST"
>

@csrf


<div class="search-fields">


{{-- شرکت هواپیمایی --}}

<div class="field">

    <label for="airline">
        شرکت هواپیمایی
    </label>

    <input
        type="text"
        id="airline"
        name="airline"
        placeholder="مثلاً ماهان"
        value="{{ old('airline') }}"
        required
    >

</div>



{{-- شماره پرواز --}}

<div class="field">

    <label for="flight_number">
        شماره پرواز
    </label>

    <input
        type="text"
        id="flight_number"
        name="flight_number"
        placeholder="مثلاً W512"
        value="{{ old('flight_number') }}"
        required
    >

</div>



{{-- مبدا --}}

<div class="field">

    <label for="origin">
        مبدا
    </label>

    <input
        type="text"
        id="origin"
        name="origin"
        placeholder="مثلاً تهران"
        value="{{ old('origin') }}"
        required
    >

</div>



{{-- مقصد --}}

<div class="field">

    <label for="destination">
        مقصد
    </label>

    <input
        type="text"
        id="destination"
        name="destination"
        placeholder="مثلاً شیراز"
        value="{{ old('destination') }}"
        required
    >

</div>



{{-- تاریخ پرواز --}}

<div class="field date-field">

    <label for="flight_date_jalali">
        📅 تاریخ پرواز
    </label>


    <div class="date-input-wrapper">

        <span class="date-icon">
            📅
        </span>


        <input
            type="text"
            id="flight_date_jalali"
            class="jalali-date"
            placeholder="انتخاب تاریخ پرواز"
            autocomplete="off"
            readonly
            required
        >

    </div>


    {{-- مقدار میلادی برای Laravel --}}

    <input
        type="hidden"
        id="flight_date"
        name="flight_date"
        value="{{ old('flight_date') }}"
    >

</div>



{{-- ساعت حرکت --}}

<div class="field">

    <label for="departure_time">
        ساعت حرکت
    </label>

    <input
        type="time"
        id="departure_time"
        name="departure_time"
        value="{{ old('departure_time') }}"
        required
    >

</div>



{{-- ساعت رسیدن --}}

<div class="field">
<label for="arrival_time">
        ساعت رسیدن
    </label>

    <input
        type="time"
        id="arrival_time"
        name="arrival_time"
        value="{{ old('arrival_time') }}"
        required
    >

</div>



{{-- قیمت --}}

<div class="field">

    <label for="price">
        قیمت بلیط
    </label>

    <input
        type="number"
        id="price"
        name="price"
        placeholder="مثلاً 2850000"
        min="0"
        value="{{ old('price') }}"
        required
    >

</div>



{{-- قیمت VIP --}}

<div class="field">

    <label for="vip_price">
        قیمت بلیط VIP
    </label>

    <input
        type="number"
        id="vip_price"
        name="vip_price"
        placeholder="مثلاً 4500000"
        min="0"
        value="{{ old('vip_price') }}"
        required
    >

</div>



{{-- ظرفیت کل --}}

<div class="field">

    <label for="capacity">
        ظرفیت کل
    </label>

    <input
        type="number"
        id="capacity"
        name="capacity"
        placeholder="مثلاً 150"
        min="1"
        value="{{ old('capacity') }}"
        required
    >

</div>



{{-- ظرفیت باقی مانده --}}

<div class="field">

    <label for="available_seats">
        ظرفیت باقی‌مانده
    </label>

    <input
        type="number"
        id="available_seats"
        name="available_seats"
        placeholder="مثلاً 120"
        min="0"
        value="{{ old('available_seats') }}"
        required
    >

</div>



{{-- کلاس پروازی --}}

<div class="field">

    <label for="flight_class">
        کلاس پروازی
    </label>

    <select
        id="flight_class"
        name="flight_class"
        required
    >

        <option
            value="economy"
            {{ old('flight_class', 'economy') === 'economy' ? 'selected' : '' }}
        >
            اکونومی
        </option>

        <option
            value="business"
            {{ old('flight_class') === 'business' ? 'selected' : '' }}
        >
            بیزنس
        </option>

    </select>

</div>



{{-- وضعیت --}}

<div class="field">

    <label for="active">
        وضعیت پرواز
    </label>

    <select
        id="active"
        name="active"
        required
    >

        <option
            value="1"
            {{ old('active', '1') == '1' ? 'selected' : '' }}
        >
            فعال
        </option>

        <option
            value="0"
            {{ old('active') === '0' ? 'selected' : '' }}
        >
            غیرفعال
        </option>

    </select>

</div>


</div>



<br>



<button
    type="submit"
    class="search-btn"
>
    ✈️ افزودن پرواز
</button>


<a
    href="{{ route('admin.flights') }}"
    class="search-btn"
>
    ← بازگشت
</a>


</form>


</div>

</div>


</div>

</section>

</main>



<footer class="site-footer">

<div class="container">

<div class="copyright">

© ۱۴۰۵ سفرینو - مدیریت پروازها

</div>

</div>

</footer>



{{-- jQuery --}}

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
></script>



{{-- Persian Date --}}

<script
    src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"
></script>



{{-- Persian Datepicker --}}

<script
    src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"
></script>



<script>

$(document).ready(function () {


    /*
    |--------------------------------------------------------------------------
    | تقویم شمسی
    |--------------------------------------------------------------------------
    */

    $('#flight_date_jalali').persianDatepicker({

        format: 'YYYY/MM/DD',

        autoClose: true,

        initialValue: false,

        calendarType: 'persian',

        persianDigit: true,

        observer: true,

        onSelect: function (unix) {

            if (!unix) {

                return;

            }


            /*
            | تاریخ انتخاب‌شده
            | توسط خود کتابخانه
            */

            const selectedDate =
                new persianDate(unix);


            /*
            | تبدیل شمسی به میلادی
            */
const gregorianDate =
                selectedDate
                    .toCalendar('gregorian')
                    .format('YYYY-MM-DD');


            /*
            | مقدار میلادی برای Laravel
            */

            $('#flight_date').val(
                gregorianDate
            );

        }

    });



    /*
    |--------------------------------------------------------------------------
    | اگر فرم به خاطر خطای اعتبارسنجی برگشت
    |--------------------------------------------------------------------------
    */

    @if(old('flight_date'))

        const oldGregorianDate =
            '{{ old('flight_date') }}';


        $('#flight_date').val(
            oldGregorianDate
        );


        const oldDate =
            new persianDate(
                oldGregorianDate
            );


        $('#flight_date_jalali').val(

            oldDate
                .toCalendar('persian')
                .format('YYYY/MM/DD')

        );

    @endif



    /*
    |--------------------------------------------------------------------------
    | بررسی تاریخ قبل از ارسال
    |--------------------------------------------------------------------------
    */

    $('form').on('submit', function (event) {


        const flightDate =
            $('#flight_date').val();


        if (!flightDate) {

            event.preventDefault();

            alert(
                'لطفاً تاریخ پرواز را انتخاب کنید.'
            );

            return false;

        }


        return true;

    });


});

</script>


</body>

</html>

