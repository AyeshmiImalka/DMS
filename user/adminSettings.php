<?php
@include '../config_form.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit();
}

// Initialize variables
$fullName = '';
$title = '';
$email = '';
$phoneNumber = '';
$address = '';
$facebookUrl = '';
$twitterUrl = '';
$linkedinUrl = '';
$instagramUrl = '';
$profilePicture = '';

// Function to update profile information
function updateProfileInfo($conn, $userName, $newData)
{
    $userName = mysqli_real_escape_string($conn, $userName);

    // Check if the user already has a profile
    $sql_check = "SELECT * FROM user_profiles WHERE user_name = '$userName'";
    $result_check = mysqli_query($conn, $sql_check);
    if (!$result_check) {
        die("Error executing query: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result_check) > 0) {
        $updates = [];
        foreach ($newData as $key => $value) {
            $value = mysqli_real_escape_string($conn, $value);
            $updates[] = "$key = '$value'";
        }
        if (!empty($updates)) {
            $sql = "UPDATE user_profiles SET " . implode(', ', $updates) . " WHERE full_name = '$userName'";
            return mysqli_query($conn, $sql);
        }
    } else {
        $columns = implode(", ", array_keys($newData));
        $values = implode(", ", array_map(function ($value) use ($conn) {
            return "'" . mysqli_real_escape_string($conn, $value) . "'";
        }, array_values($newData)));

        //$sql = "INSERT INTO user_profiles (user_name, $columns) VALUES ('$userName', $values)";
        //return mysqli_query($conn, $sql);
    }
    return false;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newData = [];
    $fields = ['full_name', 'title', 'email', 'phone_number', 'address', 'facebook_url', 'twitter_url', 'linkedin_url', 'instagram_url'];
    foreach ($fields as $field) {
        if (isset($_POST[$field]) && !empty($_POST[$field])) {
            $newData[$field] = $_POST[$field];
        }
    }

    // Handle profile picture upload
    if (isset($_FILES['profile_picture']) && !empty($_FILES['profile_picture']['name'])) {
        $profilePicture = $_FILES['profile_picture']['name'];
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], "uploads/$profilePicture");
        $newData['profile_picture'] = $profilePicture;
    } elseif (isset($_POST['delete_profile_picture']) && $_POST['delete_profile_picture'] == '1') {
        $newData['profile_picture'] = '';
    }

    $userName = $_SESSION['user_name'];
    if (updateProfileInfo($conn, $userName, $newData)) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Profile updated',
                    text: 'Profile information updated successfully.'
                });
            });
        </script>";
    } else {
        echo "<div class='alert alert-danger'>Error updating profile information: " . mysqli_error($conn) . "</div>";
    }
}

// Fetch current profile data
$userName = $_SESSION['user_name'];
$sql_fetch = "SELECT * FROM user_profiles WHERE user_name = '$userName'";
$result_fetch = mysqli_query($conn, $sql_fetch);
if ($result_fetch && mysqli_num_rows($result_fetch) > 0) {
    $row = mysqli_fetch_assoc($result_fetch);
    $fullName = $row['user_name'];  
    $email = $row['email'];
    $phoneNumber = $row['phone_number'];
    $address = $row['address'];
    $facebookUrl = $row['facebook_url'];
    $twitterUrl = $row['twitter_url'];
    $linkedinUrl = $row['linkedin_url'];
    $instagramUrl = $row['instagram_url'];
    $profilePicture = $row['profile_picture'];
}

include('includes/header.php');
?>

<style>
    .profile-container {
        display: flex;
        flex-wrap: wrap;
        gap: 0px;
        margin-bottom: 20px;
        justify-content: center;
    }

    .profile-picture-container {
        position: relative;
        display: inline-block;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #ddd;
    }

    .profile-picture-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-picture-buttons {
        display: flex;
        flex-direction: column;
        gap: 0px;
        margin-top: 0px;
        align-items: center;
    }

    .profile-picture-buttons i {
        background: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
    }

    .profile-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .profile-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        background: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .section-label {
        font-weight: bold;
        flex: 1;
    }

    .section-content {
        flex: 2;
    }

    .section-actions {
        flex: 1;
        text-align: right;
    }

    .breadcrumb {
        background: none;
        padding: 0;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        content: ">";
    }

    .edit-icon {
        cursor: pointer;
        margin-left: 10px;
        color: #318BFF;
    }


    .btn-primary {
        border: none;
        /* Remove the border */
        transition: box-shadow 0.3s ease-in-out;
        /* Smooth transition for the shadow effect */
    }

    .btn-primary:hover {
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
        /* Shadow effect on hover */
        transform: translateY(-2px);
        /* Slight lift effect on hover */
    }

    /* popup image uploader */
    /* Popup container */
    .popup {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #888;
        width: 400px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    /* Close button */
    .close-btn {
        float: right;
        color: #aaa;
        font-size: 24px;
        font-weight: bold;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    /* Upload form styling */
    .popup-content {
        text-align: center;
    }
</style>

<script>
    function enableEdit(fieldId, iconId) {
        document.getElementById(fieldId).disabled = false;
        document.getElementById(iconId).style.display = 'none';
    }


    function deleteProfilePicture() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Are you sure you want to delete the profile picture?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete_profile_picture').value = '1';
                document.getElementById('profile_picture_preview').src = 'assets/img/default_profile_picture.png';
            }
        });
    }
</script>

<!--popup image uploader-->
<!-- Button to open the popup -->

<!-- Popup HTML -->
<div id="popup" class="popup">
    <span class="close-btn" onclick="closePopup()">&times;</span>
    <div class="popup-content">
        <h2>Upload an Image</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" required><br><br>
            <button type="submit">Upload</button>
        </form>
    </div>
</div>



<?php


// Handle file upload
// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Validate file size and type
        if ($_FILES["image"]["size"] > 500000) { // Size limit: 500KB
            $uploadOk = 0;
            echo "<script>alert('Sorry, your file is too large.');</script>";
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        }
        if ($uploadOk == 0) {
            echo "<script>alert('Sorry, your file was not uploaded.');</script>";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Update the database with the new image filename
                $userName = mysqli_real_escape_string($conn, $_SESSION['user_name']);
                $filename = basename($_FILES["image"]["name"]);
                $sql = "UPDATE `user_profiles` SET `profile_picture` = '$filename' WHERE `user_name` = '$userName' LIMIT 1";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('The file " . $filename . " has been uploaded.');</script>";
                } else {
                    echo "<script>alert('Database update failed.');</script>";
                }
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        }
    } else {
        echo "<script>alert('File is not an image.');</script>";
        $uploadOk = 0;
    }
}



?>

<script>
    // Function to open the popup
    function openPopup() {
        document.getElementById("popup").style.display = "block";
    }

    // Function to close the popup
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>
<!--popup image uploader-->

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
                                    <a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: #318BFF;">
                                    Settings
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item active">
                                        <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Profile Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
    <div class="tab-pane fade show active" id="setting" role="tabpanel">
        <div class="pd-20">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="profile-container">
                    <div class="profile-picture-container">
                        <?php if (empty($target_file)) { ?>
                            <img id="profile_picture_preview" src="assets/img/default_profile_picture.png" alt="Profile Picture">
                        <?php } else { ?>
                            <img id="profile_picture_preview" src="<?php echo $target_file; ?>" alt="Profile Picture">
                        <?php } ?>
                    </div>
                    <div class="profile-picture-buttons">
                        <i class="fas fa-edit" onclick="openPopup()"></i>
                        <i class="fas fa-trash" onclick="deleteProfilePicture();"></i>
                    </div>
                    <div class="profile-info">
                        <input type="hidden" name="delete_profile_picture" id="delete_profile_picture" value="0">
                        <input type="hidden" name="existingProfilePicture" value="<?php echo $profilePicture; ?>">
                        <input type="hidden" name="user_name" value="<?php echo $userName; ?>">
                        <?php

                        $id = '';
                        $userName = '';
                        $email = '';
                        $phoneNumber = '';
                        $address = '';
                        $facebookUrl = '';
                        $twitterUrl = '';
                        $linkedinUrl = '';
                        $instagramUrl = '';
                        $profilePicture = '';
                        $pasword = '';
                        $full_name = '';
                        $title = '';

                        if (isset($_SESSION['user_name'])) {
                            $userName = $_SESSION['user_name'];

                            $stmt = $conn->prepare("SELECT * FROM user_profiles WHERE user_name = ? LIMIT 1");
                            $stmt->bind_param("s", $userName);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $id = $row['id'];
                                $userName = $row['user_name'];
                                $email = $row['email'];
                                $phoneNumber = $row['phone_number'];
                                $address = $row['address'];
                                $facebookUrl = $row['facebook_url'];
                                $twitterUrl = $row['twitter_url'];
                                $linkedinUrl = $row['linkedin_url'];
                                $instagramUrl = $row['instagram_url'];
                                $profilePicture = $row['profile_picture'];
                                $pasword = $row['password'];
                                $full_name = $row['name'];
                                
                            }
                        }

                        ?>

                        <div class="profile-section">
                            <div class="section-label">Name</div>
                            <div class="section-content">
                                <input type="text" id="full_name" name="fullName" value="<?php echo $full_name; ?>" class="form-control" disabled>
                            </div>
                            <i class="fas fa-edit edit-icon" id="edit_name" onclick="enableEdit('full_name', 'edit_name')"></i>
                        </div>
                        <div class="profile-section">
                            <div class="section-label">Title</div>
                            <div class="section-content">
                                <input type="text" id="title" name="title" value="<?php echo $title; ?>" class="form-control" disabled>
                            </div>
                            <i class="fas fa-edit edit-icon" id="edit_title" onclick="enableEdit('title', 'edit_title')"></i>
                        </div>
                        <div class="profile-section">
                            <div class="section-label">Email</div>
                            <div class="section-content">
                                <input type="email" id="email" name="emailAddress" value="<?php echo $email; ?>" class="form-control" disabled>
                            </div>
                            <i class="fas fa-edit edit-icon" id="edit_email" onclick="enableEdit('email', 'edit_email')"></i>
                        </div>
                        <div class="profile-section">
                            <div class="section-label">Phone Number</div>
                            <div class="section-content">
                                <input type="text" id="phone_number" name="phoneNumber" value="<?php echo $phoneNumber; ?>" class="form-control" disabled>
                            </div>
                            <i class="fas fa-edit edit-icon" id="edit_phone" onclick="enableEdit('phone_number', 'edit_phone')"></i>
                        </div>
                        <div class="profile-section">
                            <div class="section-label">Address</div>
                            <div class="section-content">
                                <input type="text" id="address" name="address" value="<?php echo $address; ?>" class="form-control" disabled>
                            </div>
                            <i class="fas fa-edit edit-icon" id="edit_address" onclick="enableEdit('address', 'edit_address')"></i>
                        </div>
                        <div class="profile-section">
                            <div class="section-label">Facebook URL</div>
                            <div class="section-content">
                                <input type="url" id="facebook_url" name="facebookUrl" value="<?php echo $facebookUrl; ?>" class="form-control" disabled>
                            </div>
                            <i class="fas fa-edit edit-icon" id="edit_facebook" onclick="enableEdit('facebook_url', 'edit_facebook')"></i>
                        </div>
                        <div class="profile-section">
                            <div class="section-label">Twitter URL</div>
                            <div class="section-content">
                                <input type="url" id="twitter_url" name="twitterUrl" value="<?php echo $twitterUrl; ?>" class="form-control" disabled>
                            </div>
                            <i class="fas fa-edit edit-icon" id="edit_twitter" onclick="enableEdit('twitter_url', 'edit_twitter')"></i>
                        </div>
                        <div class="profile-section">
                            <div class="section-label">LinkedIn URL</div>
                            <div class="section-content">
                                <input type="url" id="linkedin_url" name="linkedinUrl" value="<?php echo $linkedinUrl; ?>" class="form-control" disabled>
                            </div>
                            <i class="fas fa-edit edit-icon" id="edit_linkedin" onclick="enableEdit('linkedin_url', 'edit_linkedin')"></i>
                        </div>
                        <div class="profile-section">
                            <div class="section-label">Instagram URL</div>
                            <div class="section-content">
                                <input type="url" id="instagram_url" name="instagramUrl" value="<?php echo $instagramUrl; ?>" class="form-control" disabled>
                            </div>
                            <i class="fas fa-edit edit-icon" id="edit_instagram" onclick="enableEdit('instagram_url', 'edit_instagram')"></i>
                        </div>
                        <div class="section-actions">
                            <button type="submit" class="btn btn-primary" name="submit" style="background-color: #318BFF;">Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $userName = $_SESSION['user_name'];

                    $stmt = $conn->prepare("UPDATE `user_profiles` SET 
                                            `name` = ?, 
                                            `email` = ?, 
                                            `phone_number` = ?, 
                                            `address` = ?, 
                                            `facebook_url` = ?, 
                                            `twitter_url` = ?, 
                                            `linkedin_url` = ?, 
                                            `instagram_url` = ?, 
                                            `profile_picture` = ? 
                                            WHERE `user_name` = ? LIMIT 1");

                    $stmt->bind_param("ssssssssss", 
                                       $name, 
                                       $email, 
                                       $phoneNumber, 
                                       $address, 
                                       $facebookUrl, 
                                       $twitterUrl, 
                                       $linkedinUrl, 
                                       $instagramUrl, 
                                       $profilePicture, 
                                       $userName);

                    $name = $_POST['fullName'];
                    $email = $_POST['emailAddress'];
                    $phoneNumber = $_POST['phoneNumber'];
                    $address = $_POST['address'];
                    $facebookUrl = $_POST['facebookUrl'];
                    $twitterUrl = $_POST['twitterUrl'];
                    $linkedinUrl = $_POST['linkedinUrl'];
                    $instagramUrl = $_POST['instagramUrl'];
                    $profilePicture = $_POST['existingProfilePicture'];

                    if ($stmt->execute()) {
                        echo "<script>alert('Profile updated successfully!');</script>";
                    } else {
                        echo "<script>alert('Error updating profile.');</script>";
                    }
                }
            }
?>



                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
    </div>
</div>