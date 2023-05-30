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

    // Get selected month and year
    if (isset($_POST['submit'])) {
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
    } else {
        $bulan = "all";
        $tahun = "all";
    }
    
    // Get new applications data from database
    if ($bulan === 'all' && $tahun === 'all') {
        $sql = "SELECT permohonan.*, status.*
                FROM permohonan
                JOIN status ON permohonan.permohonan_id = status.status_id
                WHERE (tarikh_tersenarai_di_mqr IS NULL OR tarikh_tersenarai_di_mqr = '0000-00-00')
                ORDER BY tarikh_permohonan ASC";
    } else if ($bulan === 'all') {
        $sql = "SELECT permohonan.*, status.*
                FROM permohonan
                JOIN status ON permohonan.permohonan_id = status.status_id
                WHERE (tarikh_tersenarai_di_mqr IS NULL OR tarikh_tersenarai_di_mqr = '0000-00-00')
                  AND YEAR(tarikh_permohonan) = '$tahun'
                ORDER BY tarikh_permohonan ASC";
    } else if ($tahun === 'all') {
        $sql = "SELECT permohonan.*, status.*
                FROM permohonan
                JOIN status ON permohonan.permohonan_id = status.status_id
                WHERE (tarikh_tersenarai_di_mqr IS NULL OR tarikh_tersenarai_di_mqr = '0000-00-00')
                  AND MONTH(tarikh_permohonan) = '$bulan'
                ORDER BY tarikh_permohonan ASC";
    } else {
        $sql = "SELECT permohonan.*, status.*
                FROM permohonan
                JOIN status ON permohonan.permohonan_id = status.status_id
                WHERE (tarikh_tersenarai_di_mqr IS NULL OR tarikh_tersenarai_di_mqr = '0000-00-00')
                  AND MONTH(tarikh_permohonan) = '$bulan'
                  AND YEAR(tarikh_permohonan) = '$tahun'
                ORDER BY tarikh_permohonan ASC";
    }


    $result = mysqli_query($conn, $sql);
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/img/icon.png">
    <title>SENARAI PROGRAM BAHARU YANG BELUM TERSENARAI DI DALAM MQR DAN PSA</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <style>


    /* Fixed sidenav, full height */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
                
        /* Style the sidenav links and the dropdown button */
        .sidenav a, .dropdown-btn {
            padding: 10px 10px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }
                
        /* On mouse-over */
        .sidenav a:hover, .dropdown-btn:hover {
            color: #f1f1f1;
        }
                
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            left: 120px;
            font-size: 46px;
            margin-left: 50px;
        }
        /* Add an active class to the active dropdown button */
        .active {
            background-color: green;
            color: white;
        }
                
        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: #262626;
            padding-left: 8px;
        }
                
        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }
                
        /* Some media queries for responsiveness */
            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
	
		span {
		    position: absolute;
		    left:5%;
		    top:14%;
		}

        body {
        font-family: 'Roboto', sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px 20px;
        text-align: center;
    }

    h1 {
        font-size: 50px;
        color: #0056b3;
        margin-bottom: 50px;
    }

    form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        margin-bottom: 50px;
    }

    label {
        font-size: 24px;
        color: black;
        margin-right: 10px;
    }

    .btn {
    display: inline-block;
    font-size: 16px;
    color: white;
    background-color: #4CAF50;
    padding: 10px 20px;
    margin: 5px 2px;
    border: none;
    text-decoration: none;
    transition: 0.3s;
    cursor: pointer;
    border-radius: 5px;
    }

.btn:hover {
    background-color: #45a049;
}

    select {
        font-size: 20px;
        color: dimgrey;
        padding: 10px;
        border: 2px solid black;
        border-radius: 10px;
        margin-right: 20px;
    }

    button {
        font-size: 24px;
        color: #fff;
        background-color: #4CAF50;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    table {
        border-collapse: collapse;
        width: 140%;
        margin-bottom: 50px;
        position: absolute;
        left: 40px;
    }

    thead {
        background-color: seagreen;
        color: #fff;
    }

    th, td {
        padding: 20px; /* Increase the padding to increase the size of each row */
        text-align: left;
        border: 1px solid black;
        font-size: 18px; /* Increase the font size to make the text bigger */
    }

    
    th {
        font-weight: bold;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #e0e0e0;
    }

    td:last-child {
        font-size: 18px;
        font-style: italic;
    }

    td:last-child[contenteditable="true"] {
        border: 2px solid #007bff;
        background-color: #fff;
        outline: none;
        padding: 5px;
        cursor: text;
    }



    </style>
    
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
      link.download = 'mqrpsa_report(belumTersenarai).csv';
      link.style.display = 'none';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
    </script>
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
	<br>
    <div class="container">
        <h1>SENARAI PROGRAM BAHARU YANG BELUM TERSENARAI DI DALAM MQR DAN PSA</h1>
        <form method="post">
            <label for="bulan">Bulan:</label>
            <select id="bulan" name="bulan">
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
                <option value="all">Semua</option>
            </select>
            <label for="tahun">Tahun:</label>
            <select id="tahun" name="tahun">
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
                <option value="all">Semua</option>
                </select>
            <button type="submit" name="submit">Cari</button>
        </form>
        
<?php
// Display table if there are new applications
if (mysqli_num_rows($result) > 0) {
    echo "<style>.justify-text { text-align: justify; }</style>"; // Added this line
    echo "<table>";
    echo "<thead>";
    echo "<tr>
            <th>Bil.</th>
            <th>Nama Program</th>
            <th>Lokasi Penawaran</th>
            <th>Jenis Akreditasi</th>
            <th>Tarikh Penghantaran</th>
            <th>Status (Terkini)</th>
            <th>Catatan</th>
         </tr>";
    echo "</thead>";
    echo "<tbody>";
    $bil = 1;
    while ($row = mysqli_fetch_assoc($result)) {

        // Replace newlines with <br/>
        $catatan = nl2br($row['catatan']);

        echo "<tr>";
        echo "<td>" . $bil . "</td>";
        echo "<td>" . $row['nama_program_bm'] . "</td>";
        echo "<td>" . $row['alamat_program'] . "</td>";
        echo "<td>" . $row['jenis_permohonan'] . "</td>";
        echo "<td>" . $row['tarikh_permohonan'] . "</td>";
        echo "<td>" . $row['status_terkini'] . "</td>";
        echo "<td class='justify-text'>" . $catatan . "</td>"; // Added class here
        echo "</tr>";

        $bil++;
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>Tiada senarai program baharu yang belum tersenarai di dalam MQR dan PSA untuk bulan dan tahun yang dipilih.</p>";
}

// Close database connection
mysqli_close($conn);


?>


    </div>
    <div style="position: fixed; bottom: 20px; right: 350px; display: flex; gap: 10px;">
    <button onclick ="downloadCsv()" style=" color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer;">Muat Turun</button>
    <a href="mqrpsa_b.php">
        <button style="position: fixed; bottom: 20px; right: 28px;">Muat Semula</button>
    </a>
    <a href="index.php">
        <button style="position: fixed; bottom: 20px; right: 228px;">Kembali</button>
    </a>
    </div>
   
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
