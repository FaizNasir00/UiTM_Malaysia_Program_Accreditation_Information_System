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
  $sql = "DELETE FROM permohonan WHERE permohonan_id='$id'";
  mysqli_query($conn, $sql);
  $sqls = "DELETE FROM status WHERE status_id='$id'";
  mysqli_query($conn, $sqls);
  $sqlp = "DELETE FROM program WHERE program_id='$id'";
  mysqli_query($conn, $sqlp);
}

mysqli_close($conn);

header("Location: kemaskinipermohonan.php");
exit;
?>
