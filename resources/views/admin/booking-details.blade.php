<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        جزئیات رزرو | سفرینو
    </title>

    <link
        rel="stylesheet"
        href="/css/app.css"
    >

</head>


<body>


<header class="site-header">

    <div class="container navbar">

        <a href="/" class="logo">
            سفرینو ✈
        </a>

        <nav class="nav-links">

            <a href="/admin">
                پنل مدیریت
            </a>

            <a href="/admin/bookings">
                مدیریت رزروها
            </a>

            <a href="/">
                سایت اصلی
            </a>

        </nav>

    </div>

</header>



<main>

<section class="section">

<div class="container">


<div class="section-title">

    <h2>
        جزئیات رزرو 🎫
    </h2>

    <p>
        اطلاعات کامل رزرو شماره {{ $booking->id }}
    </p>

</div>



<div class="card">

<div class="card-body">


<h3>
    👤 اطلاعات مسافر
</h3>


<p>
    نام:
    <strong>
        {{ $booking->first_name }}
    </strong>
</p>


<p>
    نام خانوادگی:
    <strong>
        {{ $booking->last_name }}
    </strong>
</p>


@if($booking->national_code)

<p>
    کد ملی:
    <strong>
        {{ $booking->national_code }}
    </strong>
</p>

@endif


@if($booking->mobile)

<p>
    شماره موبایل:
    <strong>
        {{ $booking->mobile }}
    </strong>
</p>

@endif


</div>

</div>



<br>



<div class="card">

<div class="card-body">


<h3>

    @if($booking->train_id)
        🚆 اطلاعات قطار
    @else
        ✈️ اطلاعات پرواز
    @endif

</h3>


<p>
    شماره رزرو:
    <strong>
        #{{ $booking->id }}
    </strong>
</p>


<p>
    مسیر:
    <strong>
        {{ $booking->from }}
        →
        {{ $booking->to }}
    </strong>
</p>


<p>

    @if($booking->train_id)
        شرکت ریلی:
    @else
        شرکت هواپیمایی:
    @endif

    <strong>
        {{ $booking->airline }}
    </strong>

</p>


@if($booking->departure)

<p>
    تاریخ حرکت:
    <strong>
        {{ $booking->departure }}
    </strong>
</p>

@endif


@if($booking->return_date)

<p>
    تاریخ برگشت:
    <strong>
        {{ $booking->return_date }}
    </strong>
</p>

@endif


@if($booking->time)

<p>
    ساعت حرکت:
    <strong>
        {{ $booking->time }}
    </strong>
</p>

@endif


@if($booking->arrival)

<p>
    ساعت رسیدن:
    <strong>
        {{ $booking->arrival }}
    </strong>
</p>

@endif


@if($booking->passengers)

<p>
    تعداد مسافر:
    <strong>
        {{ $booking->passengers }}
        نفر
    </strong>
</p>

@endif


@if($booking->ticket_type)

<p>
    نوع بلیط:

    <strong>

        @if($booking->ticket_type === 'vip' || $booking->ticket_type === 'VIP')
            👑 VIP
        @else
            🎫 ساده
        @endif

    </strong>

</p>

@endif


@if($booking->seat)

<p>
    صندلی:
    <strong>
        {{ $booking->seat }}
    </strong>
</p>

@endif


</div>

</div>



<br>



<div class="card">

<div class="card-body">


<h3>
    💰 اطلاعات پرداخت
</h3>


<p>
    مبلغ پرداختی:
</p>


<div class="price">

    {{ number_format((int) $booking->price) }}

    تومان

</div>


<br>


<p>
    کد رهگیری:
    <strong>
        {{ $booking->tracking_code }}
    </strong>
</p>


<p>
    وضعیت:

    <span class="admin-status user">
        ثبت شده
    </span>

</p>


<p>
    تاریخ ثبت:

    <strong>
        {{ $booking->created_at?->format('Y/m/d H:i') }}
    </strong>

</p>


</div>

</div>



<br>



<div style="display:flex; gap:10px; flex-wrap:wrap;">


<a
    href="/admin/bookings"
    class="search-btn"
>
    ← بازگشت به لیست رزروها
</a>



<form
    action="{{ route('admin.bookings.delete', $booking->id) }}"
    method="POST"
    onsubmit="return confirm('آیا از حذف این رزرو مطمئن هستید؟');"
>

    @csrf

    @method('DELETE')

    <button
        type="submit"
        class="search-btn"
    >
        🗑️ حذف رزرو
    </button>

</form>


</div>


</div>

</section>

</main>



<footer class="site-footer">

<div class="container">
<div class="copyright">

© ۱۴۰۵ سفرینو - مدیریت رزروها

</div>

</div>

</footer>


</body>

</html>

