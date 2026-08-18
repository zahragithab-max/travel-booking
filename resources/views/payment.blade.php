<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>پرداخت | سفرینو</title>

    <link rel="stylesheet" href="/css/app.css">

</head>

<body>

<header class="site-header">

    <div class="container navbar">

        <a href="/" class="logo">
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

        </nav>

    </div>

</header>


<main>

<section class="section">

<div class="container">

    <div class="section-title">

        <h2>
            💳 پرداخت بلیط
        </h2>

        <p>
            اطلاعات پرداخت را وارد کنید.
        </p>

    </div>


    <div class="card">

        <div class="card-body">

            <h3>
                مبلغ قابل پرداخت
            </h3>

            <div class="price">
                {{ number_format((int) $price) }}
                تومان
            </div>

            <br>


          
                

            <form
    action="{{ route('payment.start') }}"
    method="GET"
>




                {{-- شناسه قطار --}}

                <input
                    type="hidden"
                    name="train_id"
                    value="{{ $train_id ?? '' }}"
                >


                {{-- شناسه پرواز --}}

                <input
                    type="hidden"
                    name="flight_id"
                    value="{{ $flight_id ?? '' }}"
                >


                {{-- اطلاعات مسافر --}}

                <input
                    type="hidden"
                    name="first_name"
                    value="{{ $first_name }}"
                >

                <input
                    type="hidden"
                    name="last_name"
                    value="{{ $last_name }}"
                >

                <input
                    type="hidden"
                    name="national_code"
                    value="{{ $national_code ?? '' }}"
                >

                <input
                    type="hidden"
                    name="mobile"
                    value="{{ $mobile ?? '' }}"
                >


                {{-- مسیر --}}

                <input
                    type="hidden"
                    name="from"
                    value="{{ $from }}"
                >

                <input
                    type="hidden"
                    name="to"
                    value="{{ $to }}"
                >


                {{-- تاریخ --}}

                <input
                    type="hidden"
                    name="departure"
                    value="{{ $departure }}"
                >

                <input
                    type="hidden"
                    name="return"
                    value="{{ $returnDate ?? '' }}"
                >


                {{-- سفر --}}

                <input
                    type="hidden"
                    name="passengers"
                    value="{{ $passengers }}"
                >

                <input
                    type="hidden"
                    name="airline"
                    value="{{ $airline }}"
                >

                <input
                    type="hidden"
                    name="time"
                    value="{{ $time }}"
                >

                <input
                    type="hidden"
                    name="arrival"
                    value="{{ $arrival }}"
                >


                {{-- قیمت --}}

                <input
                    type="hidden"
                    name="price"
                    value="{{ $price }}"
                >


                {{-- نوع بلیط --}}
<input
                    type="hidden"
                    name="ticket_type"
                    value="{{ $ticket_type }}"
                >


                {{-- صندلی --}}

                <input
                    type="hidden"
                    name="seat"
                    value="{{ $seat }}"
                >


                <button
                    type="submit"
                    class="search-btn"
                >
                    💳 ورود به درگاه پرداخت
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

</body>

</html>

