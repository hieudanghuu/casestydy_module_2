<!doctype html>
<html lang="en">
<head>
    @include('BanSim.catalog.partials.head')
</head>
<body>
@include('BanSim.catalog.partials.header')

<div class="container">
    @yield('main')
</div>

@include('BanSim.catalog.partials.footer')
@include('BanSim.catalog.partials.js')
</body>
</html>
