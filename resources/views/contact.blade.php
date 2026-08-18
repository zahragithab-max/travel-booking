<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        تماس با ما | سفرینو
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
                    تماس با ما 📞
                </h2>

                <p>
                    سوال، پیشنهاد یا انتقادی دارید؟ با ما در ارتباط باشید.
                </p>

            </div>


            <div class="card">

                <div class="card-body">

                    <h3>
                        اطلاعات تماس 📍
                    </h3>

                    <p>
                        📞 تلفن:
                        ۰۲۱-۱۲۳۴۵۶۷۸
                    </p>

                    <p>
                        📧 ایمیل:
                        info@safarino.ir
                    </p>

                    <p>
                        🕐 ساعات پاسخگویی:
                        هر روز از ساعت ۹ تا ۲۱
                    </p>

                    <p>
                        📍 آدرس:
                        تهران، خیابان آزادی، پلاک ۱۲۳
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        ارسال پیام برای ما ✉️
                    </h3>

                    <p>
                        پیام خود را ارسال کنید تا در اولین فرصت با شما تماس بگیریم.
                    </p>

                    <br>


                    <form
                        action="/contact"
                        method="POST"
                    >

                        @csrf


                        <div class="field">

                            <label for="name">
                                نام و نام خانوادگی
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="نام شما"
                                required
                            >

                        </div>


                        <br>


                        <div class="field">

                            <label for="email">
                                ایمیل
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="example@email.com"
                                required
                            >

                        </div>


                        <br>


                        <div class="field">

                            <label for="subject">
                                موضوع
                            </label>
<input
                                type="text"
                                id="subject"
                                name="subject"
                                placeholder="موضوع پیام"
                                required
                            >

                        </div>


                        <br>


                        <div class="field">

                            <label for="message">
                                پیام
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                placeholder="پیام خود را بنویسید..."
                                required
                            ></textarea>

                        </div>


                        <br>


                        <button
                            type="submit"
                            class="search-btn"
                        >
                            ارسال پیام 📩
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

