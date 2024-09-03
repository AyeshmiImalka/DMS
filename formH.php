<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formh";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize form data for form_h table
    $fileNoRegistrationNo = isset($_POST['fileNoRegistrationNo']) ? $conn->real_escape_string(trim($_POST['fileNoRegistrationNo'])) : '';
    $moneyOrderReceiptNo = isset($_POST['moneyOrderReceiptNo']) ? $conn->real_escape_string(trim($_POST['moneyOrderReceiptNo'])) : '';
    $dateOfIssue = isset($_POST['dateOfIssue']) ? $conn->real_escape_string(trim($_POST['dateOfIssue'])) : '';
    $signatureOfSubjectOfficer = isset($_POST['signatureOfSubjectOfficer']) ? $conn->real_escape_string(trim($_POST['signatureOfSubjectOfficer'])) : '';

    // SQL to insert data into form_h table
    $sql = "INSERT INTO official_use_only (file_no_registration_no, money_order_receipt_no, date_of_issue, signature_of_subject_officer)
            VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $fileNoRegistrationNo, $moneyOrderReceiptNo, $dateOfIssue, $signatureOfSubjectOfficer);

        if ($stmt->execute()) {
            echo "New record for official_use_only created successfully.<br>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }

        $stmt->close();
    } else {
        echo "Error preparing statement for form_h: " . $conn->error . "<br>";
        
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle checkboxes for registration types
        $registrationType1 = isset($_POST['registrationType1']) ? json_encode($_POST['registrationType1']) : '';
        
        // Handle text inputs
        $restrictedRawMaterial = isset($_POST['restrictedRawMaterial']) ? $_POST['restrictedRawMaterial'] : '';
        $applicantName = isset($_POST['applicantName']) ? $_POST['applicantName'] : '';
        $applicantAddress = isset($_POST['applicantAddress']) ? $_POST['applicantAddress'] : '';
        $applicantNIC = isset($_POST['applicantNIC']) ? $_POST['applicantNIC'] : '';
        $applicantProfession = isset($_POST['applicantProfession']) ? $_POST['applicantProfession'] : '';
        $applicantPost = isset($_POST['applicantPost']) ? $_POST['applicantPost'] : '';
        $telephone_No = isset($_POST['telephone_No']) ? $_POST['telephone_No'] : '';
        $mobile_No = isset($_POST['applicant_mobile_No']) ? $_POST['applicant_mobile_No'] : ''; // Updated field name
        $emailAddress = isset($_POST['applicant_emailAddress']) ? $_POST['applicant_emailAddress'] : ''; // Updated field name
        
        // Prepare SQL statement to insert data into the database
        $sql = "INSERT INTO details_of_applicant (registrationType1, restrictedRawMaterial, applicantName, applicantAddress, applicantNIC, applicantProfession, applicantPost, telephone_No, applicant_mobile_No, applicant_emailAddress)
                VALUES ('$registrationType1', '$restrictedRawMaterial', '$applicantName', '$applicantAddress', '$applicantNIC', '$applicantProfession', '$applicantPost', '$telephone_No', '$mobile_No', '$emailAddress')";
        
        // Execute the SQL query and check for success
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully  details_of_applicant <br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    


// Retrieve and sanitize form data for institution details
$institutionName = isset($_POST['institutionName']) ? $conn->real_escape_string(trim($_POST['institutionName'])) : '';
$institutionAddress = isset($_POST['institutionAddress']) ? $conn->real_escape_string(trim($_POST['institutionAddress'])) : '';
$institutionTelephoneNumber = isset($_POST['telephoneNumber']) ? $conn->real_escape_string(trim($_POST['telephoneNumber'])) : '';
$institutionEmailAddress = isset($_POST['emailAddress']) ? $conn->real_escape_string(trim($_POST['emailAddress'])) : '';
$companyRegistration = isset($_POST['companyRegistration']) ? $conn->real_escape_string(trim($_POST['companyRegistration'])) : '';
$companyDateOfIssue = isset($_POST['dateOfIssue']) ? $conn->real_escape_string(trim($_POST['dateOfIssue'])) : '';
$registrationCertificateNumber = isset($_POST['registrationCertificateNumber']) ? $conn->real_escape_string(trim($_POST['registrationCertificateNumber'])) : '';
$registrationDateOfIssue = isset($_POST['registrationDateOfIssue']) ? $conn->real_escape_string(trim($_POST['registrationDateOfIssue'])) : '';
$establishmentDate = isset($_POST['establishmentDate']) ? $conn->real_escape_string(trim($_POST['establishmentDate'])) : '';

// SQL to insert data into details_of_drug_manufactory table
$sql = "INSERT INTO details_of_drug_manufactory (institution_name, institution_address, institution_telephone, institution_email, company_registration, company_date_of_issue, registration_certificate_number, registration_date_of_issue, establishment_date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssssssss", $institutionName, $institutionAddress, $institutionTelephoneNumber, $institutionEmailAddress, $companyRegistration, $companyDateOfIssue, $registrationCertificateNumber, $registrationDateOfIssue, $establishmentDate);

    if ($stmt->execute()) {
        echo "New record for details_of_drug_manufactory created successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
} else {
    echo "Error preparing statement for details_of_drug_manufactory: " . $conn->error . "<br>";
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



/// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $manufactoryName = isset($_POST['manufactoryName']) ? $conn->real_escape_string(trim($_POST['manufactoryName'])) : '';
    $manufactoryAddress = isset($_POST['manufactoryAddress']) ? $conn->real_escape_string(trim($_POST['manufactoryAddress'])) : '';
    $province = isset($_POST['province']) ? $conn->real_escape_string(trim($_POST['province'])) : '';
    $district = isset($_POST['district']) ? $conn->real_escape_string(trim($_POST['district'])) : '';
    $dsDivision = isset($_POST['dsDivision']) ? $conn->real_escape_string(trim($_POST['dsDivision'])) : '';
    $gnDivision = isset($_POST['gnDivision']) ? $conn->real_escape_string(trim($_POST['gnDivision'])) : '';
    $rateNo = isset($_POST['rateNo']) ? $conn->real_escape_string(trim($_POST['rateNo'])) : '';
    $telephoneNo = isset($_POST['telephoneNo']) ? $conn->real_escape_string(trim($_POST['telephoneNo'])) : '';
    
    // Sanitize email address
    $emailAddress = isset($_POST['emailAddress']) ? $conn->real_escape_string(trim($_POST['emailAddress'])) : '';
    
    $registrationCertificateNumber = isset($_POST['registrationCertificateNumber']) ? $conn->real_escape_string(trim($_POST['registrationCertificateNumber'])) : '';
    $dateOfIssue = isset($_POST['dateOfIssue']) ? $conn->real_escape_string(trim($_POST['dateOfIssue'])) : '';
    $manufactoryEstablishmentDate = isset($_POST['manufactoryEstablishmentDate']) ? $conn->real_escape_string(trim($_POST['manufactoryEstablishmentDate'])) : '';

    // SQL to insert data into the details_of_drug_manufactory_pharmacy table
    $sql = "INSERT INTO details_of_drug_manufactory_pharmacy (institution_name, institution_address, province, district, ds_division, gn_division, rate_no, institution_telephone, institution_email, registration_certificate_number, registration_date_of_issue, establishment_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("ssssssssssss", $manufactoryName, $manufactoryAddress, $province, $district, $dsDivision, $gnDivision, $rateNo, $telephoneNo, $emailAddress, $registrationCertificateNumber, $dateOfIssue, $manufactoryEstablishmentDate);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New record for details_of_drug_manufactory_pharmacy created successfully.<br>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement for details_of_drug_manufactory_pharmacy: <br> " . $conn->error;
    }
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 
// Retrieve and sanitize form data
$physicianName = isset($_POST['physicianName']) ? $conn->real_escape_string(trim($_POST['physicianName'])) : '';
$councilRegistrationNo = isset($_POST['councilRegistrationNo']) ? $conn->real_escape_string(trim($_POST['councilRegistrationNo'])) : '';
$registrationType = isset($_POST['registrationType']) ? $conn->real_escape_string(trim($_POST['registrationType'])) : '';
$dateOfRegistration = isset($_POST['dateOfRegistration']) ? $conn->real_escape_string(trim($_POST['dateOfRegistration'])) : '';
$dateOfRenewal = isset($_POST['dateOfRenewal']) ? $conn->real_escape_string(trim($_POST['dateOfRenewal'])) : '';
$registrationSection = isset($_POST['registrationSection']) ? $conn->real_escape_string(trim($_POST['registrationSection'])) : '';
$specialRegistrationNumber = isset($_POST['specialRegistrationNumber']) ? $conn->real_escape_string(trim($_POST['specialRegistrationNumber'])) : '';
$addres = isset($_POST['addres']) ? $conn->real_escape_string(trim($_POST['addres'])) : ''; // Corrected to match form field name
$telephone_Number = isset($_POST['telephone_Number']) ? $conn->real_escape_string(trim($_POST['telephone_Number'])) : '';
$mobile_No = isset($_POST['mobile_No']) ? $conn->real_escape_string(trim($_POST['mobile_No'])) : '';
$email_Address = isset($_POST['email_Address']) ? $conn->real_escape_string(trim($_POST['email_Address'])) : '';

// SQL to insert data into consultant_physician table
$sql = "INSERT INTO consultant_physician (physician_name, council_registration_no, registration_type, date_of_registration, date_of_renewal, registration_section, special_registration_number, address, telephone_number, mobile, email_address)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    // Bind parameters
    $stmt->bind_param("sssssssssss", $physicianName, $councilRegistrationNo, $registrationType, $dateOfRegistration, $dateOfRenewal, $registrationSection, $specialRegistrationNumber, $addres, $telephone_Number, $mobile_No, $email_Address);

    // Execute statement
    if ($stmt->execute()) {
        echo "New record for consultant_physician created successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    // Close statement
    $stmt->close();
} else {
    echo "Error preparing statement for consultant_physician: " . $conn->error . "<br>";
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// Collect form data and validate required fields
$productName = isset($_POST['productName']) ? $_POST['productName'] : '';
$tradeName = isset($_POST['tradeName']) ? $_POST['tradeName'] : '';
$productNature = isset($_POST['productNature']) ? $_POST['productNature'] : '';
$therapeuticIndications = isset($_POST['therapeuticIndications']) ? $_POST['therapeuticIndications'] : '';
$previousRegistration = isset($_POST['previousRegistration']) ? $_POST['previousRegistration'] : '';
$firstTimeRegistrationNumber = isset($_POST['firstTimeRegistrationNumber']) ? $_POST['firstTimeRegistrationNumber'] : '';
$firstTimeRegistrationDate = isset($_POST['firstTimeRegistrationDate']) ? $_POST['firstTimeRegistrationDate'] : null;
$lastTimeRegistrationNumber = isset($_POST['lastTimeRegistrationNumber']) ? $_POST['lastTimeRegistrationNumber'] : '';
$lastTimeRegistrationDate = isset($_POST['lastTimeRegistrationDate']) ? $_POST['lastTimeRegistrationDate'] : null;

// Collect checkbox values and encode them as JSON
$productTypeArray = isset($_POST['productType']) ? $_POST['productType'] : array();
$productTypeJson = json_encode($productTypeArray);

// SQL to insert data into the product_details table
$sql = "INSERT INTO product_details1_5 (
    product_name, trade_name, product_nature, product_type, therapeutic_indications, previous_registration, 
    first_time_registration_number, first_time_registration_date, last_time_registration_number, last_time_registration_date
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    // Bind parameters
    $stmt->bind_param(
        "ssssssssss", 
        $productName, $tradeName, $productNature, $productTypeJson, $therapeuticIndications, $previousRegistration, 
        $firstTimeRegistrationNumber, $firstTimeRegistrationDate, $lastTimeRegistrationNumber, $lastTimeRegistrationDate
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record inserted successfully  Product_Details1_5.";
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}




// Collect form data
$researchDescription = isset($_POST['researchDescription']) ? $_POST['researchDescription'] : '';
$researchDoneArray = isset($_POST['researchDone']) ? $_POST['researchDone'] : array();
$researchDone = json_encode($researchDoneArray);
$textPageRecipeNo = isset($_POST['textPageRecipeNo']) ? $_POST['textPageRecipeNo'] : '';
$medicineSourceArray = isset($_POST['medicineSource']) ? $_POST['medicineSource'] : array();
$medicineSource = json_encode($medicineSourceArray);
$newProductArray = isset($_POST['newProduct']) ? $_POST['newProduct'] : array();
$newProduct = json_encode($newProductArray);
$newProductRecipe = isset($_POST['newProductRecipe']) ? $_POST['newProductRecipe'] : '';
$legalProvisionCertificate = isset($_POST['legalProvisionCertificate']) ? $_POST['legalProvisionCertificate'] : '';
$doseAndDosage = isset($_POST['doseAndDosage']) ? $_POST['doseAndDosage'] : '';
$routeOfAdministration = isset($_POST['routeOfAdministration']) ? $_POST['routeOfAdministration'] : '';
$routeOfAdministrationTypeArray = isset($_POST['routeOfAdministrationType']) ? $_POST['routeOfAdministrationType'] : array();
$routeOfAdministrationType = json_encode($routeOfAdministrationTypeArray);
$requiredAmountPerUnit = isset($_POST['requiredAmountPerUnit']) ? $_POST['requiredAmountPerUnit'] : '';

// SQL to insert data into the product_details6_11 table
$sql = "INSERT INTO product_details6_11 (
    research_description, research_done, text_page_recipe_no, medicine_source, new_product, 
    new_product_recipe, legal_provision_certificate, dose_and_dosage, route_of_administration, 
    route_of_administration_type, required_amount_per_unit
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    // Bind parameters
    $stmt->bind_param( 
        "sssssssssss", 
        $researchDescription, $researchDone, $textPageRecipeNo, $medicineSource, $newProduct, 
        $newProductRecipe, $legalProvisionCertificate, $doseAndDosage, $routeOfAdministration, 
        $routeOfAdministrationType, $requiredAmountPerUnit
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record inserted successfully Product_Details6_11 . <br>";
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data from the POST request
    $serialNo = isset($_POST['serial_no']) ? $_POST['serial_no'] : array();
    $category = isset($_POST['category']) ? $_POST['category'] : array();
    $types = isset($_POST['types']) ? $_POST['types'] : array();
    $countries = isset($_POST['countries']) ? $_POST['countries'] : array();
    $foreignCompany = isset($_POST['foreign_company']) ? $_POST['foreign_company'] : array();
    $exportQuantityLastYear = isset($_POST['export_quantity_last_year']) ? $_POST['export_quantity_last_year'] : array();
    $expectedExportQuantityNextYear = isset($_POST['expected_export_quantity_next_year']) ? $_POST['expected_export_quantity_next_year'] : array();

    // Check if the arrays are of the same length to avoid errors
    $rowCount = count($serialNo);
    if ($rowCount === count($category) && $rowCount === count($types) && $rowCount === count($countries) && $rowCount === count($foreignCompany) && $rowCount === count($exportQuantityLastYear) && $rowCount === count($expectedExportQuantityNextYear)) {
        
        // Prepare the SQL statement for inserting data
        $sql = "INSERT INTO product_export_details (serial_no, category, types, countries, foreign_company, export_quantity_last_year, expected_export_quantity_next_year) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            $success = true;  // Initialize success flag

            // Loop through each row of the form data and insert into the database
            for ($i = 0; $i < $rowCount; $i++) {
                // Bind parameters for each row
                $stmt->bind_param(
                    "sssssss",
                    $serialNo[$i], $category[$i], $types[$i], $countries[$i], $foreignCompany[$i],
                    $exportQuantityLastYear[$i], $expectedExportQuantityNextYear[$i]
                );
                
                // Execute the statement for each row
                if (!$stmt->execute()) {
                    echo "Error executing statement for row $i: " . $stmt->error;
                    $success = false;  // Set success flag to false if any row fails
                }
            }

            // Check success flag after the loop
            if ($success) {
                echo "New records created successfully Product_Export_Details.  <br>";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Error: Mismatch in array lengths. Please ensure all fields are filled out correctly.";
    }
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Retrieve and sanitize form data for imported materials
$importedMaterials = isset($_POST['imported_materials']) ? $conn->real_escape_string(trim($_POST['imported_materials'])) : '';
$institutionLicenseName = isset($_POST['institution_license_name']) ? $conn->real_escape_string(trim($_POST['institution_license_name'])) : '';
$licenseNo = isset($_POST['license_no']) ? $conn->real_escape_string(trim($_POST['license_no'])) : '';
$countryOfImport = isset($_POST['country_of_import']) ? $conn->real_escape_string(trim($_POST['country_of_import'])) : '';
$rawMaterialManufacturer = isset($_POST['raw_material_manufacturer']) ? $conn->real_escape_string(trim($_POST['raw_material_manufacturer'])) : '';
$manufacturerAddress = isset($_POST['manufacturer_address']) ? $conn->real_escape_string(trim($_POST['manufacturer_address'])) : '';
$importedRawMaterials = isset($_POST['imported_raw_materials']) ? $conn->real_escape_string(trim($_POST['imported_raw_materials'])) : '';
$processedProductsImported = isset($_POST['processed_products_imported']) ? $conn->real_escape_string(trim($_POST['processed_products_imported'])) : '';
$processedProductsNames = isset($_POST['processed_products_names']) ? $conn->real_escape_string(trim($_POST['processed_products_names'])) : '';
$separateApproval = isset($_POST['separate_approval']) ? $conn->real_escape_string(trim($_POST['separate_approval'])) : '';
$referralLetterNumberDate = isset($_POST['referral_letter_number_date']) ? $conn->real_escape_string(trim($_POST['referral_letter_number_date'])) : '';

// SQL to insert data into imported_materials table
$sql = "INSERT INTO imported_materials (imported_materials, institution_license_name, license_no, country_of_import, raw_material_manufacturer, manufacturer_address, imported_raw_materials, processed_products_imported, processed_products_names, separate_approval, referral_letter_number_date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssssssssss", $importedMaterials, $institutionLicenseName, $licenseNo, $countryOfImport, $rawMaterialManufacturer, $manufacturerAddress, $importedRawMaterials, $processedProductsImported, $processedProductsNames, $separateApproval, $referralLetterNumberDate);

    if ($stmt->execute()) {
        echo "New record for imported_materials created successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
} else {
    echo "Error preparing statement for imported_materials: <br> " . $conn->error . "<br>";
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data from the POST request
    $serialNo = isset($_POST['serial_no']) ? $_POST['serial_no'] : array();
    $category = isset($_POST['category']) ? $_POST['category'] : array();
    $types = isset($_POST['types']) ? $_POST['types'] : array();
    $countries = isset($_POST['countries']) ? $_POST['countries'] : array();
    $foreignCompany = isset($_POST['foreign_company']) ? $_POST['foreign_company'] : array();
    $exportQuantityLastYear = isset($_POST['export_quantity_last_year']) ? $_POST['export_quantity_last_year'] : array();
    $expectedExportQuantityNextYear = isset($_POST['expected_export_quantity_next_year']) ? $_POST['expected_export_quantity_next_year'] : array();

    // Check if the arrays are of the same length to avoid errors
    $rowCount = count($serialNo);
    if ($rowCount === count($category) && $rowCount === count($types) && $rowCount === count($countries) && $rowCount === count($foreignCompany) && $rowCount === count($exportQuantityLastYear) && $rowCount === count($expectedExportQuantityNextYear)) {
        
        // Prepare the SQL statement for inserting data
        $sql = "INSERT INTO product_export_details (serial_no, category, types, countries, foreign_company, export_quantity_last_year, expected_export_quantity_next_year) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            $success = true;  // Initialize success flag

            // Loop through each row of the form data and insert into the database
            for ($i = 0; $i < $rowCount; $i++) {
                // Bind parameters for each row
                $stmt->bind_param(
                    "sssssss",
                    $serialNo[$i], $category[$i], $types[$i], $countries[$i], $foreignCompany[$i],
                    $exportQuantityLastYear[$i], $expectedExportQuantityNextYear[$i]
                );
                
                // Execute the statement for each row
                if (!$stmt->execute()) {
                    echo "Error executing statement for row $i: " . $stmt->error;
                    $success = false;  // Set success flag to false if any row fails
                }
            }

            // Check success flag after the loop
            if ($success) {
                echo "New records created successfully Product_Export_Details.  <br>";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Error: Mismatch in array lengths. Please ensure all fields are filled out correctly.";
    }
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Retrieve and sanitize form data for imported materials
$importedMaterials = isset($_POST['imported_materials']) ? $conn->real_escape_string(trim($_POST['imported_materials'])) : '';
$institutionLicenseName = isset($_POST['institution_license_name']) ? $conn->real_escape_string(trim($_POST['institution_license_name'])) : '';
$licenseNo = isset($_POST['license_no']) ? $conn->real_escape_string(trim($_POST['license_no'])) : '';
$countryOfImport = isset($_POST['country_of_import']) ? $conn->real_escape_string(trim($_POST['country_of_import'])) : '';
$rawMaterialManufacturer = isset($_POST['raw_material_manufacturer']) ? $conn->real_escape_string(trim($_POST['raw_material_manufacturer'])) : '';
$manufacturerAddress = isset($_POST['manufacturer_address']) ? $conn->real_escape_string(trim($_POST['manufacturer_address'])) : '';
$importedRawMaterials = isset($_POST['imported_raw_materials']) ? $conn->real_escape_string(trim($_POST['imported_raw_materials'])) : '';
$processedProductsImported = isset($_POST['processed_products_imported']) ? $conn->real_escape_string(trim($_POST['processed_products_imported'])) : '';
$processedProductsNames = isset($_POST['processed_products_names']) ? $conn->real_escape_string(trim($_POST['processed_products_names'])) : '';
$separateApproval = isset($_POST['separate_approval']) ? $conn->real_escape_string(trim($_POST['separate_approval'])) : '';
$referralLetterNumberDate = isset($_POST['referral_letter_number_date']) ? $conn->real_escape_string(trim($_POST['referral_letter_number_date'])) : '';

// SQL to insert data into imported_materials table
$sql = "INSERT INTO imported_materials (imported_materials, institution_license_name, license_no, country_of_import, raw_material_manufacturer, manufacturer_address, imported_raw_materials, processed_products_imported, processed_products_names, separate_approval, referral_letter_number_date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssssssssss", $importedMaterials, $institutionLicenseName, $licenseNo, $countryOfImport, $rawMaterialManufacturer, $manufacturerAddress, $importedRawMaterials, $processedProductsImported, $processedProductsNames, $separateApproval, $referralLetterNumberDate);

    if ($stmt->execute()) {
        echo "New record for imported_materials created successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
} else {
    echo "Error preparing statement for imported_materials: <br> " . $conn->error . "<br>";
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Retrieve and sanitize form data
$serialNo = isset($_POST['serial_no1']) ? $_POST['serial_no1'] : array();
$restrictedIngredients = isset($_POST['restricted_ingredients']) ? $_POST['restricted_ingredients'] : array();
$procurementLocation = isset($_POST['procurement_location']) ? $_POST['procurement_location'] : array();
$procurementAddress = isset($_POST['procurement_address']) ? $_POST['procurement_address'] : array();
$licenseNumber = isset($_POST['license_number']) ? $_POST['license_number'] : array();
$quantityUsedLastYear = isset($_POST['quantity_used_last_year']) ? $_POST['quantity_used_last_year'] : array();
$quantityExpectedNextYear = isset($_POST['quantity_expected_next_year']) ? $_POST['quantity_expected_next_year'] : array();

// Database connection (assuming $conn is your database connection)
// Prepare the SQL statement for inserting data
$sql = "INSERT INTO raw_materials_details 
        (serial_no, restricted_ingredients, procurement_location, procurement_address, license_number, quantity_used_last_year, quantity_expected_next_year) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    // Loop through each row of the form data and insert into the database
    for ($i = 0; $i < count($serialNo); $i++) {
        // Bind parameters
        $stmt->bind_param(
            "sssssss",
            $serialNo[$i], $restrictedIngredients[$i], $procurementLocation[$i], $procurementAddress[$i],
            $licenseNumber[$i], $quantityUsedLastYear[$i], $quantityExpectedNextYear[$i]
        );

        // Execute the statement for each row
        if (!$stmt->execute()) {
            echo "Error executing statement for row $i: " . $stmt->error;
        }
    }

    // Close the statement
    $stmt->close();
    echo "New records created successfully serial_no, restricted_ingredients  <br>.";
} else {
    echo "Error preparing statement: " . $conn->error;
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $consultantName = isset($_POST['consultant_name']) ? htmlspecialchars(trim($_POST['consultant_name'])) : '';
    $idNumber = isset($_POST['id_number']) ? htmlspecialchars(trim($_POST['id_number'])) : '';
    $consultantAddress = isset($_POST['consultant_address']) ? htmlspecialchars(trim($_POST['consultant_address'])) : '';
    $date = isset($_POST['date']) ? htmlspecialchars(trim($_POST['date'])) : '';

    // Database connection
    // Ensure you have established a connection elsewhere in your code before this section

    // Prepare the SQL statement for inserting data
    $sql = "INSERT INTO consultant_certificates (consultant_name, id_number, consultant_address, date) 
            VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ssss", $consultantName, $idNumber, $consultantAddress, $date);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New record created successfully consultant_certificates .  <br>";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // Close connection
    $conn->close();



  
?>
