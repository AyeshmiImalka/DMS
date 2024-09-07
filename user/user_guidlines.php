<?php
@include '../config_form.php';
session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}

$admin_name = $_SESSION['user_name']; // Fetch admin name from session
?>

<?php 
include('includes/header.php');
?>

<link rel="stylesheet" href="assets/styles.css">

<style>
    .guideline-item {
    margin-bottom: 10px; /* Adjust the space below each list item as needed */
}

</style>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="title">
                            <h4>User Guidelines</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: #318BFF;">
                                    User Guidelines
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
            <!-- Guidelines list -->
           
<div class="row">
    <div class="col-12">
        <div class="card-box pd-20">
            <h5 class="mb-20">Please Follow The Guidlines Before Filling Your Application</h5>
            <ul class="list-unstyled">
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li>
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Curabitur pretium tincidunt lacus.</li>
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Nulla gravida orci a odio.</li>
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Nullam varius, est a interdum malesuada, nisi felis convallis orci, et imperdiet purus felis nec arcu.</li>
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Vivamus lacinia odio vitae vestibulum.</li>
                <li class="guideline-item"><i class="fa fa-check-circle" style="color: #318BFF;"></i> Etiam euismod augue vel arcu ultrices, ut scelerisque urna condimentum.</li>
            </ul>
        </div>
    </div>
</div>
<br><br>
<?php include('includes/footer.php'); ?>
        </div>
    </div>
</div>



