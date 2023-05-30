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

// Retrieve the selected month and year from the drop-down menus
$bulan = $_POST['bulan'] ?? 'semua';
$tahun = $_POST['tahun'] ?? 'semua';

// Query the database to retrieve the summary of document received by month and year
if ($bulan === 'semua' && $tahun === 'semua') {
    $sql = "SELECT jenis_permohonan, COUNT(*) AS bilangan
    FROM permohonan GROUP BY jenis_permohonan WITH ROLLUP
    HAVING jenis_permohonan IS NOT NULL AND jenis_permohonan <> '?'
    ";
} else if ($bulan === 'semua') {
    $sql = "SELECT jenis_permohonan, COUNT(*) AS bilangan
    FROM permohonan
    WHERE YEAR(tarikh_permohonan) = '$tahun'
    GROUP BY jenis_permohonan WITH ROLLUP
    HAVING jenis_permohonan IS NOT NULL AND jenis_permohonan <> '?'
    ";
} else if ($tahun === 'semua') {
    $sql = "SELECT jenis_permohonan, COUNT(*) AS bilangan
    FROM permohonan
    WHERE MONTH(tarikh_permohonan) = '$bulan'
    GROUP BY jenis_permohonan WITH ROLLUP
    HAVING jenis_permohonan IS NOT NULL AND jenis_permohonan <> '?'
    ";
} else {
    $sql = "SELECT jenis_permohonan, COUNT(*) AS bilangan
    FROM permohonan
    WHERE YEAR(tarikh_permohonan) = '$tahun' AND MONTH(tarikh_permohonan) = '$bulan'
    GROUP BY jenis_permohonan WITH ROLLUP
    HAVING jenis_permohonan IS NOT NULL AND jenis_permohonan <> '?'
    ";
}
$result = mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
    <title>Ringkasan Penerimaan Dokumen Mengikut Tempoh</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/penerimaandokumen.css">
    <script>
    function downloadCsv() {
      // Fetch the table data as an array of arrays
      const table = document.querySelector('table');
      const rows = Array.from(table.querySelectorAll('tr'));
      const data = rows.map(row => Array.from(row.querySelectorAll('th,td')).map(cell => cell.textContent));
      
      // Convert the data to CSV format
      const csv = data.map(row => row.join(',')).join('\n');
      
      // Create a temporary link element and click it to download the CSV file
      const link = document.createElement('a');
      link.href = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
      link.download = 'ringkasanpenerimaandokument.csv';
      link.style.display = 'none';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
    </script>
</head>
<body>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <button class="download" onclick="downloadCsv()">Muat Turun</button>
	<br>
    <div class="container">
        <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="index.php">Home</a>
      <button class="dropdown-btn">Permohonan 
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="permohonan.php">Permohonan Baru</a>
        <a href="kemaskinipermohonan.php">Kemaskini Permohonan</a>
    </div>
      <button class="dropdown-btn">Panel 
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="panel2.php">Panel Dalam</a>
        <a href="panel1.php">Panel Luar</a>
        <a href="editpanel.php">Kemaskini Panel</a>
    </div>
    <button class="dropdown-btn">Fakulti 
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="fakulti.php">Fakulti Baru</a>
        <a href="edit_fakulti.php">Kemaskini Fakulti</a>
    </div>
        <button class="dropdown-btn">Laporan 
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="p_akreditasi.php">Senarai Permohonan</a>
        <a href="statuspermohonan.php">Status Permohonan</a>
        <a href="penerimaandokumen.php">Ringkasan Penerimaan Dokumen</a>
        <a href="jkppp_report.php">Senarai Program Yang dibentangkan dalam mesyuarat JKPPP</a>
        <a href="senat_report.php">Senarai Program Yang Dapat Pengesahan Dalam Mesyuarat Senat</a>
        <a href="mqa_report.php">Senarai Program Baharu Yang Telah Dihantar Ke MQA</a>
        <a href="mqrpsa_t.php">Senarai Program Baharu Yang Telah Tersenarai Di Dalam MQR Dan PSA</a>
        <a href="mqrpsa_b.php">Senarai Program Baharu Yang Belum Tersenarai Di Dalam MQR Dan PSA</a>
        <a href="senaraipanel.php">Senarai Panel Penilai</a>
        <a href="places.php">Senarai Kolej Pengajian/Fakulti/Kampus</a>
    </div>
      <a href="manage_user.php">User</a>
      <a href="logout.php">Logout</a>
    </div>
        <h1>RINGKASAN PENERIMAAN DOKUMEN MENGIKUT TEMPOH</h1><br>
        <form method="POST" action="">
            <label for="bulan">Bulan:</label>
            <select id="bulan" name="bulan">
                <option value="">Sila pilih bulan</option>
                <option value="01" <?= $bulan === '01' ? 'selected' : '' ?>>Januari</option>
                <option value="02" <?= $bulan === '02' ? 'selected' : '' ?>>Februari</option>
                <option value="03" <?= $bulan === '03' ? 'selected' : '' ?>>Mac</option>
                <option value="04" <?= $bulan === '04' ? 'selected' : '' ?>>April</option>
                <option value="05" <?= $bulan === '05' ? 'selected' : '' ?>>Mei</option>
                <option value="06" <?= $bulan === '06' ? 'selected' : '' ?>>Jun</option>
                <option value="07" <?= $bulan === '07' ? 'selected' : '' ?>>Julai</option>
                <option value="08" <?= $bulan === '08' ? 'selected' : '' ?>>Ogos</option>
                <option value="09" <?= $bulan === '09' ? 'selected' : '' ?>>September</option>
                <option value="10" <?= $bulan === '10' ? 'selected' : '' ?>>Oktober</option>
                <option value="11" <?= $bulan === '11' ? 'selected' : '' ?>>November</option>
                <option value="12" <?= $bulan === '12' ? 'selected' : '' ?>>Disember</option>

            </select>
            <label for="tahun">Tahun:</label>
            <select id="tahun" name="tahun">
                <option value="">Sila pilih tahun</option>
                <option value="2010" <?= $tahun === '2010' ? 'selected' : '' ?>>2010</option>
                <option value="2011" <?= $tahun === '2011' ? 'selected' : '' ?>>2011</option>
                <option value="2012" <?= $tahun === '2012' ? 'selected' : '' ?>>2012</option>
                <option value="2013" <?= $tahun === '2013' ? 'selected' : '' ?>>2013</option>
                <option value="2014" <?= $tahun === '2014' ? 'selected' : '' ?>>2014</option>
                <option value="2015" <?= $tahun === '2015' ? 'selected' : '' ?>>2015</option>
                <option value="2016" <?= $tahun === '2016' ? 'selected' : '' ?>>2016</option>
                <option value="2017" <?= $tahun === '2017' ? 'selected' : '' ?>>2017</option>
                <option value="2018" <?= $tahun === '2018' ? 'selected' : '' ?>>2018</option>
                <option value="2019" <?= $tahun === '2019' ? 'selected' : '' ?>>2019</option>
                <option value="2020" <?= $tahun === '2020' ? 'selected' : '' ?>>2020</option>
                <option value="2021" <?= $tahun === '2021' ? 'selected' : '' ?>>2021</option>
                <option value="2022" <?= $tahun === '2022' ? 'selected' : '' ?>>2022</option>
                <option value="2023" <?= $tahun === '2023' ? 'selected' : '' ?>>2023</option>
                <option value="2024" <?= $tahun === '2024' ? 'selected' : '' ?>>2024</option>

            </select>
            <button class = "submit">Cari</button> <br>
        </form><br><br><br>

        <?php
    // Display the summary table if the form is submitted
    if (!empty($bulan) && !empty($tahun) && mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead><tr><th>Jenis Permohonan</th><th>Bilangan</th></tr></thead>";
        echo "<tbody>";
        $total = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><a class='button' href='detail_jenis_permohonan.php?jenis_permohonan=" . urlencode($row["jenis_permohonan"]) . "'>" . $row["jenis_permohonan"] . "</a></td>";
            echo "<td>" . $row["bilangan"] . "</td>";
            echo "</tr>";
            $total += $row["bilangan"];
        }

        echo "</tbody>";
        echo "<tfoot><tr><td>JUMLAH</td><td>" . $total . "</td></tr></tfoot>";
        echo "</table>";
    } else {
        echo "<p>Sila pilih bulan dan tahun untuk melihat ringkasan penerimaan dokumen mengikut tempoh.</p>";
    }
?>


    </div>
    <a href="penerimaandokumen.php"><button style="position: fixed; bottom: 20px; right: 20px; background-color: #0056b3; color: white; padding: 10px 18px; border: none; border-radius: 4px; cursor: pointer;">Refresh</button></a>
    <a href="index.php"><button style="position: fixed; bottom: 20px; right: 120px; background-color: #0056b3; color: white; padding: 10px 18px; border: none; border-radius: 4px; cursor: pointer;">Kembali</button></a>
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        
        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
              dropdownContent.style.display = "none";
            } else {
              dropdownContent.style.display = "block";
            }
          });
        }
        </script>     
        
        <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>
</html>
