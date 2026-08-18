<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        مدیریت پروازها | سفرینو
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

            <a href="/admin">
                پنل مدیریت
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
        مدیریت پروازها ✈️
    </h2>

    <p>
        مشاهده و مدیریت پروازهای موجود در سفرینو
    </p>

</div>



{{-- پیام موفقیت --}}

@if(session('success'))

    <div
        style="
            background: #d1fae5;
            color: #065f46;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        "
    >

        ✅ {{ session('success') }}

    </div>

@endif



{{-- پیام خطا --}}

@if(session('error'))

    <div
        style="
            background: #fee2e2;
            color: #991b1b;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        "
    >

        ❌ {{ session('error') }}

    </div>

@endif



<div class="card">

<div class="card-body">



<div class="admin-page-header">

<div>

<h3>
    پروازهای موجود
</h3>

<p>
    مدیریت اطلاعات پروازها
</p>

</div>


<a
    href="{{ route('admin.flights.create') }}"
    class="search-btn"
>
    + افزودن پرواز
</a>


</div>



<div class="users-table-wrapper">

<table class="users-table">

<thead>

<tr>

<th>
#
</th>

<th>
شرکت هواپیمایی
</th>

<th>
شماره پرواز
</th>

<th>
مبدا
</th>

<th>
مقصد
</th>

<th>
تاریخ
</th>

<th>
حرکت
</th>

<th>
رسیدن
</th>

<th>
قیمت
</th>

<th>
قیمت VIP
</th>

<th>
ظرفیت
</th>

<th>
کلاس
</th>

<th>
وضعیت
</th>

<th class="actions-header">
عملیات
</th>

</tr>

</thead>


<tbody>

@forelse($flights as $flight)

<tr>

<td>
    {{ $flight->id }}
</td>


<td>

<strong>
    {{ $flight->airline }}
</strong>

</td>


<td>
    {{ $flight->flight_number }}
</td>


<td>
    {{ $flight->origin }}
</td>


<td>
    {{ $flight->destination }}
</td>

<td>
    {{ \App\Helpers\JalaliHelper::date($flight->flight_date) }}
</td>


<td>

    {{ $flight->departure_time
        ? \Carbon\Carbon::parse($flight->departure_time)->format('H:i')
        : '-'
    }}

</td>


<td>

    {{ $flight->arrival_time
        ? \Carbon\Carbon::parse($flight->arrival_time)->format('H:i')
        : '-'
    }}

</td>


<td>

    {{ $flight->price
        ? number_format($flight->price) . ' تومان'
        : '-'
    }}

</td>


<td>

    {{ $flight->vip_price
        ? number_format($flight->vip_price) . ' تومان'
        : '-'
    }}

</td>


<td>

    {{ $flight->available_seats ?? '-' }}

    /

    {{ $flight->capacity ?? '-' }}

</td>


<td>

@if($flight->flight_class === 'business')

    بیزنس

@else

    اکونومی

@endif

</td>


<td>

@if($flight->active)

    <span class="admin-status admin">
        فعال
    </span>

@else

    <span class="admin-status user">
        غیرفعال
    </span>

@endif

</td>


<td class="actions-cell">

<div class="user-actions">


<a
    href="{{ route('admin.flights.edit', $flight->id) }}"
    class="action-button edit-button"
    title="ویرایش پرواز"
>
    ✏️
</a>



<form
    action="{{ route('admin.flights.destroy', $flight->id) }}"
    method="POST"
    style="display:inline;"
    onsubmit="return confirm('آیا از حذف این پرواز مطمئن هستید؟');"
>

    @csrf

    @method('DELETE')

    <button
        type="submit"
        class="action-button delete-button"
        title="حذف پرواز"
    >
        🗑️
    </button>

</form>


</div>

</td>


</tr>
@empty


<tr>

<td
    colspan="14"
    style="text-align:center; padding:30px;"
>

    هیچ پروازی ثبت نشده است.

</td>

</tr>


@endforelse


</tbody>

</table>

</div>


</div>

</div>



<br>


<a
    href="/admin"
    class="search-btn"
>
    ← بازگشت به پنل مدیریت
</a>



</div>

</section>


</main>



<footer class="site-footer">

<div class="container">

<div class="copyright">

© ۱۴۰۵ سفرینو - مدیریت پروازها

</div>

</div>

</footer>



</body>

</html>

