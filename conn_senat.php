<?php
$jenis_permohonan = $_POST['jenis_permohonan'];
$kampus = $_POST['kampus'];
$alamat_program = $_POST['alamat_program'];
$telefon = $_POST['telefon'];
$faks = $_POST['faks'];
$email = $_POST['email'];
$tarikh_permohonan = date('Y-m-d');

//Database connection 
$conn = new mysqli('', '', '', '');

if ($conn->connect_error){
        die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO permohonan (jenis_permohonan, kampus, alamat_program, telefon, faks, email, tarikh_permohonan) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $jenis_permohonan, $kampus, $alamat_program, $telefon, $faks, $email, $tarikh_permohonan);
    $stmt->execute();
    echo "Permohonan Anda Berjaya Dihantar Terima Kasih";
    $stmt->close();
    $conn->close();    
}
header('Location: permohonan2.php');
exit;
?>


