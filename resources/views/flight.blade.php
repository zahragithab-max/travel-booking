<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        جستجوی پرواز | سفرینو
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
        ✈️ جستجوی پرواز
    </h2>

    <p>
        اطلاعات سفر خود را وارد کنید.
    </p>

</div>



<div class="search-box">


<form
    action="/results"
    method="GET"
>


    <div class="search-tabs">

        <button
            type="button"
            class="active"
        >
            ✈️ هواپیما
        </button>

    </div>



    <div class="search-fields">


        {{-- مبدا --}}

        <div class="field">

            <label for="from">
                مبدا
            </label>

            <input
                type="text"
                id="from"
                name="from"
                placeholder="مثلاً تهران"
                required
            >

        </div>



        {{-- مقصد --}}

        <div class="field">

            <label for="to">
                مقصد
            </label>

            <input
                type="text"
                id="to"
                name="to"
                placeholder="مثلاً استانبول"
                required
            >

        </div>



        {{-- تاریخ رفت --}}

        <div class="field date-field">

            <label for="departure">
                📅 تاریخ رفت
            </label>


            <div class="date-input-wrapper">

                <span class="date-icon">
                    📅
                </span>


                <input
                    type="text"
                    id="departure"
                    name="departure"
                    class="jalali-date"
                    placeholder="انتخاب تاریخ رفت"
                    autocomplete="off"
                    readonly
                    required
                >

            </div>

        </div>



        {{-- تاریخ برگشت --}}

        <div class="field date-field">

            <label for="return">
                📅 تاریخ برگشت
            </label>


            <div class="date-input-wrapper">

                <span class="date-icon">
                    📅
                </span>
<input
                    type="text"
                    id="return"
                    name="return"
                    class="jalali-date"
                    placeholder="انتخاب تاریخ برگشت"
                    autocomplete="off"
                    readonly
                >

            </div>

        </div>



        {{-- تعداد مسافر --}}

        <div class="field">

            <label for="passengers">
                مسافران
            </label>


            <select
                id="passengers"
                name="passengers"
                required
            >

                <option value="1">
                    ۱ نفر
                </option>

                <option value="2">
                    ۲ نفر
                </option>

                <option value="3">
                    ۳ نفر
                </option>

                <option value="4">
                    ۴ نفر
                </option>

                <option value="5">
                    ۵ نفر
                </option>

            </select>

        </div>



        {{-- دکمه جستجو --}}

        <button
            type="submit"
            class="search-btn"
        >
            جستجوی پرواز 🔍
        </button>


    </div>


</form>


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

    $('.jalali-date').persianDatepicker({

        format: 'YYYY/MM/DD',

        autoClose: true,

        initialValue: false,

        calendarType: 'persian',

        persianDigit: true,

        observer: true

    });


});

</script>


</body>

</html>