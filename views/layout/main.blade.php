<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Internship</title>
        <link rel="stylesheet" href="{{styleUrl('main.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">



        @yield('additional-css')
        @section('additional-css')
        @endsection
    </head>
    <body>
    @include('layout.header')
    @yield('content')
    @include('layout.footer')

    <script src="{{scriptUrl('jquery-3.4.1.js')}}"></script>
    <script src="{{scriptUrl('main.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>
    @yield('additional-scripts')
    </body>
</html>
