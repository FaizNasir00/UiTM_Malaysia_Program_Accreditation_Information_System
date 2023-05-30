<?php
// Include config file
require_once "connect.php";

// Define variables and initialize with empty values
$kfk_name = $kfk_address = $kfk_phone = $kfk_fax = "";
$kfk_name_err = $kfk_address_err = $kfk_phone_err = $kfk_fax_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $input_kfk_name = trim($_POST["kfk_name"]);
    if (empty($input_kfk_name)) {
        $kfk_name_err = "Please enter faculty name.";
    } elseif (!filter_var($input_kfk_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $kfk_name_err = "Please enter a valid name.";
    } else {
        $kfk_name = $input_kfk_name;
    }

    $input_kfk_address = trim($_POST["kfk_address"]);
    if (empty($input_kfk_address)) {
        $kfk_address_err = "Please enter an address.";
    } else {
        $kfk_address = $input_kfk_address;
    }

    $input_kfk_phone = trim($_POST["kfk_phone"]);
    if (empty($input_kfk_phone)) {
        $kfk_phone_err = "Please enter a phone number.";
    } else {
        $kfk_phone = $input_kfk_phone;
    }

    $input_kfk_fax = trim($_POST["kfk_fax"]);
    if (empty($input_kfk_fax)) {
        $kfk_fax_err = "Please enter a fax number.";
    } else {
        $kfk_fax = $input_kfk_fax;
    }

    // Check input errors before inserting in database
    if (empty($kfk_name_err) && empty($kfk_address_err) && empty($kfk_phone_err) && empty($kfk_fax_err)) {
        // Prepare an update statement
        $sql = "UPDATE fakulti SET kfk_name=?, kfk_address=?, kfk_phone=?, kfk_fax=? WHERE id=?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssi", $param_kfk_name, $param_kfk_address, $param_kfk_phone, $param_kfk_fax, $param_id);

            // Set parameters
            $param_kfk_name = $kfk_name;
            $param_kfk_address = $kfk_address;
            $param_kfk_phone = $kfk_phone;
            $param_kfk_fax = $kfk_fax;
            $param_id = $_POST["id"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
$sql = "SELECT * FROM fakulti WHERE id = ?";

if ($stmt = $conn->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("i", $param_id);
    
    // Set parameters
    $param_id = $id;
    
    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            // Fetch result row as an associative array
            $row = $result->fetch_assoc();
            
            // Retrieve individual field value
            $kfk_name = $row["kfk_name"];
            $kfk_address = $row["kfk_address"];
            $kfk_phone = $row["kfk_phone"];
            $kfk_fax = $row["kfk_fax"];
        } else {
            // URL doesn't contain valid id parameter, redirect to error page
            header("location: error.php");
            exit();
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
} else {
    // URL doesn't contain id parameter, redirect to error page
    header("location: error.php");
    exit();
}
}