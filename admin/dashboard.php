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
    font-size: 1.5rem;
    font-weight: 500;
    text-transform: capitalize;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMoveDown 1s ease-out forwards;
  }

  .dashboard-admin {
    font-size: 2.5rem;
    font-weight: 600;
    color: #1D8FE1;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMoveDown 1s ease-out forwards 0.5s;
  }

  .description {
    font-size: 1.2rem;
    max-width: 600px;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMoveDown 1s ease-out forwards 1s;
  }

  @keyframes fadeInMoveDown {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<link rel="stylesheet" href="assets/styles.css">

 <div class="main-container">
			<div class="pd-ltr-23">
			<div class="card-box pd-20 height-100-p mb-30" style="background-image: url('assets/vendor/images/banner_bg.png'); background-size: cover; background-position: center; color: white;">
    <div class="row align-items-center">
        <div class="col">
            <img src="assets/vendor/images/banner.png" alt="" />
        </div>
        <div class="col-md-8">
            <h2 class="welcome-message">Welcome back, <?php echo $admin_name; ?>!</h2>
            <div class="dashboard-admin">Admin - Dashboard</div>
            <h4 class="description">Document Management System for Department Of Ayurveda</h4>
        </div>
    </div>
</div>

				</div>
				<div class="row">
    <div class="col-xl-3 mb-30">
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
    <div class="col-xl-3 mb-30">
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
    <div class="col-xl-3 mb-30">
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
    <div class="col-xl-3 mb-30">
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
					<div class="col-xl-8 mb-30">
						<div class="card-box height-100-p pd-20">
							<h2 class="h4 mb-20">Monthly Budget Report</h2>
							<div id="budgetchart"></div>
						</div>
					</div>
					<div class="col-xl-4 mb-30">
						<div class="card-box height-100-p pd-20">
							<h2 class="h4 mb-20">Lead Target</h2>
							<div id="chart6"></div>
						</div>
					</div>
				</div>
				<!--<div class="card-box mb-30">
					<h2 class="h4 pd-20">Best Selling Products</h2>
					<table class="data-table table nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Product</th>
								<th>Name</th>
								<th>Color</th>
								<th>Size</th>
								<th>Price</th>
								<th>Oty</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="table-plus">
									<img
										src="assets/vendor/images/product-1.jpg"
										width="70"
										height="70"
										alt=""
									/>
								</td>
								<td>
									<h5 class="font-16">Shirt</h5>
									by John Doe
								</td>
								<td>Black</td>
								<td>M</td>
								<td>$1000</td>
								<td>1</td>
								<td>
									<div class="dropdown">
										<a
											class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
											href="#"
											role="button"
											data-toggle="dropdown"
										>
											<i class="dw dw-more"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
										>
											<a class="dropdown-item" href="#"
												><i class="dw dw-eye"></i> View</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-edit2"></i> Edit</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-delete-3"></i> Delete</a
											>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="table-plus">
									<img
										src="assets/vendor/images/product-2.jpg"
										width="70"
										height="70"
										alt=""
									/>
								</td>
								<td>
									<h5 class="font-16">Boots</h5>
									by Lea R. Frith
								</td>
								<td>brown</td>
								<td>9UK</td>
								<td>$900</td>
								<td>1</td>
								<td>
									<div class="dropdown">
										<a
											class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
											href="#"
											role="button"
											data-toggle="dropdown"
										>
											<i class="dw dw-more"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
										>
											<a class="dropdown-item" href="#"
												><i class="dw dw-eye"></i> View</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-edit2"></i> Edit</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-delete-3"></i> Delete</a
											>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="table-plus">
									<img
										src="assets/vendor/images/product-3.jpg"
										width="70"
										height="70"
										alt=""
									/>
								</td>
								<td>
									<h5 class="font-16">Hat</h5>
									by Erik L. Richards
								</td>
								<td>Orange</td>
								<td>M</td>
								<td>$100</td>
								<td>4</td>
								<td>
									<div class="dropdown">
										<a
											class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
											href="#"
											role="button"
											data-toggle="dropdown"
										>
											<i class="dw dw-more"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
										>
											<a class="dropdown-item" href="#"
												><i class="dw dw-eye"></i> View</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-edit2"></i> Edit</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-delete-3"></i> Delete</a
											>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="table-plus">
									<img
										src="assets/vendor/images/product-4.jpg"
										width="70"
										height="70"
										alt=""
									/>
								</td>
								<td>
									<h5 class="font-16">Long Dress</h5>
									by Renee I. Hansen
								</td>
								<td>Gray</td>
								<td>L</td>
								<td>$1000</td>
								<td>1</td>
								<td>
									<div class="dropdown">
										<a
											class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
											href="#"
											role="button"
											data-toggle="dropdown"
										>
											<i class="dw dw-more"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
										>
											<a class="dropdown-item" href="#"
												><i class="dw dw-eye"></i> View</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-edit2"></i> Edit</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-delete-3"></i> Delete</a
											>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="table-plus">
									<img
										src="assets/vendor/images/product-5.jpg"
										width="70"
										height="70"
										alt=""
									/>
								</td>
								<td>
									<h5 class="font-16">Blazer</h5>
									by Vicki M. Coleman
								</td>
								<td>Blue</td>
								<td>M</td>
								<td>$1000</td>
								<td>1</td>
								<td>
									<div class="dropdown">
										<a
											class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
											href="#"
											role="button"
											data-toggle="dropdown"
										>
											<i class="dw dw-more"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
										>
											<a class="dropdown-item" href="#"
												><i class="dw dw-eye"></i> View</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-edit2"></i> Edit</a
											>
											<a class="dropdown-item" href="#"
												><i class="dw dw-delete-3"></i> Delete</a
											>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>-->
			<!-- End #main -->

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