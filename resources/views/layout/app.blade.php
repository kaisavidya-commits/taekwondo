<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>

<!-- Favicon -->
 <link rel="icon" type="image/png" href="{{ asset('assets/images/andromeda.png') }}">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

@include('layout.style')

@stack('css')

</head>

<body>

@include('layout.sidebar')

<main class="main-content">

@include('layout.header')

<div class="container-fluid">
@yield('content')
</div>

@include('layout.footer')

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('js')

</body>
</html>