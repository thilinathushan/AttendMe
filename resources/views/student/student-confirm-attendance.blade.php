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

        </div>
    </div>
</header>

<div class="container mx-auto col-11 col-sm-10 col-md-10 col-lg-8 col-xl-8 mt-4">
    <h5 class="text-secondary text-center mb-2 fw-bold">Confirm to Mark the Attendance.</h5>

    @if (session('varified'))
    <div>
        OTP Varified: {{ session('varified') }}
    </div>
    @endif

    <div class="wrapper rounded">
        <form method="get" action="">
            @csrf
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Student Details:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Name:
                            </td>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        </tr>
                        <tr>
                            <td>
                                Index:
                            </td>
                            <td>{{ $student->username }}</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Lecture Details:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Module:
                            </td>
                            <td>Web application Development</td>
                        </tr>
                        <tr>
                            <td>
                                Module ID:
                            </td>
                            <td>ITC2223</td>
                        </tr>
                        <tr>
                            <td>
                                Lecturer:
                            </td>
                            <td>Chamila Karunathilaka</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Date: {{ now()->format('Y-m-d') }}</th>
                            <th>Time: {{ now()->format('H:i:s') }}</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </form>



    </div>

    <script>
        $('#example').DataTable();
    </script>

    <h5 class="text-secondary text-center mb-4 fw-bold">Confirm to Mark the Attendance.</h5>
    <div class="mx-auto col-11 col-sm-10 col-md-10 col-lg-8 col-xl-8 ">
        <a class="btn btn-primary w-100 mb-5" href="{{ route('save.attendance', ['id' => $student->id])}}">Confirm</a>
    </div>

</div>
@endsection