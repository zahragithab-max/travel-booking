<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
مدیریت کاربران | سفرینو
</title>

<link rel="stylesheet" href="/css/app.css">

</head>

<script>

function confirmDelete(userName)
{
    return confirm(
        '⚠️ حذف کاربر\n\n' +
        'آیا مطمئن هستید که می‌خواهید کاربر «' +
        userName +
        '» را حذف کنید؟\n\n' +
        'این عملیات قابل بازگشت نیست.'
    );
}

</script>


<body>


@if(session('success'))

<div class="toast-message" id="toastMessage">

    ✅ {{ session('success') }}

</div>

@endif



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
مدیریت کاربران 👤
</h2>


<p>
مشاهده کاربران ثبت‌نام‌شده در سفرینو
</p>


</div>




<div class="card">

<div class="card-body">



<div class="admin-page-header">

<div>

<h3>
لیست کاربران
</h3>


<p>

تعداد کاربران:

<strong>
{{ $users->count() }}
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
نام
</th>


<th>
ایمیل
</th>


<th>
وضعیت
</th>


<th>
تاریخ عضویت
</th>


<th class="actions-header">
عملیات
</th>


</tr>


</thead>




<tbody>


@forelse ($users as $user)


<tr>


<td>
{{ $user->id }}
</td>



<td>

<strong>
{{ $user->name }}
</strong>

</td>



<td>
{{ $user->email }}
</td>




<td>


@if($user->is_admin)


<span class="admin-status admin">
👑 مدیر
</span>


@else


<span class="admin-status user">
👤 کاربر
</span>


@endif


</td>




<td>

{{ $user->created_at?->format('Y/m/d') }}

</td>





<td class="actions-cell">


<div class="user-actions">



<a
href="/admin/users/{{ $user->id }}/edit"
class="action-button edit-button"
title="ویرایش کاربر"
>

✏️

</a>



<form
    action="/admin/users/{{ $user->id }}"
    method="POST"
    class="delete-user-form"
    onsubmit="return confirmDelete('{{ $user->name }}')"
>

    @csrf

    @method('DELETE')

    <button
        type="submit"
        class="action-button delete-button"
        title="حذف کاربر"
    >
        🗑️
    </button>

</form>


</div>


</td>



</tr>



@empty


<tr>


<td colspan="6" class="empty-users">

هنوز کاربری ثبت‌نام نکرده است.

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

© ۱۴۰۵ سفرینو - مدیریت کاربران

</div>


</div>


</footer>






<script>


setTimeout(function(){


let toast = document.getElementById('toastMessage');


if(toast){


toast.classList.add('hide');


setTimeout(function(){


toast.remove();


},500);


}


},3000);



</script>




</body>

</html>

