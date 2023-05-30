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

$month = (isset($_POST['month'])) ? $_POST['month'] : "all";
$year = (isset($_POST['year'])) ? $_POST['year'] : "all";

// Query the database to retrieve the list of new applications that already being listed into JKPP by month and year
$sql = "SELECT p.nama_program_bm, p.alamat_program, p.jenis_permohonan, s.tarikh_jkppp
        FROM permohonan p
        INNER JOIN status s ON p.permohonan_id = s.permohonan_id";

if ($month !== "all" || $year !== "all") {
    $sql .= " WHERE";

    if ($month !== "all") {
        $sql .= " MONTH(s.tarikh_jkppp) = '$month'";
    }

    if ($month !== "all" && $year !== "all") {
        $sql .= " AND";
    }

    if ($year !== "all") {
        $sql .= " YEAR(s.tarikh_jkppp) = '$year'";
    }

    $sql .= " AND (s.tarikh_jkppp IS NOT NULL AND s.tarikh_jkppp != '0000-00-00')";
}
else{
    $sql .= " WHERE (s.tarikh_jkppp IS NOT NULL AND s.tarikh_jkppp != '0000-00-00')";
}

$sql .= " ORDER BY s.tarikh_jkppp DESC";

$result = mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
    <title>Senarai Program Yang dibentangkan dalam mesyuarat JKPPP</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mqrpsa_t.css">
</head>
<body>
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
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div class="container1">
        <h1>SENARAI PROGRAM YANG DIBENTANGKAN DALAM MESYUARAT JKPPP</h1>
        <form id="search-form" method="POST" action="jkppp_report.php">
            <label for="month">Bulan:</label>
            <select id="month" name="month">
                <option value="">Sila pilih bulan</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Mac</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Jun</option>
                <option value="07">Julai</option>
                <option value="08">Ogos</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Disember</option>
            </select>
            <label for="year">Tahun:</label>
            <select id="year" name="year">
                <option value="">Sila pilih tahun</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
            <button type="submit" id="cari-btn">Cari</button>
        </form>
        <br>
       <table>
        <thead>
            <tr>
                <th>Bil.</th>
                <th>Nama Program</th>
                <th>Alamat Program</th>
                <th>Jenis Permohonan</th>
                <th>Tarikh Mesyuarat JKPPP</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($result)) {
                $counter = 1; // Initialize a counter variable
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $counter++; ?></td> <!-- Display and increment the counter -->
                        <td><?php echo htmlspecialchars($row['nama_program_bm']); ?></td>
                        <td><?php echo htmlspecialchars($row['alamat_program']); ?></td>
                        <td><?php echo htmlspecialchars($row['jenis_permohonan']); ?></td>
                        <td><?php echo htmlspecialchars($row['tarikh_jkppp']); ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>


    </div>
    
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
      link.download = 'jkppp_report.csv';
      link.style.display = 'none';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
    </script>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
	<br>
	<div style="position: fixed; bottom: 20px; right: 240px; display: flex; gap: 10px;">
    <button onclick ="downloadCsv()" >Muat Turun</button></a>
    <a href="jkppp_report.php"><button style="position: fixed; bottom: 20px; right: 20px;">Refresh</button></a>
    <a href="index.php"><button style="position: fixed; bottom: 20px; right: 140px;">Kembali</button></a>
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
