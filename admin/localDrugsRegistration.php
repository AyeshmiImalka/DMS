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
                            <h4>Local Ayurveda Drugs Registration</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Local Ayurveda Drugs Registration
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
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Drug Name</th>
                                        <th>Contact Email</th>
                                        <th>Documents</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to get total number of records
                                    $sql_count = "SELECT COUNT(*) AS total_records FROM local_drugs_registration_requests";
                                    $result_count = mysqli_query($conn, $sql_count);
                                    $row_count = mysqli_fetch_assoc($result_count);
                                    $total_records = $row_count['total_records'];

                                    // Set the number of records per page
                                    $records_per_page = 50;

                                    // Calculate total number of pages
                                    $total_pages = ceil($total_records / $records_per_page);

                                    // Determine current page
                                    $page = isset($_GET['page'])? $_GET['page'] : 1;

                                    // Calculate the starting record for the query
                                    $offset = ($page - 1) * $records_per_page;

                                    $sql = "SELECT * FROM local_drugs_registration_requests LIMIT $offset, $records_per_page";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>". $row["id"]. "</td>";
                                            echo "<td>". $row["drug_name"]. "</td>";
                                            echo "<td>". $row["contact_email"]. "</td>";
                                            echo "<td><a href='". $row["registration_documents"]. "' target='_blank'><i class='fas fa-file-alt fa-2x icon-blue'></i></a></td>";


                                            echo "<td>
                                                    <a href='approve_registration.php?id=". $row["id"]. "' class='btn btn-sm btn-success' data-toggle='modal' data-target='#emailModal' data-status='Approved'>Approved</a>
                                                    <a href='reject_registration.php?id=". $row["id"]. "' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#emailModal' data-status='Rejected'>Rejected</a>
                                                    <a href='pending_registration.php?id=". $row["id"]. "' class='btn btn-sm btn-secondary' data-toggle='modal' data-target='#emailModal' data-status='Pending'>Pending</a>
                                                </td>";
                                            echo "<td>
                                                    <button class='btn btn-sm btn-danger delete-btn' data-id='" . $row["id"] . "'><i class='fas fa-trash-alt'></i></button>
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
                                            <i class="bi bi-chevron-left"></i>
                                        </a>
                                    </li>
                                <?php endif;?>

                                <?php for ($i = 1; $i <= $total_pages; $i++) :?>
                                    <li class="page-item <?php echo $i == $page? 'active' : '';?>"><a class="page-link" href="?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                                <?php endfor;?>

                                <?php if ($page < $total_pages || $total_pages > 1) :?>
                                    <li class="page-item <?php echo $page == $total_pages? 'disabled' : '';?>">
                                        <a class="page-link" href="?page=<?php echo $page + 1;?>" <?php echo $page == $total_pages? 'tabindex="-1" aria-disabled="true"' : '';?>>
                                            <i class="bi bi-chevron-right"></i>
                                        </a>
                                    </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Email Modal -->
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailModalLabel">Send Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="send_email.php" method="post">
                        <input type="hidden" id="approve_id" name="approve_id">
                        <input type="hidden" id="email_status" name="email_status">
                        <div class="form-group">
                            <label for="email_address">Recipient Email</label>
                            <input type="email" class="form-control" id="email_address" name="email_address" required>
                        </div>
                        <div class="form-group">
                            <label for="email_subject">Subject</label>
                            <input type="text" class="form-control" id="email_subject" name="email_subject" required>
                        </div>
                        <div class="form-group">
                            <label for="email_message">Message</label>
                            <textarea class="form-control" id="email_message" name="email_message" rows="3" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>

    <script>
        $(document).ready(function() {
            $('[data-toggle="modal"]').click(function() {
                var id = $(this).data('id');
                var status = $(this).data('status');
                $('#approve_id').val(id);
                $('#email_status').val(status);
                var contact_email = $(this).closest('tr').find('td:eq(2)').text();
                $('#email_address').val(contact_email);
                var subject;
                if (status == 'Approved') {
                    subject = 'Your registration request has been approved';
                } else if (status == 'Rejected') {
                    subject = 'Regarding your registration request';
                } else if (status == 'Pending') {
                    subject = 'Update on your registration request';
                }
                $('#email_subject').val(subject);
            });
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
    </script>

    <style>
        .icon-blue {
            color: #007bff;
        }

        .icon-blue:hover {
            color: #0056b3; /* Change to the desired hover color */
        }

    </style>
