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
                            <h4>Payment Records Table</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Payment Records
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
                    <h4 class="text-blue h4">Payment Records</h4>
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
                                        <th><input type="checkbox" id="select-all" class='checkbox-custom'></th> <!-- Checkbox to select all rows -->
                                        <th>Payment ID</th>
                                        <th>Amount</th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Transaction Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to get total number of records
                                    $sql_count = "SELECT COUNT(*) AS total_records FROM payment_records ";
                                    $result_count = mysqli_query($conn, $sql_count);
                                    $row_count = mysqli_fetch_assoc($result_count);
                                    $total_records = $row_count['total_records'];

                                    // Set the number of records per page
                                    $records_per_page = 50;

                                    // Calculate total number of pages
                                    $total_pages = ceil($total_records / $records_per_page);

                                    // Determine current page
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                    // Calculate the starting record for the query
                                    $offset = ($page - 1) * $records_per_page;

                                    $sql = "SELECT * FROM payment_records ORDER BY `date` DESC LIMIT $offset, $records_per_page ";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        $row_count = 0;
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $row_count++;
                                            $row_color = $row_count % 2 == 0 ? 'even-row' : 'odd-row';
                                            echo "<tr class='$row_color'>";
                                            echo "<td><input type='checkbox' class='row-checkbox checkbox-custom' data-id='{$row['payment_id']}'></td>"; // Checkbox for each row
                                            echo "<td>" . $row["payment_id"] . "</td>";
                                            echo "<td>" . $row["amount"] . "</td>";
                                            echo "<td>" . $row["customer_name"] . "</td>";
                                            echo "<td>" . $row["date"] . "</td>";
                                            // Add Time and transaction_type columns
                                            echo "<td>" . $row["time"] . "</td>";
                                            echo "<td>" . $row["transaction_type"] . "</td>";
                                            echo "<td>
                                            <button class='btn btn-sm btn-danger delete-btn rounded-circle circle-btn' id='circle-btn' data-id='" . $row["payment_id"] . "'><i class='fas fa-trash-alt'></i></button>
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
                                            <i class="bi bi-caret-left"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if ($page < $total_pages || $total_pages > 1) : ?>
                                    <li class="page-item <?php echo $page == $total_pages ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo $page + 1; ?>" <?php echo $page == $total_pages ? 'tabindex="-1" aria-disabled="true"' : ''; ?>>
                                            <i class="bi bi-caret-right"></i>
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
			
            <script>
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
                });
            </script>
        </div>
    </div>
</div>
<style>
    .expired {
        background-color: #ffcccc; /* Change to your desired color */
    }

    .odd-row {
        background-color: #f2f2f2; /* Change to your desired odd row color */
    }

    .even-row {
        background-color: #ffffff; /* Change to your desired even row color */
    }
</style>
