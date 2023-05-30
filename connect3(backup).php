<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('log_errors', 1);
ini_set('error_log', '/path/to/error.log');

$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$sql = "INSERT INTO permohonan (jenis_permohonan, kampus, alamat_program, no_fon, no_faks, emel_rasmi, tarikh_permohonan, 
kod_program, nama_program_bm, nama_program_bi, no_bil_jkpt, no_ruj_jkpt, tahap_mqf, bidang_nec, 
kod_nec, tarikh_program_dimulakan, tarikh_kohort_pertama_bergraduat, 
nama_pic, jawatan_pic, no_tel_pejabat_pic, no_tel_bimbit_pic, pautan_dokumen_penilaian, tarikh_senat, 
bil_senat, no_rujukan_mqa, sijil_mqa_bm, sijil_mqa_bi, panel_dalam1, institusi_dalam1, panel_dalam2, institusi_dalam2, panel_dalam3, 
institusi_dalam3, panel_dalam4, institusi_dalam4, panel_luar1, institusi_luar1, panel_luar2, institusi_luar2, 
panel_luar3, institusi_luar3, panel_luar4, institusi_luar4, status_permohonan) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
/*
// Get the file data
$fileBM = $_FILES['sijil_mqa_bm'];
$fileBI = $_FILES['sijil_mqa_bi'];

// Specify the file path and name for storing the uploaded files
$targetDir = "path/to/upload/directory/";
$targetFileBM = $targetDir . basename($fileBM['name']);
$targetFileBI = $targetDir . basename($fileBI['name']);


  */
  
  // Combine kod_nec_1, kod_nec_2, kod_nec_3, kod_nec_4 into kod_nec
$kod_nec = $_POST['kod_nec_1'] . $_POST['kod_nec_2'] . $_POST['kod_nec_3'] . $_POST['kod_nec_4'];
// Move the uploaded files to the target directory
/*
if (move_uploaded_file($fileBM['tmp_name'], $targetFileBM) && move_uploaded_file($fileBI['tmp_name'], $targetFileBI)) {
  // File upload successful
  // Execute the prepared statement
  */
$stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssss",
    $_POST['jenis_permohonan'], $_POST['kampus'], $_POST['alamat_program'], $_POST['no_fon'], $_POST['no_faks'], $_POST['emel_rasmi'], $_POST['tarikh_permohonan'], 
    $_POST['kod_program'], $_POST['nama_program_bm'], $_POST['nama_program_bi'], $_POST['no_bil_jkpt'], 
    $_POST['no_ruj_jkpt'], $_POST['tahap_mqf'], $_POST['bidang_nec'], $kod_nec, $_POST['tarikh_program_dimulakan'], 
    $_POST['tarikh_kohort_pertama_bergraduat'], $_POST['nama_pic'], $_POST['jawatan_pic'], $_POST['no_tel_pejabat_pic'], 
    $_POST['no_tel_bimbit_pic'], $_POST['pautan_dokumen_penilaian'], $_POST['tarikh_senat'], $_POST['bil_senat'], 
    $_POST['no_rujukan_mqa'], $_POST['sijil_mqa_bm'], $_POST['sijil_mqa_bi'], $_POST['panel_dalam1'], $_POST['institusi_dalam1'], 
    $_POST['panel_dalam2'], $_POST['institusi_dalam2'], $_POST['panel_dalam3'], $_POST['institusi_dalam3'], 
    $_POST['panel_dalam4'], $_POST['institusi_dalam4'], $_POST['panel_luar1'], $_POST['institusi_luar1'], 
    $_POST['panel_luar2'], $_POST['institusi_luar2'], $_POST['panel_luar3'], $_POST['institusi_luar3'], 
    $_POST['panel_luar4'], $_POST['institusi_luar4'], $_POST['status_permohonan']);

if ($stmt->execute()) {
  echo "<script>alert('Permohonan anda berjaya dikemaskini'); window.location.href = 'permohonan.php';</script>";
} else {
  echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "'); window.location.href = 'permohonan.php';</script>";
}


  /*
} else {
  // File upload failed
  echo "Error uploading the files.";
}*/

$stmt->close();
$conn->close();
?>
