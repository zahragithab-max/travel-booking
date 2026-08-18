<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        ویرایش پرواز | سفرینو
    </title>

    <link
        rel="stylesheet"
        href="/css/app.css"
    >

    {{-- تقویم شمسی --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"
    >

</head>


<body>


<header class="site-header">

    <div class="container navbar">

        <a href="/" class="logo">
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
        ✏️ ویرایش پرواز
    </h2>

    <p>
        تمام اطلاعات پرواز را می‌توانید تغییر دهید.
    </p>

</div>



<div class="card">

<div class="card-body">


<form
    action="{{ route('admin.flights.update', $flight->id) }}"
    method="POST"
>

@csrf

@method('PUT')


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
        value="{{ old('airline', $flight->airline) }}"
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
        value="{{ old('flight_number', $flight->flight_number) }}"
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
        value="{{ old('origin', $flight->origin) }}"
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
        value="{{ old('destination', $flight->destination) }}"
        required
    >

</div>



{{-- تاریخ پرواز --}}

<div class="field">

    <label for="flight_date">
        تاریخ پرواز
    </label>

    <input
        type="text"
        id="flight_date"
        name="flight_date"
        class="jalali-date"
        autocomplete="off"
        placeholder="مثلاً ۱۴۰۵/۰۵/۳۰"
        value="{{ old('flight_date', \App\Helpers\JalaliHelper::date($flight->flight_date)) }}"
        required
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
        value="{{ old('departure_time', $flight->departure_time ? \Carbon\Carbon::parse($flight->departure_time)->format('H:i') : '') }}"
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
        value="{{ old('arrival_time', $flight->arrival_time ? \Carbon\Carbon::parse($flight->arrival_time)->format('H:i') : '') }}"
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
        min="0"
        value="{{ old('price', $flight->price) }}"
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
        min="0"
        value="{{ old('vip_price', $flight->vip_price) }}"
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
        min="1"
        value="{{ old('capacity', $flight->capacity) }}"
        required
    >

</div>



{{-- ظرفیت باقی‌مانده --}}

<div class="field">

    <label for="available_seats">
        ظرفیت باقی‌مانده
    </label>

    <input
        type="number"
        id="available_seats"
        name="available_seats"
        min="0"
        value="{{ old('available_seats', $flight->available_seats) }}"
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
            {{ old('flight_class', $flight->flight_class) === 'economy' ? 'selected' : '' }}
        >
            اکونومی
        </option>

        <option
            value="business"
            {{ old('flight_class', $flight->flight_class) === 'business' ? 'selected' : '' }}
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
            {{ old('active', $flight->active) ? 'selected' : '' }}
        >
            فعال
        </option>

        <option
            value="0"
            {{ !old('active', $flight->active) ? 'selected' : '' }}
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
    💾 ذخیره تغییرات
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
    src="https://code.jquery.com/jquery-3.7.1.min.js"
></script>


{{-- تقویم شمسی --}}

<script
    src="https://cdn.jsdelivr.net/npm/persian-date@1.1.0/dist/persian-date.min.js"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"
></script>



<script>

$(document).ready(function () {

    $('.jalali-date').persianDatepicker({

        format: 'YYYY/MM/DD',

        autoClose: true,

        initialValue: false,

        observer: true,

        calendar: {
            persian: {
                locale: 'fa'
            }
        }

    });

});

</script>


</body>

</html>

