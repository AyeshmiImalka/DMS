<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}
// Function to count the statuses for each type
function count_statuses($conn, $table) {
    $statuses = ['approved' => 0, 'pending' => 0, 'rejected' => 0];
    
    $sql = "SELECT status, COUNT(*) as count FROM $table GROUP BY status";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $status = strtolower($row['status']);
            if (array_key_exists($status, $statuses)) {
                $statuses[$status] = (int)$row['count'];
            }
        }
    }

    return $statuses;
}

// Aggregating data for each license type
$license_data = [
    'Manufacturing Centers' => count_statuses($conn, 'manufacturing_centers_registration_requests'),
    'Drug Stores' => count_statuses($conn, 'private_ayurvedic_drug_stores_registration_requests'),
    'Pharmacies' => count_statuses($conn, 'private_ayurvedic_pharmacies_registration_requests'),
    'Transport Services' => count_statuses($conn, 'transport_services_registration_requests'),
    'Suppliers' => count_statuses($conn, 'suppliers_registration_requests'),
    'Distributors' => count_statuses($conn, 'distributors_registration_requests'),
    'Local Drugs' => count_statuses($conn, 'local_drugs_registration_requests'),
    'Local Products' => count_statuses($conn, 'local_products_registration_requests'),
    'Imported Drugs' => count_statuses($conn, 'imported_drugs_registration_requests'),
    'Imported Products' => count_statuses($conn, 'imported_products_registration_requests'),
    'Restricted Drugs' => count_statuses($conn, 'restricted_drugs_registration_requests'),
    'Cannabies' => count_statuses($conn, 'cannabis_registration_requests'),
    'Hospitals' => count_statuses($conn, 'private_ayurveda_hospital_registration'),
    'Panchakarma Centers' => count_statuses($conn, 'panchakarma_centers_registration_requests'),
    'Institutions' => count_statuses($conn, 'private_ayurveda_institutions_registration_requests')
];

// Pass the data to the JavaScript part
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
                            <h4>License Registration Status Report</h4>
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
            ['License Types', 'Approved', 'Pending', 'Rejected'],
            <?php
            foreach ($license_data as $type => $statuses) {
                echo "['$type', {$statuses['approved']}, {$statuses['pending']}, {$statuses['rejected']}],";
            }
            ?>
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
