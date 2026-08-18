<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        انتخاب کوپه و صندلی | سفرینو
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
        انتخاب کوپه و صندلی 🚆
    </h2>

    <p>
        به تعداد مسافران صندلی انتخاب کنید.
    </p>

</div>



<div class="card train-summary">

<div class="card-body">

    <p>
        مسیر:
        <strong>
            {{ $from }}
            →
            {{ $to }}
        </strong>
    </p>


    <p>
        قطار:
        <strong>
            {{ $train->name }}
        </strong>
    </p>


    <p>
        شرکت ریلی:
        {{ $train->company }}
    </p>


    <p>
        نوع واگن:
        {{ $train->wagon }}
    </p>


    <p>
        نوع بلیط:
        <strong>
            {{ $ticket_type }}
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



<div class="seat-legend">

    <span class="legend-free">
        آزاد
    </span>

    <span class="legend-reserved">
        رزرو شده
    </span>

    <span class="legend-selected">
        انتخاب شده
    </span>


    @if ($ticket_type === 'VIP')

        <span class="legend-vip">
            VIP
        </span>

    @endif

</div>



<form
    action="/passenger"
    method="GET"
    id="seat-form"
>


<input
    type="hidden"
    name="train_id"
    value="{{ $train->id }}"
>


<input
    type="hidden"
    name="from"
    value="{{ $from }}"
>


<input
    type="hidden"
    name="to"
    value="{{ $to }}"
>


<input
    type="hidden"
    name="departure"
    value="{{ $departure }}"
>


<input
    type="hidden"
    name="passengers"
    value="{{ $passengers }}"
>


<input
    type="hidden"
    name="ticket_type"
    value="{{ $ticket_type }}"
>


<input
    type="hidden"
    name="train_name"
    value="{{ $train->name }}"
>


<input
    type="hidden"
    name="company"
    value="{{ $train->company }}"
>


<input
    type="hidden"
    name="wagon"
    value="{{ $train->wagon }}"
>


<input
    type="hidden"
    name="time"
    value="{{ $train->departure_time }}"
>


<input
    type="hidden"
    name="arrival"
    value="{{ $train->arrival_time }}"
>


<input
    type="hidden"
    name="price"
    value="{{ $train->price }}"
>


{{-- صندلی‌های انتخاب‌شده در این فیلد ذخیره می‌شوند --}}

<input
    type="hidden"
    name="seat"
    id="selected-seats"
    value=""
>



<div class="coach-list">


@foreach ($coaches as $coach)


<div
    class="coach-card"
    id="coach-{{ $coach['id'] }}"
>


<button
    type="button"
    class="coach-button"
    onclick="toggleCoach('{{ $coach['id'] }}')"
>

<div class="coach-content">

<div>

<div class="coach-name">

    کوپه
    {{ $coach['id'] }}

</div>


<div class="coach-info">

    {{ $coach['type'] }}

    •

    {{ $coach['free_seats'] }}

    صندلی آزاد

</div>

</div>


<span class="coach-arrow">
    ▼
</span>

</div>

</button>
<div class="coach-seats">

<h3>

    صندلی‌های کوپه
    {{ $coach['id'] }}

</h3>



<div class="seat-grid">


@foreach ($coach['seats'] as $seat)


@if ($seat['reserved'])


<div class="seat seat-reserved">

    <span>
        رزرو شده
    </span>

    <strong>
        {{ $seat['number'] }}
    </strong>

</div>


@else


<div
    class="seat
    {{ $ticket_type === 'VIP' ? 'seat-vip' : '' }}"
>

<input
    type="checkbox"
    class="seat-checkbox"
    id="seat-{{ $coach['id'] }}-{{ $seat['number'] }}"
    value="{{ $coach['id'] }}-{{ $seat['number'] }}"
    onchange="selectSeat(this)"
>


<label
    for="seat-{{ $coach['id'] }}-{{ $seat['number'] }}"
>

    <span>
        صندلی
    </span>

    <strong>
        {{ $seat['number'] }}
    </strong>

</label>

</div>


@endif


@endforeach


</div>

</div>

</div>


@endforeach


</div>



<div class="selected-seat-box">

<p id="selected-seat-text">

    هنوز صندلی انتخاب نشده است.

</p>

</div>



<button
    type="submit"
    class="search-btn continue-button"
>

    تأیید صندلی و ادامه رزرو

</button>


</form>


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

const passengerCount =
    parseInt(@json($passengers), 10) || 1;


let selectedSeats = [];



function toggleCoach(coachId) {

    const currentCoach =
        document.getElementById('coach-' + coachId);

    const allCoaches =
        document.querySelectorAll('.coach-card');


    allCoaches.forEach(function (coach) {

        if (coach !== currentCoach) {

            coach.classList.remove('open');

        }

    });


    currentCoach.classList.toggle('open');

}



function selectSeat(checkbox) {

    const seat =
        checkbox.value;


    if (checkbox.checked) {

        /*
        اگر تعداد صندلی‌ها به تعداد مسافران رسیده باشد
        اجازه انتخاب صندلی بیشتر نمی‌دهیم.
        */

        if (selectedSeats.length >= passengerCount) {

            checkbox.checked = false;

            alert(
                'برای ' +
                passengerCount +
                ' مسافر فقط می‌توانید ' +
                passengerCount +
                ' صندلی انتخاب کنید.'
            );

            return;

        }


        selectedSeats.push(seat);

    } else {

        selectedSeats =
            selectedSeats.filter(function (item) {

                return item !== seat;

            });

    }


    updateSelectedSeats();

}



function updateSelectedSeats() {

    const hiddenInput =
        document.getElementById('selected-seats');


    const text =
        document.getElementById('selected-seat-text');


    /*
    صندلی‌ها را به صورت:
    1-1,1-2,2-3
    داخل hidden input قرار می‌دهیم.
    */

    hiddenInput.value =
        selectedSeats.join(',');


    if (selectedSeats.length === 0) {

        text.innerText =
            'هنوز صندلی انتخاب نشده است.';

        return;

    }


    text.innerText =
        'صندلی‌های انتخاب‌شده: ' +
        selectedSeats.join(' ، ');

}



document
    .getElementById('seat-form')
    .addEventListener('submit', function (event) {


        if (
            selectedSeats.length !== passengerCount
        ) {

            event.preventDefault();


            alert(
                'لطفاً دقیقاً ' +
                passengerCount +
                ' صندلی برای ' +
                passengerCount +
                ' مسافر انتخاب کنید.'
            );


            return false;

        }


        return true;

    });

</script>


</body>

</html>

