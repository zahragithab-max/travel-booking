<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        رزرو موفق | سفرینو
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
                        رزرو با موفقیت انجام شد 🎉
                    </h2>

                    <p>
                        سفر شما با موفقیت ثبت شد.
                    </p>

                </div>



                <div class="card">

                    <div class="card-body">


                        <h3>
                            اطلاعات رزرو
                        </h3>


                        <p>
                            مسافر:
                            {{ $first_name }}
                            {{ $last_name }}
                        </p>


                        <p>
                            مسیر:
                            {{ $from }}
                            →
                            {{ $to }}
                        </p>


                        <p>
                            شرکت هواپیمایی:
                            {{ $airline }}
                        </p>


                        <p>
   تاریخ رفت
    {{ \App\Helpers\JalaliHelper::date($departure) }}
</p>


                        <p>
                            ساعت پرواز:
                            {{ $time }}
                        </p>


                        <p>
                            تعداد مسافر:
                            {{ $passengers }} نفر
                        </p>


                        <div class="price">
                            {{ $price }} تومان
                        </div>


                        <br>


                        <p>
                            کد پیگیری:
                            <strong>
                                SF-1405-{{ rand(10000, 99999) }}
                            </strong>
                        </p>


                        <br>


                        <a
                            href="/my-trips"
                            class="search-btn"
                        >
                            🎫 مشاهده سفرهای من
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

