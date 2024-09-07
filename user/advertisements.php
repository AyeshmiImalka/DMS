<?php
session_start();
include 'config_form.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
    exit(); // Ensure that the script stops executing after redirection
}
?>

<?php include('includes/header.php'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="title">
                            <h4>Advertisements Registration</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: #318BFF;">
                                    Advertisements Registration
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <?php include('includes/footer.php'); ?>
        </div>
    </div>
</div>



