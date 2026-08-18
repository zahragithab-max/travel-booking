<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        پشتیبانی | سفرینو
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
                    پشتیبانی 🎧
                </h2>

                <p>
                    اگر مشکلی دارید یا سوالی برایتان پیش آمده، ما در کنار شما هستیم.
                </p>

            </div>


            <div class="card">

                <div class="card-body">

                    <h3>
                        سوالات متداول ❓
                    </h3>

                    <p>
                        پاسخ سوالات رایج درباره رزرو بلیط، پرداخت و سفرهای شما.
                    </p>

                    <br>

                    <div class="support-item">

                        <strong>
                            چگونه بلیط رزرو کنم؟
                        </strong>

                        <p>
                            ابتدا مسیر و تاریخ سفر خود را انتخاب کنید، سپس وسیله سفر و صندلی موردنظر را انتخاب کرده و مراحل رزرو را تکمیل کنید.
                        </p>

                    </div>


                    <div class="support-item">

                        <strong>
                            چگونه سفرهای رزروشده خود را ببینم؟
                        </strong>

                        <p>
                            از قسمت «سفرهای من» می‌توانید رزروهای ثبت‌شده خود را مشاهده کنید.
                        </p>

                    </div>


                    <div class="support-item">

                        <strong>
                            اگر در رزرو مشکلی پیش آمد چه کار کنم؟
                        </strong>

                        <p>
                            می‌توانید از طریق فرم پشتیبانی درخواست خود را برای ما ارسال کنید.
                        </p>

                    </div>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        ارسال درخواست پشتیبانی 📩
                    </h3>

                    <p>
                        مشکل یا سوال خود را برای ما بنویسید.
                    </p>

                    <br>


                    <form
                        action="/support"
                        method="POST"
                    >

                        @csrf


                        <div class="field">

                            <label for="subject">
                                موضوع
                            </label>

                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                placeholder="مثلاً مشکل در رزرو بلیط"
                                required
                            >

                        </div>


                        <br>
<div class="field">

                            <label for="message">
                                پیام شما
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                placeholder="مشکل یا سوال خود را بنویسید..."
                                required
                            ></textarea>

                        </div>


                        <br>


                        <button
                            type="submit"
                            class="search-btn"
                        >
                            ارسال درخواست 📩
                        </button>

                    </form>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        راه‌های ارتباطی 📞
                    </h3>

                    <p>
                        📞 تلفن پشتیبانی:
                        ۰۲۱-۱۲۳۴۵۶۷۸
                    </p>

                    <p>
                        📧 ایمیل:
                        support@safarino.ir
                    </p>

                    <p>
                        🕐 ساعات پاسخگویی:
                        هر روز از ساعت ۹ تا ۲۱
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

