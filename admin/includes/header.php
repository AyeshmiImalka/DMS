

<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Department Of Ayurveda Sri Lanka </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

     <link rel="stylesheet" href=".stylecss">
	<link rel="stylesheet" href="assets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	



		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="assets/vendor/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="assets/vendor/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="assets/vendor/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="assets/vendor/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/vendor/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/src/plugins/datatables/css/responsive.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/src/plugins/fullcalendar/fullcalendar.css"
		/>
		<link rel="stylesheet" type="text/css" href="assets/vendor/styles/style.css" />

		

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script
			async
			src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
			crossorigin="anonymous"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>

        
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body>
		

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<h5>Admin Dashboard</h5>
				
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a href="calender.php"
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="icon-copy bi bi-calendar"></i>
						</a>
					</div>
				</div>
				<div class="user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<i class="icon-copy bi bi-bell"></i>
							<span class="badge notification-active"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="notification-list mx-h-350 customscroll">
								<ul>
									<li>
										<a href="#">
											<img src="assets/vendor/images/img.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/vendor/images/photo1.jpg" alt="" />
											<h3>Lea R. Frith</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/vendor/images/photo2.jpg" alt="" />
											<h3>Erik L. Richards</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/vendor/images/photo3.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/vendor/images/photo4.jpg" alt="" />
											<h3>Renee I. Hansen</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/vendor/images/img.jpg" alt="" />
											<h3>Vicki M. Coleman</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
							<img src="uploads/<?php echo htmlspecialchars($profilePicture); ?>"  class="avatar-photo" style="width: 55px; height: 55px; object-fit: cover;" >
							</span>
							<span class="user-name"><?php echo $_SESSION['admin_name']?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="adminSettings.php"
								><i class="bi bi-person-circle"></i> Profile</a
							>
							
							<a class="dropdown-item" href="logout.php"
								><i class="bi bi-box-arrow-right"></i> Log Out</a
							>
						</div>
					</div>
				</div>
			
			</div>
		</div><!-- End Header -->
		

<?php include('includes/side_bar.php'); ?>

