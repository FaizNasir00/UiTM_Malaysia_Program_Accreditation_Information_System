<?php
$jenis_panel = isset($_POST['jenis_panel']) ? $_POST['jenis_panel'] : '';
$nama_panel = isset($_POST['nama_panel']) ? $_POST['nama_panel'] : '';
$bidang = isset($_POST['bidang']) ? $_POST['bidang'] : '';
$institusi = isset($_POST['institusi']) ? $_POST['institusi'] : '';
$no_tel = isset($_POST['no_tel']) ? $_POST['no_tel'] : '';
$emel = isset($_POST['emel']) ? $_POST['emel'] : '';
$cv = isset($_POST['cv']) ? $_POST['cv'] : '';
$borang_terima_pelantikan = isset($_POST['borang_terima_pelantikan']) ? $_POST['borang_terima_pelantikan'] : '';
$bayaran_honororium = isset($_POST['bayaran_honororium']) ? $_POST['bayaran_honororium'] : '';

//Database connection
$conn = new mysqli('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Insert into "panel" table
$stmt = $conn->prepare("INSERT INTO panel (jenis_panel, nama_panel, bidang, institusi, no_tel, emel, cv, borang_terima_pelantikan, bayaran_honororium) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters to the statement
$stmt->bind_param("sssssssss", $jenis_panel, $nama_panel, $bidang, $institusi, $no_tel, $emel, $cv, $borang_terima_pelantikan, $bayaran_honororium);

// Execute SQL statement
if ($stmt->execute())

// Check if the insertion was successful
if ($stmt->affected_rows > 0) {
    echo '<script>alert("Data inserted successfully.");';
    echo 'setTimeout(function(){window.location.href = "panel2.php";}, 500);</script>';
} else {
    echo 'Error inserting data: ' . $stmt->error;
}

// Close prepared statement and database connection
$stmt->close();
$conn->close();
?>



