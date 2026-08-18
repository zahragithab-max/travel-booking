<!DOCTYPE html><html lang="fa" dir="rtl"><head><meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>
    جزئیات قطار | سفرینو
</title>

<link
    rel="stylesheet"
    href="/css/app.css"
>

</head><body><header class="site-header">

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
                    جزئیات قطار
                </h2>

                <p>
                    اطلاعات کامل سفر خود را بررسی کنید.
                </p>

            </div>



            <div class="card">

                <div class="card-body">


                    <h3>
                        {{ $train['name'] }}
                    </h3>


                    <p>
                        مسیر:
                        <strong>
                            {{ $from }}
                            →
                            {{ $to }}
                        </strong>
                    </p>


                    <p>
                        شرکت ریلی:
                        {{ $train['company'] }}
                    </p>


                    <p>
                        نوع واگن:
                        {{ $train['wagon'] }}
                    </p>


                    <p>
    تاریخ حرکت:
    {{ \App\Helpers\JalaliHelper::date($departure) }}
</p>


                    <p>
                        ساعت حرکت:
                        {{ $train['departure_time'] }}
                    </p>


                    <p>
                        ساعت رسیدن:
                        {{ $train['arrival_time'] }}
                    </p>


                    <p>
                        مدت سفر:
                        {{ $train['duration'] }}
                    </p>


                    <p>
                        تعداد مسافر:
                        {{ $passengers }}
                        نفر
                    </p>


                    <div class="price">
                        {{ $train['price'] }}
                        تومان
                    </div>


                </div>

            </div>



            <br>



            <div class="card">

                <div class="card-body">


                    <h3>
                        امکانات قطار
                    </h3>


                    <p>
                        ✓ سیستم تهویه
                    </p>

                    <p>
                        ✓ سرویس بهداشتی
                    </p>

                    <p>
                        ✓ پذیرایی
                    </p>

                    <p>
                        ✓ پریز برق
                    </p>


                </div>

            </div>



            <br>



            <div class="card">

                <div class="card-body">


                    <h3>
                        انتخاب نوع بلیط
                    </h3>


                    <form
                        action="/train-seat-selection"
                        method="GET"
                    >
<input
                            type="hidden"
                            name="train"
                            value="{{ $train['id'] }}"
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
    name="train_id"
    value="{{ $train['id'] }}"
>

                        <input
                            type="hidden"
                            name="passengers"
                            value="{{ $passengers }}"
                        >


                        <input
                            type="hidden"
                            name="company"
                            value="{{ $train['company'] }}"
                        >


                        <input
                            type="hidden"
                            name="train_name"
                            value="{{ $train['name'] }}"
                        >


                        <input
                            type="hidden"
                            name="wagon"
                            value="{{ $train['wagon'] }}"
                        >


                        <input
                            type="hidden"
                            name="departure_time"
                            value="{{ $train['departure_time'] }}"
                        >


                        <input
                            type="hidden"
                            name="arrival_time"
                            value="{{ $train['arrival_time'] }}"
                        >


                        <input
                            type="hidden"
                            name="duration"
                            value="{{ $train['duration'] }}"
                        >


                        <input
                            type="hidden"
                            name="price"
                            value="{{ $train['price'] }}"
                        >


                        <div class="field">

                            <label for="ticket_type">
                                نوع بلیط
                            </label>

                            <select
                                id="ticket_type"
                                name="ticket_type"
                                required
                            >

                                <option value="">
                                    انتخاب کنید
                                </option>

                                <option value="معمولی">
                                    بلیط معمولی
                                </option>

                                <option value="VIP">
                                    بلیط VIP
                                </option>

                            </select>

                        </div>


                        <br>


                        <button
                            type="submit"
                            class="search-btn"
                        >
                            ادامه و انتخاب صندلی
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

</body></html>

