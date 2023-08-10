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

            <div id="content-wrapper">
                <header class="p-2 text-bg-primary text-white ">
                    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <div class="p-3 d-flex justify-content-center align-items-center">
                            <ul class="nav">
                                <h4 id="headingId">Timetable</h4>
                            </ul>
                        </div>
                </header>

                <div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <div class="wrapper rounded">

                        <div class="container text-center mt-5">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="70px"></th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                    </tr>
                                    <tr>
                                        <th width="70px">Update</th>
                                        <th onclick="goToPage('page1.html')" class="bg-primary bg-opacity-75"></th>
                                        <th onclick="goToPage('page1.html')" class="bg-primary bg-opacity-75"></th>
                                        <th onclick="goToPage('page1.html')" class="bg-primary bg-opacity-50"></th>
                                        <th onclick="goToPage('page1.html')" class="bg-primary bg-opacity-25"></th>
                                        <th onclick="goToPage('page1.html')" class="bg-primary bg-opacity-50"></th>
                                        <th onclick="goToPage('page1.html')" class="bg-primary bg-opacity-75"></th>
                                        <th onclick="goToPage('page1.html')" class="bg-primary bg-opacity-85"></th>
                                    </tr>

                                    <script>
                                        // Function to check the current URL and update the button state
                                        function goToPage(url) {
                                            var currentURL = window.location.href;
                                            const button = document.getElementById("laka");
                                            // Check if the current URL matches the desired URL
                                            if (currentURL === "http://127.0.0.1:8000/Admin_filter") {

                                                window.location.href = url;
                                            }
                                        }
                                    </script>
                                </thead>
                            </table>



                            <table class="table table-bordered" id="timetable">

                                <tbody>
                                    @foreach ($timeline as $value)

                                    <tr>
                                        <th width="70px"> {{ $value }}</th>
                                        <td width="150px"></td>
                                        <td width="150px"></td>
                                        <td width="150px"></td>
                                        <td width="150px"></td>
                                        <td width="150px"></td>
                                        <td width="150px"></td>
                                        <td width="150px"></td>
                                    </tr>
                                    @endforeach
                                </tbody>


                                <script>
                                    var myArray = @json($y_s_U_data);
                                    console.log(myArray);

                                    function getdayindex(obj, index) { // asing day index number 

                                        let dayChart = {
                                            "Monday": 1,
                                            "Tuesday": 2,
                                            "Wednesday": 3,
                                            "Thursday": 4,
                                            "Friday": 5,
                                            "Saturday": 6,
                                            "Sunday": 7

                                        };
                                        return dayChart[obj[index]["Day"]];
                                    }


                                    function colorTableColumn(column, start_t, end_t, text) {
                                        // console.log(column, start_t, end_t, text);
                                        var table = document.getElementById("timetable");
                                        // 8.03 vada adunam hariyata pennava namuth 8.30 ta vada vadi nam valuv rka 9 yata yanava 8.30 vada vadi eva penna row ekak hadala na 

                                        if (column >= 1 && column <= 7) { // valide dat index number 

                                            if (((start_t % 1) === 0) || ((end_t % 1) === 0)) { //  The value does not have a decimal
                                                // console.log(((start_t % 1) === 0));
                                                // console.log(((end_t % 1) === 0));
                                                var s_decimalPart = start_t % 1;
                                                var e_decimalPart = end_t % 1;
                                                var result_s;
                                                var result_e;
                                                var whole_S_t_Number;
                                                var whole_E_t_Number;

                                                if ((start_t % 1) === 0) {

                                                    result_s = 0;
                                                    whole_S_t_Number = start_t;

                                                } else {
                                                    if (s_decimalPart > 0.31) {

                                                        result_s = 2;
                                                        whole_S_t_Number = Math.floor(start_t);


                                                    } else {

                                                        result_s = 1;
                                                        whole_S_t_Number = Math.floor(start_t);

                                                    }
                                                }

                                                if ((end_t % 1) === 0) {

                                                    result_e = 0;
                                                    whole_E_t_Number = end_t;

                                                } else {

                                                    if (e_decimalPart > 0.31) {

                                                        result_e = 2;
                                                        whole_E_t_Number = Math.floor(end_t);


                                                    } else {

                                                        result_e = 1;
                                                        whole_E_t_Number = Math.floor(end_t);

                                                    }
                                                }
                                                console.log(whole_E_t_Number, whole_S_t_Number);

                                                let new_St = ((((whole_S_t_Number - 5) * 2)) + result_s);
                                                let new_Et = ((((whole_E_t_Number - 5) * 2)) + result_e);
                                                // console.log(column, new_St, new_Et);
                                                for (let row = new_St; row <= new_Et; row++) {

                                                    var cell = table.rows[row].cells[column];
                                                    cell.style.backgroundColor = "green";

                                                }

                                                let midul = ((new_St + new_Et) / 2)
                                                // console.log(Math.floor( midul));
                                                var text = table.rows[Math.floor(midul)].cells[column];
                                                //text.innerHTML = text ;


                                            } else { // The value has a decimal

                                                var s_decimalPart = start_t % 1;
                                                var e_decimalPart = end_t % 1;
                                                var result_s;
                                                var result_e;
                                                var whole_S_t_Number
                                                var whole_E_t_Number

                                                if (s_decimalPart > 0.31) {

                                                    result_s = 2;
                                                    whole_S_t_Number = Math.floor(start_t);


                                                } else {

                                                    result_s = 1;
                                                    whole_S_t_Number = Math.floor(start_t);

                                                }


                                                if (e_decimalPart > 0.31) {

                                                    result_e = 2;
                                                    whole_E_t_Number = Math.floor(end_t);


                                                } else {

                                                    result_e = 1;
                                                    whole_E_t_Number = Math.floor(end_t);

                                                }

                                                let new_St = (((whole_S_t_Number - 5) * 2) + result_s);
                                                let new_Et = (((whole_E_t_Number - 5) * 2) + result_e);

                                                for (let row = new_St; row <= new_Et; row++) {

                                                    var cell = table.rows[row].cells[column];
                                                    cell.style.backgroundColor = "red";


                                                }
                                                let midul = ((new_St + new_Et) / 2)
                                                // console.log(Math.floor( midul));
                                                var text = table.rows[Math.floor(midul)].cells[column];
                                                //text.innerHTML = text ;

                                            }
                                        }
                                    }


                                    for (let arr_count = 0; arr_count < myArray.length; arr_count++) {
                                        let dayIndex = getdayindex(myArray, arr_count);
                                        let s_t = Number(myArray[arr_count]['start_t']);
                                        let e_t = Number(myArray[arr_count]['end_t']);
                                        // console.log(dayIndex, s_t, e_t);
                                        colorTableColumn(dayIndex, s_t, e_t, "Your Text Here");

                                    }
                                </script>
                            </table>

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
</script>