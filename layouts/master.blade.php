<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('template/includes/header')
</head>
<body>
    @yield('content')
    @include('template/includes/footer')
</body>
</html>