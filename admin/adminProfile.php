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
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Profile</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Profile
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
							<div class="pd-20 card-box height-100-p">
								<div class="profile-photo">
									<a
										href="modal"
										data-toggle="modal"
										data-target="#modal"
										class="edit-avatar"
										style="display: flex; justify-content: center; align-items: center;"
										><i class="fa fa-pencil"></i
									></a>
									<img
										src="assets/vendor/images/photo1.jpg"
										alt=""
										class="avatar-photo"
									/>
									<div
										class="modal fade"
										id="modal"
										tabindex="-1"
										role="dialog"
										aria-labelledby="modalLabel"
										aria-hidden="true"
									>
										<div
											class="modal-dialog modal-dialog-centered"
											role="document"
										>
											<div class="modal-content">
												<div class="modal-body pd-5">
													<div class="img-container">
														<img
															id="image"
															src="vendors/images/photo2.jpg"
															alt="Picture"
														/>
													</div>
												</div>
												<div class="modal-footer">
													<input
														type="submit"
														value="Update"
														class="btn btn-primary"
													/>
													<button
														type="button"
														class="btn btn-default"
														data-dismiss="modal"
													>
														Close
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<h5 class="text-center h5 mb-0"><?php echo $_SESSION['admin_name']?></h5>
								<div class="profile-info">
									<h5 class="mb-20 h5 text-blue">Contact Information</h5>
									<ul>
										<li>
											<span>Email Address:</span>
											<?php echo $_SESSION['email']?>
										</li>
										<li>
											<span>Phone Number:</span>
											619-229-0054
										</li>
										<li>
											<span>Address:</span>
											1807 Holden Street<br />
											San Diego, CA 92115
										</li>
									</ul>
								</div>
								<div class="profile-social">
									<h5 class="mb-20 h5 text-blue">Social Links</h5>
									<ul class="clearfix">
										<li>
											<a
												href="#"
												class="btn"
												data-bgcolor="#3b5998"
												data-color="#ffffff"
												style="display: flex; justify-content: center; align-items: center;"
												><i class="fa fa-facebook"></i
											></a>
										</li>
										<li>
											<a
												href="#"
												class="btn"
												data-bgcolor="#1da1f2"
												data-color="#ffffff"
												style="display: flex; justify-content: center; align-items: center;"
												><i class="fa fa-twitter"></i
											></a>
										</li>
										<li>
											<a
												href="#"
												class="btn"
												data-bgcolor="#007bb5"
												data-color="#ffffff"
												style="display: flex; justify-content: center; align-items: center;"
												><i class="fa fa-linkedin"></i
											></a>
										</li>
										<li>
											<a
												href="#"
												class="btn"
												data-bgcolor="#f46f30"
												data-color="#ffffff"
												style="display: flex; justify-content: center; align-items: center;"
												><i class="fa fa-instagram"></i
											></a>
										
									</ul>
								</div>
								
							</div>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
							<div class="card-box height-100-p overflow-hidden">
								<div class="profile-tab height-100-p">
									<div class="tab height-100-p">
										<ul class="nav nav-tabs customtab" role="tablist">
											<li class="nav-item active">
												<a
													class="nav-link"
													data-toggle="tab"
													href="#setting"
													role="tab"
													>Settings</a
												>
											</li>
										</ul>
										<div class="tab-content">
										
											
												<div class="profile-setting">
													<form>
														<ul class="profile-edit-list row">
															<li class="weight-500 col-md-6">
																<h4 class="text-blue h5 mb-20">
																	Edit Your Personal Setting
																</h4>
																<div class="form-group">
																	<label>Full Name</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																	/>
																</div>
																<div class="form-group">
																	<label>Title</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																	/>
																</div>
																<div class="form-group">
																	<label>Email</label>
																	<input
																		class="form-control form-control-lg"
																		type="email"
																	/>
																</div>
																
																<div class="form-group">
																	<label>Postal Code</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																	/>
																</div>
																<div class="form-group">
																	<label>Phone Number</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																	/>
																</div>
																<div class="form-group">
																	<label>Address</label>
																	<textarea class="form-control"></textarea>
																</div>
																
																<div class="form-group">
																	<div
																		class="custom-control custom-checkbox mb-5"
																	>
																		<input
																			type="checkbox"
																			class="custom-control-input"
																			id="customCheck1-1"
																		/>
																		<label
																			class="custom-control-label weight-400"
																			for="customCheck1-1"
																			>I agree to receive notification
																			emails</label
																		>
																	</div>
																</div>
																<div class="form-group mb-0">
																	<input
																		type="submit"
																		class="btn btn-primary"
																		value="Update Information"
																	/>
																</div>
															</li>
															<li class="weight-500 col-md-6">
																<h4 class="text-blue h5 mb-20">
																	Edit Social Media links
																</h4>
																<div class="form-group">
																	<label>Facebook URL:</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																		placeholder="Paste your link here"
																	/>
																</div>
																<div class="form-group">
																	<label>Twitter URL:</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																		placeholder="Paste your link here"
																	/>
																</div>
																<div class="form-group">
																	<label>Linkedin URL:</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																		placeholder="Paste your link here"
																	/>
																</div>
																<div class="form-group">
																	<label>Instagram URL:</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																		placeholder="Paste your link here"
																	/>
																</div>
																
																<div class="form-group mb-0">
																	<input
																		type="submit"
																		class="btn btn-primary"
																		value="Save & Update"
																	/>
																</div>
															</li>
														</ul>
													</form>
												</div>
											</div>
											<!-- Setting Tab End -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
    <?php include('includes/footer.php');?>