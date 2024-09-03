<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}

$admin_name = $_SESSION['admin_name']; // Fetch admin name from session

// Fetch counts for each category
$pharmacies_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM pharmacies_db"))['count'];
$hospitals_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM hospitals_db"))['count'];
$manufacturingcenters_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM manufacturingcenters_db"))['count'];
$drugstores_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM drugstores_db"))['count'];

// Get current year and previous year
$current_year = date('Y');
$previous_year = $current_year - 1;

// Function to get data
function getMonthlyData($conn, $year) {
    $sql = "SELECT DATE_FORMAT(`date`, '%Y-%m') AS month, SUM(amount) AS total_amount
            FROM payment_records
            WHERE YEAR(`date`) = '$year'
            GROUP BY DATE_FORMAT(`date`, '%Y-%m')
            ORDER BY DATE_FORMAT(`date`, '%Y-%m') ASC";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $month = date('M', strtotime($row['month'] . '-01')); // Format to 'Jan', 'Feb', etc.
            $data[$month] = $row['total_amount'];
        }
    }
    return $data;
}

// Get data for both years
$current_year_data = getMonthlyData($conn, $current_year);
$previous_year_data = getMonthlyData($conn, $previous_year);

// Fill in missing months with zero amounts for both years
$all_months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$current_year_data_final = [];
$previous_year_data_final = [];

foreach ($all_months as $month) {
    $current_amount = isset($current_year_data[$month]) ? $current_year_data[$month] : 0;
    $previous_amount = isset($previous_year_data[$month]) ? $previous_year_data[$month] : 0;
    $current_year_data_final[] = [$month, $current_amount];
    $previous_year_data_final[] = [$month, $previous_amount];
}

// Fetch expired licenses count for various categories
$expired_licenses_count = [
  'Pharmacies' => mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM pharmacies_db WHERE Renewal_update < CURDATE()"))['count'],
  'Hospitals' => mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM hospitals_db WHERE Renewal_update < CURDATE()"))['count'],
  'Manufacturing Centers' => mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM manufacturingcenters_db WHERE Renewal_update < CURDATE()"))['count'],
  'Drugstores' => mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM drugstores_db WHERE Renewal_update < CURDATE()"))['count']
];

?>

<?php 
include('includes/header.php');
?>

<style>
  .welcome-message {
    font-size: 2rem;
    font-weight: 700;
    text-transform: capitalize;
    margin-bottom: 20px;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMoveDown 1s ease-out forwards;
    color: #fff; /* White text for contrast */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Subtle text shadow */
    
  }

  .description {
    font-size: 2.3rem;
    max-width: 600px;
    margin: 0 auto;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMoveDown 1s ease-out forwards 0.5s;
    color: #ddd; /* Slightly lighter text */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Subtle text shadow */
  }

  @keyframes fadeInMoveDown {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .mirror-image {
    position: absolute;
    left: 0;
    top: 0;
    transform: scaleX(-1);
    height: 100%;
    width: auto;
    opacity: 0.1; /* Transparent to not overshadow the text */
  }

  .dashboard-admin {
    font-size: 2.5rem;
    font-weight: 600;
    color: #1D8FE1;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMoveDown 1s ease-out forwards 0.5s;
  }

  .card-box .banner{
    text-align: center;
    padding: 50px;
    background: rgba(0, 0, 0, 0.5); /* Dark semi-transparent overlay */
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  /* Responsive Adjustments */
  @media (max-width: 767px) {
    .welcome-message {
      font-size: 1.5rem;
    }

    .description {
      font-size: 1.8rem;
    }

    .mirror-image {
      display: none; /* Hide mirrored image on small screens */
    }

    .col-md-8,
    .col {
      text-align: center;
    }

    .col img {
      margin-top: 20px;
      width: 80%; /* Adjust image size on small screens */
    }
  }
  
</style>

<link rel="stylesheet" href="assets/styles.css">

<div class="container-fluid main-container">
  <div class="card-box pd-20 height-100-p mb-30" style="background-image: url('assets/vendor/images/banner_bg.png'); background-size: cover; background-position: center; color: white; position: relative;">
    <!-- Add the mirrored image here -->
    <img src="assets/vendor/images/dms_banner.png" alt="" class="mirror-image" />
    <div class="row align-items-center">
      <div class="col-md-8">
        <h1 class="welcome-message">Welcome back, <?php echo $admin_name; ?>!</h1>
        <h2 class="description">Document Management System</h2>
      </div>
      <div class="col-md-4">
        <img src="assets/vendor/images/dms_banner.png" alt="" />
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-3 col-md-6 mb-30">
      <div class="card-box height-100-p widget-style1 text-white" style="background: linear-gradient(-225deg, #22E1FF 0%, #1D8FE1 48%, #625EB1 100%);">
        <div class="d-flex flex-wrap align-items-center">
        <div class="image-data">
            <img src="assets/vendor/images/pharmacy.png" alt="Pharmacy" style="height: 50px;">
        </div>
          <div class="widget-data">
            <div class="h3 mb-0"><?php echo $pharmacies_count; ?></div>
            <div class="weight-800 font-16">Private Ayurveda Pharmacies</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-30">
      <div class="card-box height-100-p widget-style1 text-white" style="background: linear-gradient(to top, #0fd850 0%, #f9f047 100%);">
        <div class="d-flex flex-wrap align-items-center">
        <div class="image-data">
            <img src="assets/vendor/images/hospital.png" alt="hospital" style="height: 50px;">
        </div>
          <div class="widget-data">
            <div class="h3 mb-0"><?php echo $hospitals_count; ?></div>
            <div class="weight-800 font-16">Private Ayurveda Hospitals</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-30">
      <div class="card-box height-100-p widget-style1 text-white" style="background: linear-gradient(120deg, #a6c0fe 0%, #f68084 100%);">
        <div class="d-flex flex-wrap align-items-center">
        <div class="image-data">
            <img src="assets/vendor/images/factory.png" alt="factory" style="height: 50px;">
        </div>
          <div class="widget-data">
            <div class="h3 mb-0"><?php echo $manufacturingcenters_count; ?></div>
            <div class="weight-800 font-16">Manufacturing Centers</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-30">
      <div class="card-box height-100-p widget-style1 text-white" style="background: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);">
        <div class="d-flex flex-wrap align-items-center">
        <div class="image-data">
            <img src="assets/vendor/images/store.png" alt="store" style="height: 50px;">
        </div>
          <div class="widget-data">
            <div class="h3 mb-0"><?php echo $drugstores_count; ?></div>
            <div class="weight-800 font-16">Ayurveda Drug Stores</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-8 col-md-12 mb-30">
      <div class="card-box height-100-p pd-20">
        <h2 class="h4 mb-20">Monthly Budget Comparison</h2>
        <div id="budgetchart"></div>
      </div>
    </div>
    <div class="col-xl-4 col-md-12 mb-30">
      <div class="card-box height-100-p pd-20">
        <h2 class="h4 mb-20">Expired Licenses Count</h2>
        <div id="expiredLicensesChart"></div>
      </div>
    </div>
  </div>



<?php include('includes/footer.php');?>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Month', 'Current Year', 'Previous Year'],
        <?php
        // Output PHP array data into JavaScript
        foreach ($all_months as $index => $month) {
            $current_amount = $current_year_data_final[$index][1];
            $previous_amount = $previous_year_data_final[$index][1];
            echo "['" . $month . "', " . $current_amount . ", " . $previous_amount . "],";
        }
        ?>
      ]);

      var options = {
        
        legend: { position: 'bottom' },
        height: 350,
        hAxis: { title: 'Month' },
        vAxis: { title: 'Amount' },
        series: {
          0: { color: '#1D8FE1' }, // Current Year
          1: { color: '#FF5722' }  // Previous Year
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('budgetchart'));
      chart.draw(data, options);

  // Expired Licenses Chart
  var expiredLicensesData = google.visualization.arrayToDataTable([
        ['Category', 'Count'],
        <?php
        foreach ($expired_licenses_count as $category => $count) {
            echo "['$category', $count],";
        }
        ?>
      ]);

      var expiredLicensesOptions = {
    
        pieSliceText: 'label',
        slices: {
          0: { offset: 0.1 },
          1: { offset: 0.1 },
          2: { offset: 0.1 },
          3: { offset: 0.1 }
        },
        height: 350, // Increase the height of the pie chart
        width: 350,
        legend: { position: 'bottom' }   // Optionally, set a specific width
      };

      var expiredLicensesChart = new google.visualization.PieChart(document.getElementById('expiredLicensesChart'));
      expiredLicensesChart.draw(expiredLicensesData, expiredLicensesOptions);
  }

</script>
