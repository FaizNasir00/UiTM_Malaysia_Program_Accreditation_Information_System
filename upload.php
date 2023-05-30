<?php
// Establish a database connection
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// File upload handling
if (isset($_FILES['sijil_mqa_bm']) && isset($_FILES['sijil_mqa_bi'])) {
  $sijil_mqa_bm = $_FILES['sijil_mqa_bm']['tmp_name'];
  $sijil_mqa_bi = $_FILES['sijil_mqa_bi']['tmp_name'];

  $stmt = $conn->prepare("INSERT INTO permohonan (sijil_mqa_bm, sijil_mqa_bi) VALUES (?, ?)");
  $stmt->bind_param("bb", $sijil_mqa_bm, $sijil_mqa_bi);

  $stmt->send_long_data(0, file_get_contents($sijil_mqa_bm));
  $stmt->send_long_data(1, file_get_contents($sijil_mqa_bi));

  if ($stmt->execute()) {
    echo "Files uploaded successfully";
  } else {
    echo "Error uploading files: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>

