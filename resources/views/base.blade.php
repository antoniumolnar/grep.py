@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grep.py Code Test</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
@section('content')
<div class="container">
    @yield('main')
</div>
@endsection
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
