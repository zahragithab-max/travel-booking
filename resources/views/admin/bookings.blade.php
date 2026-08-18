<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
مدیریت رزروها | سفرینو
</title>


<link
rel="stylesheet"
href="/css/app.css"
/>

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
مدیریت رزروها 🎫
</h2>


<p>
مشاهده رزروهای ثبت‌شده در سفرینو
</p>


</div>





<div class="card">


<div class="card-body">



<div class="admin-page-header">


<div>


<h3>
لیست رزروها
</h3>


<p>
تعداد رزروها:
<strong>
{{ $bookings->count() }}
</strong>
</p>


</div>


</div>





<div class="users-table-wrapper">


<table class="users-table">


<thead>


<tr>


<th>
#
</th>


<th>
شماره رزرو
</th>


<th>
وضعیت
</th>


<th>
تاریخ ثبت
</th>


<th class="actions-header">
عملیات
</th>


</tr>


</thead>




<tbody>


@forelse ($bookings as $booking)


<tr>


<td>
{{ $booking->id }}
</td>



<td>

<strong>
رزرو #{{ $booking->id }}
</strong>

</td>




<td>

<span class="admin-status user">
ثبت شده
</span>


</td>




<td>

{{ $booking->created_at?->format('Y/m/d') }}

</td>




<td class="actions-cell">


<div class="user-actions">

    <a
        href="{{ route('admin.bookings.show', $booking->id) }}"
        class="action-button"
        title="مشاهده جزئیات"
    >
        👤
    </a>

    <form
        action="{{ route('admin.bookings.delete', $booking->id) }}"
        method="POST"
        style="display:inline;"
        onsubmit="return confirm('آیا از حذف این رزرو مطمئن هستید؟');"
    >

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="action-button delete-button"
            title="حذف رزرو"
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
colspan="5"
class="empty-users"
>

هنوز هیچ رزروی ثبت نشده است.

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

© ۱۴۰۵ سفرینو - مدیریت رزروها

</div>


</div>


</footer>



</body>

</html>

