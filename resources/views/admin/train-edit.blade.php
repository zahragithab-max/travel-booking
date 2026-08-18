<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        ویرایش قطار | سفرینو
    </title>

    <link
        rel="stylesheet"
        href="/css/app.css"
    >

    {{-- Persian Datepicker --}}
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
                داشبورد
            </a>

            <a href="/admin/trains">
                مدیریت قطارها
            </a>

        </nav>

    </div>

</header>



<main>

<section class="section">

<div class="container">


<div class="section-title">

    <h2>
        ✏️ ویرایش قطار
    </h2>

    <p>
        اطلاعات قطار را ویرایش کنید.
    </p>

</div>



<div class="card">

<div class="card-body">


@if($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif



<form
    action="/admin/trains/{{ $train->id }}"
    method="POST"
>

    @csrf

    @method('PUT')



    {{-- نام قطار --}}

    <div class="field">

        <label for="name">
            نام قطار
        </label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $train->name) }}"
            required
        >

    </div>



    {{-- شرکت --}}

    <div class="field">

        <label for="company">
            شرکت ریلی
        </label>

        <input
            type="text"
            id="company"
            name="company"
            value="{{ old('company', $train->company) }}"
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
            value="{{ old('origin', $train->origin) }}"
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
            value="{{ old('destination', $train->destination) }}"
            required
        >

    </div>



    {{-- تاریخ حرکت --}}

    <div class="field">

        <label for="departure_date_jalali">
            📅 تاریخ حرکت
        </label>


        {{-- تاریخ نمایشی شمسی --}}

        <input
            type="text"
            id="departure_date_jalali"
            class="jalali-date"
            placeholder="انتخاب تاریخ حرکت"
            autocomplete="off"
            readonly
            required
        >


        {{-- تاریخ واقعی ارسالی به Laravel --}}

        <input
            type="hidden"
            id="departure_date"
            name="departure_date"
            value="{{ old('departure_date', $train->departure_date) }}"
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
            value="{{ old('departure_time', $train->departure_time) }}"
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
            value="{{ old('arrival_time', $train->arrival_time) }}"
            required
        >

    </div>



    {{-- مدت سفر --}}
<div class="field">

        <label for="duration">
            مدت سفر
        </label>

        <input
            type="text"
            id="duration"
            name="duration"
            value="{{ old('duration', $train->duration) }}"
            placeholder="مثلاً ۸ ساعت و ۳۰ دقیقه"
            required
        >

    </div>



    {{-- نوع واگن --}}

    <div class="field">

        <label for="wagon">
            نوع واگن
        </label>

        <input
            type="text"
            id="wagon"
            name="wagon"
            value="{{ old('wagon', $train->wagon) }}"
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
            value="{{ old('price', $train->price) }}"
            min="0"
            required
        >

    </div>



    {{-- ظرفیت --}}

    <div class="field">

        <label for="capacity">
            ظرفیت قطار
        </label>

        <input
            type="number"
            id="capacity"
            name="capacity"
            value="{{ old('capacity', $train->capacity) }}"
            min="1"
            required
        >

    </div>



    {{-- صندلی‌های موجود --}}

    <div class="field">

        <label for="available_seats">
            صندلی‌های موجود
        </label>

        <input
            type="number"
            id="available_seats"
            name="available_seats"
            value="{{ old('available_seats', $train->available_seats) }}"
            min="0"
            required
        >

    </div>



    {{-- وضعیت --}}

    <div class="field">

        <label for="is_active">
            وضعیت قطار
        </label>

        <select
            id="is_active"
            name="is_active"
            required
        >

            <option
                value="1"
                {{ old('is_active', $train->is_active) == 1 ? 'selected' : '' }}
            >
                فعال
            </option>

            <option
                value="0"
                {{ old('is_active', $train->is_active) == 0 ? 'selected' : '' }}
            >
                غیرفعال
            </option>

        </select>

    </div>



    <br>



    <button
        type="submit"
        class="search-btn"
    >
        💾 ذخیره تغییرات
    </button>



    <a
        href="/admin/trains"
        class="login-btn"
        style="margin-right:10px;"
    >
        انصراف
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

    const oldDate =
        $('#departure_date').val();


    /*
    |----------------------------------------------------------
    | نمایش تاریخ قبلی به صورت شمسی
    |----------------------------------------------------------
    */

    if (oldDate) {

        const gregorianDate =
            new persianDate(oldDate);

        $('#departure_date_jalali').val(
            gregorianDate.format('YYYY/MM/DD')
        );

    }


    /*
    |----------------------------------------------------------
    | تقویم شمسی
    |----------------------------------------------------------
    */

    $('#departure_date_jalali').persianDatepicker({

        format: 'YYYY/MM/DD',

        autoClose: true,

        initialValue: false,

        calendarType: 'persian',

        persianDigit: true,

        observer: true,

        onSelect: function () {
const gregorianDate =
                $('#departure_date_jalali').attr('data-gdate');


            $('#departure_date').val(
                gregorianDate || ''
            );

        }

    });


    /*
    |----------------------------------------------------------
    | قبل از ارسال فرم
    |----------------------------------------------------------
    */

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

