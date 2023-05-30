<?php
// Connect to database
$servername = "localhost";
$username = "inqkacom_faiz123";
$password = "faiznasir123";
$dbname = "inqkacom_pais";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if POST data is set
if (isset($_POST['id']) && isset($_POST['catatan'])) {
    $id = $_POST['id'];
    $catatan = $_POST['catatan'];

    // Prepared statement to protect against SQL injection
    $sql = "UPDATE permohonan SET catatan = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    // "si" indicates the types of the parameters: s (string) and i (integer)
    $stmt->bind_param("si", $catatan, $id);

    // Attempt to execute the prepared statement
    if($stmt->execute()){
        // Return a JSON response
        header('Content-Type: application/json');
        echo json_encode(["status" => "success", "message" => "Catatan updated"]);
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
} else {
    // Error message if 'id' or 'catatan' POST data is not set
    echo "ERROR: 'id' or 'catatan' POST data is not set.";
}

// Close connection
mysqli_close($conn);
?>
