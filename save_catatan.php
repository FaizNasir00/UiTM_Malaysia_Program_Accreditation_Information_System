<?php
// Connect to the database
$servername = "localhost";
$username = "inqkacom_faiz123";
$password = "faiznasir123";
$dbname = "inqkacom_pais";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the 'catatan' field and ID from the AJAX request
if (isset($_POST['catatan']) && isset($_POST['id'])) {
    $catatan = $_POST['catatan'];
    $id = $_POST['id'];

    // Update the database record
    $sql = "UPDATE permohonan SET catatan = '$catatan' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
