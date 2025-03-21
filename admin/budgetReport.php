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
                            <h4>Monthly Budget Report</h4>
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
                <div id="budgetchart"></div>
            </div>
        </div>

        <?php include('includes/footer.php');?>

<!-- Begin Chart Code -->
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Budget', 'Actual'],
            ['Jan', 1000, 800],
            ['Feb', 1200, 1200],
            ['Mar', 1400, 1500],
            ['Apr', 1600, 1300],
            ['May', 1800, 1700],
            ['Jun', 2000, 1900],
            ['Jul', 2200, 2100],
            ['Aug', 2400, 2300],
            ['Sep', 2600, 2500],
            ['Oct', 2800, 2700],
            ['Nov', 3000, 2900],
            ['Dec', 3200, 3100]
        ]);

        var options = {
            title: 'Monthly Budget Report',
            legend: { position: 'bottom' },
            height: 450
        };

        var chart = new google.visualization.LineChart(document.getElementById('budgetchart'));

        chart.draw(data, options);
    }

    // Function to download chart as PNG
    function downloadChart() {
        var chart = document.getElementById('budgetchart');
        var a = document.createElement('a');

        html2canvas(chart, {
            width: chart.offsetWidth,
            height: chart.offsetHeight,
            useCORS: true,
            allowTaint: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            a.href = imgData;
            a.download = 'budget_chart.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });
    }
</script>

    </div>
</div>
