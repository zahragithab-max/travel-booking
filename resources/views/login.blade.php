<!DOCTYPE html><html lang="fa" dir="rtl"><head><meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>
    ورود | سفرینو
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
                    ورود به حساب کاربری 👤
                </h2>

                <p>
                    برای ادامه وارد حساب سفرینو شوید.
                </p>

            </div>



            <div class="card">

                <div class="card-body">


                    @if ($errors->any())

                        <div class="error-message">

                            {{ $errors->first() }}

                        </div>

                        <br>

                    @endif


                    <form
                        action="/login"
                        method="POST"
                    >

                        @csrf


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

                            <label for="password">
                                رمز عبور
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="رمز عبور"
                                required
                            >

                        </div>


                        <br>


                        <button
                            type="submit"
                            class="search-btn"
                        >
                            ورود
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

