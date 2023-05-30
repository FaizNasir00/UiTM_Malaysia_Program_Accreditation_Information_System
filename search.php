<?php
// Connect to the database
$servername = "localhost";
$username = "inqkacom_faiz123";
$password = "faiznasir123";
$dbname = "inqkacom_pais";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the selected month and year from the AJAX request
if (isset($_POST['month'])) {
    $month = $_POST['month'];
} else {
    $month = "";
}

if (isset($_POST['year'])) {
    $year = $_POST['year'];
} else {
    $year = "";
}

// Query the database to retrieve the list of new applications that already being listed into MQR and PSA by month and year
if (!empty($month) && !empty($month)) {
        if ($month === 'all' && $year === 'all') {
            $sql = "SELECT p.nama_program_bm, p.alamat_program, p.jenis_permohonan, p.no_rujukan_mqa
                    FROM permohonan p
                    INNER JOIN status s ON p.permohonan_id = s.permohonan_id";
        }else if ($month === 'all'){
            $sql = "SELECT p.nama_program_bm, p.alamat_program, p.jenis_permohonan, p.no_rujukan_mqa
                    FROM permohonan p
                    INNER JOIN status s ON p.permohonan_id = s.permohonan_id WHERE YEAR(s.tarikh_tersenarai_di_mqr) = '$year' ";
        }else if ($year === 'all'){
            $sql = "SELECT p.nama_program_bm, p.alamat_program, p.jenis_permohonan, p.no_rujukan_mqa
                    FROM permohonan p
                    INNER JOIN status s ON p.permohonan_id = s.permohonan_id
                    WHERE MONTH(s.tarikh_tersenarai_di_mqr) = '$month' ";
        }else{
            $sql = "SELECT p.nama_program_bm, p.alamat_program, p.jenis_permohonan, p.no_rujukan_mqa
                    FROM permohonan p
                    INNER JOIN status s ON p.permohonan_id = s.permohonan_id
                    WHERE MONTH(s.tarikh_tersenarai_di_mqr) = '$month' AND YEAR(s.tarikh_tersenarai_di_mqr) = '$year' ";
        }
   $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Display the search result as a table
        echo "<table>
                <tr>
                    <th>Nama Program BM</th>
                    <th>Alamat Program</th>
                    <th>Jenis Permohonan</th>
                    <th>No. Rujukan MQA</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["nama_program_bm"] . "</td>
                    <td>" . $row["alamat_program"] . "</td>
                    <td>" . $row["jenis_permohonan"] . "</td>
                    <td>" . $row["no_rujukan_mqa"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        // If there is no search result, display a message
        echo "Tiada hasil carian.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
