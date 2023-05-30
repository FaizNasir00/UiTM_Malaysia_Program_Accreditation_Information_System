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

// Delete row from user table
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "DELETE FROM users WHERE user_id='$id'";
  mysqli_query($conn, $sql);
}

mysqli_close($conn);

header("Location: manage_user.php");
exit;
?>
