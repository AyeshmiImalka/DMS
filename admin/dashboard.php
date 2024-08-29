<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}

$admin_name = $_SESSION['admin_name']; // Fetch admin name from session
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
          <div class="progress-data">
            <div id="chart"></div>
          </div>
          <div class="widget-data">
            <div class="h3 mb-0">10000</div>
            <div class="weight-800 font-16">Ayurveda Pharmacies</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-30">
      <div class="card-box height-100-p widget-style1 text-white" style="background: linear-gradient(to top, #0fd850 0%, #f9f047 100%);">
        <div class="d-flex flex-wrap align-items-center">
          <div class="progress-data">
            <div id="chart2"></div>
          </div>
          <div class="widget-data">
            <div class="h3 mb-0">4000</div>
            <div class="weight-800 font-16">Ayurveda Hospitals</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-30">
      <div class="card-box height-100-p widget-style1 text-white" style="background: linear-gradient(120deg, #a6c0fe 0%, #f68084 100%);">
        <div class="d-flex flex-wrap align-items-center">
          <div class="progress-data">
            <div id="chart3"></div>
          </div>
          <div class="widget-data">
            <div class="h3 mb-0">3500</div>
            <div class="weight-800 font-16">Manufacturing Centers</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-30">
      <div class="card-box height-100-p widget-style1 text-white" style="background: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);">
        <div class="d-flex flex-wrap align-items-center">
          <div class="progress-data">
            <div id="chart4"></div>
          </div>
          <div class="widget-data">
            <div class="h3 mb-0">6060</div>
            <div class="weight-800 font-16">Ayurveda Drug Stores</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-8 col-md-12 mb-30">
      <div class="card-box height-100-p pd-20">
        <h2 class="h4 mb-20">Monthly Budget Report</h2>
        <div id="budgetchart"></div>
      </div>
    </div>
    <div class="col-xl-4 col-md-12 mb-30">
      <div class="card-box height-100-p pd-20">
        <h2 class="h4 mb-20">Lead Target</h2>
        <div id="chart6"></div>
      </div>
    </div>
  </div>



<?php include('includes/footer.php');?>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
      // Your chart data and options here
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
		legend: { position: 'bottom' },
		height: 350
      };
      var chart = new google.visualization.LineChart(document.getElementById('budgetchart'));
      chart.draw(data, options);
  }
</script>
