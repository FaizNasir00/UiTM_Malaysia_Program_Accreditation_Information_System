<?php
// Connect to database
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Delete row from permohonan table
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "DELETE FROM fakulti WHERE fakulti_id='$id'";
  mysqli_query($conn, $sql);
}

mysqli_close($conn);

header("Location: edit_fakulti.php");
exit;
?>
