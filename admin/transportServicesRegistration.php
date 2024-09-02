<?php
session_start();

include 'config_form.php';

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
    exit(); // Ensure that the script stops executing after redirection
}

?>

<?php include('includes/header.php');?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="title">
                            <h4>Transport Services Registration</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Transport Services Registration
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Registration Requests Table</h4>
                </div>
                <div class="pb-20">
                    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div id="DataTables_Table_2_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search" class="form-control form-control-sm" placeholder="Search" aria-controls="DataTables_Table_2">
                            </label>
                        </div>
                        <div class="table-responsive-md">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select-all" class='checkbox-custom'></th> <!-- Checkbox to select all rows -->
                                        <th>Request ID</th>
                                        <th>Transport Service Name</th>
                                        <th>Contact Email</th>
                                        <th></th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to get total number of records
                                    $sql_count = "SELECT COUNT(*) AS total_records FROM transport_services_registration_requests";
                                    $result_count = mysqli_query($conn, $sql_count);
                                    $row_count = mysqli_fetch_assoc($result_count);
                                    $total_records = $row_count['total_records'];

                                    // Set the number of records per page
                                    $records_per_page = 25;

                                    // Calculate total number of pages
                                    $total_pages = ceil($total_records / $records_per_page);

                                    // Determine current page
                                    $page = isset($_GET['page'])? $_GET['page'] : 1;

                                    // Calculate the starting record for the query
                                    $offset = ($page - 1) * $records_per_page;

                                    $sql = "SELECT * FROM transport_services_registration_requests LIMIT $offset, $records_per_page";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row_count = 0;
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $row_count++;
                                            $row_color = $row_count % 2 == 0 ? 'even-row' : 'odd-row';
                                            echo "<tr class='$row_color'>";
                                            $status_color = strtolower($row['status']) === 'pending' ? 'pending-row' : $row_color;
                                            echo "<tr class='$status_color'>";
                                            
                                            echo "<td><input type='checkbox' class='row-checkbox checkbox-custom' data-id='{$row['id']}'" . ($row['viewed'] && empty($row['status']) ? ' checked' : '') . "></td>"; // Checkbox for each row
                                            echo "<td>". $row["id"]. "</td>";
                                            echo "<td>". $row["service_name"]. "</td>";
                                            echo "<td>". $row["contact_email"]. "</td>";
                                            echo "<td><a href='". $row["registration_documents"]. "' target='_blank' class='view-sample' data-id='{$row['id']}'><i class='fas fa-file-alt fa-xl icon-blue'></i></a></td>";

                                            // Email send buttons
                                            if (empty($row['status'])) {
                                                echo "<td>
                                                        <a href='#' class='btn btn-sm btn-success rounded-circle circle-btn' id='circle-btn'' data-toggle='modal' data-target='#emailModal' data-status='Approved' data-id='{$row['id']}'> <i class='fa-solid fa-stamp'></i></a>
                                                        <a href='#' class='btn btn-sm btn-danger rounded-circle circle-btn' id='circle-btn'' data-toggle='modal' data-target='#emailModal' data-status='Rejected' data-id='{$row['id']}'><i class='fa-solid fa-circle-xmark'></i></a>
                                                        <a href='#' class='btn btn-sm btn-warning rounded-circle circle-btn' id='circle-btn'' data-toggle='modal' data-target='#emailModal' data-status='Pending' data-id='{$row['id']}'> <i class='fa-solid fa-rotate' style='color: #ffffff;'></i></a>
                                                    </td>";
                                            } else {
                                                echo "<td>
                                                <button class='btn btn-sm btn-secondary rounded-circle circle-btn' id='circle-btn'' disabled><i class='fa-solid fa-stamp'></i></button>
                                                <button class='btn btn-sm btn-secondary rounded-circle circle-btn' id='circle-btn'' disabled><i class='fa-solid fa-circle-xmark'></i></button>
                                                <button class='btn btn-sm btn-secondary rounded-circle circle-btn' id='circle-btn'' disabled><i class='fa-solid fa-rotate'></i></button>
        
                                                </td>"; // Hide the buttons if status is filled
                                            }

                                            echo "<td>
                                                    <button class='btn btn-sm btn-danger delete-btn rounded-circle circle-btn' id='circle-btn' data-id='" . $row["id"] . "'><i class='fas fa-trash-alt'></i></button>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No registration requests found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_2_paginate">
                            <!-- Render pagination links -->
                            <ul class="pagination">
                                <?php if ($page > 1 || $total_pages > 1) :?>
                                    <li class="page-item <?php echo $page == 1? 'disabled' : '';?>">
                                        <a class="page-link" href="?page=<?php echo $page - 1;?>" <?php echo $page == 1? 'tabindex="-1" aria-disabled="true"' : '';?>>
                                            <i class="bi bi-caret-left-fill"></i>
                                        </a>
                                    </li>
                                <?php endif;?>

                                <?php if ($page < $total_pages || $total_pages > 1) :?>
                                    <li class="page-item <?php echo $page == $total_pages? 'disabled' : '';?>">
                                        <a class="page-link" href="?page=<?php echo $page + 1;?>" <?php echo $page == $total_pages? 'tabindex="-1" aria-disabled="true"' : '';?>>
                                            <i class="bi bi-caret-right-fill"></i>
                                        </a>
                                    </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

    <!-- Email Modal -->
    <?php include('popups/sendEmailPopup.php');?>

    <?php include('includes/footer.php');?>

    <script>
        $(document).ready(function() {
            $('[data-toggle="modal"]').click(function() {
                var id = $(this).data('id');
                var status = $(this).data('status');
                $('#approve_id').val(id); // Added id input field
                $('#email_status').val(status); // Set the status value
                
                // Extracting service name and email address
                var service_name = $(this).closest('tr').find('td:eq(2)').text(); // Corrected the index to 2 for service name
                console.log('Service Name:', service_name);
                
                var contact_email = $(this).closest('tr').find('td:eq(3)').text();
                console.log('Contact Email:', contact_email);
                
                $('#email_address').val(contact_email);
                var subject;
                if (status == 'Approved') {
                    subject = 'Your registration request for ' + service_name + ' has been approved';
                } else if (status == 'Rejected') {
                    subject = 'Regarding your registration request for ' + service_name;
                } else if (status == 'Pending') {
                    subject = 'Update on your registration request for ' + service_name;
        }
        $('#email_subject').val(subject);
    });
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

        // Mark as viewed when sample is clicked
        $('.view-sample').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: 'mark_viewed.php',
                type: 'POST',
                data: {id: id},
                success: function(response) {
                    if (response == 1) {
                        $('input.row-checkbox[data-id="' + id + '"]').prop('checked', true);
                    }
                }
            });
        });

        
    </script>
<Style>
    .odd-row {
        background-color: #fff; /* Change to your desired odd row color */
    }

    .even-row {
        background-color: #e9ebf0; /* Change to your desired even row color */
    }

    .pending-row {
        background-color: #ffeb99; /* Change to your desired pending row color */
    }
</Style>


</div>

