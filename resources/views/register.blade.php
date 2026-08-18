<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        ثبت‌نام | سفرینو
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

        </nav>

    </div>

</header>



<main>

    <section class="section">

        <div class="container">


            <div class="section-title">

                <h2>
                    ایجاد حساب کاربری 👤
                </h2>

                <p>
                    برای استفاده از امکانات سفرینو ثبت‌نام کنید.
                </p>

            </div>



            <div class="card">

                <div class="card-body">


                    {{-- نمایش خطاها --}}

                    @if ($errors->any())

                        <div class="register-errors">

                            <strong>
                                ثبت‌نام انجام نشد:
                            </strong>

                            <ul>

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif



                    <form
                        action="/register"
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
                                value="{{ old('name') }}"
                                placeholder="مثلاً زهرا قاسمی"
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
                                value="{{ old('email') }}"
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
                                placeholder="حداقل ۶ کاراکتر"
                                required
                            >

                        </div>


                        <br>


                        <button
                            type="submit"
                            class="search-btn"
                        >
                            ثبت‌نام
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

