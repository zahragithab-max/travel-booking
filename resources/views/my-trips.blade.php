<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        سفرهای من | سفرینو
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


            @if (auth()->check())

                <a href="/profile">
                    👤 {{ auth()->user()->name }}
                </a>


                <form
                    action="/logout"
                    method="POST"
                    style="display: inline;"
                >

                    @csrf

                    <button
                        type="submit"
                        class="login-btn"
                    >
                        خروج
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
                    سفرهای من 🎫
                </h2>

                <p>
                    رزروهای ثبت‌شده شما
                </p>

            </div>



            @if ($booking)


                <div class="card">

                    <div class="card-body">


                        <h3>
                            {{ $booking['from'] }}
                            →
                            {{ $booking['to'] }}
                        </h3>


                        <p>
                            مسافر:
                            {{ $booking['first_name'] }}
                            {{ $booking['last_name'] }}
                        </p>


                        <p>
                            شرکت هواپیمایی:
                            {{ $booking['airline'] }}
                        </p>


                        {{-- تاریخ رفت --}}

                        <p>

                            تاریخ رفت:

                            {{ \App\Helpers\JalaliHelper::date($booking['departure']) }}

                        </p>


                        {{-- تاریخ برگشت --}}

                        <p>

                            تاریخ برگشت:

                            @if (!empty($booking['returnDate']))

                                {{ \App\Helpers\JalaliHelper::date($booking['returnDate']) }}

                            @else

                                یک‌طرفه

                            @endif

                        </p>


                        <p>
                            ساعت حرکت:
                            {{ $booking['time'] }}
                        </p>


                        <p>
                            ساعت رسیدن:
                            {{ $booking['arrival'] }}
                        </p>


                        <p>
                            تعداد مسافر:
                            {{ $booking['passengers'] }}
                            نفر
                        </p>


                        <p>

                            نوع بلیط:

                            @if (($booking['ticket_type'] ?? '') === 'vip')

                                👑 VIP

                            @else

                                🎫 ساده

                            @endif

                        </p>


                        <p>
شماره صندلی:

                            <strong>
                                {{ $booking['seat'] ?? 'ثبت نشده' }}
                            </strong>

                        </p>


                        <div class="price">

                            {{ $booking['price'] }}
                            تومان

                        </div>


                        <br>


                        <p>

                            کد پیگیری:

                            <strong>
                                {{ $booking['tracking_code'] }}
                            </strong>

                        </p>
                        @if (($booking['status'] ?? 'confirmed') === 'cancelled')

<p>
    ❌ این بلیت لغو شده است.
</p>

@else

<form
    action="/booking/cancel"
    method="POST"
    onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این بلیت را لغو کنید؟');"
>

    @csrf

    <input
        type="hidden"
        name="booking_id"
        value="{{ $booking['id'] }}"
    >

    <button
        type="submit"
        class="login-btn"
    >
        ❌ لغو بلیت
    </button>

</form>

@endif

                    </div>

                </div>


            @else


                <div class="card">

                    <div class="card-body">

                        <h3>
                            هنوز سفری ثبت نکرده‌اید.
                        </h3>

                        <p>
                            بعد از رزرو پرواز، سفر شما در این قسمت نمایش داده می‌شود.
                        </p>


                        <br>


                        <a
                            href="/flight"
                            class="search-btn"
                        >
                            جستجوی پرواز ✈️
                        </a>

                    </div>

                </div>


            @endif


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

