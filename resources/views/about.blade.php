<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        درباره ما | سفرینو
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
                    درباره سفرینو ✈️
                </h2>

                <p>
                    سفر راحت‌تر، سریع‌تر و مطمئن‌تر
                </p>

            </div>


            <div class="card">

                <div class="card-body">

                    <h3>
                        سفرینو چیست؟
                    </h3>

                    <p>
                        سفرینو یک سامانه آنلاین برای جستجو و رزرو بلیط هواپیما و قطار است که با هدف ساده‌تر کردن فرآیند برنامه‌ریزی سفر طراحی شده است.
                    </p>

                    <p>
                        ما تلاش می‌کنیم تمام مراحل سفر، از انتخاب مسیر و تاریخ گرفته تا انتخاب صندلی و ثبت رزرو، ساده و قابل استفاده باشد.
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        هدف ما 🎯
                    </h3>

                    <p>
                        هدف سفرینو این است که کاربران بتوانند بدون پیچیدگی و در کمترین زمان، سفر موردنظر خود را پیدا و رزرو کنند.
                    </p>

                    <p>
                        تجربه کاربری ساده، اطلاعات واضح و دسترسی آسان به رزروها از مهم‌ترین اولویت‌های ماست.
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        چرا سفرینو؟ ⭐
                    </h3>

                    <p>
                        ✈️ جستجوی آسان بلیط هواپیما
                    </p>

                    <p>
                        🚆 جستجوی بلیط قطار
                    </p>

                    <p>
                        🎫 مدیریت سفرهای رزروشده
                    </p>

                    <p>
                        💺 انتخاب صندلی
                    </p>

                    <p>
                        🎧 پشتیبانی کاربران
                    </p>

                </div>

            </div>


            <br>


            <div class="card">

                <div class="card-body">

                    <h3>
                        همراه شما در سفر ❤️
                    </h3>

                    <p>
                        سفرینو فقط یک سامانه رزرو بلیط نیست؛ هدف ما این است که شروع هر سفر برای شما ساده، مطمئن و لذت‌بخش باشد.
                    </p>

                    <p>
                        از انتخاب مقصد تا لحظه حرکت، سفرینو همراه شماست.
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

</htm