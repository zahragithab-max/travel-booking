<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        نتایج جستجو | سفرینو
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

            <a href="/search">
                جستجوی سفر
            </a>

        </nav>

    </div>

</header>



<main>

<section class="section">

<div class="container">


<div class="section-title">

    <h2>
        نتایج جستجو ✈️
    </h2>

    <p>
        پروازهای موجود برای سفر شما
    </p>

</div>



{{-- اطلاعات جستجو --}}

<div class="card">

<div class="card-body">

    <h3>
        {{ $from }} ✈ {{ $to }}
    </h3>

    <p>
        تاریخ رفت:
        {{ $departure }}
    </p>

    <p>
        تاریخ برگشت:
        {{ $returnDate ?: 'یک‌طرفه' }}
    </p>

    <p>
        تعداد مسافر:
        {{ $passengers }} نفر
    </p>

</div>

</div>



<br>



{{-- پروازها --}}

@if($flights->count() > 0)


    @foreach($flights as $flight)


        <div class="card">

            <div class="card-body">


                {{-- شرکت و شماره پرواز --}}

                <h3>

                    ✈️
                    {{ $flight->airline }}

                    @if($flight->flight_number)

                        <span>
                            — {{ $flight->flight_number }}
                        </span>

                    @endif

                </h3>



                {{-- مسیر --}}

                <p>

                    <strong>
                        {{ $flight->origin }}
                    </strong>

                    →

                    <strong>
                        {{ $flight->destination }}
                    </strong>

                </p>



                {{-- تاریخ --}}

                <p>

                    📅 تاریخ پرواز:
                    {{ \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $flight->flight_date)->format('Y/m/d') }}
                </p>



                {{-- ساعت --}}

                <p>

                    🕐 ساعت حرکت:

                    {{ $flight->departure_time
                        ? \Carbon\Carbon::parse($flight->departure_time)->format('H:i')
                        : '-' }}

                </p>



                <p>

                    🕐 ساعت رسیدن:

                    {{ $flight->arrival_time
                        ? \Carbon\Carbon::parse($flight->arrival_time)->format('H:i')
                        : '-' }}

                </p>



                {{-- کلاس --}}

                <p>

                    💺 کلاس:

                    @if($flight->flight_class === 'business')

                        بیزنس

                    @else

                        اکونومی

                    @endif

                </p>



                {{-- ظرفیت --}}

                <p>

                    👥 ظرفیت باقی‌مانده:

                    {{ $flight->available_seats ?? '-' }}

                    نفر

                </p>



                {{-- قیمت --}}

                <div class="price">

                    💰

                    {{ $flight->price
                        ? number_format($flight->price) . ' تومان'
                        : 'قیمت ثبت نشده' }}

                </div>



                <br>



                <a
    href="{{ url('/flight-details') }}?flight_id={{ $flight->id }}&from={{ urlencode($from) }}&to={{ urlencode($to) }}&departure={{ urlencode($departure) }}&return={{ urlencode($returnDate) }}&passengers={{ urlencode($passengers) }}&airline={{ urlencode($flight->airline) }}&time={{ urlencode($flight->departure_time) }}&arrival={{ urlencode($flight->arrival_time) }}&price={{ urlencode($flight->price) }}"
    class="search-btn"
>
    انتخاب پرواز ✈️
</a>


            </div>

        </div>


        <br>


    @endforeach


@else


    <div class="card">

        <div class="card-body">

            <h3>
                😔 پروازی پیدا نشد
            </h3>
<p>
                برای مسیر
                <strong>{{ $from }}</strong>
                به
                <strong>{{ $to }}</strong>
                در حال حاضر پرواز فعالی ثبت نشده است.
            </p>

            <br>

            <a
                href="/search"
                class="search-btn"
            >
                🔍 جستجوی دوباره
            </a>

        </div>

    </div>


@endif


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

