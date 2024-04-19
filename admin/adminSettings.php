<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
} 

$fullName = '';
$title = '';
$email = '';
$postalCode = '';
$phoneNumber = '';
$address = '';
$facebookUrl = '';
$twitterUrl = '';
$linkedinUrl = '';
$instagramUrl = '';
$profilePicture = ''; // Add profile picture variable

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['full_name'];
    $title = $_POST['title'];
    $email = $_POST['email'];
    $postalCode = $_POST['postal_code'];
    $phoneNumber = $_POST['phone_number'];
    $address = $_POST['address'];
    $facebookUrl = $_POST['facebook_url'];
    $twitterUrl = $_POST['twitter_url'];
    $linkedinUrl = $_POST['linkedin_url'];
    $instagramUrl = $_POST['instagram_url'];
    $profilePicture = $_FILES['profile_picture']['name']; // Retrieve profile picture name
    $profilePictureTemp = $_FILES['profile_picture']['tmp_name']; // Retrieve profile picture temporary name

    // Insert data into the database
    $sql = "INSERT INTO admin_profiles (full_name, title, email, postal_code, phone_number, address, facebook_url, twitter_url, linkedin_url, instagram_url, profile_picture)
            VALUES ('$fullName', '$title', '$email', '$postalCode', '$phoneNumber', '$address', '$facebookUrl', '$twitterUrl', '$linkedinUrl', '$instagramUrl', '$profilePicture')";

    if (mysqli_query($conn, $sql)) {
        // Move the uploaded file to the desired directory
        move_uploaded_file($profilePictureTemp, "uploads/$profilePicture");
        echo "Record added successfully.";
    } else {
        echo "Error: ". $sql. "<br>". mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
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
									<h4>Settings</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Settings
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="row">
						<div class=" col-md-12 col-sm-12 mb-30">
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
													>Profile Settings</a
												>
											</li>
										</ul>
										<div class="tab-content">
										
											
												
                                                <form action="" method="post" enctype="multipart/form-data">
		<div class="profile-setting">
			<ul class="profile-edit-list row">
				<li class="weight-500 col-md-6">
					<h4 class="text-blue h5 mb-20">
						Edit Your Personal Setting
					</h4>
					<div class="form-group">
						<label>Full Name</label>
						<input class="form-control form-control-lg" type="text" name="full_name" value="<?php echo $fullName;?>">
					</div>
					<div class="form-group">
						<label>Title</label>
						<input class="form-control form-control-lg" type="text" name="title" value="<?php echo $title;?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control form-control-lg" type="email" name="email" value="<?php echo $email;?>">
					</div>
					<div class="form-group">
						<label>Postal Code</label>
						<input class="form-control form-control-lg" type="text" name="postal_code" value="<?php echo $postalCode;?>">
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input class="form-control form-control-lg" type="text" name="phone_number" value="<?php echo $phoneNumber;?>">
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" name="address"><?php echo $address; ?></textarea>
					</div>

					<!-- Add profile picture upload field -->
					<div class="form-group">
                        <label>Profile Picture:</label>
                        <input class="form-control" type="file" name="profile_picture">
                    </div>
                <!-- End of profile picture upload field -->
					
					
				</li>
				<li class="weight-500 col-md-6">
					<h4 class="text-blue h5 mb-20">
						Edit Social Media links
					</h4>
					<div class="form-group">
						<label>Facebook URL:</label>
						<input class="form-control form-control-lg" type="text" name="facebook_url" value="<?php echo $facebookUrl; ?>">
					</div>
					<div class="form-group">
						<label>Twitter URL:</label>
						<input class="form-control form-control-lg" type="text" name="twitter_url" value="<?php echo $twitterUrl; ?>">
					</div>
					<div class="form-group">
						<label>Linkedin URL:</label>
						<input class="form-control form-control-lg" type="text" name="linkedin_url" value="<?php echo $linkedinUrl; ?>">
					</div>
					<div class="form-group">
						<label>Instagram URL:</label>
						<input class="form-control form-control-lg" type="text" name="instagram_url" value="<?php echo $instagramUrl; ?>">
					</div>
					<div class="form-group mb-0">
						<input type="submit" class="btn btn-primary" value="Save & Update">
					</div>
				</li>
			</ul>
		</div>
	</form>
											</div>
											<!-- Setting Tab End -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
    <?php include('includes/footer.php');?>