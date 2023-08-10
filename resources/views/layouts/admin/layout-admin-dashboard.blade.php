<?php

use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

// Retrieve male and female student counts from the database
$maleCount = Student::where('gender', 'Male')->count();
$femaleCount = Student::where('gender', 'Female')->count();

$countsByDepartment = Student::select('department', DB::raw('SUM(CASE WHEN gender = "Male" THEN 1 ELSE 0 END) AS male_count'), DB::raw('SUM(CASE WHEN gender = "Female" THEN 1 ELSE 0 END) AS female_count'))->groupBy('department')->get();


$badgeStuCounts = Student::select('badge', DB::raw('count(*) as total'))->groupBy('badge')->get();
$deptStuCounts = Student::select('department', DB::raw('count(*) as total'))->groupBy('department')->get();
$deptLecCounts = Lecturer::select('department', DB::raw('count(*) as total'))->groupBy('department')->get();

// Convert the student counts to JSON format
$badgeStuCountsJson = json_encode($badgeStuCounts);
$deptStuCountsJson = json_encode($deptStuCounts);
$deptLecCountsJson = json_encode($deptLecCounts);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin resources/assets/images/favicon.png')}}">
    @include('libraries.admin-styles')
    @include('libraries.styles')
    <style>
        a {
            text-decoration: none !important;
        }

        .page-wrapper>.container-fluid {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
    </style>
    <title>Admin | Dashboard</title>
</head>

<body>
    @yield('body-content')
    @include('libraries.admin-script')
    @include('libraries.script')

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            // CHART 1 - Student Count vs Badges
            var badgeStuCounts = <?php echo $badgeStuCountsJson; ?>;
            var data1 = google.visualization.arrayToDataTable([
                ['Badge', 'Quantity', {
                    role: 'style'
                }],
                <?php
                foreach ($badgeStuCounts as $count) {
                    $badgeId = $count->badge;
                    $totalBadgeStu = $count->total;
                    echo "['$badgeId', $totalBadgeStu, 'color: #3498DB'],";
                }
                ?>
            ]);
            var options1 = {
                'title': 'Student Count vs Badges',
            };

            // CHART 2 - Student Count vs Department
            var deptStuCounts = <?php echo $deptStuCountsJson; ?>;
            var data2 = google.visualization.arrayToDataTable([
                ['Department', 'Quantity', {
                    role: 'style'
                }],
                <?php
                foreach ($deptStuCounts as $count) {
                    $departmentId = $count->department;
                    $totalDeptStu = $count->total;
                    echo "['$departmentId', $totalDeptStu, 'color: #3498DB'],";
                }
                ?>
            ]);
            var options2 = {
                'title': 'Student Count vs Departments',

            };

            // CHART 3 - Lecturer Count vs Department
            var deptLecCounts = <?php echo $deptLecCountsJson; ?>;
            var data3 = google.visualization.arrayToDataTable([
                ['Department', 'Quantity', {
                    role: 'style'
                }],
                <?php
                foreach ($deptLecCounts as $count) {
                    $departmentId = $count->department;
                    $totalDeptStu = $count->total;
                    echo "['$departmentId', $totalDeptStu, 'color: #3498DB'],";
                }
                ?>
            ]);
            var options3 = {
                'title': 'Lecturer Count vs Modules',

            };

            // CHART 4 - Male Female vs Student Count
            var maleCount = <?php echo $maleCount; ?>;
            var femaleCount = <?php echo $femaleCount; ?>;

            var data4 = new google.visualization.DataTable();
            data4.addColumn('string', 'Gender');
            data4.addColumn('number', 'Count');
            data4.addRows([
                ['Male', maleCount],
                ['Female', femaleCount]
            ]);

            // Set chart options
            var options4 = {
                'title': 'Gender vs Students',
            };

            // CHART 5 - Male Female vs Department Count



            // Instantiate and draw our chart, passing in some options.
            var chart1 = new google.visualization.BarChart(document.getElementById('chart1_div'));
            chart1.draw(data1, options1);

            var chart2 = new google.visualization.BarChart(document.getElementById('chart2_div'));
            chart2.draw(data2, options2);

            var chart3 = new google.visualization.BarChart(document.getElementById('chart3_div'));
            chart3.draw(data3, options3);

            var chart4 = new google.visualization.PieChart(document.getElementById('chart4_div'));
            chart4.draw(data4, options4);

            // var chart5 = new google.visualization.PieChart(document.getElementById('chart5_div'));
            // chart5.draw(data5, options5);

            // var chart6 = new google.visualization.PieChart(document.getElementById('chart6_div'));
            // chart6.draw(data9, options9);
        }
    </script>

</body>

</html>