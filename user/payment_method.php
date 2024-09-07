<?php
@include 'config_form.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}

$admin_name = $_SESSION['user_name']; // Fetch admin name from session
?>

<?php 
include('includes/header.php');
?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="title">
                            <h4>Payments Section</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: #318BFF">
                                    Registration
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- New row with warning text -->
            <div class="alert alert-warning mb-30">
                <p><strong style="color: red;">Important:</strong> Please make sure to fill out the <strong>essential registration details</strong>  form below accurately, after the completing payment process according to your need. Payment details is essential for the registration process to be completed.</p>
            </div>

            

            <?php include('includes/footer.php'); ?>
        </div>
    </div>
</div>

<style>
    /* Optional: Style adjustments for the new text */
    .form-instructions p {
        font-size: 16px;
        color: #333;
        font-weight: bold;
    }
    
    /* Style for the alert box */
    .alert-warning {
        background-color: #fff3cd;
        border-color: #ffeeba;
        color: #856404;
        padding: 15px;
        border-radius: 5px;
    }
    

    .card-box {
        padding: 2rem;
        border-radius: 0.5rem;
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

