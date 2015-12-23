<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Flair Books Center</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    
    <!-- Styles -->
    <link rel="stylesheet" href="css/all.css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    @yield('styles.header')
</head>
<body id="app-layout" class="header-fixed">
    <div class="wraper">
        @include('partials.header')
        @yield('slider')
        <div class="container content-md">
            @yield('content')
        </div>
        @yield('services')
        @include('partials.subscribe')
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="js/all.js"></script>
    @yield('scripts.footer')
</body>
</html>
