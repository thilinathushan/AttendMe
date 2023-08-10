@extends('layouts.auth.layout-login')

@section('body-content')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        const currentUrl = window.location.href;
        const url = new URL(currentUrl);
        const params = new URLSearchParams(url.search);
        const otpPin = params.get('otpPin');
        $('#otpPinInput').val(otpPin);

        // const confirm = 'verify/' + otpPin;
        // console.log('confirm URL: ' + confirm);
        // Get the initial active button
        var initialActiveButton = $('.nav-link.active');

        // Set the initial form action based on the active button and otpPin value
        var form = $('#formLogin');
        if (initialActiveButton.text().trim().toLowerCase() === 'lecturer') {
            form.attr('action', "{{ route('signinLec_form') }}");
        } else {
            if (otpPin == null) {
                form.attr('action', "{{ route('login.student') }}");
            }
            if (otpPin != null) {
                form.attr('action', "{{ route('loginConfirmAttendance.student') }}");
                console.log(form.attr('action'));
            }
        }

        // Event listener for button click
        $('.nav-link').click(function() {
            // Get the name of the selected button
            var selectedButtonName = $(this).text().trim().toLowerCase();

            // Update the form action based on the selected button and otpPin value
            if (selectedButtonName === 'lecturer') {
                form.attr('action', "{{ route('signinLec_form') }}");
            } else {
                if (otpPin == null) {
                    form.attr('action', "{{ route('login.student') }}");
                }
                if (otpPin != null) {
                    form.attr('action', "{{ route('loginConfirmAttendance.student') }}");
                    console.log(form.attr('action'));
                }
            }
        });
    });
</script>




<div class="container">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <img src="{{asset('resources/attend me logo.png')}}" alt="logo" class="mt-3 rounded mx-auto d-block" width="180" height="180">
    <div class="text-center mx-auto col-11">
        <h4 class="text-secondary">Welcome to AttendMe Online Portal</h4>
        <p class="fw-bold text-secondary">Please Sign In to Mark Attendance</p>
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

    <form id="formLogin" class="form-signin mt-5 mb-5 mx-auto col-11 col-sm-10 col-md-8 col-lg-6 col-xl-6 " method="POST">
        @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif
        @csrf
        <input type="hidden" name="otpPin" id="otpPinInput">
        <div class="form-floating mb-4">
            <input name="username" type="text" class="form-control" id="username" placeholder="Username" required autofocus>
            <label for="username">Username</label>
            <span class="text-danger">@error('username'){{$message}}@enderror</span>
        </div>
        <div class="form-floating mb-4">
            <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            <span class="text-danger">@error('password'){{$message}}@enderror</span>
        </div>
        <div class="block mt-2">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-end mt-2 mb-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </div>
        <button class="btn btn-primary w-100" type=" submit">Sign In</button>
    </form>

</div>

@endsection