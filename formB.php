<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formb"; // Adjust this to match your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for 'Official Use Only' section
    $fileNoRegistrationNo = $_POST['fileNoRegistrationNo'];
    $moneyOrderReceiptNo = $_POST['moneyOrderReceiptNo'];
    $dateOfIssue1 = $_POST['dateOfIssue'];
    $signatureOfSubjectOfficer = $_POST['signatureOfSubjectOfficer'];
    $registrationType = isset($_POST['firstTimeRegistration']) ? 'First time registration' : 'Annual registration';

    // SQL to insert data into the 'Official Use Only' table
    $sql1 = "INSERT INTO `official_use_only` (fileNoRegistrationNo, moneyOrderReceiptNo, dateOfIssue, signatureOfSubjectOfficer, registrationType)
            VALUES ('$fileNoRegistrationNo', '$moneyOrderReceiptNo', '$dateOfIssue1', '$signatureOfSubjectOfficer', '$registrationType')";

    if ($conn->query($sql1) === TRUE) {
        echo "New record created successfully for 'Official Use Only' section<br>";
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

    // Retrieve form data for 'Details of applicant' section
    $nameOfApplicant = $_POST['Nameofapplicant'];
    $address = $_POST['HAddress'];
    $nic = $_POST['NIC'];
    $profession = $_POST['Profession'];
    $postOfApplicant = $_POST['Postofapplicant'];
    $telephone = $_POST['Telephone'];
    $mobile = $_POST['Mobile'];
    $email = $_POST['emailaddress'];

    // SQL to insert data into the 'Details of applicant' table
    $sql2 = "INSERT INTO `details_of_applicant` (Nameofapplicant, HAddress, NIC, Profession, Postofapplicant, Telephone, Mobile, emailaddress)
    VALUES ('$nameOfApplicant', '$address', '$nic', '$profession', '$postOfApplicant', '$telephone', '$mobile', '$email')";

    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully for 'Details of applicant' section<br>";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }

    // Retrieve form data for 'Details of drug manufactory/Institution' section
    $nameOfInstitution = $_POST['NameofInstitution'];
    $institutionAddress = $_POST['Institution_Address'];
    $institutionTelephone = $_POST['InstitutionTelephone'];
    $emailAddress = $_POST['Emailaddress'];
    $registrationDate = $_POST['registrationNo'];
    $companyDateOfIssue = $_POST['companydateOfIssue'];
    $registrationCertificateNumber = $_POST['RegistrationcertificateNumber'];
    $certificateDateOfIssue = $_POST['certificatedateOfIssue'];
    $establishmentDate = $_POST['Dateestablishment'];

    // SQL to insert data into the 'Details of drug manufactory/Institution' table
    $sql3 = "INSERT INTO `details_of_drug_manufactory_institution` (NameofInstitution, Institution_Address, InstitutionTelephone, Emailaddress, registrationNo, companydateOfIssue, RegistrationcertificateNumber, certificatedateOfIssue, Dateestablishment)
    VALUES ('$nameOfInstitution', '$institutionAddress', '$institutionTelephone', '$emailAddress', '$registrationDate', '$companyDateOfIssue', '$registrationCertificateNumber', '$certificateDateOfIssue', '$establishmentDate')";

    if ($conn->query($sql3) === TRUE) {
        echo "New record created successfully for 'Details of drug manufactory/Institution' section <br>";
    } else {
        echo "Error: " . $sql3 . "<br>" . $conn->error;
    }

    $manufactory_name = $conn->real_escape_string(trim($_POST['manufactory_name']));
    $manufactory_address = $conn->real_escape_string(trim($_POST['manufactory_address']));
    $province = $conn->real_escape_string(trim($_POST['province']));
    $district = $conn->real_escape_string(trim($_POST['district']));
    $divisional_secretariats = $conn->real_escape_string(trim($_POST['divisional_secretariats']));
    $grama_niladhari = $conn->real_escape_string(trim($_POST['grama_niladhari']));
    $rate_no = $conn->real_escape_string(trim($_POST['rate_no']));
    $telephone_no = $conn->real_escape_string(trim($_POST['telephone_no']));
    $email_address = $conn->real_escape_string(trim($_POST['email_address']));
    $registration_certificate = $conn->real_escape_string(trim($_POST['registration_certificate']));
    $date_of_issue = $conn->real_escape_string(trim($_POST['date_of_issue']));
    $establishment_date = $conn->real_escape_string(trim($_POST['establishment_date']));

    // Prepare SQL statement
    $sql = "INSERT INTO manufactory_details (manufactory_name, manufactory_address, province, district, divisional_secretariats, grama_niladhari, rate_no, telephone_no, email_address, registration_certificate, date_of_issue, establishment_date) 
            VALUES ('$manufactory_name', '$manufactory_address', '$province', '$district', '$divisional_secretariats', '$grama_niladhari', '$rate_no', '$telephone_no', '$email_address', '$registration_certificate', '$date_of_issue', '$establishment_date')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully manufactory_details section <br> ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    

    // Retrieve form data for 'Details of consultant physician' section
    $full_name_of_physician = isset($_POST['Full_name_of_physician']) ? $_POST['Full_name_of_physician'] : '';
    $registration_no = isset($_POST['registration_no']) ? $_POST['registration_no'] : '';
    $registration_type = isset($_POST['registration_type']) ? $_POST['registration_type'] : '';
    $registration_date = isset($_POST['registration_date']) ? $_POST['registration_date'] : '';
    $renewal_date = isset($_POST['renewal_date']) && !empty($_POST['renewal_date']) ? $_POST['renewal_date'] : null;
    $special_registration = isset($_POST['special_registration']) ? $_POST['special_registration'] : '';
    $personal_address = isset($_POST['personal_address']) ? $_POST['personal_address'] : '';
    $telephone_no = isset($_POST['telephone_no']) ? $_POST['telephone_no'] : '';
    $mobile_no = isset($_POST['mobile_no']) ? $_POST['mobile_no'] : '';
    $email_address = isset($_POST['email_address']) ? $_POST['email_address'] : '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `details_of_consultant_physician` (full_name_of_physician, registration_no, registration_type, registration_date, renewal_date, special_registration, personal_address, telephone_no, mobile_no, email_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssssssss", $full_name_of_physician, $registration_no, $registration_type, $registration_date, $renewal_date, $special_registration, $personal_address, $telephone_no, $mobile_no, $email_address);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully for 'Details of consultant physician' section <br>";
    } else {
        echo "Error: " .   $stmt->error;
    }


    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// Retrieve form data for 'Details of Product' section
$product_name = $_POST['product_name'];
$trade_name = $_POST['trade_name'];
$nature_of_product = $_POST['nature_of_product'];
$therapeutic_indications = $_POST['therapeutic_indications'];
$registration_under_department = $_POST['registration_under_department'];
$registration_number_first_time = $_POST['registration_number_first_time'];
$date_of_issue_first_time = $_POST['date_of_issue_first_time'];
$registration_number_last_time = $_POST['registration_number_last_time'];
$date_of_issue_last_time = $_POST['date_of_issue_last_time'];
$research_done = $_POST['research_done'];
$research_yes = isset($_POST['research_yes']) ? $_POST['research_yes'] : '';
$research_no = isset($_POST['research_no']) ? $_POST['research_no'] : '';

// SQL to insert data into the 'Details of Product' table
$sql4 = "INSERT INTO `details_of_product` (product_name, trade_name, nature_of_product, therapeutic_indications, registration_under_department, registration_number_first_time, date_of_issue_first_time, registration_number_last_time, date_of_issue_last_time, research_done, research_yes, research_no)
VALUES ('$product_name', '$trade_name', '$nature_of_product', '$therapeutic_indications', '$registration_under_department', '$registration_number_first_time', '$date_of_issue_first_time', '$registration_number_last_time', '$date_of_issue_last_time', '$research_done', '$research_yes', '$research_no')";

if ($conn->query($sql4) === TRUE) {
    echo "New record created successfully for 'Details of Product' section<br>";
} else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
}


// Handle form submission if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for 'If the product is a medicine' section
    $text_page_recipe_no = $conn->real_escape_string($_POST['text_page_recipe_no']);
    $obtained_from = isset($_POST['obtained_from']) ? implode(', ', $_POST['obtained_from']) : '';
    $new_product = isset($_POST['new_product']) ? $_POST['new_product'] : '';
    $legal_provision_certificate = $conn->real_escape_string($_POST['legal_provision_certificate']);
    $dose_and_dosage = $conn->real_escape_string($_POST['dose_and_dosage']);
    $route_of_administration = isset($_POST['route_of_administration']) ? implode(', ', $_POST['route_of_administration']) : '';

    // SQL to insert data into the 'If the product is a medicine' table
    $sql = "INSERT INTO `if_the_product_is_a_medicine` (text_page_recipe_no, obtained_from, new_product, legal_provision_certificate, dose_and_dosage, route_of_administration)
    VALUES ('$text_page_recipe_no', '$obtained_from', '$new_product', '$legal_provision_certificate', '$dose_and_dosage', '$route_of_administration')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully for 'If the product is a medicine' section<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// Ensure the 'serial_no' POST data is available and is an array
if (isset($_POST['serial_no']) && is_array($_POST['serial_no']) && count($_POST['serial_no']) >= 2) {

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO if_the_product_is_exported_give_details (serial_no, category, types, countries, foreign_company, export_quantity_last_year, expected_export_quantity_next_year) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }

    // Loop through the first two sets of input fields
    for ($index = 0; $index < 2; $index++) {
        $serialNo = isset($_POST['serial_no'][$index]) ? $_POST['serial_no'][$index] : null;
        $category = isset($_POST['category'][$index]) ? $_POST['category'][$index] : null;
        $types = isset($_POST['types'][$index]) ? $_POST['types'][$index] : null;
        $countries = isset($_POST['countries'][$index]) ? $_POST['countries'][$index] : null;
        $foreignCompany = isset($_POST['foreign_company'][$index]) ? $_POST['foreign_company'][$index] : null;
        $exportQuantityLastYear = isset($_POST['export_quantity_last_year'][$index]) ? $_POST['export_quantity_last_year'][$index] : null;
        $expectedExportQuantityNextYear = isset($_POST['expected_export_quantity_next_year'][$index]) ? $_POST['expected_export_quantity_next_year'][$index] : null;

        // Validate all fields are filled for the current row
        if ($serialNo && $category && $types && $countries && $foreignCompany && $exportQuantityLastYear && $expectedExportQuantityNextYear) {
            // Bind parameters
            $stmt->bind_param("sssssss", $serialNo, $category, $types, $countries, $foreignCompany, $exportQuantityLastYear, $expectedExportQuantityNextYear);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record for Serial No. $serialNo created successfully<br>";
            } else {
                echo "Error: " . $stmt->error . "<br>";
            }
        } 
    }

    $stmt->close();
} else {
    echo "No valid data to process or insufficient data.<br>";
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Sanitize and validate input data
    $imported_materials = isset($_POST['imported_materials']) ? $_POST['imported_materials'] : '';
    $institution_name = isset($_POST['institution_name']) ? $conn->real_escape_string($_POST['institution_name']) : '';
    $license_no = isset($_POST['license_no']) ? $conn->real_escape_string($_POST['license_no']) : '';
    $license_date = isset($_POST['license_date']) ? $conn->real_escape_string($_POST['license_date']) : '';
    $country_of_import = isset($_POST['country_of_import']) ? $conn->real_escape_string($_POST['country_of_import']) : '';
    $manufacturer_name = isset($_POST['manufacturer_name']) ? $conn->real_escape_string($_POST['manufacturer_name']) : '';
    $manufacturer_address = isset($_POST['manufacturer_address']) ? $conn->real_escape_string($_POST['manufacturer_address']) : '';
    $imported_raw_materials_list = isset($_POST['imported_raw_materials_list']) ? $conn->real_escape_string($_POST['imported_raw_materials_list']) : '';
    $processed_products_imported = isset($_POST['processed_products_imported']) ? $_POST['processed_products_imported'] : '';
    $processed_products_names = isset($_POST['processed_products_names']) ? $conn->real_escape_string($_POST['processed_products_names']) : '';
    $approval_obtained = isset($_POST['approval_obtained']) ? $_POST['approval_obtained'] : '';
    $referral_letter_number = isset($_POST['referral_letter_number']) ? $conn->real_escape_string($_POST['referral_letter_number']) : '';
    $referral_letter_date = isset($_POST['referral_letter_date']) ? $conn->real_escape_string($_POST['referral_letter_date']) : '';
    
    // Prepare and execute SQL query
    $sql = "INSERT INTO details_of_imported_material_used_in_the_preparation (imported_materials, institution_name, license_no, license_date, country_of_import, manufacturer_name, manufacturer_address, imported_raw_materials_list, processed_products_imported, processed_products_names, approval_obtained, referral_letter_number, referral_letter_date)
    VALUES ('$imported_materials', '$institution_name', '$license_no', '$license_date', '$country_of_import', '$manufacturer_name', '$manufacturer_address', '$imported_raw_materials_list', '$processed_products_imported', '$processed_products_names', '$approval_obtained', '$referral_letter_number', '$referral_letter_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully details_of_imported_material_used_in_the_preparation <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }


    //++++++++++++++++++++++++++++++++++++++99999999999999999999999999999+++++++++++++++++++++++++++++++++++++++++


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if data exists in POST and validate
        $serial_nos = isset($_POST['serial_no']) ? $_POST['serial_no'] : [];
        $types_of_ingredients = isset($_POST['type_of_ingredients']) ? $_POST['type_of_ingredients'] : [];
        $district_secretariats = isset($_POST['district_secretariat']) ? $_POST['district_secretariat'] : [];
        $places_of_procurement = isset($_POST['place_of_procurement']) ? $_POST['place_of_procurement'] : [];
        $license_numbers_dates = isset($_POST['license_number_date']) ? $_POST['license_number_date'] : [];
        $quantities_used_last_year = isset($_POST['quantity_used_last_year']) ? $_POST['quantity_used_last_year'] : [];
        $quantities_expected_next_year = isset($_POST['quantity_expected_next_year']) ? $_POST['quantity_expected_next_year'] : [];
    
        // Determine the minimum row count to avoid index out of range errors
        $rowCount = min(
            count($serial_nos),
            count($types_of_ingredients),
            count($district_secretariats),
            count($places_of_procurement),
            count($license_numbers_dates),
            count($quantities_used_last_year),
            count($quantities_expected_next_year)
        );
    
        if ($rowCount > 0) {
            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO details_whether_raw_materials_included_in (serial_no, type_of_ingredients, district_secretariat, place_of_procurement, license_number_date, quantity_used_last_year, quantity_expected_next_year) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
            if ($stmt === false) {
                die('Prepare failed: ' . $conn->error);
            }
    
            // Loop through each row and insert data
            for ($i = 0; $i < $rowCount; $i++) {
                $stmt->bind_param("sssssss", 
                    $serial_nos[$i], 
                    $types_of_ingredients[$i], 
                    $district_secretariats[$i], 
                    $places_of_procurement[$i], 
                    $license_numbers_dates[$i], 
                    $quantities_used_last_year[$i], 
                    $quantities_expected_next_year[$i]
                );
    
                if ($stmt->execute()) {
                    echo "New record created successfully for Serial No: {$serial_nos[$i]}<br>";
                } else {
                    echo "Error inserting record for Serial No: {$serial_nos[$i]} - " . $stmt->error . "<br>";
                }
            }
    
            // Close the statement
            $stmt->close();
        } else {
            echo "Error: No valid data available for insertion.";
        }
    }
    

    //+++++++++++++++++++++++++++++++++++10101010100100++++++++++++++++++++++++++++++++++++++++++++
   // Retrieve and sanitize form data
   $serialNumbersPreservatives = isset($_POST['serial_no_preservatives']) ? $_POST['serial_no_preservatives'] : [];
   $typesOfPreservatives = isset($_POST['type_of_preservatives']) ? $_POST['type_of_preservatives'] : [];
   $quantitiesPercentages = isset($_POST['quantity_percentage']) ? $_POST['quantity_percentage'] : [];
   $amountsUsedLastYear = isset($_POST['amount_used_last_year']) ? $_POST['amount_used_last_year'] : [];
   $amountsExpectedNextYear = isset($_POST['amount_expected_next_year']) ? $_POST['amount_expected_next_year'] : [];

   // Determine the number of rows (elements) in the arrays
   $rowCount = min(
       count($serialNumbersPreservatives),
       count($typesOfPreservatives),
       count($quantitiesPercentages),
       count($amountsUsedLastYear),
       count($amountsExpectedNextYear)
   );

   if ($rowCount > 0) {
       // Prepare SQL statement
       $stmt = $conn->prepare("INSERT INTO `details_of_preservatives` (serial_no_preservatives, type_of_preservatives, quantity_percentage, amount_used_last_year, amount_expected_next_year) VALUES (?, ?, ?, ?, ?)");

       if ($stmt === false) {
           die('Prepare failed: ' . $conn->error);
       }

       // Loop through each row of the table data
       for ($index = 0; $index < $rowCount; $index++) {
           // Sanitize and validate data
           $serialNumber = htmlspecialchars($serialNumbersPreservatives[$index]);
           $typeOfPreservative = htmlspecialchars($typesOfPreservatives[$index]);
           $quantityPercentage = htmlspecialchars($quantitiesPercentages[$index]);
           $amountUsedLastYear = htmlspecialchars($amountsUsedLastYear[$index]);
           $amountExpectedNextYear = htmlspecialchars($amountsExpectedNextYear[$index]);

           // Validate all required fields are filled
           if (!empty($serialNumber) && !empty($typeOfPreservative) && !empty($quantityPercentage) && !empty($amountUsedLastYear) && !empty($amountExpectedNextYear)) {
               // Bind parameters
               $stmt->bind_param("ssdss", $serialNumber, $typeOfPreservative, $quantityPercentage, $amountUsedLastYear, $amountExpectedNextYear);

               // Execute the statement
               if ($stmt->execute()) {
                   echo "Record for Serial No. {$serialNumber} created successfully.<br>";
               } else {
                   echo "Error: " . $stmt->error . "<br>";
               }
           } else {
               echo "Error: Incomplete data for row {$index}. Skipping insertion.<br>";
           }
       }

       $stmt->close();
   } else {
       echo "Error: No valid data rows available for insertion.";
   }
    
    
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = isset($_POST['name']) ? $conn->real_escape_string(trim($_POST['name'])) : '';
    $id_number = isset($_POST['id_number']) ? $conn->real_escape_string(trim($_POST['id_number'])) : '';
    $address = isset($_POST['address']) ? $conn->real_escape_string(trim($_POST['address'])) : '';
    $date = isset($_POST['date']) ? $conn->real_escape_string(trim($_POST['date'])) : '';

    // Handle signature image upload
    $signatureImage = '';
    if (isset($_FILES['imageLoader']) && $_FILES['imageLoader']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imageLoader']['tmp_name'];
        $fileName = $_FILES['imageLoader']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedExts = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileExtension, $allowedExts)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $signatureImage = $newFileName;
            } else {
                echo "Error moving uploaded file.";
            }
        } else {
            echo "Invalid file type for signature.";
        }
    }

    // SQL to insert data into the 'certificate_of_consultant_physician' table
    $sql = "INSERT INTO `certificate_of_consultant_physician` (name, id_number, address, signature_image, date)
            VALUES ('$name', '$id_number', '$address', '$signatureImage', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully for 'Certificate of Consultant Physician' section<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
 
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    

    // Handle "Declaration of Applicant" section
$applicant_signature_image = '';
if (isset($_FILES['imageLoaderApplicant']) && $_FILES['imageLoaderApplicant']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['imageLoaderApplicant']['tmp_name'];
    $fileName = $_FILES['imageLoaderApplicant']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $allowedExts = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileExtension, $allowedExts)) {
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadFileDir = './uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $applicant_signature_image = $newFileName;
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Invalid file type for applicant signature.";
    }
}

$applicant_date = isset($_POST['applicant_date']) ? $conn->real_escape_string(trim($_POST['applicant_date'])) : '';

$sql = "INSERT INTO `declaration_of_applicant` (signature_image, date)
VALUES ('$applicant_signature_image', '$applicant_date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully for 'Declaration of Applicant' section<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// Handle "For Official Use Only" section
$money_order_no = isset($_POST['money_order_no']) ? $conn->real_escape_string(trim($_POST['money_order_no'])) : '';
$receipt_no = isset($_POST['receipt_no']) ? $conn->real_escape_string(trim($_POST['receipt_no'])) : '';
$documents_submitted_date = isset($_POST['documents_submitted_date']) ? $conn->real_escape_string(trim($_POST['documents_submitted_date'])) : '';
$notes = isset($_POST['note']) ? implode(',', $_POST['note']) : '';
$officer_name_signature = isset($_POST['officer_name_signature']) ? $conn->real_escape_string(trim($_POST['officer_name_signature'])) : '';
$officer_received_date = isset($_POST['officer_received_date']) ? $conn->real_escape_string(trim($_POST['officer_received_date'])) : '';

$officer_signature_image = '';
if (isset($_FILES['imageLoaderOfficer']) && $_FILES['imageLoaderOfficer']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['imageLoaderOfficer']['tmp_name'];
    $fileName = $_FILES['imageLoaderOfficer']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $allowedExts = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileExtension, $allowedExts)) {
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadFileDir = './uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $officer_signature_image = $newFileName;
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Invalid file type for officer signature.";
    }
}

$sql = "INSERT INTO `official_use` (money_order_no, receipt_no, documents_submitted_date, notes, officer_name_signature, officer_received_date, officer_signature_image)
VALUES ('$money_order_no', '$receipt_no', '$documents_submitted_date', '$notes', '$officer_name_signature', '$officer_received_date', '$officer_signature_image')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully for 'For Official Use Only' section<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


// Close the database connection
$conn->close();

?>
