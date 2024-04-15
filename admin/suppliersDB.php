<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
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
                    <div class="col-md-8 col-sm-12">
                        <div class="title">
                            <h4>Suppliers Database Table</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Database
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->

            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Registered Users Table</h4>
                </div>
                <div class="pb-20">
                    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div id="DataTables_Table_2_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search" class="form-control form-control-sm" placeholder="Search" aria-controls="DataTables_Table_2">
                            </label>
                        </div>
                        <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th >Supplier Id</th>
                                    <th>Supplier Name</th>
                                    <th>Product Category</th>
                                    <th>Reg. Date</th>
                                    <th>License Expiry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM suppliers_db ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $expired = strtotime($row['license_expiry_date']) < strtotime('now');
                                        echo "<tr class='" . ($expired ? 'expired' : '') . "'>";
                                        echo "<td class='table-plus'>" . $row["supplier_id"] . "</td>";
                                        echo "<td>" . $row["supplier_name"] . "</td>";
                                        echo "<td>" . $row["product_category"] . "</td>";
                                        echo "<td>" . $row["registration_date"] . "</td>";
                                        echo "<td>" . $row["license_expiry_date"] . "</td>";
                                        echo "<td>
										<button class='btn btn-sm btn-danger delete-btn' data-id='" . $row["supplier_id"] . "'><i class='fas fa-trash-alt'></i></button>
										<button class='btn btn-sm btn-info edit-btn' data-id='" . $row["supplier_id"] . "'><i class='fas fa-edit'></i></button>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </tbody>
                        </table>
                            </div>
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="DataTables_Table_2_previous">
                                    <a href="#" aria-controls="DataTables_Table_2" data-dt-idx="0" tabindex="0" class="page-link">
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="DataTables_Table_2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="DataTables_Table_2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                </li>
                                <li class="paginate_button page-item next" id="DataTables_Table_2_next">
                                    <a href="#" aria-controls="DataTables_Table_2" data-dt-idx="3" tabindex="0" class="page-link">
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Export Datatable End -->
            <?php include('includes/footer.php');?>
			
            <script>
               $(document).ready(function() {
    $('.delete-btn').click(function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'This record will be deleted permanently!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: {id: id},
                    success: function(response) {
                        if (response == 1) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'The record has been deleted successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting the record.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            }
        });
    });
});
    // Script for edit button
    $('.edit-btn').click(function() {
        var id = $(this).data('id');
        // You can perform edit operation here, maybe redirect to edit page or show a modal
        console.log('Edit button clicked for ID: ' + id);
    });

                    // Script for edit button
                    $('.edit-btn').click(function() {
                        var id = $(this).data('id');
                        // You can perform edit operation here, maybe redirect to edit page or show a modal
                        console.log('Edit button clicked for ID: ' + id);
                    });

				// Add an event listener for the search input
$('#DataTables_Table_2_filter input').on('input', function() {
  var filterValue = $(this).val().toLowerCase();

  // Loop through the table rows
  $('.table tbody tr').each(function() {
    var rowText = $(this).find('td').text().toLowerCase();

    // Check if the row text contains the filter value
    if (rowText.includes(filterValue)) {
      $(this).show();
    } else {
      $(this).hide();
    }
  });
});
            </script>
        </div>
    </div>
</div>
<style>
    .expired {
        background-color: #ffcccc; /* Change to your desired color */
    }
	
</style>
