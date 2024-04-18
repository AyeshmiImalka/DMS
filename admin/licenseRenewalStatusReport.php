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
                            <h4>License Renewal Status Report</h4>
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
                <div id="licenseChart"></div>
            </div>
        </div>

        <?php include('includes/footer.php');?>

<!-- Begin Chart Code -->
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['License Types', 'Renewed', 'Pending Renewal', 'Expired'],
            ['Manufacturing Centers', 50, 20, 5], // Type A - Manufacturing Centers
            ['Drug Stores', 30, 10, 2],           // Type B - Drug Stores
            ['Pharmacies', 40, 15, 3],
            ['Transport Services', 35, 5, 1],
            ['Suppliers', 45, 25, 6],
            ['Distributors', 55, 22, 7],
            ['Local Drugs', 33, 18, 4],
            ['Local Products', 48, 30, 8],
            ['Imported Drugs', 28, 12, 3],
            ['Imported Products', 38, 20, 5],
            ['Restricted Drugs', 42, 26, 7],
            ['Cannabies', 51, 29, 9],
            ['Hospitals', 36, 15, 6],
            ['Panchakarma Centers', 46, 18, 7],
            ['Institutions', 32, 10, 2],
            // Add more rows for additional license types as needed
        ]);

        var options = {
            legend: { position: 'bottom' },
            isStacked: true,
            height: 600, // Increased height for more data
            colors: ['#4CAF50', '#FFC107', '#F44336'], // Renewed: Green, Pending Renewal: Orange, Expired: Red
            series: {
                0: {targetAxisIndex: 0},
                1: {targetAxisIndex: 0},
                2: {targetAxisIndex: 0}
            },
            hAxis: {
                title: 'Number of Licenses'
            },
            vAxis: {
                title: 'License Types'
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('licenseChart'));

        chart.draw(data, options);
    }

    // Function to download chart as PNG
    function downloadChart() {
        var chart = document.getElementById('licenseChart');
        var a = document.createElement('a');

        html2canvas(chart, {
            width: chart.offsetWidth,
            height: chart.offsetHeight,
            useCORS: true,
            allowTaint: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            a.href = imgData;
            a.download = 'license_chart.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });
    }
</script>

    </div>
</div>
