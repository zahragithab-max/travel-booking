<!DOCTYPE html><html lang="fa" dir="rtl"><head><meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>
    حساب کاربری | سفرینو
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
                    حساب کاربری 👤
                </h2>

                <p>
                    اطلاعات حساب شما
                </p>

            </div>



            <div class="card">

                <div class="card-body">


                    <h3>
                        اطلاعات کاربر
                    </h3>


                    <p>
                        نام:
                        <strong>
                            {{ $user->name }}
                        </strong>
                    </p>


                    <p>
                        ایمیل:
                        <strong>
                            {{ $user->email }}
                        </strong>
                    </p>


                    <br>


                    <a
                        href="/my-trips"
                        class="search-btn"
                    >
                        🎫 مشاهده سفرهای من
                    </a>

                    <a
    href="/profile/edit"
    class="search-btn"
>
    ✏️ ویرایش اطلاعات
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

</body></html>

