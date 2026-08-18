<!DOCTYPE html>
<html lang="fa" dir="rtl">

@php
    use App\Helpers\JalaliHelper;
@endphp

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        اطلاعات مسافر | سفرینو
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
                    اطلاعات مسافر 👤
                </h2>

                <p>
                    اطلاعات مسافر را برای ادامه رزرو وارد کنید.
                </p>

            </div>



            <div class="card">

                <div class="card-body">


                    <h3>
                        خلاصه سفر
                    </h3>


                    <p>
                        مسیر:
                        {{ $from }}
                        →
                        {{ $to }}
                    </p>


                    @if($train_id)

                        <p>
                            شرکت ریلی:
                            {{ $airline }}
                        </p>

                    @else

                        <p>
                            شرکت هواپیمایی:
                            {{ $airline }}
                        </p>

                    @endif


                    <p>
                        تاریخ رفت:
                        {{ JalaliHelper::date($departure) }}
                    </p>


                    <p>
                        ساعت حرکت:
                        {{ $time }}
                    </p>


                    <p>
                        تعداد مسافر:
                        {{ $passengers }}
                        نفر
                    </p>


                    @if($seat)

                        <p>
                            صندلی:
                            <strong>
                                {{ $seat }}
                            </strong>
                        </p>

                    @endif


                </div>

            </div>



            <br>



            <div class="card">

                <div class="card-body">


                    <h3>
                        مشخصات مسافر
                    </h3>


                    <form
                        action="/passenger-confirm"
                        method="GET"
                    >


                        {{-- شناسه قطار --}}

                        <input
                            type="hidden"
                            name="train_id"
                            value="{{ $train_id }}"
                        >


                        {{-- شناسه هواپیما --}}
<input
                            type="hidden"
                            name="flight_id"
                            value="{{ $flight_id }}"
                        >


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


                        <input
                            type="hidden"
                            name="departure"
                            value="{{ $departure }}"
                        >


                        <input
                            type="hidden"
                            name="return"
                            value="{{ $returnDate }}"
                        >


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


                        <input
                            type="hidden"
                            name="price"
                            value="{{ $price }}"
                        >


                        <input
                            type="hidden"
                            name="ticket_type"
                            value="{{ $ticket_type }}"
                        >


                        <input
                            type="hidden"
                            name="seat"
                            value="{{ $seat }}"
                        >



                        <div class="field">

                            <label for="first_name">
                                نام
                            </label>

                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                placeholder="مثلاً علی"
                                required
                            >

                        </div>



                        <br>



                        <div class="field">

                            <label for="last_name">
                                نام خانوادگی
                            </label>

                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                placeholder="مثلاً احمدی"
                                required
                            >

                        </div>



                        <br>



                        <div class="field">

                            <label for="national_code">
                                کد ملی
                            </label>

                            <input
                                type="text"
                                id="national_code"
                                name="national_code"
                                placeholder="کد ملی"
                                maxlength="10"
                                required
                            >

                        </div>



                        <br>



                        <div class="field">
<label for="mobile">
                                شماره موبایل
                            </label>

                            <input
                                type="tel"
                                id="mobile"
                                name="mobile"
                                placeholder="مثلاً ۰۹۱۲۱۲۳۴۵۶۷"
                                required
                            >

                        </div>



                        <br>



                        <button
                            type="submit"
                            class="search-btn"
                        >
                            تأیید اطلاعات و ادامه
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

