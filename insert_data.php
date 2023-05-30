<?php
// get the values of the input fields sent via AJAX
$fakulti_id = $_POST['fakulti_id'];
$nama_fakulti = $_POST['nama_fakulti'];
$alamat_fakulti = $_POST['alamat_fakulti'];
$no_tel_fakulti = $_POST['no_tel_fakulti'];
$no_fax_fakulti = $_POST['no_fax_fakulti'];

// connect to the database
$servername = "";
$username = "";
$password = "";
$dbname = "";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// prepare the SQL query to insert the data into the database
$sql = "INSERT INTO fakulti (fakulti_id, nama_fakulti, alamat_fakulti, no_tel_fakulti, no_fax_fakulti)
        VALUES ('$fakulti_id', '$nama_fakulti', '$alamat_fakulti', '$no_tel_fakulti', '$no_fax_fakulti')";

// execute the query
if (mysqli_query($conn, $sql)) {
  echo "Data inserted successfully";
} else {
  echo "Error inserting data: " . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);
?>
