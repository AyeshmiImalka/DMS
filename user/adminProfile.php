<?php
// Include the database connection file
@include '../config_form.php';
session_start();

// Check if the admin is logged in
if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
    exit(); // Ensure script stops execution after redirection
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

// Retrieve the admin profile details from the database
$sql = "SELECT * FROM admin_profiles WHERE admin_name = '".$_SESSION['admin_name']."'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result === false) {
    echo "Error: " . mysqli_error($conn);
} else {
    // Retrieve the admin profile details from the result set
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fullName = $row['full_name'];
        $title = $row['title'];
        $email = $row['email'];
        $postalCode = $row['postal_code'];
        $phoneNumber = $row['phone_number'];
        $address = $row['address'];
        $facebookUrl = $row['facebook_url'];
        $twitterUrl = $row['twitter_url'];
        $linkedinUrl = $row['linkedin_url'];
        $instagramUrl = $row['instagram_url'];
        $profilePicture = $row['profile_picture'];
    } else {
        echo "No profile found.";
    }
}

// Close the connection
mysqli_close($conn);
?>

<?php include('includes/header.php'); ?>

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
                <div class="col-md-6 offset-md-3 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                            <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="avatar-photo">
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body pd-5">
                                            <div class="img-container">
                                                <img id="image" src="<?php echo $profilePicture; ?>" alt="Picture">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center h5 mb-0"><?php echo $fullName; ?></h5>
                        <p class="text-center text-muted font-14"><?php echo $title; ?></p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul class="list-unstyled" style="font-size: 16px;"> <!-- Adjust font size -->
                                <li><strong>Email:  </strong> <?php echo $email; ?></li>
                                <li><strong>Phone:  </strong> <?php echo $phoneNumber; ?></li>
                                <li><strong>Address:  </strong> <?php echo $address; ?></li>
                            </ul>
                        </div>
                        <div class="profile-social">
                            <h5 class="mb-20 h5 text-blue">Social Links</h5>
                            <ul class="clearfix">
                                <li><a href="<?php echo $facebookUrl; ?>" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook fa-lg"></i></a></li> <!-- Adjust icon size -->
                                <li><a href="<?php echo $twitterUrl; ?>" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter fa-lg"></i></a></li> <!-- Adjust icon size -->
                                <li><a href="<?php echo $linkedinUrl; ?>" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin fa-lg"></i></a></li> <!-- Adjust icon size -->
                                <li><a href="<?php echo $instagramUrl; ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram fa-lg"></i></a></li> <!-- Adjust icon size -->
                                <!-- Add other social links similarly -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
       
       

<?php include('includes/footer.php'); ?>
