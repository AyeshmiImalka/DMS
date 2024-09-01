<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}

// Fetch the count of expired licenses
$sql_expired_count = "SELECT COUNT(*) AS expired_count FROM importeddrugs_db WHERE Renewal_update < CURDATE()";
$result_expired_count = mysqli_query($conn, $sql_expired_count);
$row_expired_count = mysqli_fetch_assoc($result_expired_count);
$expired_count = $row_expired_count['expired_count'];

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
                            <h4>Imported Ayurveda Drugs Database Table</h4>
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
                    <div class="col-md-4 col-sm-12 text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addRecordModal">Add New Record</button>
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
                            <button id="expired-importeddrug-btn" class="btn btn-warning" style="margin-left: 20px;">
                                <strong>Expired Licenses: </strong> <span id="expiry-count"><?php echo $expired_count; ?></span>
                            </button>
                        </div>
                        <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all" class='checkbox-custom'></th> <!-- Checkbox to select all rows -->
                                    <th >Drug Id</th>
                                    <th>Drug Name</th>
                                    <th>Manufacturer</th>
                                    <th>Reg. Date</th>
                                    <th>License(yrs)</th>
                                    <th>License Expiry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Query to get total number of records
                                $sql_count = "SELECT COUNT(*) AS total_records FROM importeddrugs_db ";
                                $result_count = mysqli_query($conn, $sql_count);
                                $row_count = mysqli_fetch_assoc($result_count);
                                $total_records = $row_count['total_records'];

                                // Set the number of records per page
                                $records_per_page = 25;

                                // Calculate total number of pages
                                $total_pages = ceil($total_records / $records_per_page);

                                // Determine current page
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                // Calculate the starting record for the query
                                $offset = ($page - 1) * $records_per_page;

                                $sql = "SELECT * FROM importeddrugs_db  LIMIT $offset, $records_per_page";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $expired = strtotime($row['Renewal_update']) < strtotime('now');
                                        echo "<tr class='" . ($expired ? 'expired' : '') . "'>";
                                        echo "<td><input type='checkbox' class='row-checkbox checkbox-custom' data-id='{$row['Reg_id']}'></td>"; // Checkbox for each row
                                        echo "<td class='table-plus'>" . $row["Reg_id"] . "</td>";
                                        echo "<td>" . $row["Reg_name"] . "</td>";
                                        echo "<td>" . $row["Manufacturer"] . "</td>";
                                        echo "<td>" . $row["Reg_date"] . "</td>";
                                        echo "<td>" . $row["LicenseRenewal(yrs)"] . "</td>";
                                        echo "<td>" . $row["Renewal_update"] . "</td>";
                                        echo "<td>
										<button class='btn btn-sm btn-danger delete-btn rounded-circle circle-btn' id='circle-btn'' data-id='" . $row["Reg_id"] . "'><i class='fas fa-trash-alt'></i></button>
										<button class='btn btn-sm btn-info edit-btn rounded-circle circle-btn' id='circle-btn'' data-id='" . $row["Reg_id"] . "'><i class='fas fa-edit'></i></button>
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
                            <!-- Render pagination links -->
                            <ul class="pagination">
                                <?php if ($page > 1 || $total_pages > 1) : ?>
                                    <li class="page-item <?php echo $page == 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo $page - 1; ?>" <?php echo $page == 1 ? 'tabindex="-1" aria-disabled="true"' : ''; ?>>
                                            <i class="bi bi-caret-left-fill"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if ($page < $total_pages || $total_pages > 1) : ?>
                                    <li class="page-item <?php echo $page == $total_pages ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo $page + 1; ?>" <?php echo $page == $total_pages ? 'tabindex="-1" aria-disabled="true"' : ''; ?>>
                                            <i class="bi bi-caret-right-fill"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Export Datatable End -->
            <?php include('includes/footer.php');?>

             <!-- Add Record Modal -->
             <?php include('database/imported_drugs/addImportedDrugs.php'); ?>

            <!-- Edit Record Modal -->
            <?php include('database/imported_drugs/editImportedDrugs.php'); ?>

<!-- Expired Licenses Modal -->
<div class="modal fade" id="expiredLicensesModal" tabindex="-1" role="dialog" aria-labelledby="expiredLicensesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expiredLicensesModalLabel">Expired Licenses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Drug Id</th>
                                <th>Drug Name</th>
                                <th>Manufacturer</th>
                                <th>Reg. Date</th>
                                <th>License(yrs)</th>
                                <th>License Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody id="expired-licenses-list">
                            <!-- Expired licenses will be loaded here via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
			
            <script>

                //Renewal Update" field will automatically update
                document.addEventListener('DOMContentLoaded', function() {
                    const regDateInput = document.getElementById('regDate');
                    const licenseYearsInput = document.getElementById('licenseYears');
                    const renewalUpdateInput = document.getElementById('renewalUpdate');

                    function updateRenewalDate() {
                        const regDateValue = regDateInput.value;
                        const licenseYearsValue = licenseYearsInput.value;

                        if (regDateValue && licenseYearsValue) {
                            const regDate = new Date(regDateValue);
                            regDate.setFullYear(regDate.getFullYear() + parseInt(licenseYearsValue));
                            renewalUpdateInput.value = regDate.toISOString().split('T')[0];
                        } else {
                            renewalUpdateInput.value = '';
                        }
                    }

                    regDateInput.addEventListener('input', updateRenewalDate);
                    licenseYearsInput.addEventListener('input', updateRenewalDate);
                });

        // Checkbox to select all rows
        $('#select-all').change(function() {
            $('.row-checkbox').prop('checked', $(this).prop('checked'));
        });

        // Individual row checkbox
        $('.row-checkbox').change(function() {
            if (!$(this).prop('checked')) {
                $('#select-all').prop('checked', false);
            }
        });

        //row delete
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
// Form submission for adding a new record
$('#addRecordForm').submit(function(e) {
                        e.preventDefault();
                        var formData = $(this).serialize();
                        $.ajax({
                            url: 'add_record_importeddrugs.php',
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                if (response == 1) {
                                    Swal.fire({
                                        title: 'Success!',
                                        text: 'The record has been added successfully.',
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
                                        text: 'An error occurred while adding the record.',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            }
                        });
                    });
                

                // Edit button click
                $('.edit-btn').click(function() {
                    var id = $(this).data('id');
                    $.ajax({
                        url: 'get_record_importeddrugs.php',
                        type: 'POST',
                        data: { id: id },
                        success: function(response) {
                            var record = JSON.parse(response);
                            $('#editRegId').val(record.Reg_id);
                            $('#editRegName').val(record.Reg_name);
                            $('#editManufacturer').val(record.Manufacturer);
                            $('#editRegDate').val(record.Reg_date);
                            $('#editLicenseYears').val(record['LicenseRenewal(yrs)']);
                            $('#editRenewalUpdate').val(record.Renewal_update);
                            $('#editRecordModal').modal('show');
                        }
                    });
                });

                // Edit form submission
                $('#editRecordForm').submit(function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        url: 'update_record.php',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response == 1) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'The record has been updated successfully.',
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
                                    text: 'An error occurred while updating the record.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    });
                });

                document.addEventListener('DOMContentLoaded', function() {
                    const editRegDateInput = document.getElementById('editRegDate');
                    const editLicenseYearsInput = document.getElementById('editLicenseYears');
                    const editRenewalUpdateInput = document.getElementById('editRenewalUpdate');

                    function updateRenewalDate() {
                        const regDateValue = editRegDateInput.value;
                        const licenseYearsValue = editLicenseYearsInput.value;

                        if (regDateValue && licenseYearsValue) {
                            const regDate = new Date(regDateValue);
                            regDate.setFullYear(regDate.getFullYear() + parseInt(licenseYearsValue));
                            editRenewalUpdateInput.value = regDate.toISOString().split('T')[0];
                        } else {
                            editRenewalUpdateInput.value = '';
                        }
                    }

                    editRegDateInput.addEventListener('input', updateRenewalDate);
                    editLicenseYearsInput.addEventListener('input', updateRenewalDate);
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

                // Handle expired licenses button click
                function fetchExpiredLicenses(table) {
        $.ajax({
            url: 'get_expired_licenses.php',
            type: 'GET',
            data: { table: table },
            success: function(response) {
                var expiredLicenses = JSON.parse(response);
                var tableBody = $('#expired-licenses-list');
                tableBody.empty(); // Clear previous data
                
                expiredLicenses.forEach(function(license) {
                    var row = '<tr>' +
                              '<td>' + license.Reg_id + '</td>' +
                              '<td>' + license.Reg_name + '</td>' +
                              '<td>' + license.Manufacturer+ '</td>' +
                              '<td>' + license.Reg_date + '</td>' +
                              '<td>' + license['LicenseRenewal(yrs)'] + '</td>' +
                              '<td>' + license.Renewal_update + '</td>' +
                              '</tr>';
                    tableBody.append(row);
                });
                
                $('#expiredLicensesModal').modal('show');
            }
        });
    }


    // Click event for imported drugs expired licenses
    $('#expired-importeddrug-btn').click(function() {
        fetchExpiredLicenses('importeddrug');
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
