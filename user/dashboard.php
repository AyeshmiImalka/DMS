

<?php
@include '../config_form.php';
session_start();

if(!isset($_SESSION['user_name'])){
    header('location:../login_form.php');
}

$user_name = $_SESSION['user_name']; // Fetch admin name from session
?>

<?php 
include('includes/header.php');
?>

<style>
  .welcome-message {
    font-size: 2rem;
    font-weight: 700;
    text-transform: capitalize;
    margin-bottom: 20px;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMoveDown 1s ease-out forwards;
    color: #fff; /* White text for contrast */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Subtle text shadow */
  }

  .description {
    font-size: 2.3rem;
    max-width: 600px;
    margin: 0 auto;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMoveDown 1s ease-out forwards 0.5s;
    color: #ddd; /* Slightly lighter text */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Subtle text shadow */
  }

  @keyframes fadeInMoveDown {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .mirror-image {
    position: absolute;
    left: 0;
    top: 0;
    transform: scaleX(-1);
    height: 50%; /* Adjust the height to 50% */
    width: auto;
    opacity: 0.1; /* Transparent to not overshadow the text */
}

  .dashboard-admin {
    font-size: 2.5rem;
    font-weight: 600;
    color: #1D8FE1;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMoveDown 1s ease-out forwards 0.5s;
  }

  .card-box .banner{
    text-align: center;
    padding: 50px;
    background: rgba(0, 0, 0, 0.5); /* Dark semi-transparent overlay */
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  /* Responsive Adjustments */
  @media (max-width: 767px) {
    .welcome-message {
      font-size: 1.5rem;
    }

    .description {
      font-size: 1.8rem;
    }

    .mirror-image {
      display: none; /* Hide mirrored image on small screens */
    }

    .col-md-8,
    .col {
      text-align: center;
    }

    .col img {
      margin-top: 20px;
      width: 80%; /* Adjust image size on small screens */
    }
  }

  .btn-primary {
    border: none; /* Remove the border */
    transition: box-shadow 0.3s ease-in-out; /* Smooth transition for the shadow effect */
}

.btn-primary:hover {
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3); /* Shadow effect on hover */
    transform: translateY(-2px); /* Slight lift effect on hover */
}


.card {
    position: relative;
    overflow: hidden;
}

/* Style the edit icon */
.edit-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    color: white;
    padding: 5px;
    border-radius: 50%; /* Make it circular */
    cursor: pointer;
    z-index: 1; /* Ensure it's on top of other elements */
    transition: background-color 0.3s ease;
}

/* Change background color on hover */
.edit-icon:hover {
    background-color: #318BFF;
}

/* Optional: increase the size of the icon for better visibility */
.edit-icon i {
    font-size: 16px;
}

/* Style the delete icon */
.delete-icon {
    position: absolute;
    top: 50px; /* Adjust this value to move the delete icon below the edit icon */
    right: 10px;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    color: white;
    padding: 5px;
    border-radius: 50%; /* Make it circular */
    cursor: pointer;
    z-index: 1; /* Ensure it's on top of other elements */
    transition: background-color 0.3s ease;
}

/* Change background color on hover */
.delete-icon:hover {
    background-color: red;
}

/* Optional: increase the size of the icon for better visibility */
.delete-icon i {
    font-size: 16px;
}

</style>

<link rel="stylesheet" href="assets/styles.css">


    <!-- Banner section starts here -->
<div class="container-fluid main-container">
  <div class="card-box pd-20 mb-30" style="background-image: url('assets/vendor/images/banner_bg.jpg'); background-size: cover; background-position: center; color: white; position: relative; height: 300px;">
    <!-- Add the mirrored image here -->
    <img class="mirror-image" src="assets/vendor/images/dms_banner.png" alt="" style="height: 50%; width: auto;" />

    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="welcome-message" style="white-space: nowrap;">Welcome to your profile, <span style="color: #228b22;"><?php echo $user_name; ?></span>!</h1>
        <h2 class="description" style="white-space: nowrap;">Document Management System</h2>
      </div>
      <div class="col-md-6 text-right">
        <img src="assets/vendor/images/dms_banner.png" alt="" style="max-width: 200px;" />
      </div>
    </div>
  </div>
<!-- Banner section ends here -->







<!-- Company details section starts here -->
  <div class="row">
    <div class="col-xl-8 col-md-12 mb-30">
    <div class="card-box height-100-p pd-20">
      <h2 class="h4 mb-20" style="color: #318BFF">Organization/Company/Business Details</h2>
      <form action="save_company_details.php" method="post">
        <div class="form-group row">
          <label for="company_name" class="col-sm-3 col-form-label">Company Name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="location" class="col-sm-3 col-form-label">Location</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="registered_number" class="col-sm-3 col-form-label">Registered Number</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="registered_number" name="registered_number" placeholder="Enter registered number" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="registered_date" class="col-sm-3 col-form-label">Registered Date</label>
          <div class="col-sm-9">
            <input type="date" class="form-control" id="registered_date" name="registered_date" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="contact_number" class="col-sm-3 col-form-label">Contact Number</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter contact number" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #318BFF;">Save Details</button>
      </form>
    </div>
  </div>
  <!-- Company details section ends here -->








<!--Owner details section starts here -->

<?php


// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $owner_name = $_POST['owner_name'];
    $personal_email = $_POST['personal_email'];
    $owner_contact_number = $_POST['owner_contact_number'];
    $action = $_POST['action'];

    if ($action == 'save') {
        // Insert data into the database
        $sql = "INSERT INTO owner_details (owner_name, personal_email, owner_contact_number)
                VALUES ('$owner_name', '$personal_email', '$owner_contact_number')";

        if ($conn->query($sql) === TRUE) {
            // echo "Owner details saved successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action == 'edit') {
        // Update data in the database
        $sql = "UPDATE owner_details SET owner_name = '$owner_name', personal_email = '$personal_email', owner_contact_number = '$owner_contact_number'
                ORDER BY id DESC LIMIT 1";

        if ($conn->query($sql) === TRUE) {
            // echo "Owner details updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Retrieve the latest owner details from the database
$sql = "SELECT * FROM owner_details ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $owner_name = $row['owner_name'];
    $personal_email = $row['personal_email'];
    $owner_contact_number = $row['owner_contact_number'];
    $button_text = 'Edit Details';
    $action = 'edit';
} else {
    $owner_name = "";
    $personal_email = "";
    $owner_contact_number = "";
    $button_text = 'Save Details';
    $action = 'save';
}

$conn->close();
?>



<div class="col-xl-4 col-md-12 mb-30">
    <div class="card-box height-100-p pd-20">
        <h2 class="h4 mb-20" style="color: #318BFF">Owner Details</h2>
        <form action="" method="post">
            <input type="hidden" name="action" value="<?php echo $action; ?>">
            
            <div class="form-group">
                <label for="owner_name" class="col-form-label">Owner's Name</label>
                <input type="text" class="form-control" id="owner_name" name="owner_name" placeholder="Enter owner's name" <?php if($owner_name != "") { echo 'value="'.$owner_name.'"'; } ?> required <?php if ($action == 'save') { echo 'autofocus'; } ?>>
            </div>
            
            <div class="form-group">
                <label for="personal_email" class="col-form-label">Personal Email</label>
                <input type="email" class="form-control" id="personal_email" name="personal_email" placeholder="Enter personal email address" <?php if($personal_email != "") { echo 'value="'.$personal_email.'"'; } ?> required>
            </div>
            
            <div class="form-group">
                <label for="owner_contact_number" class="col-form-label">Contact Number</label>
                <input type="text" class="form-control" id="owner_contact_number" name="owner_contact_number" placeholder="Enter contact number" <?php if($owner_contact_number != "") { echo 'value="'.$owner_contact_number.'"'; } ?> required>
            </div>
            
            <button type="submit" class="btn btn-primary" style="background-color: #318BFF;"><?php echo $button_text; ?></button>
        </form>
    </div>
</div>


<!--Owner details section ends here -->




<!--Products and Items section starts here -->
<?php
$host = 'localhost';
$db = 'document_management_system';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['productName']) && isset($_POST['productPrice'])) {
        $name = $_POST['productName'];
        $price = $_POST['productPrice'];
        $image = '';

        if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] == 0) {
            $image = 'uploads/' . basename($_FILES['productImage']['name']);
            move_uploaded_file($_FILES['productImage']['tmp_name'], $image);
        }

        if (isset($_POST['editIndex']) && $_POST['editIndex'] != -1) {
            // Update existing product
            $stmt = $pdo->prepare("UPDATE products_and_items_list SET name = ?, price = ?, image = ? WHERE id = ?");
            $stmt->execute([$name, $price, $image, $_POST['editIndex']]);
        } else {
            // Add new product
            $stmt = $pdo->prepare("INSERT INTO products_and_items_list (name, price, image) VALUES (?, ?, ?)");
            $stmt->execute([$name, $price, $image]);
        }
    }
}


if (isset($_GET['delete_id'])) {
  if (isset($_POST['confirmDelete'])) {
      $deleteStmt = $pdo->prepare("DELETE FROM products_and_items_list WHERE id = ?");
      $deleteStmt->execute([$_GET['delete_id']]);
      header('Location: ?page=' . $page);
      exit();
  } else {
      echo "Are you sure you want to delete product " . $_GET['delete_id'] . "?";
      echo "<form method='post'>";
      echo "<input type='submit' name='confirmDelete' value='Yes, delete'>";
      echo "<input type='submit' value='No, cancel'>";
      echo "</form>";
  }
}

// Fetch products for display
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$itemsPerPage = 8;
$offset = ($page - 1) * $itemsPerPage;

$stmt = $pdo->prepare("SELECT * FROM products_and_items_list LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalProductsStmt = $pdo->query("SELECT COUNT(*) FROM products_and_items_list");
$totalProducts = $totalProductsStmt->fetchColumn();
?>

<div class="row">
    <div class="col-12 mb-30">
        <div class="card-box height-100-p pd-20">
            <h2 class="h4 mb-20" style="color: #318BFF;">Items/Products</h2>

            <!-- Add Product Form -->
            <div class="mb-20">
                <form id="addProductForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="editIndex" name="editIndex" value="-1">
                    <div class="row">
                        <div class="col-md-3 mb-10">
                            <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name" required>
                        </div>
                        <div class="col-md-3 mb-10">
                            <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Product Price" required>
                        </div>
                        <div class="col-md-3 mb-10">
                            <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*">
                        </div>
                        <div class="col-md-3 mb-10 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100" style="background-color: #318BFF;">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Product Grid -->
            <div id="productGrid" class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-3 mb-20 d-flex justify-content-center">
                        <div class="card">
                            <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                            <div class="edit-icon" onclick="editProduct(<?php echo $product['id']; ?>)">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="delete-icon" onclick="confirmDelete(<?php echo $product['id']; ?>)">
                                <i class="fas fa-trash-alt"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <p class="card-text"><?php echo $product['price']; ?> LKR</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination Controls -->
            <div id="paginationControls" class="d-flex justify-content-center mt-3" style="<?php echo $totalProducts > $itemsPerPage ? 'display: flex;' : 'display: none;'; ?>">
                <button id="prevPage" class="btn btn-secondary mx-1" onclick="changePage(<?php echo $page - 1; ?>)" <?php echo $page <= 1 ? 'disabled' : ''; ?>>
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button id="nextPage" class="btn btn-secondary mx-1" onclick="changePage(<?php echo $page + 1; ?>)" <?php echo $page * $itemsPerPage >= $totalProducts ? 'disabled' : ''; ?>>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete confirmation modal -->
<div id="deleteConfirmationModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>Do you really want to delete this item?</p>
        <button id="confirmDeleteBtn" class="btn btn-danger">Yes</button>
        <button class="btn btn-secondary" onclick="closeModal()">No</button>
    </div>
</div>
  </div>
  <br>
  <?php include('includes/footer.php');?>


<script>
let productIdToDelete = null;

function editProduct(id) {
    fetch(`get_product.php?id=${id}`)
        .then(response => response.json())
        .then(product => {
            document.getElementById('editIndex').value = product.id;
            document.getElementById('productName').value = product.name;
            document.getElementById('productPrice').value = product.price;
        });
}

function confirmDelete(id) {
    productIdToDelete = id;
    document.getElementById('deleteConfirmationModal').style.display = 'block';
}

document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    if (productIdToDelete) {
        fetch(`<?php echo $_SERVER['PHP_SELF']; ?>?delete_id=${productIdToDelete}`)
            .then(response => response.json())
            .then(() => {
                // Remove the product from the grid
                document.querySelector(`[data-id="${productIdToDelete}"]`).remove();
                window.location.href = `<?php echo $_SERVER['PHP_SELF']; ?>`;
            });
    }
});

function closeModal() {
    document.getElementById('deleteConfirmationModal').style.display = 'none';
}

document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    if (productIdToDelete) {
        fetch(`delete_product.php?id=${productIdToDelete}`)
            .then(response => response.json())
            .then(() => {
                window.location.href = `<?php echo $_SERVER['PHP_SELF']; ?>`;
            });
    }
});

function changePage(page) {
    if (page >= 1 && page <= Math.ceil(<?php echo $totalProducts; ?> / <?php echo $itemsPerPage; ?>)) {
        window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?page=" + page;
    }
}

</script>

<!-- Modal Styles -->
<style>
.modal {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
}

.close {
    float: right;
    font-size: 24px;
    cursor: pointer;
}
</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">








