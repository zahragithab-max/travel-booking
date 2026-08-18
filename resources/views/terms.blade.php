<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        قوانین و مقررات | سفرینو
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
                    قوانین و مقررات 📋
                </h2>

                <p>
                    لطفاً پیش از استفاده از خدمات سفرینو، قوانین زیر را مطالعه کنید.
                </p>

            </div>


            <div class="card">

                <div class="card-body">

                    <h3>
                        ۱. شرایط استفاده
                    </h3>

                    <p>
                        استفاده از خدمات سفرینو به معنی پذیرش قوانین و مقررات این سامانه است.
                    </p>

                    <p>
                        کاربران موظف هستند اطلاعات صحیح و کامل خود را هنگام ثبت‌نام و رزرو وارد کنند.
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        ۲. رزرو بلیط
                    </h3>

                    <p>
                        مسئولیت بررسی مسیر، تاریخ، ساعت حرکت، اطلاعات مسافر و مشخصات بلیط پیش از تأیید رزرو بر عهده کاربر است.
                    </p>

                    <p>
                        پس از ثبت نهایی رزرو، اطلاعات واردشده مطابق قوانین مربوط به همان سفر مورد استفاده قرار می‌گیرد.
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        ۳. اطلاعات کاربران 🔐
                    </h3>

                    <p>
                        سفرینو تلاش می‌کند اطلاعات کاربران را به شکل امن نگهداری کند و از اطلاعات شخصی کاربران بدون مجوز استفاده نخواهد کرد.
                    </p>

                    <p>
                        کاربران نیز مسئول حفظ اطلاعات ورود به حساب کاربری خود هستند.
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        ۴. لغو و تغییر رزرو
                    </h3>

                    <p>
                        شرایط لغو یا تغییر بلیط بر اساس قوانین شرکت هواپیمایی یا شرکت ریلی مربوطه تعیین می‌شود.
                    </p>

                    <p>
                        برای اطلاع از شرایط دقیق، کاربران می‌توانند با پشتیبانی سفرینو تماس بگیرند.
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        ۵. مسئولیت اطلاعات
                    </h3>

                    <p>
                        کاربر موظف است پیش از نهایی کردن رزرو، صحت اطلاعات واردشده را بررسی کند.
                    </p>
<p>
                        در صورت وارد کردن اطلاعات اشتباه، مسئولیت عواقب آن بر عهده کاربر خواهد بود.
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        ۶. پشتیبانی 🎧
                    </h3>

                    <p>
                        در صورت بروز مشکل در فرآیند رزرو یا استفاده از سامانه، کاربران می‌توانند از بخش پشتیبانی با تیم سفرینو در ارتباط باشند.
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        پذیرش قوانین
                    </h3>

                    <p>
                        ادامه استفاده از خدمات سفرینو به منزله مطالعه و پذیرش قوانین و مقررات این سامانه است.
                    </p>

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

