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
									<h4>Manufacturing Centers Database Table</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="#">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Database
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-primary dropdown-toggle"
										href="#"
										role="button"
										data-toggle="dropdown"
									>
										January 2024
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Export List</a>
										<a class="dropdown-item" href="#">Policies</a>
										<a class="dropdown-item" href="#">View Assets</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Simple Datatable start -->

					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Registered Users Table</h4>
						</div>
						<div class="pb-20">
						<div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
								
								<div id="DataTables_Table_2_filter" class="dataTables_filter">
								<label>Search:
								<input type="search" class="form-control form-control-sm" placeholder="Search" aria-controls="DataTables_Table_2">
								</label>
								</div>
							<table
								class="table hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										<th class="table-plus datatable-nosort">Name</th>
										<th>Age</th>
										<th>Office</th>
										<th>Address</th>
										<th>Start Date</th>
										<th>Salary</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM manufacturingcenters_db";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
										// output data of each row
										while($row = mysqli_fetch_assoc($result)) {
											echo "<tr>";
											echo "<td class='table-plus'>". $row["name"]. "</td>";
											echo "<td>". $row["age"]. "</td>";
											echo "<td>". $row["office"]. "</td>";
											echo "<td>". $row["address"]. "</td>";
											echo "<td>". $row["start_date"]. "</td>";
											echo "<td>". $row["salary"]. "</td>";
											echo "</tr>";
										}
									} else {
										echo "0 results";
									}
									?>
								</tbody>
							</table>
							<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_2_paginate">
<ul class="pagination">
<li class="paginate_button page-item previous disabled" id="DataTables_Table_2_previous">
<a href="#" aria-controls="DataTables_Table_2" data-dt-idx="0" tabindex="0" class="page-link">
<i class="bi bi-chevron-left"></i>
</a></li>
<li class="paginate_button page-item active">
<a href="#" aria-controls="DataTables_Table_2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
</li>
<liclass="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
</li>
<li class="paginate_button page-item next" id="DataTables_Table_2_next">
<a href="#" aria-controls="DataTables_Table_2" data-dt-idx="3" tabindex="0" class="page-link">
<i class="bi bi-chevron-right"></i>
</a>
</li>
</ul>
</div>
</div>
						</div>
					</div>
					<!-- Export Datatable End -->

                    
    <?php include('includes/footer.php');?>