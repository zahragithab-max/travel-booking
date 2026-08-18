<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        نتایج قطار | سفرینو
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
                    نتایج قطار 🚆
                </h2>

                <p>
                    قطارهای موجود برای
                    {{ $from }}
                    →
                    {{ $to }}
                </p>

            </div>



            @forelse ($trains as $train)


                <div class="card">

                    <div class="card-body">


                        <h3>
                            🚆 {{ $train->name }}
                        </h3>


                        <p>
                            شرکت ریلی:
                            {{ $train->company }}
                        </p>


                        <p>
                            نوع واگن:
                            {{ $train->wagon }}
                        </p>


                        <p>
                            وضعیت:
                            @if ($train->is_active)
                                فعال
                            @else
                                غیرفعال
                            @endif
                        </p>


                        <br>


                        <a
                            href="/train-details?train={{ $train->id }}
                            &from={{ urlencode($from) }}
                            &to={{ urlencode($to) }}"
                            class="search-btn"
                        >
                            انتخاب قطار 🚆
                        </a>


                    </div>

                </div>


                <br>


            @empty


                <div class="card">

                    <div class="card-body">

                        <h3>
                            🚆 قطاری پیدا نشد
                        </h3>

                        <p>
                            در حال حاضر قطار فعالی برای نمایش وجود ندارد.
                        </p>

                    </div>

                </div>


            @endforelse


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

