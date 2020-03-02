<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<style>

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 110%;
    }
</style>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    @include('dashboard.partials.head')

    <style>
    </style>
</head>
<body>
<div class="container-fluid">

    @yield('content')
</div>
</body>
@include('dashboard.partials.js')
</html>
