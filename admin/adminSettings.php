<?php
@include 'config_form.php';
session_start();

if (!isset($_SESSION['admin_name'])) {
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
function updateProfileInfo($conn, $adminName, $newData) {
    $adminName = mysqli_real_escape_string($conn, $adminName);

    // Check if the user already has a profile
    $sql_check = "SELECT * FROM admin_profiles WHERE admin_name = '$adminName'";
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
            $sql = "UPDATE admin_profiles SET " . implode(', ', $updates) . " WHERE admin_name = '$adminName'";
            return mysqli_query($conn, $sql);
        }
    } else {
        $columns = implode(", ", array_keys($newData));
        $values = implode(", ", array_map(function ($value) use ($conn) {
            return "'" . mysqli_real_escape_string($conn, $value) . "'";
        }, array_values($newData)));

        $sql = "INSERT INTO admin_profiles (admin_name, $columns) VALUES ('$adminName', $values)";
        return mysqli_query($conn, $sql);
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

    $adminName = $_SESSION['admin_name'];
    if (updateProfileInfo($conn, $adminName, $newData)) {
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
$adminName = $_SESSION['admin_name'];
$sql_fetch = "SELECT * FROM admin_profiles WHERE admin_name = '$adminName'";
$result_fetch = mysqli_query($conn, $sql_fetch);
if ($result_fetch && mysqli_num_rows($result_fetch) > 0) {
    $row = mysqli_fetch_assoc($result_fetch);
    $fullName = $row['full_name'];
    $title = $row['title'];
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

    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
    }

    .edit-icon {
        cursor: pointer;
        margin-left: 10px;
        color: blue;
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
                                                        <?php if (empty($profilePicture)) { ?>
                                                            <img id="profile_picture_preview" src="assets/img/default_profile_picture.png" alt="Profile Picture">
                                                        <?php } else { ?>
                                                            <img id="profile_picture_preview" src="uploads/<?php echo htmlspecialchars($profilePicture); ?>" alt="Profile Picture">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="profile-picture-buttons">
                                                        <i class="fas fa-edit" onclick="document.getElementById('profile_picture').click();"></i>
                                                        <i class="fas fa-trash" onclick="deleteProfilePicture();"></i>
                                                    </div>
                                                    <div class="profile-info">
                                                        <input type="hidden" name="delete_profile_picture" id="delete_profile_picture" value="0">
                                                        <input type="hidden" name="existing_profile_picture" value="<?php echo htmlspecialchars($profilePicture); ?>">
                                                        <input type="hidden" name="admin_name" value="<?php echo htmlspecialchars($adminName); ?>">
                                                        <div class="profile-section">
                                                            <div class="section-content">
                                                                <input type="file" name="profile_picture" id="profile_picture" class="form-control" style="display: none;" onchange="document.getElementById('profile_picture_preview').src = window.URL.createObjectURL(this.files[0]);">
                                                            </div>
                                                        </div>
                                                        <div class="profile-section">
                                                            <div class="section-label">Name</div>
                                                            <div class="section-content">
                                                                <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($fullName); ?>" class="form-control" disabled>
                                                            </div>
                                                            <i class="fas fa-edit edit-icon" id="edit_name" onclick="enableEdit('full_name', 'edit_name')"></i>
                                                        </div>
                                                        <div class="profile-section">
                                                            <div class="section-label">Title</div>
                                                            <div class="section-content">
                                                                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" class="form-control" disabled>
                                                            </div>
                                                            <i class="fas fa-edit edit-icon" id="edit_title" onclick="enableEdit('title', 'edit_title')"></i>
                                                        </div>
                                                        <div class="profile-section">
                                                            <div class="section-label">Email</div>
                                                            <div class="section-content">
                                                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="form-control" disabled>
                                                            </div>
                                                            <i class="fas fa-edit edit-icon" id="edit_email" onclick="enableEdit('email', 'edit_email')"></i>
                                                        </div>
                                                        <div class="profile-section">
                                                            <div class="section-label">Phone Number</div>
                                                            <div class="section-content">
                                                                <input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($phoneNumber); ?>" class="form-control" disabled>
                                                            </div>
                                                            <i class="fas fa-edit edit-icon" id="edit_phone" onclick="enableEdit('phone_number', 'edit_phone')"></i>
                                                        </div>
                                                        <div class="profile-section">
                                                            <div class="section-label">Address</div>
                                                            <div class="section-content">
                                                                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>" class="form-control" disabled>
                                                            </div>
                                                            <i class="fas fa-edit edit-icon" id="edit_address" onclick="enableEdit('address', 'edit_address')"></i>
                                                        </div>
                                                        <div class="profile-section">
                                                            <div class="section-label">Facebook URL</div>
                                                            <div class="section-content">
                                                                <input type="url" id="facebook_url" name="facebook_url" value="<?php echo htmlspecialchars($facebookUrl); ?>" class="form-control" disabled>
                                                            </div>
                                                            <i class="fas fa-edit edit-icon" id="edit_facebook" onclick="enableEdit('facebook_url', 'edit_facebook')"></i>
                                                        </div>
                                                        <div class="profile-section">
                                                            <div class="section-label">Twitter URL</div>
                                                            <div class="section-content">
                                                                <input type="url" id="twitter_url" name="twitter_url" value="<?php echo htmlspecialchars($twitterUrl); ?>" class="form-control" disabled>
                                                            </div>
                                                            <i class="fas fa-edit edit-icon" id="edit_twitter" onclick="enableEdit('twitter_url', 'edit_twitter')"></i>
                                                        </div>
                                                        <div class="profile-section">
                                                            <div class="section-label">LinkedIn URL</div>
                                                            <div class="section-content">
                                                                <input type="url" id="linkedin_url" name="linkedin_url" value="<?php echo htmlspecialchars($linkedinUrl); ?>" class="form-control" disabled>
                                                            </div>
                                                            <i class="fas fa-edit edit-icon" id="edit_linkedin" onclick="enableEdit('linkedin_url', 'edit_linkedin')"></i>
                                                        </div>
                                                        <div class="profile-section">
                                                            <div class="section-label">Instagram URL</div>
                                                            <div class="section-content">
                                                                <input type="url" id="instagram_url" name="instagram_url" value="<?php echo htmlspecialchars($instagramUrl); ?>" class="form-control" disabled>
                                                            </div>
                                                            <i class="fas fa-edit edit-icon" id="edit_instagram" onclick="enableEdit('instagram_url', 'edit_instagram')"></i>
                                                        </div>
                                                        <div class="section-actions">
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
