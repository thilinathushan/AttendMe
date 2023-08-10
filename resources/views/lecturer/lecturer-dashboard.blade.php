@extends('layouts.lecturer.layout-lecturer-dashboard')

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
                <a href="{{ route('show.qr') }}" class="btn btn-light me-2 text-primary rounded-5 btn-lg">Generate
                    QR</a>
            </div>
        </div>
    </div>
</header>

<div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
    @if(session('status'))
    <div class="mx-4 alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('status') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h4 class="text-secondary text-center mb-4">Dashboard</h3>
        <div class="row mb-4">
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <h5 class="text-secondary justify-content-center d-flex flex-nowrap">Daily Attendance</h5>
                <img src="{{asset('resources/analysis img.PNG')}}" class="w-100" />
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <h5 class="text-secondary justify-content-center d-flex flex-nowrap">Weekly Attendance</h5>
                <img src="{{asset('resources/analysis img.PNG')}}" class="w-100" />
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <h5 class="text-secondary justify-content-center d-flex flex-nowrap">Monthly Attendance</h5>
                <img src="{{asset('resources/analysis img.PNG')}}" class="w-100" />
            </div>
        </div>
</div>
@endsection