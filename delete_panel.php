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

// Delete row from panel table
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "DELETE FROM panel WHERE panel_id='$id'";
  mysqli_query($conn, $sql);
}

mysqli_close($conn);

header("Location: editpanel.php");
exit;
?>
