@extends('layouts.auth.layout-registration')

@section('body-content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Get the initial active button
        var initialActiveButton = $('.nav-link.active');

        // Set the initial form action based on the active button
        var form = $('#formReg');
        if (initialActiveButton.text().trim().toLowerCase() === 'lecturer') {
            form.attr('action', '/register/lecturer');
        } else {
            form.attr('action', '/register/student');
        }

        // Event listener for button click
        $('.nav-link').click(function() {
            // Get the name of the selected button
            var selectedButtonName = $(this).text().trim().toLowerCase();

            // Update the form action based on the selected button
            if (selectedButtonName === 'lecturer') {
                form.attr('action', '/register/lecturer');
            } else {
                form.attr('action', '/register/student');
            }
        });
    });
</script>

<div class="container">
    <img src="{{asset('resources/attend me logo.png')}}" alt="logo" class="mt-3 rounded mx-auto d-block" width="180" height="180">
    <div class="text-center mx-auto col-11">
        <h4 class="text-secondary">Welcome to AttendMe Online Portal</h4>
        <p class="fw-bold text-secondary">Please Sign Up to Access AttendMe</p>
    </div>

    <div class="text-center">
        <div class=" mt-4 mx-auto col-11 col-sm-10 col-md-8 col-lg-6 col-xl-6" role="group" aria-label="Basic example">
            <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-5" id="student-tab" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Student</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="lecturer-tab" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Lecturer</button>
                </li>
            </ul>
        </div>
    </div>

    <form id="formReg" class="form-signin mt-5 mb-5 mx-auto col-11 col-sm-10 col-md-8 col-lg-6 col-xl-6 " method="POST">
        @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif
        @csrf
        <div class="form-floating mb-4">
            <input name="fname" type="text" class="form-control" id="fname" placeholder="Firstname" required autofocus>
            <label for="fname">First name</label>
        </div>
        <div class="form-floating mb-4">
            <input name="lname" type="text" class="form-control" id="lname" placeholder="Lastname" required>
            <label for="lname">Last name</label>
        </div>
        <div class="form-floating mb-4">
            <input name="username" type="text" class="form-control" id="username" placeholder="Username" required>
            <label for="username">Username</label>
            <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />
        </div>
        <div class="form-floating mb-4">
            <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>
        <div class="form-floating mb-4">
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
            <label for="password_confirmation">Confirm Password</label>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
        </div>
        <div class="flex items-center justify-end mb-2">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>

        <button class="btn btn-primary w-100" type="submit">Sign Up</button>
    </form>

</div>

@endsection