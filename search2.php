<?php
// Connect to the database
$servername = "";
$username = "";
$password = "";
$dbname = "";

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

// Query the database to retrieve the list of new applications that already being listed into JKPP by month and year
if (!empty($month) && !empty($year)) {
    $sql = "SELECT p.nama_program_bm, p.alamat_program, p.jenis_permohonan
            FROM permohonan p
            INNER JOIN status s ON p.permohonan_id = s.permohonan_id
            WHERE MONTH(s.tarikh_jkppp) = '$month' AND YEAR(s.tarikh_jkppp) = '$year'
            ORDER BY s.tarikh_jkppp DESC";
    $result = mysqli_query($conn, $sql);
}

if (mysqli_num_rows($result) > 0) {
    // Display the search result as a table
    echo "<table>
            <tr>
                <th>Nama Program (BM)</th>
                <th>Alamat Program</th>
                <th>Jenis Permohonan</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["nama_program_bm"] . "</td>
                <td>" . $row["alamat_program"] . "</td>
                <td>" . $row["jenis_permohonan"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    // If there is no search result, display a message
    echo "Tiada hasil carian.";
}

// Close the database connection
mysqli_close($conn);
?>
