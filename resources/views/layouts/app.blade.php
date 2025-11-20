<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- jQuery để sử dụng bootstrap-datepicker -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/header.css') }}"> --}}

    <!-- Add Font Awesome Frontend-->
    <script defer src="https://kit.fontawesome.com/231ad781b9.js" crossorigin="anonymous"></script>
    <script defer src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script defer src={{ asset('js/main.js') }}></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css"> --}}

    
    {{-- Icon --}}
    @if (!empty($favicon->src))
        <link rel="icon" type="image/x-icon"
            href="{{ asset('storage/' . str_replace('public/', '', $favicon->src)) }}" />
    @endif


    <title>Nhi Nguyen</title>
</head>

<body>
    @include('layouts.header')
    {{-- @yeild dai dien tai cho nay se la mot the content --}}
    @yield('content')
    @include('layouts.footer')
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- jQuery để sử dụng bootstrap-datepicker -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- Add Font Awesome Frontend-->
<script defer src="https://kit.fontawesome.com/231ad781b9.js" crossorigin="anonymous"></script>
<script defer src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script defer src={{ asset('js/main.js') }}></script>


</html>
