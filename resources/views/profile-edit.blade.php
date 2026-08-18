<!DOCTYPE html><html lang="fa" dir="rtl"><head><meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>
    ویرایش حساب | سفرینو
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

            <a href="/profile">
                👤 حساب کاربری
            </a>

        </nav>

    </div>

</header>



<main>

    <section class="section">

        <div class="container">


            <div class="section-title">

                <h2>
                    ویرایش اطلاعات حساب ✏️
                </h2>

                <p>
                    اطلاعات حساب خود را به‌روزرسانی کنید.
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
                        action="/profile/edit"
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
                                value="{{ $user->name }}"
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
                                value="{{ $user->email }}"
                                required
                            >

                        </div>


                        <br>


                        <button
                            type="submit"
                            class="search-btn"
                        >
                            ذخیره تغییرات 💾
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

