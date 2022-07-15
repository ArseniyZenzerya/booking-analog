<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/css/application.css">
    <title>Booking.com</title>
</head>
<body>

@yield('header')
@yield('header-extra-info')
@yield('content')
@yield('footer')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/appMaps.js') }}"></script>
<script src="{{ asset('js/appVue.js') }}"></script>

</body>
</html>
