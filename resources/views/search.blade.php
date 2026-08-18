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
        مبدا و مقصد خود را وارد کنید.
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

    <a href="/train">
        🚆 قطار
    </a>

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
        placeholder="مثلاً شیراز"
        required
    >

</div>



{{-- مسافران --}}

<div class="field">

    <label for="passengers">
        مسافران
    </label>

    <select
        id="passengers"
        name="passengers"
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


</body>

</html>

