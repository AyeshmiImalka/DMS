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
                fetch('get_revenue_data.php')
                    .then(response => response.json())
                    .then(data => {
                        var dataTable = google.visualization.arrayToDataTable(data);

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
                        chart.draw(dataTable, options);
                    });
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
