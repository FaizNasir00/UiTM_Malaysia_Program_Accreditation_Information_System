<?php
// Connect to database
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_fakulti = $_POST["nama_fakulti"];
  $alamat_fakulti = $_POST["alamat_fakulti"];
  $no_tel_fakulti = $_POST["no_tel_fakulti"];
  $no_fax_fakulti = $_POST["no_fax_fakulti"];

  // Check if the value of 'nama_fakulti' is not null
  if (!empty($nama_fakulti)) {
    // Prepare and execute SQL query
    $stmt = $conn->prepare("INSERT INTO fakulti (nama_fakulti, alamat_fakulti, no_tel_fakulti, no_fax_fakulti) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama_fakulti, $alamat_fakulti, $no_tel_fakulti, $no_fax_fakulti);
    $stmt->execute();

    echo '<script>';
    echo 'alert("Fakulti berjaya ditambah");';
    echo 'setTimeout(function(){ window.location.href = "fakulti.php"; }, 2000);';
    echo '</script>';

  }
}

// Close database connection
$conn->close();
?>
