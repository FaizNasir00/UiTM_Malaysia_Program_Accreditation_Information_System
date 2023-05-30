<?php

$nama_program_bm = $_POST['nama_program_bm'];
$nama_program_bi = $_POST['nama_program_bi'];
$tarikh_kelulusan_jkpt = $_POST['tarikh_kelulusan_jkpt'];
$tahap_mqf = $_POST['tahap_mqf'];
$nec_code = $_POST['nec_code'];
$tarikh_program_dimulakan = $_POST['tarikh_program_dimulakan'];
$tarikh_kohort_pertama_bergraduat = $_POST['tarikh_kohort_pertama_bergraduat'];
$nama_pegawai = $_POST['nama_pegawai'];
$jawatan = $_POST['jawatan'];
$no_tel_pejabat = $_POST['no_tel_pejabat'];
$no_tel_bimbit = $_POST['no_tel_bimbit'];
$pautan_dokumen_penilaian = $_POST['pautan_dokumen_penilaian'];
$tarikh_diterima_uhek = $_POST['tarikh_diterima_uhek'];

//Database connection 
$conn = new mysqli('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Insert into "program" table
$stmt1 = $conn->prepare("INSERT INTO program (nama_program_bm, nama_program_bi, tarikh_kelulusan_jkpt, tahap_mqf, nec_code, tarikh_program_dimulakan, tarikh_kohort_pertama_bergraduat) VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt1->bind_param("ssssiss", $nama_program_bm, $nama_program_bi, $tarikh_kelulusan_jkpt, $tahap_mqf, $nec_code, $tarikh_program_dimulakan, $tarikh_kohort_pertama_bergraduat);

// Insert into "pegawai" table
$stmt2 = $conn->prepare("INSERT INTO pegawai (nama_pegawai, jawatan, no_tel_pejabat, no_tel_bimbit, pautan_dokumen_penilaian, tarikh_diterima_uhek) VALUES (?, ?, ?, ?, ?, ?)");

$stmt2->bind_param("ssssss", $nama_pegawai, $jawatan, $no_tel_pejabat, $no_tel_bimbit, $pautan_dokumen_penilaian, $tarikh_diterima_uhek);

// Execute both SQL statements
if ($stmt1->execute() && $stmt2->execute()) {
    echo "Permohonan Anda Berjaya Dihantar. Terima Kasih!";
} else {
    echo "Error: " . $conn->error;
}

// Close prepared statements and database connection
$stmt1->close();
$stmt2->close();
$conn->close();
?>
