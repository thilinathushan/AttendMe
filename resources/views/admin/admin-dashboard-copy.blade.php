@extends('layouts.admin.layout-admin-dashboard')

@section('body-content')
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

    @include('layouts.admin.layout-admin-topbar')
    @include('layouts.admin.layout-admin-sidebar')


    <!-- Page wrapper  -->
    <div class="page-wrapper">
        @include('layouts.admin.layout-admin-middlebar')
        <!-- Container fluid  -->
        <div class="container-fluid">
            @if(session('status'))
            <div class="mx-4 alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div id="content-wrapper">
                <div class="row mx-auto mt-4">
                    <div class="col-6 col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card bg-primary p-2">
                            <div class="card-body">
                                <h5 class="card-title text-white">Badges<span class="badge-count" style="float: right;">{{ session('badges') }}</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card bg-success p-2">
                            <div class="card-body">
                                <h5 class="card-title text-white">Departments <span class="department-count" style="float: right;">{{ session('departments') }}</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card bg-danger p-2">
                            <div class="card-body">
                                <h5 class="card-title text-white">Modules <span class="module-count" style="float: right;">{{ session('modules') }}</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card bg-warning p-2">
                            <div class="card-body">
                                <h5 class="card-title text-white">Lecturers <span class="lecturer-count" style="float: right;">{{ session('lecturers') }}</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card bg-info  p-2">
                            <div class="card-body">
                                <h5 class="card-title text-white">Students <span class="student-count" style="float: right;">{{ session('students') }}</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card bg-secondary p-2">
                            <div class="card-body">
                                <h5 class="card-title text-white">Lectures <span style="float: right;">10</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- End Container fluid  -->

        <!-- footer -->
        <footer class="footer text-bg-primary text-center py-3 ">
            All Rights Reserved by AttendMe. Designed and Developed by AttendMe.
        </footer>
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
@endsection



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Attach click event listener to 'a' tags in the sidebar using event delegation
        $('.sidebar').on('click', 'a.menu', function(e) {
            e.preventDefault(); // Prevent the default link behavior

            // Get the href attribute of the clicked 'a' tag
            var url = $(this).attr('href');

            // Make an AJAX request to retrieve the view content
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Replace the content of the 'content-wrapper' div with the retrieved view
                    $('#content-wrapper').html(response);
                    // INSERT GOOGLE CHART FUNCTION CALLS
                    drawChart();
                },
                error: function() {
                    alert('Error occurred while loading the view.');
                }
            });
        });

        $('.navbar-collapse').on('click', 'a.menu', function(e) {
            e.preventDefault(); // Prevent the default link behavior

            // Get the href attribute of the clicked 'a' tag
            var url = $(this).attr('href');

            // Make an AJAX request to retrieve the view content
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Replace the content of the 'content-wrapper' div with the retrieved view
                    $('#content-wrapper').html(response);
                    // INSERT GOOGLE CHART FUNCTION CALLS
                    drawChart();
                },
                error: function() {
                    alert('Error occurred while loading the view.');
                }
            });
        });
    });

    function updateCounts() {
        $.ajax({
            url: '{{ route("get.counts") }}',
            type: 'GET',
            success: function(response) {
                $('.badge-count').text(response.badges);
                $('.department-count').text(response.departments);
                $('.module-count').text(response.modules);
                $('.lecturer-count').text(response.lecturers);
                $('.student-count').text(response.students);
            },
            error: function() {
                console.error('Error occurred while updating counts.');
            }
        });
    }

    // Call the updateCounts function initially and every 5 seconds
    updateCounts();
    setInterval(updateCounts, 5000);
</script>