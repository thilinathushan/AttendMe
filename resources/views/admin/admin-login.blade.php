@extends('layouts.auth.layout-login')

@section('body-content')


<div class="container">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <img src="{{asset('resources/attend me logo.png')}}" alt="logo" class="mt-3 rounded mx-auto d-block" width="180" height="180">
    <div class="text-center mx-auto col-11">
        <h4 class="text-secondary">Welcome to AttendMe Online Portal</h4>
        <p class="fw-bold text-secondary">Please Sign In to Mark Attendance</p>
    </div>

    <div class="text-center">
        <div class=" mt-4 mx-auto col-11 col-sm-10 col-md-8 col-lg-6 col-xl-6 bg-primary text-white rounded-5 p-2">
            Administrator
        </div>


    </div>

    <form class="form-signin mt-5 mb-5 mx-auto col-11 col-sm-10 col-md-8 col-lg-6 col-xl-6 " method="POST" action="{{ route('signinAdmin') }}">
        @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif
        @csrf
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