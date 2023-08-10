@extends('layouts.student.layout-student-dashboard')


@section('body-content')

<header class="p-3 text-bg-primary text-white">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav">
                <li class="px-2">Subject :</li>
                <li class="px-2">Web Application Development</li>
            </ul>
            <ul class="nav ">
                <li class="px-2">Lecture Time :</li>
                <li class="px-2">8.00 A.M. - 10.00 A.M.</li>
            </ul>
            <div class="text-end">
                <a href="{{ route('scan.qr.code') }}" class="btn btn-light me-2 text-primary rounded-5 btn-lg">Scan
                    QR</a>
            </div>
        </div>
    </div>
</header>

<div class="container mx-auto col-11 col-sm-10 col-md-10 col-lg-8 col-xl-8 mt-4">
    <h5 class="text-secondary text-center mb-2 fw-bold">Welcome to AttendMe Online Portal</h5>

    <img src="{{ asset('resources/attend me logo.png') }}" alt="logo" class="mx-auto d-block" width="400px" height="400px">
    <h5 class="text-secondary text-center mb-4 fw-bold">Focus to QR Code.</h5>
    <div class="mx-auto col-11 col-sm-10 col-md-10 col-lg-8 col-xl-8 ">
        <a class="btn btn-primary w-100 mb-5" href="{{ route('scan.qr.code') }}">Scan QR</a>
    </div>

</div>
@endsection


