<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        سفرینو | رزرو آنلاین سفر
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


        <section class="hero">

            <div class="container">

                <div class="hero-content">


                    <h1>
                        سفر بعدی تو،
                        همین‌جا شروع میشه ✈️
                    </h1>


                    <p>
                        نوع سفر خودت رو انتخاب کن و
                        سفر رویایی‌ات رو شروع کن.
                    </p>



                    <div class="travel-options">


                        <a
                            href="/flight"
                            class="travel-option"
                        >

                            <div class="travel-icon">
                                ✈️
                            </div>


                            <h2>
                                سفر با هواپیما
                            </h2>


                            <p>
                                جستجو و رزرو پروازهای داخلی و خارجی
                            </p>


                            <span class="search-btn">
                                انتخاب هواپیما
                            </span>

                        </a>



                        <a
                            href="/train"
                            class="travel-option"
                        >

                            <div class="travel-icon">
                                🚆
                            </div>


                            <h2>
                                سفر با قطار
                            </h2>


                            <p>
                                جستجو و رزرو بلیط قطار
                            </p>


                            <span class="search-btn">
                                انتخاب قطار
                            </span>

                        </a>


                    </div>


                </div>

            </div>

        </section>

        <section class="section">

<div class="container">

    <div class="section-title">

        <h2>
            مقصدهای محبوب
        </h2>

        <p>
            برای سفر بعدی خودت از بین مقصدهای محبوب انتخاب کن.
        </p>

    </div>


    <div class="cards">


        <article class="card">

            <img
                class="card-image"
                src="/images/tambol.jpg"
                alt="استانبول"
            >

            <div class="card-body">

                <h3>
                    استانبول
                </h3>

                <p>
                    شهری زیبا با ترکیبی از فرهنگ اروپایی و آسیایی.
                </p>

                <div class="price">
                    شروع قیمت از ۸,۹۰۰,۰۰۰ تومان
                </div>

            </div>

        </article>



        <article class="card">

            <img
                class="card-image"
                src="/images/dobey.jpg"
                alt="دبی"
            >

            <div class="card-body">

                <h3>
                    دبی
                </h3>

                <p>
                    مقصدی مدرن برای خرید، تفریح و تجربه‌های خاص.
                </p>

                <div class="price">
                    شروع قیمت از ۱۲,۵۰۰,۰۰۰ تومان
                </div>

            </div>

        </article>



        <article class="card">

            <img
                class="card-image"
                src="/images/paris.jpg"
                alt="پاریس"
            >

            <div class="card-body">

                <h3>
                    پاریس
                </h3>

                <p>
                    شهر عشق، هنر و معماری بی‌نظیر اروپایی.
                </p>

                <div class="price">
                    شروع قیمت از ۳۵,۰۰۰,۰۰۰ تومان
                </div>

            </div>

        </article>


    </div>

</div>

</section>





        <section class="section features">


            <div class="container">


                <div class="section-title">


                    <h2>
                        چرا سفرینو؟
                    </h2>


                    <p>
                        همه چیز برای یک سفر راحت و مطمئن.
                    </p>


                </div>



                <div class="feature-grid">


                    <div class="feature">


                        <div class="feature-icon">
                            🔒
                        </div>


                        <h3>
                            رزرو مطمئن
                        </h3>


                        <p>
                            رزروهای شما با امنیت بالا و پشتیبانی انجام می‌شوند.
                        </p>


                    </div>



                    <div class="feature">


                        <div class="feature-icon">
                            💰
                        </div>


                        <h3>
                            قیمت مناسب
                        </h3>


                        <p>
                            بهترین قیمت‌ها را برای پرواز، قطار، هتل و تور پیدا کن.
                        </p>


                    </div>



                    <div class="feature">


                        <div class="feature-icon">
                            🎧
                        </div>


                        <h3>
                            پشتیبانی
                        </h3>


                        <p>
                            در تمام مراحل سفر همراه شما هستیم.
                        </p>


                    </div>


                </div>


            </div>


        </section>


    </main>



    <footer class="site-footer">


        <div class="container">


            <div class="footer-content">


                <div class="footer-brand">


                    <h3>
                        سفرینو ✈
                    </h3>


                    <p>
                        پلتفرم آنلاین رزرو پرواز، قطار و تورهای گردشگری.
                        سفر راحت‌تر را با ما تجربه کنید.
                    </p>


                </div>



                <div class="footer-links">

                <a href="/support">
    پشتیبانی
</a>

<a href="/about">
    درباره ما
</a>

<a href="/contact">
    تماس با ما
</a>

<a href="/terms">
    قوانین و مقررات
</a>

                </div>