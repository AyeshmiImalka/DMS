<?php
// Start session
session_start();

// Include the database configuration file
@include '../config_form.php'; // Ensure this file connects to your database and assigns $conn

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit();
}

// Debugging: Check if the database connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $store_name = mysqli_real_escape_string($conn, $_POST['store_name']);
    $contact_email = mysqli_real_escape_string($conn, $_POST['contact_email']);

    // Debug: Check if the form data is being received
    if (empty($store_name) || empty($contact_email)) {
        die("Error: Both Store name and contact email must be filled.");
    }

    // Prepare SQL statement to prevent SQL injection
    $sql = "INSERT INTO private_ayurvedic_drug_stores_registration_requests (store_name, contact_email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $store_name, $contact_email);

        if ($stmt->execute()) {
            // Set a session variable to trigger the success popup after form submission
            $_SESSION['success_message'] = "Successfully submitted.";
            header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page to avoid form resubmission
            exit();
        } else {
            // Error message if data insertion fails
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error inserting data: " . $stmt->error . "',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
        $stmt->close();
    } else {
        // Error message if SQL preparation fails
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error preparing statement: " . $conn->error . "',
                confirmButtonText: 'OK'
            });
        </script>";
    }
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
                            <h4>Private Ayurvedic Drug Stores Registration</h4>
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
                <p><strong style="color: red;">Important:</strong> Please make sure to fill out the <strong>essential registration details</strong> form below accurately. This information is required for the registration process to be completed.</p>
            </div>

            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4" style="color: #318BFF">Private Ayurvedic Drug Stores Registration</h4>
                </div>
                <div class="pb-20">
                    <!-- Form added -->
                    <div class="form-instructions">
                        <form id="registrationForm" method="post" action="">
                            <div class="form-group row">
                                <label for="businessName" class="col-sm-3 col-form-label">Store Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" id="businessName" name="store_name" class="form-control" placeholder="Enter business name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Contact Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" id="email" name="contact_email" class="form-control" placeholder="Enter email address" required>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary" style="background-color: #318BFF;">Submit</button>
                        </form>
                    </div>
                </div>
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
    
    /* Styling for the form */
    .form-group {
        margin-bottom: 1rem;
    }
    
    .form-group label {
        font-weight: bold;
    }
    
    .form-control {
        padding: 0.75rem 1.25rem;
        font-size: 1rem;
        border-radius: 0.25rem;
    }
    
    .btn-primary {
        border: none; /* Remove the border */
        transition: box-shadow 0.3s ease-in-out; /* Smooth transition for the shadow effect */
        padding: 0.5rem 1.5rem; /* Add padding for better button size */
    }

    .btn-primary:hover {
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3); /* Shadow effect on hover */
        transform: translateY(-2px); /* Slight lift effect on hover */
    }

    /* Ensuring alignment and spacing */
    .form-group.row {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .form-group.row label {
        margin-bottom: 0;
        padding-right: 1rem; /* Padding for label and input separation */
    }

    .form-group.row .form-control {
        width: 100%;
    }

    .card-box {
        padding: 2rem;
        border-radius: 0.5rem;
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Check if the session has a success message and display it
    <?php if (isset($_SESSION['success_message'])): ?>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?php echo $_SESSION['success_message']; ?>',
        confirmButtonText: 'OK'
    });
    <?php unset($_SESSION['success_message']); // Clear success message after displaying ?>
    <?php endif; ?>

    // Form validation and submission handling
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        if (!this.checkValidity()) {
            event.preventDefault(); // Prevent form submission if validation fails
            Swal.fire({
                icon: 'error',
                title: 'Invalid Form',
                text: 'Please make sure all fields are filled out correctly.',
                confirmButtonText: 'OK'
            });
        }
    });
</script>
