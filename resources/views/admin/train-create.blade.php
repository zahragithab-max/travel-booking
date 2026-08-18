<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        افزودن قطار | سفرینو
    </title>

    <link rel="stylesheet" href="/css/app.css">

    {{-- تقویم شمسی --}}
    <link
        rel="stylesheet"
        href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"
    >

</head>

<body>

<header class="site-header">

    <div class="container navbar">

        <a href="/" class="logo">
            سفرینو 🚆
        </a>

        <nav class="nav-links">

            <a href="/admin">
                پنل مدیریت
            </a>

            <a href="/admin/trains">
                مدیریت قطارها
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
            ➕ افزودن قطار جدید
        </h2>

        <p>
            اطلاعات کامل قطار جدید را وارد کنید.
        </p>

    </div>


    <div class="card">

        <div class="card-body">

            {{-- پیام خطا --}}

            @if($errors->any())

                <div
                    style="
                        background:#fee2e2;
                        color:#991b1b;
                        padding:15px 20px;
                        border-radius:12px;
                        margin-bottom:20px;
                        font-weight:bold;
                    "
                >

                    ❌ لطفاً اطلاعات زیر را بررسی کنید:

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif


            <form
                action="{{ route('admin.trains.store') }}"
                method="POST"
            >

            @csrf

            <div class="search-fields">


                <div class="field">

                    <label for="name">
                        نام قطار
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="مثلاً فدک"
                        value="{{ old('name') }}"
                        required
                    >

                </div>


                <div class="field">

                    <label for="company">
                        شرکت ریلی
                    </label>

                    <input
                        type="text"
                        id="company"
                        name="company"
                        placeholder="مثلاً رجا"
                        value="{{ old('company') }}"
                        required
                    >

                </div>


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


                <div class="field">

                    <label for="destination">
                        مقصد
                    </label>

                    <input
                        type="text"
                        id="destination"
                        name="destination"
                        placeholder="مثلاً مشهد"
                        value="{{ old('destination') }}"
                        required
                    >

                </div>


                <div class="field">

                    <label for="wagon">
                        نوع واگن
                    </label>
<input
                        type="text"
                        id="wagon"
                        name="wagon"
                        placeholder="مثلاً ۴ تخته"
                        value="{{ old('wagon') }}"
                        required
                    >

                </div>


                {{-- تاریخ حرکت --}}

                <div class="field">

                    <label for="departure_date_jalali">
                        📅 تاریخ حرکت
                    </label>

                    <input
                        type="text"
                        id="departure_date_jalali"
                        class="jalali-date"
                        placeholder="انتخاب تاریخ حرکت"
                        value="{{ old('departure_date') }}"
                        autocomplete="off"
                        readonly
                        required
                    >

                    {{-- مقدار واقعی ارسالی به Laravel --}}

                    <input
                        type="hidden"
                        id="departure_date"
                        name="departure_date"
                        value="{{ old('departure_date') }}"
                    >

                </div>


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


                <div class="field">

                    <label for="duration">
                        مدت سفر
                    </label>

                    <input
                        type="text"
                        id="duration"
                        name="duration"
                        placeholder="مثلاً ۷ ساعت و ۳۰ دقیقه"
                        value="{{ old('duration') }}"
                        required
                    >

                </div>


                <div class="field">

                    <label for="price">
                        قیمت بلیط
                    </label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        placeholder="مثلاً 950000"
                        value="{{ old('price') }}"
                        min="0"
                        required
                    >

                </div>


                <div class="field">

                    <label for="capacity">
                        ظرفیت
                    </label>

                    <input
                        type="number"
                        id="capacity"
                        name="capacity"
                        placeholder="مثلاً 60"
                        value="{{ old('capacity') }}"
                        min="1"
                        required
                    >

                </div>


                <div class="field">

                    <label for="available_seats">
                        صندلی‌های موجود
                    </label>

                    <input
                        type="number"
id="available_seats"
                        name="available_seats"
                        placeholder="مثلاً 60"
                        value="{{ old('available_seats') }}"
                        min="0"
                        required
                    >

                </div>


                <div class="field">

                    <label for="is_active">
                        وضعیت قطار
                    </label>

                    <select
                        id="is_active"
                        name="is_active"
                    >

                        <option value="1">
                            فعال
                        </option>

                        <option value="0">
                            غیرفعال
                        </option>

                    </select>

                </div>


            </div>


            <button
                type="submit"
                class="search-btn"
            >
                🚆 افزودن قطار
            </button>


            <a
                href="/admin/trains"
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

            © ۱۴۰۵ سفرینو - مدیریت قطارها

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

    $('#departure_date_jalali').persianDatepicker({

        format: 'YYYY/MM/DD',

        autoClose: true,

        initialValue: false,

        calendarType: 'persian',

        persianDigit: true,

        observer: true,

        onSelect: function () {

            const jalaliDate =
                $('#departure_date_jalali').val();

            const gDate =
                $('#departure_date_jalali').attr('data-gdate');

            $('#departure_date').val(
                gDate || ''
            );

        }

    });


    $('form').on('submit', function (event) {

        if (!$('#departure_date').val()) {

            event.preventDefault();

            alert('لطفاً تاریخ حرکت را انتخاب کنید.');

            return false;

        }

    });

});

</script>


</body>

</html>

