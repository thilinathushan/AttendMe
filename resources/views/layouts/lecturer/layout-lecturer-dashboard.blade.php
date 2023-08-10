<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin resources/assets/images/favicon.png')}}">
    @include('libraries.styles')
    <title>Lecturer | Dashboard</title>

</head>

<body>
    @include('layouts.lecturer.layout-lecturer-nav')
    @yield('body-content')
    @include('libraries.script')
</body>

</html>