<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        جستجوی قطار | سفرینو
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
                جستجوی قطار 🚆
            </h2>

            <p>
                مسیر و تاریخ سفر خود را انتخاب کنید.
            </p>

        </div>



        <div class="card">

            <div class="card-body">


                <form
                    id="train-search-form"
                    action="/train-results"
                    method="GET"
                >


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


                    <br>


                    {{-- مقصد --}}

                    <div class="field">

                        <label for="to">
                            مقصد
                        </label>

                        <input
                            type="text"
                            id="to"
                            name="to"
                            placeholder="مثلاً مشهد"
                            required
                        >

                    </div>


                    <br>


                    {{-- تاریخ رفت --}}

                    <div class="field date-field">

                        <label for="departure_jalali">
                            📅 تاریخ رفت
                        </label>


                        <div class="date-input-wrapper">

                            <span class="date-icon">
                                📅
                            </span>

                            <input
                                type="text"
                                id="departure_jalali"
class="jalali-date"
                                placeholder="انتخاب تاریخ رفت"
                                autocomplete="off"
                                readonly
                                required
                            >

                        </div>


                        {{-- مقدار میلادی برای Laravel --}}

                        <input
                            type="hidden"
                            id="departure"
                            name="departure"
                        >

                    </div>


                    <br>


                    {{-- تاریخ برگشت --}}

                    <div class="field date-field">

                        <label for="return_jalali">
                            📅 تاریخ برگشت
                        </label>


                        <div class="date-input-wrapper">

                            <span class="date-icon">
                                📅
                            </span>

                            <input
                                type="text"
                                id="return_jalali"
                                class="jalali-date"
                                placeholder="انتخاب تاریخ برگشت"
                                autocomplete="off"
                                readonly
                            >

                        </div>


                        {{-- مقدار میلادی برای Laravel --}}

                        <input
                            type="hidden"
                            id="return"
                            name="return"
                        >

                    </div>


                    <br>


                    {{-- تعداد مسافر --}}

                    <div class="field">

                        <label for="passengers">
                            تعداد مسافر
                        </label>

                        <input
                            type="number"
                            id="passengers"
                            name="passengers"
                            min="1"
                            max="10"
                            value="1"
                            required
                        >

                    </div>


                    <br>


                    {{-- دکمه جستجو --}}

                    <button
                        type="submit"
                        class="search-btn"
                    >
                        🔎 جستجوی قطار
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
    | تاریخ رفت
    |--------------------------------------------------------------------------
    */

    $('#departure_jalali').persianDatepicker({

        format: 'YYYY/MM/DD',

        autoClose: true,

        initialValue: false,

        calendarType: 'persian',

        persianDigit: true,

        observer: true,

        altField: '#departure',

        altFieldFormatter: function (unixDate) {

            if (!unixDate) {
                return '';
            }

            return new persianDate(unixDate)
                .toLocale('en')
                .format('YYYY-MM-DD');

        }

    });
/*
    |--------------------------------------------------------------------------
    | تاریخ برگشت
    |--------------------------------------------------------------------------
    */

    $('#return_jalali').persianDatepicker({

        format: 'YYYY/MM/DD',

        autoClose: true,

        initialValue: false,

        calendarType: 'persian',

        persianDigit: true,

        observer: true,

        altField: '#return',

        altFieldFormatter: function (unixDate) {

            if (!unixDate) {
                return '';
            }

            return new persianDate(unixDate)
                .toLocale('en')
                .format('YYYY-MM-DD');

        }

    });



    /*
    |--------------------------------------------------------------------------
    | ارسال فرم
    |--------------------------------------------------------------------------
    */

    $('#train-search-form').on('submit', function (event) {


        const departure =
            $('#departure').val();


        const returnDate =
            $('#return').val();



        /*
        |--------------------------------------------------------------------------
        | تاریخ رفت
        |--------------------------------------------------------------------------
        */

        if (!departure) {

            event.preventDefault();

            alert('لطفاً تاریخ رفت را انتخاب کنید.');

            return false;

        }



        /*
        |--------------------------------------------------------------------------
        | تاریخ برگشت
        |--------------------------------------------------------------------------
        */

        if (
            $('#return_jalali').val() &&
            !returnDate
        ) {

            event.preventDefault();

            alert('لطفاً تاریخ برگشت را دوباره انتخاب کنید.');

            return false;

        }



        return true;

    });


});

</script>


</body>

</html>

