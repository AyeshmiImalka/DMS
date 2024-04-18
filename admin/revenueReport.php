<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}

?>

<?php 
include('includes/header.php');

?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Revenue Report</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Reports
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <!-- Added dropdown to select PNG or PDF -->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Download as
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="downloadChart('png')">PNG</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white pd-20 card-box mb-30">
                <div id="revenueChart"></div>
            </div>
        </div>

        <?php include('includes/footer.php');?>

<!-- Begin Chart Code -->
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Time Period', 'Revenue'],
            ['Jan', 5000],
            ['Feb', 5500],
            ['Mar', 6000],
            ['Apr', 6200],
            ['May', 6500],
            ['Jun', 7000],
            ['Jul', 7200],
            ['Aug', 7500],
            ['Sep', 7800],
            ['Oct', 8000],
            ['Nov', 8200],
            ['Dec', 8500]
            // Add more data points for additional time periods as needed
        ]);

        var options = {
            
            legend: { position: 'bottom' },
            height: 450,
            hAxis: {
                title: 'Time Period'
            },
            vAxis: {
                title: 'Revenue (in currency)'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('revenueChart'));

        chart.draw(data, options);
    }

    // Function to download chart as PNG
    function downloadChart() {
        var chart = document.getElementById('revenueChart');
        var a = document.createElement('a');

        html2canvas(chart, {
            width: chart.offsetWidth,
            height: chart.offsetHeight,
            useCORS: true,
            allowTaint: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            a.href = imgData;
            a.download = 'revenue_chart.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });
    }
</script>

    </div>
</div>
