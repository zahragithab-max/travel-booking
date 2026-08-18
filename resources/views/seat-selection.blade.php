<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        انتخاب صندلی | سفرینو
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
        انتخاب بلیط و صندلی ✈️
    </h2>

    <p>
        ابتدا نوع بلیط و سپس صندلی مورد نظر خود را انتخاب کنید.
    </p>

</div>



{{-- اطلاعات پرواز --}}

<div class="card">

<div class="card-body">

    <h3>
        {{ $from }} → {{ $to }}
    </h3>

    <p>
        شرکت هواپیمایی:
        <strong>
            {{ $airline }}
        </strong>
    </p>

    <p>
        ساعت حرکت:
        <strong>
            {{ $time }}
        </strong>
    </p>

    <p>
        ساعت رسیدن:
        <strong>
            {{ $arrival }}
        </strong>
    </p>

    <p>
        تعداد مسافر:
        <strong>
            {{ $passengers }} نفر
        </strong>
    </p>

</div>

</div>



<br>



{{-- انتخاب نوع بلیط --}}

<div class="card">

<div class="card-body">

<h3>
    نوع بلیط
</h3>


<div class="ticket-options">


    {{-- بلیط ساده --}}

    <div
        class="ticket-option selected"
        onclick="selectTicket('normal', this)"
    >

        <h3>
            🎫 بلیط ساده
        </h3>

        <p>
            صندلی معمولی
        </p>

        <div class="ticket-price">

            {{ number_format((int) $price) }}

            تومان

        </div>

    </div>



    {{-- بلیط VIP --}}

    <div
        class="ticket-option"
        onclick="selectTicket('vip', this)"
    >

        <h3>
            👑 بلیط VIP
        </h3>

        <p>
            فضای بیشتر و خدمات ویژه
        </p>

        <div class="ticket-price">

            {{ number_format((int) $vip_price) }}

            تومان

        </div>

    </div>


</div>



<br>



<h3>
    انتخاب صندلی
</h3>

<p>
    لطفاً
    <strong>{{ $passengers }}</strong>
    صندلی انتخاب کنید.
</p>



<div class="plane">


<div class="cockpit">
    ✈️ جلوی هواپیما
</div>



{{-- ردیف ۱ --}}

<div class="seat-row">

    <button type="button" class="seat vip-seat">
        01
    </button>

    <button type="button" class="seat vip-seat">
        02
    </button>

    <div class="aisle"></div>

    <button type="button" class="seat vip-seat reserved">
        03
    </button>

    <button type="button" class="seat vip-seat">
        04
    </button>

</div>



{{-- ردیف ۲ --}}

<div class="seat-row">

    <button type="button" class="seat">
        05
    </button>

    <button type="button" class="seat">
        06
    </button>

    <div class="aisle"></div>
<button type="button" class="seat reserved">
        07
    </button>

    <button type="button" class="seat">
        08
    </button>

</div>



{{-- ردیف ۳ --}}

<div class="seat-row">

    <button type="button" class="seat">
        09
    </button>

    <button type="button" class="seat">
        10
    </button>

    <div class="aisle"></div>

    <button type="button" class="seat">
        11
    </button>

    <button type="button" class="seat reserved">
        12
    </button>

</div>



{{-- ردیف ۴ --}}

<div class="seat-row">

    <button type="button" class="seat">
        13
    </button>

    <button type="button" class="seat">
        14
    </button>

    <div class="aisle"></div>

    <button type="button" class="seat">
        15
    </button>

    <button type="button" class="seat">
        16
    </button>

</div>



{{-- ردیف ۵ --}}

<div class="seat-row">

    <button type="button" class="seat reserved">
        17
    </button>

    <button type="button" class="seat">
        18
    </button>

    <div class="aisle"></div>

    <button type="button" class="seat">
        19
    </button>

    <button type="button" class="seat">
        20
    </button>

</div>



{{-- راهنما --}}

<div class="legend">

    <div class="legend-item">

        <div class="legend-box legend-free"></div>

        آزاد

    </div>


    <div class="legend-item">

        <div class="legend-box legend-selected"></div>

        انتخاب شما

    </div>


    <div class="legend-item">

        <div class="legend-box legend-reserved"></div>

        رزرو شده

    </div>

</div>



<div class="selected-seat">

    صندلی‌های انتخاب‌شده:

    <span id="selectedSeat">
        هنوز انتخاب نشده
    </span>

</div>


</div>



<br>



<button
    type="button"
    class="search-btn"
    onclick="continueBooking()"
>
    ادامه رزرو
</button>


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



<script>


// نوع بلیط
let selectedTicket = 'normal';


// تعداد مسافران
let passengerCount = Number(
    @json($passengers)
);


// اگر مقدار نامعتبر بود
if (
    !passengerCount ||
    passengerCount < 1
) {

    passengerCount = 1;

}


// صندلی‌های انتخاب‌شده
let selectedSeats = [];





function selectTicket(type, element) {

    selectedTicket = type;

    document
        .querySelectorAll('.ticket-option')
        .forEach(function (option) {

            option.classList.remove('selected');

        });


    element.classList.add('selected');

}




document
    .querySelectorAll('.seat')
    .forEach(function (seat) {


        seat.addEventListener('click', function () {


            // صندلی رزرو شده
            if (
                seat.classList.contains('reserved')
            ) {

                return;

            }


            // شماره صندلی
            const seatNumber =
                seat.textContent.trim();



         

            if (
                selectedSeats.includes(seatNumber)
            ) {

                selectedSeats =
                    selectedSeats.filter(
                        function (item) {

                            return item !== seatNumber;

                        }
                    );


                seat.classList.remove(
                    'selected'
                );


                updateSelectedSeats();

                return;

            }


            if (
                selectedSeats.length >=
                passengerCount
            ) {

                alert(
                    'شما باید فقط ' +
                    passengerCount +
                    ' صندلی انتخاب کنید.'
                );

                return;

            }



         

            selectedSeats.push(
                seatNumber
            );


            seat.classList.add(
                'selected'
            );


            updateSelectedSeats();

        });

    });




function updateSelectedSeats() {

    const element =
        document.getElementById(
            'selectedSeat'
        );


    if (
        selectedSeats.length === 0
    ) {

        element.textContent =
            'هنوز انتخاب نشده';

        return;

    }


    element.textContent =
        selectedSeats.join('، ');

}





function continueBooking() {


  

    if (
        selectedSeats.length !==
        passengerCount
    ) {

        alert(
            'لطفاً دقیقاً ' +
            passengerCount +
            ' صندلی انتخاب کنید.'
        );

        return;

    }



    let finalPrice =
        @json($price);


    if (
        selectedTicket === 'vip'
    ) {

        finalPrice =
            @json($vip_price);

    }



 
    const params =
        new URLSearchParams({

            flight_id:
                @json($flight_id),

            departure:
                @json($departure),

            from:
                @json($from),

            to:
                @json($to),

            passengers:
                passengerCount,

            airline:
                @json($airline),

            time:
                @json($time),

            arrival:
                @json($arrival),

            price:
                finalPrice,

            ticket_type:
                selectedTicket,

            seat:
                selectedSeats.join(',')

        });



    window.location.href =
        '/passenger?' +
        params.toString();

}

</script>


</body>

</html>

