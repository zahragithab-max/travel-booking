<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
ویرایش کاربر | سفرینو
</title>

<link rel="stylesheet" href="/css/app.css">

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

<a href="/admin/users">
کاربران
</a>

</nav>

</div>

</header>



<main>

<section class="section">

<div class="container">


<div class="section-title">

<h2>
ویرایش کاربر ✏️
</h2>

<p>
تغییر اطلاعات کاربر
</p>

</div>



<div class="card">

<div class="card-body">


<form
method="POST"
action="/admin/users/{{ $user->id }}"
>


@csrf

@method('PUT')



<label>
نام کاربر
</label>

<input
type="text"
name="name"
value="{{ $user->name }}"
class="admin-form-control"
>



<br>



<label>
ایمیل
</label>

<input
type="email"
name="email"
value="{{ $user->email }}"
class="admin-form-control"
>



<br>



<label>
وضعیت مدیر
</label>


<select
name="is_admin"
class="admin-form-control"
>

<option
value="0"
{{ !$user->is_admin ? 'selected' : '' }}
>
کاربر عادی
</option>


<option
value="1"
{{ $user->is_admin ? 'selected' : '' }}
>
مدیر
</option>


</select>



<br><br>



<button
type="submit"
class="search-btn"
>
ذخیره تغییرات
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

© ۱۴۰۵ سفرینو - ویرایش کاربر

</div>

</div>

</footer>



</body>

</html>

