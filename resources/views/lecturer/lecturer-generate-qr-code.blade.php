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
                <a href="{{ route('generate.qr') }}" class="btn btn-light me-2 text-primary rounded-5 btn-lg">Generate
                    QR</a>
            </div>
        </div>
    </div>
</header>

<div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
    <h5 class="text-secondary text-center mb-4 fw-bold">Welcome to AttendMe Online Portal</h5>


    <?php
    $prefix = 'http://thilina.pagekite.me/login/?otpPin=';

    $prefix1 = 'http://127.0.0.1:8000/login?otpPin=';
    $pin = $otpPin;
    $url = $prefix1 . '' . $pin;
    ?>


    <div class="visible-print text-center mx-auto d-block" width="400px" height="400px">

        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(400)->generate($url)) !!} ">
        <h5 class="text-secondary text-center mb-4 fw-bold">QR will be changed in <span id="counter"></span> seconds.</h5>

    </div>

    <div class="mx-auto col-11 col-sm-10 col-md-10 col-lg-8 col-xl-8 ">
        <a id="generateBtn" href="{{ route('generate.qr') }}" class="btngenerate btn btn-primary w-100 mb-5 ">Generate QR</a>
        <a id="stopBtn" href="{{ route('delete.all.records') }}" class="btn btn-danger w-100 mb-5 ">Stop</a>
    </div>
</div>

<script>
    var stopVal = localStorage.getItem('isStop');

    document.addEventListener('DOMContentLoaded', () => {
        if (JSON.parse(stopVal) == false) {
            var btnGen = document.getElementById("generateBtn");
            var btnStp = document.getElementById("stopBtn");
            btnStp.classList.remove("d-none");
            btnGen.classList.add("d-none");
            console.log('stopVal == false');
        } else if (JSON.parse(stopVal) == true) {
            var btnGen = document.getElementById("generateBtn");
            var btnStp = document.getElementById("stopBtn");
            btnStp.classList.add("d-none");
            btnGen.classList.remove("d-none");
            console.log('stopVal == true');
        } else if (JSON.parse(stopVal) == null) {
            var btnGen = document.getElementById("generateBtn");
            var btnStp = document.getElementById("stopBtn");
            btnStp.classList.remove("d-none");
            btnGen.classList.add("d-none");
            console.log('stopVal == null');
        }
    });
    // console.log('FC1 ', stopVal);
    if (stopVal == null) {
        localStorage.setItem('isStop', false);
    }
    document.getElementById('stopBtn').addEventListener('click', () => {
        localStorage.setItem('isStop', true);
    });
    document.getElementById('generateBtn').addEventListener('click', () => {
        localStorage.setItem('isStop', false);
    });
    console.log('FC2 ', stopVal);
    if (JSON.parse(stopVal) == false || JSON.parse(stopVal) == null) {
        setInterval(function() {
            location.reload();
            console.log("setInterval INSIDE");
        }, 30000);
        // console.log("setInterval");
    } else {
        // console.log('FC3 ', stopVal);
    }


    const counterElement = document.getElementById("counter");

    let count = 30;

    function updateCounter() {
        counterElement.textContent = count;

        // Check if the count has reached zero
        if (count === 0) {
            clearInterval(timer); // Stop the timer
            counterElement.textContent = "0";
        } else {
            count--; // Decrement the count
        }
    }

    // Call the updateCounter function initially to display the starting count
    updateCounter();

    // Start the timer to update the counter every second
    const timer = setInterval(updateCounter, 1000);
</script>
@endsection