
<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
    exit(); // Always exit after redirecting
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

// Function to insert or update profile information
function updateProfileInfo($conn, $fullName, $title, $email, $postalCode, $phoneNumber, $address, $facebookUrl, $twitterUrl, $linkedinUrl, $instagramUrl, $profilePicture, $adminName) {
    $fullName = mysqli_real_escape_string($conn, $fullName);
    $title = mysqli_real_escape_string($conn, $title);
    $email = mysqli_real_escape_string($conn, $email);
    $postalCode = mysqli_real_escape_string($conn, $postalCode);
    $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
    $address = mysqli_real_escape_string($conn, $address);
    $facebookUrl = mysqli_real_escape_string($conn, $facebookUrl);
    $twitterUrl = mysqli_real_escape_string($conn, $twitterUrl);
    $linkedinUrl = mysqli_real_escape_string($conn, $linkedinUrl);
    $instagramUrl = mysqli_real_escape_string($conn, $instagramUrl);
    $profilePicture = mysqli_real_escape_string($conn, $profilePicture);
    $adminName = mysqli_real_escape_string($conn, $adminName);

    // Check if the user already has a profile
    $sql_check = "SELECT * FROM admin_profiles WHERE admin_name = '$adminName'";
    $result_check = mysqli_query($conn, $sql_check);
    if (!$result_check) {
        die("Error executing query: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($result_check) > 0) {
        // If the profile exists, update the record
        $sql = "UPDATE admin_profiles SET 
                full_name = '$fullName', 
                title = '$title', 
                email = '$email', 
                postal_code = '$postalCode', 
                phone_number = '$phoneNumber', 
                address = '$address', 
                facebook_url = '$facebookUrl', 
                twitter_url = '$twitterUrl', 
                linkedin_url = '$linkedinUrl', 
                instagram_url = '$instagramUrl', 
                profile_picture = '$profilePicture' 
                WHERE admin_name = '$adminName'";
    } else {
        // If the profile doesn't exist, insert a new record
        $sql = "INSERT INTO admin_profiles (admin_name, full_name, title, email, postal_code, phone_number, address, facebook_url, twitter_url, linkedin_url, instagram_url, profile_picture)
                VALUES ('$adminName', '$fullName', '$title', '$email', '$postalCode', '$phoneNumber', '$address', '$facebookUrl', '$twitterUrl', '$linkedinUrl', '$instagramUrl', '$profilePicture')";
    }

    return mysqli_query($conn, $sql);
}

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
    $profilePicture = $_FILES['profile_picture']['name'];
    $adminName = $_POST['admin_name'];

    if (updateProfileInfo($conn, $fullName, $title, $email, $postalCode, $phoneNumber, $address, $facebookUrl, $twitterUrl, $linkedinUrl, $instagramUrl, $profilePicture, $adminName)) {
        // Move the uploaded file to the desired directory
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], "uploads/$profilePicture");
        echo "Profile information updated successfully.";
    } else {
        echo "Error updating profile information: " . mysqli_error($conn);
    }
}

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
						<input type="hidden" name="admin_name" value="<?php echo $_SESSION['admin_name']; ?>">
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