<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update as needed
$password = "";     // Update as needed
$dbname = "formi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO official_use (file_no, receipt_no, date_of_issue, officer_signature) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $file_no, $receipt_no, $date_of_issue, $officer_signature);

// Set parameters and execute
$file_no = $_POST['file-no'];
$receipt_no = $_POST['receipt-no'];
$date_of_issue = $_POST['date-of-issue'];
$officer_signature = $_POST['officer-signature'];

$stmt->execute();

echo "New record created successfully Official_Use  <br>";

//===================================================================

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registration (registration_type, temporary_license, permanent_license) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $registration_type, $temporary_license, $permanent_license);

// Set parameters and execute
$registration_type = isset($_POST['registration_type']) && is_array($_POST['registration_type']) ? implode(", ", $_POST['registration_type']) : '';
$temporary_license = isset($_POST['temporary_license']) && is_array($_POST['temporary_license']) ? implode(", ", $_POST['temporary_license']) : '';
$permanent_license = isset($_POST['permanent_license']) && is_array($_POST['permanent_license']) ? implode(", ", $_POST['permanent_license']) : '';

$stmt->execute();

echo "New record created successfully Registration <br>";

//===================================================================

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$applicant_name = $_POST['applicant_name'];
$applicant_address = $_POST['applicant_address'];
$id_number = $_POST['id_number'];
$applicant_profession = $_POST['applicant_profession'];
$Telephone = $_POST['Telephone'];
$Mobile = $_POST['Mobile'];
$emailAddress = $_POST['emailAddress'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO details_of_applicant (applicant_name, applicant_address, id_number, applicant_profession, Telephone, Mobile, emailAddress) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $applicant_name, $applicant_address, $id_number, $applicant_profession, $Telephone, $Mobile, $emailAddress);

// Execute the query
if ($stmt->execute()) {
    echo "New record created successfully Details_of_Applicant <br>";
} else {
    echo "Error: " . $stmt->error;
}

//===================================================================

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$company_name = $_POST['company_name'];
$company_address = $_POST['company_address'];
$company_phone = $_POST['company_phone'];
$company_email = $_POST['company_email'];
$registration_certificate_no = $_POST['registration_certificate_no'];
$company_date_of_issue = $_POST['company_date_of_issue'];
$ayurveda_registration_no = $_POST['ayurveda_registration_no'];
$ayurveda_date_of_issue = $_POST['ayurveda_date_of_issue'];
$company_establishment_date = $_POST['company_establishment_date'];
$applicant_position = $_POST['applicant_position'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO details_of_the_manufacturing_company (company_name, company_address, company_phone, company_email, registration_certificate_no, company_date_of_issue, ayurveda_registration_no, ayurveda_date_of_issue, company_establishment_date, applicant_position) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $company_name, $company_address, $company_phone, $company_email, $registration_certificate_no, $company_date_of_issue, $ayurveda_registration_no, $ayurveda_date_of_issue, $company_establishment_date, $applicant_position);

// Execute the query
if ($stmt->execute()) {
    echo "New record created successfully Details of the manufacturing company<br>";
} else {
    echo "Error: " . $stmt->error;
}

//===================================================================

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the 'serial_no' POST data is available and is an array
    if (isset($_POST['serial_no']) && is_array($_POST['serial_no']) && count($_POST['serial_no']) > 0) {

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO details_of_board_of_directors (serial_no, designation, full_name, id_card_number, specimen_signature) VALUES (?, ?, ?, ?, ?)");

        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }

        // Flag to track any issues with missing data
        $hasError = false;

        // Loop through each set of input fields
        foreach ($_POST['serial_no'] as $index => $serial_no) {
            // Retrieve and sanitize data for each column
            $serialNo = isset($_POST['serial_no'][$index]) ? trim($_POST['serial_no'][$index]) : '';
            $designation = isset($_POST['designation'][$index]) ? trim($_POST['designation'][$index]) : '';
            $fullName = isset($_POST['full_name'][$index]) ? trim($_POST['full_name'][$index]) : '';
            $idCardNumber = isset($_POST['id_card_number'][$index]) ? trim($_POST['id_card_number'][$index]) : '';
            $specimenSignature = isset($_POST['specimen_signature'][$index]) ? trim($_POST['specimen_signature'][$index]) : '';

            // Check if any field is empty
            if ($serialNo && $designation && $fullName && $idCardNumber && $specimenSignature) {
                // Bind parameters
                $stmt->bind_param("sssss", $serialNo, $designation, $fullName, $idCardNumber, $specimenSignature);

                // Execute the statement
                if ($stmt->execute()) {
                    echo "New record for Serial No. $serialNo created successfully<br>";
                } else {
                    echo "Error: " . $stmt->error . "<br>";
                    $hasError = true;
                }
            }
        }

        // Close the statement
        $stmt->close();

    }
}

//===================================================================

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO attachments (description, is_attached) VALUES (?, ?)");

    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }

    // List of attachment descriptions
    $attachments = [
        "Certified photocopy of Business/Company Registration Certificate",
        "Certified photocopy of Registration certificate (If registered under Department of Ayurveda)",
        "Photocopies of National Identity Card/Passport of Applicant/Board of Directors/Members/Partners (mention number of attachments)",
        "Bank statements of near 3 months of local/foreign bank accounts to verify financial capability",
        "Certificate of bank balance of approximately near 3 months in local/foreign bank accounts",
        "Document authorized to sign on behalf of the company",
        "Affidavit confirming authorization to sign on behalf of the company",
        "If the relevant entity is a company, the report containing the authorized board of directors’ decision to submit the EOI (Board Resolution)",
        "In case of Sole Proprietorship/Partnership, Affidavit confirming the nature of the business and personal details",
        "Cash Receipt of Non-Refundable Deposit Fee Credited to bank account of Department of Ayurveda"
    ];

    // Loop through the list of attachments
    foreach ($attachments as $index => $description) {
        // Determine if checkbox is checked
        $isAttached = isset($_POST["attachment" . ($index + 1)]) ? 1 : 0;

        // Bind parameters
        $stmt->bind_param("si", $description, $isAttached);

        // Execute the statement
        if (!$stmt->execute()) {
            echo "Error inserting record for '$description': " . $stmt->error . "<br>";
        }
    }

    // Close the statement
    $stmt->close();
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $physician_fullname = $conn->real_escape_string(trim($_POST['physician_fullname']));
    $registration_no = $conn->real_escape_string(trim($_POST['registration_no']));
    $registration_certificate_no = $conn->real_escape_string(trim($_POST['registration_certificate_no']));
    $date_of_issue = $conn->real_escape_string(trim($_POST['date_of_issue']));
    $date_of_renewal = $conn->real_escape_string(trim($_POST['date_of_renewal']));
    $special_registration = $conn->real_escape_string(trim($_POST['special_registration']));
    $personal_address = $conn->real_escape_string(trim($_POST['personal_address']));
    $telephone_fixed = $conn->real_escape_string(trim($_POST['telephone_fixed']));
    $mobile = $conn->real_escape_string(trim($_POST['mobile']));
    $email_address = $conn->real_escape_string(trim($_POST['email_address']));

    // Handle registration purpose checkboxes
    if (isset($_POST['registration_purpose']) && is_array($_POST['registration_purpose'])) {
        $registration_purpose = implode(", ", $_POST['registration_purpose']);
    } else {
        $registration_purpose = ''; // Handle cases where no checkbox is selected
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO consultant_physician 
        (physician_fullname, registration_no, registration_purpose, registration_certificate_no, date_of_issue, date_of_renewal, special_registration, personal_address, telephone_fixed, mobile, email_address) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sssssssssss", $physician_fullname, $registration_no, $registration_purpose, $registration_certificate_no, $date_of_issue, $date_of_renewal, $special_registration, $personal_address, $telephone_fixed, $mobile, $email_address);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully Consultant Physician <br>";
    } else {
        echo "Error: " . $stmt->error;
    }
}




// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $pharmacist_fullname = $conn->real_escape_string(trim($_POST['pharmacist_fullname']));
    $ayurveda_medical_council_registration_no = $conn->real_escape_string(trim($_POST['ayurveda_medical_council_registration_no']));
    $pharmacist_date_of_issue = $conn->real_escape_string(trim($_POST['pharmacist_date_of_issue']));
    $pharmacist_date_of_renewal = $conn->real_escape_string(trim($_POST['pharmacist_date_of_renewal']));
    $pharmacist_personal_address = $conn->real_escape_string(trim($_POST['pharmacist_personal_address']));
    $pharmacist_telephone_fixed = $conn->real_escape_string(trim($_POST['pharmacist_telephone_fixed']));
    $pharmacist_telephone_mobile = $conn->real_escape_string(trim($_POST['pharmacist_telephone_mobile']));
    $pharmacist_email_address = $conn->real_escape_string(trim($_POST['pharmacist_email_address']));

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO pharmacist_details 
        (pharmacist_fullname, ayurveda_medical_council_registration_no, pharmacist_date_of_issue, pharmacist_date_of_renewal, pharmacist_personal_address, pharmacist_telephone_fixed, pharmacist_telephone_mobile, pharmacist_email_address) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssssss", $pharmacist_fullname, $ayurveda_medical_council_registration_no, $pharmacist_date_of_issue, $pharmacist_date_of_renewal, $pharmacist_personal_address, $pharmacist_telephone_fixed, $pharmacist_telephone_mobile, $pharmacist_email_address);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully Pharmacist Details <br> ";
    } else {
        echo "Error: " . $stmt->error;
    }
}




// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO attachments4_5 (description, is_attached) VALUES (?, ?)");

    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }

    // List of attachment descriptions
    $attachments = [
        "Certified copy of consultant physician’s Ayurveda Medical Council registration certificate",
        "Certified copy of pharmacist’s Ayurveda Medical Council registration certificate"
    ];

    // Loop through the list of attachments
    foreach ($attachments as $index => $description) {
        // Determine if checkbox is checked
        $isAttached = isset($_POST["attachment" . ($index + 1)]) ? 1 : 0;

        // Bind parameters
        $stmt->bind_param("si", $description, $isAttached);

        // Execute the statement
        if (!$stmt->execute()) {
            echo "Error inserting record for '$description': " . $stmt->error . "<br>";
        }
        
    }

   
}


//===============================================================================================================



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data with default values
    $name_of_owner = isset($_POST['Name_of_owner']) ? $_POST['Name_of_owner'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $primary_cultivation = isset($_POST['primary_cultivation']) ? $_POST['primary_cultivation'] : '';
    $secondary_cultivation = isset($_POST['secondary_cultivation']) ? $_POST['secondary_cultivation'] : '';
    $total_cultivation = isset($_POST['total_cultivation']) ? $_POST['total_cultivation'] : '';
    $land_surrounding = isset($_POST['land_surrounding']) ? json_encode($_POST['land_surrounding']) : '';
    $province = isset($_POST['province']) ? $_POST['province'] : '';
    $district = isset($_POST['district']) ? $_POST['district'] : '';
    $divisional_secretariat = isset($_POST['divisional_secretariat']) ? $_POST['divisional_secretariat'] : '';
    $grama_niladhari = isset($_POST['grama_niladhari']) ? $_POST['grama_niladhari'] : '';
    $cultivation_land = isset($_POST['cultivation_land']) ? $_POST['cultivation_land'] : '';
    $ownership = isset($_POST['ownership']) ? $_POST['ownership'] : '';
    $rate_no = isset($_POST['rate_no']) ? $_POST['rate_no'] : '';
    $commencement_date = isset($_POST['commencement_date']) ? $_POST['commencement_date'] : '';
    $agriculture_instructor = isset($_POST['agriculture_instructor']) ? $_POST['agriculture_instructor'] : '';
    $instructor_address = isset($_POST['instructor_address']) ? $_POST['instructor_address'] : '';
    $instructor_nic = isset($_POST['instructor_nic']) ? $_POST['instructor_nic'] : '';
    $instructor_telephone = isset($_POST['instructor_telephone']) ? $_POST['instructor_telephone'] : '';
    $instructor_mobile = isset($_POST['instructor_mobile']) ? $_POST['instructor_mobile'] : '';
    $instructor_email = isset($_POST['instructor_email']) ? $_POST['instructor_email'] : '';
    $agriculture_instructor_secondary = isset($_POST['agriculture_instructor_secondary']) ? $_POST['agriculture_instructor_secondary'] : '';
    $nic = isset($_POST['nic']) ? $_POST['nic'] : '';
    $telephone_secondary = isset($_POST['telephone_secondary']) ? $_POST['telephone_secondary'] : '';
    $mobile_secondary = isset($_POST['mobile_secondary']) ? $_POST['mobile_secondary'] : '';
    $email_secondary = isset($_POST['email_secondary']) ? $_POST['email_secondary'] : '';
    $license_number = isset($_POST['license_number']) ? $_POST['license_number'] : '';
    $license_date_of_issue = isset($_POST['license_date_of_issue']) ? $_POST['license_date_of_issue'] : '';
    $ayurveda_registration = isset($_POST['ayurveda_registration']) ? $_POST['ayurveda_registration'] : '';
    $ayurveda_date_of_issue = isset($_POST['ayurveda_date_of_issue']) ? $_POST['ayurveda_date_of_issue'] : '';
    $protective_measures = isset($_POST['protective_measures']) ? json_encode($_POST['protective_measures']) : '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO cultivation_details 
        (name_of_owner, address, telephone, email, primary_cultivation, secondary_cultivation, total_cultivation, 
        land_surrounding, province, district, divisional_secretariat, grama_niladhari, cultivation_land, ownership, rate_no, 
        commencement_date, agriculture_instructor, instructor_address, instructor_nic, instructor_telephone, instructor_mobile, 
        instructor_email, agriculture_instructor_secondary, nic, telephone_secondary, mobile_secondary, email_secondary, 
        license_number, license_date_of_issue, ayurveda_registration, ayurveda_date_of_issue, protective_measures) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    

    // Bind parameters
    $bind = $stmt->bind_param("ssssssssssssssssssssssssssssss", 
        $name_of_owner, $address, $telephone, $email, $primary_cultivation, $secondary_cultivation, $total_cultivation, 
        $land_surrounding, $province, $district, $divisional_secretariat, $grama_niladhari, $cultivation_land, $ownership, $rate_no, 
        $commencement_date, $agriculture_instructor, $instructor_address, $instructor_nic, $instructor_telephone, $instructor_mobile, 
        $instructor_email, $agriculture_instructor_secondary, $nic, $telephone_secondary, $mobile_secondary, $email_secondary, 
        $license_number, $license_date_of_issue, $ayurveda_registration, $ayurveda_date_of_issue, $protective_measures);

    if ($bind === false) {
        die("Bind failed: " . htmlspecialchars($stmt->error));
    }

    // Execute the statement
    $execute = $stmt->execute();

    if ($execute === false) {
        die("Execute failed: " . htmlspecialchars($stmt->error));
    } else {
        echo "New record created successfully";
    }

}
//===============================================================================================================



//===============================================================================================================


//===============================================================================================================



//===============================================================================================================


//===============================================================================================================


//===============================================================================================================

// Close connections
$stmt->close();
$conn->close();

?>
