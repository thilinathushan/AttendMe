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
    <h4 class="text-secondary text-center mb-4">Timeatable</h4>
    <form method="post" action="">
        @csrf

        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <select name="D_name" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected>Select Module</option>
                        @foreach ($module as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </div>

    </form>

</div>
@endsection