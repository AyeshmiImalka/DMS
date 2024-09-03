<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form a";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the form
    $fileNoRegistrationNo = $_POST['fileNoRegistrationNo'];
    $moneyOrderReceiptNo = $_POST['moneyOrderReceiptNo'];
    $dateOfIssue = $_POST['dateOfIssue'];
    $signatureOfSubjectOfficer = $_POST['signatureOfSubjectOfficer'];
    $firstTimeRegistration = isset($_POST['firstTimeRegistration']) ? $_POST['firstTimeRegistration'] : '';
    $annualRegistration = isset($_POST['annualRegistration']) ? $_POST['annualRegistration'] : '';

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO `for official use only` (fileNoRegistrationNo, moneyOrderReceiptNo, dateOfIssue, signatureOfSubjectOfficer, firstTimeRegistration, annualRegistration)
    VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssss", $fileNoRegistrationNo, $moneyOrderReceiptNo, $dateOfIssue, $signatureOfSubjectOfficer, $firstTimeRegistration, $annualRegistration);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record in 'for official use only' table created successfully<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }


  // Additional form fields
  $applicantName = $_POST['applicantName'];
  $applicantAddress = $_POST['applicantAddress'];
  $applicantNIC = $_POST['applicantNIC'];
  $applicantProfession = $_POST['applicantProfession'];
  $applicantPost = $_POST['applicantPost'];
  $telephoneNo = $_POST['telephoneNo'];
  $mobileNo = $_POST['mobileNo'];
  $emailAddress = $_POST['emailAddress'];

  // SQL to insert data into the 'details of applicant' table
  $applicantSQL = "INSERT INTO `details of applicant` (applicantName, applicantAddress, applicantNIC, applicantProfession, applicantPost, telephoneNo, mobileNo, emailAddress)
  VALUES ('$applicantName', '$applicantAddress', '$applicantNIC', '$applicantProfession', '$applicantPost', '$telephoneNo', '$mobileNo', '$emailAddress')";

  if ($conn->query($applicantSQL) === TRUE) {
    echo "New record in 'details of applicant' table created successfully<br>";
  } else {
    echo "Error: " . $applicantSQL . "<br>" . $conn->error;
  }

 

  
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Additional form fields for company details
  $nameOfCompany = $_POST['name_of_company'];
  $companyAddress = $_POST['company_address'];
  $companyTelephone = $_POST['company_telephone_number'];
  $companyEmail = $_POST['company_email_address'];
  $businessRegistrationNumber = $_POST['business_registration_certificate_number'];
  $dateOfIssueBusiness = $_POST['date_of_issue_business'];
  $ayurvedaRegistrationNumber = isset($_POST['ayurveda_registration_certificate_number']) ? $_POST['ayurveda_registration_certificate_number'] : null;
  $dateOfIssueAyurveda = isset($_POST['date_of_issue_ayurveda']) ? $_POST['date_of_issue_ayurveda'] : null;
  $dateOfEstablishmentCompany = $_POST['date_of_establishment_company'];

  // SQL to insert data into the 'details of drug company' table
  $companySQL = "INSERT INTO `details of drug company` (name_of_company, company_address, company_telephone_number, company_email_address, business_registration_certificate_number, date_of_issue_business, ayurveda_registration_certificate_number, date_of_issue_ayurveda, date_of_establishment_company)
  VALUES ('$nameOfCompany', '$companyAddress', '$companyTelephone', '$companyEmail', '$businessRegistrationNumber', '$dateOfIssueBusiness', '$ayurvedaRegistrationNumber', '$dateOfIssueAyurveda', '$dateOfEstablishmentCompany')";

  if ($conn->query($companySQL) === TRUE) {
    echo "New record in 'details of drug company' table created successfully";
  } else {
    echo "Error: " . $companySQL . "<br>" . $conn->error;
  }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Additional form fields for manufactory details
  $nameOfManufactory = $_POST['name_of_manufactory'];
  $manufactoryAddress = $_POST['manufactory_address'];
  $province = $_POST['province'];
  $district = $_POST['district'];
  $divisionalSecretariatsDivision = $_POST['divisional_secretariats_division'];
  $gramaNiladhariDivisionNo = $_POST['grama_niladhari_division_no'];
  $rateNo = $_POST['rate_no'];
  $telephoneNo = $_POST['telephone_no'];
  $manufactoryEmail = $_POST['manufactory_email_address'];
  $ayurvedaManufactoryRegistrationNumber = $_POST['ayurveda_manufactory_registration_certificate_number'];
  $dateOfIssueManufactory = $_POST['date_of_issue_manufactory'];
  $dateOfEstablishmentManufactory = isset($_POST['date_of_establishment_manufactory']) ? $_POST['date_of_establishment_manufactory'] : '';


  // SQL to insert data into the 'details of manufactory' table
  $manufactorySQL = "INSERT INTO `details of manufactory` (name_of_manufactory, manufactory_address, province, district, divisional_secretariats_division, grama_niladhari_division_no, rate_no, telephone_no, manufactory_email_address, ayurveda_manufactory_registration_certificate_number, date_of_issue_manufactory, date_of_establishment_manufactory)
  VALUES ('$nameOfManufactory', '$manufactoryAddress', '$province', '$district', '$divisionalSecretariatsDivision', '$gramaNiladhariDivisionNo', '$rateNo', '$telephoneNo', '$manufactoryEmail', '$ayurvedaManufactoryRegistrationNumber', '$dateOfIssueManufactory', '$dateOfEstablishmentManufactory')";

  if ($conn->query($manufactorySQL) === TRUE) {
    echo "New record in 'details of manufactory' table created successfully";
  } else {
    echo "Error: " . $manufactorySQL . "<br>" . $conn->error;
  }

}

// Process physician details form
$fullNameOfPhysician = isset($_POST['Full_name_of_physician']) ? $_POST['Full_name_of_physician'] : '';
$registrationNo = isset($_POST['registration_no']) ? $_POST['registration_no'] : '';
$registrationType = isset($_POST['registration_type']) ? $_POST['registration_type'] : '';
$registrationDate = isset($_POST['registration_date']) ? $_POST['registration_date'] : '';
$renewalDate = isset($_POST['renewal_date']) ? $_POST['renewal_date'] : '';
$specialRegistration = isset($_POST['special_registration']) ? $_POST['special_registration'] : '';
$personalAddress = isset($_POST['personal_address']) ? $_POST['personal_address'] : '';
$telephoneNo = isset($_POST['telephone_no']) ? $_POST['telephone_no'] : '';
$mobileNo = isset($_POST['mobile_no']) ? $_POST['mobile_no'] : '';
$emailAddress = isset($_POST['email_address']) ? $_POST['email_address'] : '';

$physicianSql = "INSERT INTO `details of consultant physician` (full_name_of_physician, registration_no, registration_type, registration_date, renewal_date, special_registration, personal_address, telephone_no, mobile_no, email_address)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$physicianStmt = $conn->prepare($physicianSql);
$physicianStmt->bind_param("ssssssssss", $fullNameOfPhysician, $registrationNo, $registrationType, $registrationDate, $renewalDate, $specialRegistration, $personalAddress, $telephoneNo, $mobileNo, $emailAddress);

if ($physicianStmt->execute()) {
    echo "New record in 'details of consultant physician' table created successfully<br>";
} else {
    echo "Error inserting physician details: " . $physicianStmt->error . "<br>";
}



  $physicianStmt->close();

  // Process building details form
  $approvedRegulations = isset($_POST['registration_type']) ? $_POST['registration_type'] : '';
  $machineriesUsing = $_POST['Machineries_using'];
  $numberOfStaff = $_POST['Number_of_staff'];
  $expectedTradeCompanies = $_POST['companies_for_marketing'];

  $buildingSql = "INSERT INTO `details of drug manufacturing unit` (approved_regulations, machineries_using, number_of_staff, companies_for_marketing)
                  VALUES (?, ?, ?, ?)";
  $buildingStmt = $conn->prepare($buildingSql);
  $buildingStmt->bind_param("ssss", $approvedRegulations, $machineriesUsing, $numberOfStaff, $expectedTradeCompanies);

  if ($buildingStmt->execute()) {
    echo "New record in 'details of drug manufacturing unit' table created successfully<br>";
  } else {
    echo "Error inserting building details: " . $buildingStmt->error . "<br>";
  }

  $buildingStmt->close();





// Process product details form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Fetch data from the form arrays
  $serialNos = $_POST['serial_no'];
  $categories = $_POST['category'];
  $varieties = $_POST['varieties'];
  $tradeNames = $_POST['trade_name'];
  $ayurvedaApprovals = $_POST['ayurveda_approval'];
  $siddhaApprovals = $_POST['siddha_approval'];
  $unaniApprovals = $_POST['unani_approval'];
  $tcamApprovals = $_POST['tcam_approval_details'];
  $prevYearQuantities = $_POST['prev_year_quantity'];
  $nextYearQuantities = $_POST['next_year_quantity'];

  // Prepare and execute the SQL insert statement for each row of data using prepared statements
  $productSql = "INSERT INTO `details regarding products` 
                 (serial_no, category, varieties, trade_name, ayurveda_approval, siddha_approval, unani_approval, tcam_approval_details, prev_year_quantity, next_year_quantity) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $productStmt = $conn->prepare($productSql);

  if ($productStmt) {  // Check if prepare() succeeded
   // Bind parameters and execute the statement for each row of data
for ($i = 0; $i < count($serialNos); $i++) {
  $productStmt->bind_param("ssssssssss", $serialNos[$i], $categories[$i], $varieties[$i], $tradeNames[$i], $ayurvedaApprovals[$i], $siddhaApprovals[$i], $unaniApprovals[$i], $tcamApprovals[$i], $prevYearQuantities[$i], $nextYearQuantities[$i]);
  if (!$productStmt->execute()) {
      echo "Error inserting product details for row $i: " . $productStmt->error . "<br>";
  } else {
      echo "Record inserted successfully for row $i<br>";
  }
}

    $productStmt->close();  // Close the statement after the loop
  } else {
    // Handle prepare() failure
    echo "Error preparing SQL statement: " . $conn->error . "<br>";
  }

  // Close the database connection
  $conn->close();

  echo "All records processed successfully";
}




// Assuming you have established a valid database connection $conn
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the form arrays
    $serialNosExport = $_POST['serial_no_export'];
    $categoriesExport = $_POST['category_export'];
    $materialsExport = $_POST['materials_export'];
    $countryExport = $_POST['country_export'];
    $foreignCompanyExport = $_POST['foreign_company_export'];
    $exportLastYearQuantities = $_POST['export_last_year_quantity'];
    $expectedExportQuantities = $_POST['expected_export_quantity'];

    // Prepare and execute the SQL insert statement for each row of data using prepared statements
    $productSql = "INSERT INTO `details regarding exportation` 
                   (serial_no_export, category_export, materials_export, country_export, foreign_company_export, export_last_year_quantity, expected_export_quantity)
                   VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Check if the connection is valid
    if ($conn) {
        $productStmt = $conn->prepare($productSql);
        if ($productStmt) {  // Check if prepare() succeeded
            // Bind parameters and execute the statement for each row of data
            for ($i = 0; $i < count($serialNosExport); $i++) {
                $productStmt->bind_param("sssssss", 
                    $serialNosExport[$i], 
                    $categoriesExport[$i], 
                    $materialsExport[$i], 
                    $countryExport[$i], 
                    $foreignCompanyExport[$i], 
                    $exportLastYearQuantities[$i], 
                    $expectedExportQuantities[$i]);
                if (!$productStmt->execute()) {
                    echo "Error inserting product details for row $i: " . $productStmt->error . "<br>";
                } else {
                    echo "Record inserted successfully for row $i<br>";
                }
            }

            $productStmt->close();  // Close the statement after the loop
            echo "All records processed successfully";
        } else {
            // Handle prepare() failure
            echo "Error preparing SQL statement: " . $conn->error . "<br>";
        }
    } else {
        // Handle invalid database connection
        echo "Error: Database connection is not valid.";
    }

    // Close the database connection
    $conn->close();
}






$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Fetch data from the form arrays
  $serialNosImport = $_POST['serial_no_import'];
  $categoriesImport = $_POST['category_import'];
  $materialsImport = $_POST['materials_import'];
  $countryImport = $_POST['country_import'];
  $foreignCompanyImport = $_POST['foreign_company_import'];
  $importLastYearQuantities = $_POST['import_last_year_quantity'];
  $expectedImportQuantities = $_POST['expected_import_quantity'];

  // Assuming you have a database connection established earlier ($conn)

  // Prepare and execute the SQL insert statement for each row of data using prepared statements
  $importSql = "INSERT INTO `details regarding importation` 
                (serial_no_import, category_import, materials_import, country_import, foreign_company_import, import_last_year_quantity, expected_import_quantity) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
  $importStmt = $conn->prepare($importSql);

  if ($importStmt) {  // Check if prepare() succeeded
      // Bind parameters and execute the statement for each row of data
      for ($i = 0; $i < count($serialNosImport); $i++) {
          $importStmt->bind_param("sssssss", 
              $serialNosImport[$i], 
              $categoriesImport[$i], 
              $materialsImport[$i], 
              $countryImport[$i], 
              $foreignCompanyImport[$i], 
              $importLastYearQuantities[$i], 
              $expectedImportQuantities[$i]);
          if (!$importStmt->execute()) {
              echo "Error inserting import details for row $i: " . $importStmt->error . "<br>";
          } else {
              echo "Record inserted successfully for row $i<br>";
          }
      }

      $importStmt->close();  // Close the statement after the loop
  } else {
      // Handle prepare() failure
      echo "Error preparing SQL statement: " . $conn->error . "<br>";
  }

  // Close the database connection
  $conn->close();

  echo "All import records processed successfully";
}






// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert attachment data into the table
    $stmt = $conn->prepare("INSERT INTO `copies of attachments` (attachment1, attachment2, attachment3, attachment4, attachment5, attachment6) VALUES (?, ?, ?, ?, ?, ?)");

    // Check if prepare() succeeded
    if ($stmt) {
        // Get checkbox values and bind parameters
        $attachment1 = isset($_POST["attachment1"]) ? 1 : 0;
        $attachment2 = isset($_POST["attachment2"]) ? 1 : 0;
        $attachment3 = isset($_POST["attachment3"]) ? 1 : 0;
        $attachment4 = isset($_POST["attachment4"]) ? 1 : 0;
        $attachment5 = isset($_POST["attachment5"]) ? 1 : 0;
        $attachment6 = isset($_POST["attachment6"]) ? 1 : 0;

        // Bind parameters and execute the statement
        $stmt->bind_param("iiiiii", $attachment1, $attachment2, $attachment3, $attachment4, $attachment5, $attachment6);
        if (!$stmt->execute()) {
            echo "Error inserting attachment: " . $stmt->error;
        } else {
            echo "";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle prepare() failure
        echo "Error preparing SQL statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}




// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Retrieve and sanitize form data
  $name = isset($_POST['name']) ? $conn->real_escape_string(trim($_POST['name'])) : '';
  $id_number = isset($_POST['idNumber']) ? $conn->real_escape_string(trim($_POST['idNumber'])) : '';
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
              echo "Error moving uploaded file.<br>";
          }
      } else {
          echo "Invalid file type for signature.<br>";
      }
  }

  // Insert data into the 'certificate_of_consultant_physician' table
  $sql = "INSERT INTO certificate_of_consultant_physician (name, id_number, address, signature_image, date)
          VALUES (?, ?, ?, ?, ?)";

  if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param("sssss", $name, $id_number, $address, $signatureImage, $date);

      if ($stmt->execute()) {
          echo "New record created successfully for 'Certificate of Consultant Physician' section<br>";
      } else {
          echo "Error: " . $stmt->error . "<br>";
      }

      $stmt->close();
  } else {
      echo "Error preparing statement: " . $conn->error . "<br>";
  }}






     // Retrieve and sanitize form data
     $date = isset($_POST['date']) ? $conn->real_escape_string(trim($_POST['date'])) : '';

     // Handle signature image upload for applicant
     $signatureImageApplicant = '';
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
                 $signatureImageApplicant = $newFileName;
             } else {
                 echo "Error moving uploaded file for applicant signature.<br>";
             }
         } else {
             echo "Invalid file type for applicant signature.<br>";
         }
     }
 
     // SQL to insert data into the table
     $sql = "INSERT INTO certificate_of_applicant (date, signature_image_applicant) VALUES (?, ?)";
 
     if ($stmt = $conn->prepare($sql)) {
         $stmt->bind_param("ss", $date, $signatureImageApplicant);
 
         if ($stmt->execute()) {
             echo "New record created successfully.<br>";
         } else {
             echo "Error: " . $stmt->error . "<br>";
         }
 
         $stmt->close();
     } else {
         echo "Error preparing statement: " . $conn->error . "<br>";
     }




  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize form data
    $money_order_no = isset($_POST['money_order_no']) ? $conn->real_escape_string(trim($_POST['money_order_no'])) : '';
    $receipt_no = isset($_POST['receipt_no']) ? $conn->real_escape_string(trim($_POST['receipt_no'])) : '';
    $documents_submitted_date = isset($_POST['documents_submitted_date']) ? $conn->real_escape_string(trim($_POST['documents_submitted_date'])) : '';
    $notes = isset($_POST['notes']) ? implode(',', $_POST['notes']) : '';
    $officer_name_signature = isset($_POST['officer_name_signature']) ? $conn->real_escape_string(trim($_POST['officer_name_signature'])) : '';
    $officer_received_date = isset($_POST['officer_received_date']) ? $conn->real_escape_string(trim($_POST['officer_received_date'])) : '';

    // Handle officer signature image upload
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
                echo "Error moving uploaded file.<br>";
            }
        } else {
            echo "Invalid file type for officer signature.<br>";
        }
    }
       
    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO official_use(money_order_no, receipt_no, documents_submitted_date, notes, officer_name_signature, officer_received_date, officer_signature_image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $money_order_no, $receipt_no, $documents_submitted_date, $notes, $officer_name_signature, $officer_received_date, $officer_signature_image);

    if ($stmt->execute()) {
        echo "New record created successfully for 'For Official Use Only' section<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }}

  


// Close the database connection
$conn->close();
}
?>