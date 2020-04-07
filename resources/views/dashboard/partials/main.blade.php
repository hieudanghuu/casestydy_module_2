<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Dashboard</title>
    @include('dashboard.partials.head')
</head>
<body>
@include('dashboard.partials.header')
<div class="container-fluid">
    @yield('content')
</div>
</body>
@include('dashboard.partials.js')
</html>
