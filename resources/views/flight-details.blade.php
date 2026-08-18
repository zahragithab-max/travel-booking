<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        جزئیات پرواز | سفرینو
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
        جزئیات پرواز ✈️
    </h2>

    <p>
        پرواز انتخابی خود را بررسی کنید.
    </p>

</div>



<div class="card">

<div class="card-body">


<h3>
    پرواز {{ $from }} به {{ $to }}
</h3>



<p>
    ✈️ شرکت هواپیمایی:
    <strong>
        {{ $airline }}
    </strong>
</p>



<p>
    🕐 ساعت حرکت:
    <strong>
        {{ $time }}
    </strong>
</p>

<p>
    📅 تاریخ پرواز:
    <strong>
    <p>
    
    {{ \App\Helpers\JalaliHelper::date($departure) }}
</p>
    </strong>
</p>

<p>
    🕐 ساعت رسیدن:
    <strong>
        {{ $arrival }}
    </strong>
</p>



<p>
    👥 تعداد مسافر:
    <strong>
        {{ $passengers }} نفر
    </strong>
</p>



<div class="price">

    💰
    {{ number_format((int) $price) }} تومان

</div>



<br>



<a
    href="{{ url('/seat-selection') }}?flight_id={{ $flight_id }}&from={{ urlencode($from) }}&to={{ urlencode($to) }}&departure={{ urlencode($departure) }}&return={{ urlencode($returnDate) }}&passengers={{ urlencode($passengers) }}&airline={{ urlencode($airline) }}&time={{ urlencode($time) }}&arrival={{ urlencode($arrival) }}&price={{ urlencode($price) }}"
    class="search-btn"
>
    انتخاب بلیط و صندلی ✈️
</a>


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