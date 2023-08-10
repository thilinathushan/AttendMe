@extends('layouts.student.layout-student-dashboard')
<Style>
    .square {
        width: 100%;
        border: 5px solid var(--bs-primary);
    }
</Style>
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
                <button type="button" class="btn btn-light me-2 text-primary rounded-5 btn-lg">Scan
                    QR</button>
            </div>
        </div>
    </div>
</header>
<div class="container mx-auto col-11 col-sm-10 col-md-10 col-lg-8 col-xl-8 mt-4">
    <h5 class="text-secondary text-center mb-2 fw-bold">Welcome to AttendMe Online Portal</h5>
    <div class="row">
        <div class="square rounded-5 mx-auto my-auto">
            <div id="reader" width="100%"></div>
        </div>
    </div>

    <h5 class="text-secondary text-center mb-4 fw-bold">Focus to QR Code.</h5>
    <!-- <div class="mx-auto col-11 col-sm-10 col-md-10 col-lg-8 col-xl-8 ">
            <a class="btn btn-danger w-100 mb-5" href="">Stop Scan QR</a>
        </div> -->

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></Script>
<Script>
    const html5QrCode = new Html5Qrcode("reader");

    const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        console.log(decodedText);
        // Stop QR code scanning
        html5QrCode.stop();

        // Make an AJAX request to the server with the scanned data
        fetch('/scanned-data', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token here
                },
                body: JSON.stringify({
                    scannedData: decodedText
                })
            })
            .then(response => {
                console.log(response);
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('An error occurred while processing the scanned data. Server returned status: ' + response.status);
                }
            })
            .then(data => {
                if (data.success) {
                    // Redirect to the confirmation page
                    window.location.href = '/confirm-attendance';
                }
                if (data.fail) {
                    // Redirect to the confirmation page
                    window.location.href = '/student-dashboard';
                    console.log('OTP unverified');
                }
            })
            .catch(error => {
                console.error(error);
            });
    };

    const config = {
        fps: 10,
        qrbox: {
            width: 350,
            height: 350
        }
    };

    // // If you want to prefer front camera
    // html5QrCode.start({
    //     facingMode: "user"
    // }, config, qrCodeSuccessCallback);


    // If you want to prefer back camera
    html5QrCode.start({
        facingMode: "environment"
    }, config, qrCodeSuccessCallback);

    // Select front camera or fail with `OverconstrainedError`.
    html5QrCode.start({
        facingMode: {
            exact: "user"
        }
    }, config, qrCodeSuccessCallback);

    // Select back camera or fail with `OverconstrainedError`.
    html5QrCode.start({
        facingMode: {
            exact: "environment"
        }
    }, config, qrCodeSuccessCallback);
</Script>
@endsection