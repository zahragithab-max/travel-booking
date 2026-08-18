<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        درگاه پرداخت تستی | سفرینو
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

    </div>

</header>


<main>

<section class="section">

<div class="container">

<div class="card">

<div class="card-body">

<div class="section-title">

    <h2>
        💳 درگاه پرداخت تستی
    </h2>

    <p>
        این صفحه شبیه‌سازی درگاه پرداخت است.
    </p>

</div>


<h3>
    مبلغ قابل پرداخت
</h3>


<div class="price">

    {{ number_format((int) $amount) }}

    تومان

</div>


<br>


{{-- پرداخت موفق --}}

<a
    href="{{ route('payment.success') }}?{{ http_build_query($booking_data) }}"
    class="search-btn"
>
    ✅ پرداخت موفق
</a>


<br><br>


{{-- پرداخت ناموفق --}}

<a
    href="{{ route('payment.failed') }}"
    class="search-btn"
>
    ❌ پرداخت ناموفق
</a>


</div>

</div>

</div>

</section>

</main>


<footer class="site-footer">

<div class="container">

<div class="copyright">

© ۱۴۰۵ سفرینو - درگاه تستی

</div>

</div>

</footer>

</body>

</html>