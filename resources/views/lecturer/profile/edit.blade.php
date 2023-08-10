@extends('layouts.lecturer.layout-lecturer-dashboard')

@section('body-content')



<header class="p-2 text-bg-primary text-white ">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="p-3 d-flex justify-content-center align-items-center">
            <ul class="nav">
                <h4>Lecturer Registration</h4>
            </ul>
        </div>
</header>

<div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
    <div class="wrapper rounded bg-white">

        @include('lecturer.profile.partials.update-lecturer-information-form')

    </div>

</div>

@endsection