<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        مدیریت قطارها | سفرینو
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
            سفرینو 🚆
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


@if (session('success'))

    <div
        id="success-message"
        class="success-message"
    >
        ✅ {{ session('success') }}
    </div>

@endif



<div class="section-title">

    <h2>
        مدیریت قطارها 🚆
    </h2>

    <p>
        مشاهده و مدیریت قطارهای سفرینو
    </p>

</div>



<div class="card">

<div class="card-body">


<div class="admin-page-header">

    <div>

        <h3>
            لیست قطارها
        </h3>

        <p>
            تعداد قطارها:
            <strong>
                {{ $trains->count() }}
            </strong>
        </p>

    </div>


    <a
        href="{{ route('admin.trains.create') }}"
        class="search-btn"
    >
        + افزودن قطار
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
        نام قطار
    </th>

    <th>
        شرکت ریلی
    </th>

    <th>
        نوع واگن
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


@forelse ($trains as $train)


<tr>


<td>
    {{ $train->id }}
</td>



<td>

    <strong>
        {{ $train->name }}
    </strong>

</td>



<td>
    {{ $train->company }}
</td>



<td>
    {{ $train->wagon }}
</td>



<td>


@if ($train->is_active)

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


{{-- ویرایش --}}

<a
    href="{{ url('/admin/trains/' . $train->id . '/edit') }}"
    class="action-button edit-button"
    title="ویرایش قطار"
>
    ✏️
</a>



{{-- حذف --}}

<form
    action="{{ url('/admin/trains/' . $train->id) }}"
    method="POST"
    class="delete-form"
    onsubmit="return confirm('آیا از حذف این قطار مطمئن هستید؟');"
>

    @csrf

    @method('DELETE')

    <button
        type="submit"
        class="action-button delete-button"
        title="حذف قطار"
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
        colspan="6"
        class="empty-users"
    >
        هنوز هیچ قطاری ثبت نشده است.
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

© ۱۴۰۵ سفرینو - مدیریت قطارها

</div>

</div>

</footer>



<script>

const successMessage =
    document.getElementById('success-message');

if (successMessage) {

    setTimeout(() => {

        successMessage.style.opacity = '0';

        setTimeout(() => {

            successMessage.remove();

        }, 500);

    }, 3000);

}

</script>


</body>

</html>

