<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="/img/icon.png">
	<title>Status Permohonan Per Program</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		/* CSS styles for the page */

		/* Header styles */
		.header {
			font-size: 50px;
			color: #0056b3;
			font-family: Roboto, sans-serif;
			text-align : center;
		}

		/* Search input styles */
		.search-input {
			margin-bottom: 10px;
			padding: 5px;
			border: 1px solid gray;
			border-radius: 5px;
			width: 300px;
		}
		
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
            position: fixed;
            left:5%;
        }
        
        h1 {
            margin-left:100px;
        }

		/* Table styles */
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 100px;
		}

		th, td {
			padding: 10px;
			text-align: left;
			border: 1px solid gray;
		}

		th {
			background-color: #ccc;
			font-weight: bold;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 18px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #3e8e41;
		}

	</style>
</head>
<body>
    
    
<?php
    // PHP code to retrieve data from database and display it in the table
    $servername = "localhost";
    $username = "inqkacom_faiz123";
    $password = "faiznasir123";
    $dbname = "inqkacom_pais";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   // Search inputs
$nama_program_bm = isset($_POST['nama_program_bm']) ? $_POST['nama_program_bm'] : '';
$nama_program_bi = isset($_POST['nama_program_bi']) ? $_POST['nama_program_bi'] : '';
$kod_program = isset($_POST['kod_program']) ? $_POST['kod_program'] : '';
$kampus = isset($_POST['kampus']) ? $_POST['kampus'] : '';
$alamat_program = isset($_POST['alamat_program']) ? $_POST['alamat_program'] : '';
$jenis_permohonan = isset($_POST['jenis_permohonan']) ? $_POST['jenis_permohonan'] : '';
$tarikh_terima_dokumen = isset($_POST['tarikh_terima_dokumen']) ? $_POST['tarikh_terima_dokumen'] : '';

// Construct SQL query based on search inputs
$sql = "SELECT permohonan.*, status.*
        FROM permohonan
        JOIN status ON permohonan.permohonan_id = status.status_id
        WHERE 1=1";

if (!empty($nama_program_bm)) {
    $sql .= " AND nama_program_bm LIKE '%$nama_program_bm%'";
}
if (!empty($nama_program_bi)) {
    $sql .= " AND nama_program_bi LIKE '%$nama_program_bi%'";
}
if (!empty($kod_program)) {
    $sql .= " AND kod_program LIKE '%$kod_program%'";
}
if (!empty($kampus)) {
    $sql .= " AND kampus LIKE '%$kampus%'";
}
if (!empty($alamat_program)) {
    $sql .= " AND alamat_program LIKE '%$alamat_program%'";
}
if (!empty($jenis_permohonan)) {
    $sql .= " AND jenis_permohonan LIKE '%$jenis_permohonan%'";
}
if (!empty($tarikh_terima_dokumen)) {
    $sql .= " AND tarikh_terima_dokumen LIKE '%$tarikh_terima_dokumen%'";
}

    $result = $conn->query($sql);
?>

<!-- HTML code for the page -->
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
    </div>
      <a href="manage_user.php">User</a>
      <a href="logout.php">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<h1 class="header">STATUS PERMOHONAN</h1>

<!-- Search form -->
<form method="POST" action="">
    <label for="nama_program_bm">Nama Program (BM):</label>
    <input class="search-input" type="text" id="nama_program_bm" name="nama_program_bm" value="<?= isset($_POST['nama_program_bm']) ? $_POST['nama_program_bm'] : '' ?>"><br>

    <label for="nama_program_bi">Nama Program (BI):</label>
    <input class="search-input" type="text" id="nama_program_bi" name="nama_program_bi" value="<?= isset($_POST['nama_program_bi']) ? $_POST['nama_program_bi'] : '' ?>"><br>
    <br> 
    
    <div style="opacity: 0.8; font-size: 14px;">
        <?php
            echo "* Anda boleh memilih untuk memasukkan semua filter atau hanya satu atau lebih untuk melakukan pencarian.<br><br>";
        ?>
    </div>
    
    <button type="button" onclick="showAdvancedSearch()">Seterusnya</button><br><br>
    
    <div id="advanced-search" style="display:none;">
        <label for="kod_program">Kod Program:</label>
        <input class="search-input" type="text" id="kod_program" name="kod_program" value="<?= isset($_POST['kod_program']) ? $_POST['kod_program'] : '' ?>"><br>

        <label for="kampus">Kolej Pengajian/Fakulti/Kampus:</label>
        <input class="search-input" type="text" id="kampus" name="kampus" value="<?= isset($_POST['kampus']) ? $_POST['kampus'] : '' ?>"><br>

        <label for="alamat_program">Alamat Program Dijalankan:</label>
        <input class="search-input" type="text" id="alamat_program" name="alamat_program" value="<?= isset($_POST['alamat_program']) ? $_POST['alamat_program'] : '' ?>"><br>

        <label for="jenis_permohonan">Jenis Permohonan:</label>
        <select id="jenis_permohonan" name="jenis_permohonan">
            <option value="">--Pilih Jenis--</option>
            <option value="IQA01(B)" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA01(B)' ? 'selected' : '' ?>>IQA01 (B)</option>
            <option value="IQA02(B)" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA02(B)' ? 'selected' : '' ?>>IQA02 (B)</option>
            <option value="IQA02(T/L)" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA02(T/L)' ? 'selected' : '' ?>>IQA02 (T/L)</option>
            <option value="IQA03" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA03' ? 'selected' : '' ?>>IQA03</option>
            <option value="IQA04" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA04' ? 'selected' : '' ?>>IQA04</option>
            <option value="IQA05" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA05' ? 'selected' : '' ?>>IQA05</option>
            <option value="IQA06" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA06' ? 'selected' : '' ?>>IQA06</option>
            <option value="IQA07" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA07' ? 'selected' : '' ?>>IQA07</option>
            <option value="IQA08" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA08' ? 'selected' : '' ?>>IQA08</option>
            <option value="IQA09" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA09' ? 'selected' : '' ?>>IQA09</option>
        </select><br><br>

        <label for="tarikh_terima_dokumen">Tarikh Terima Dokumen:</label>
        <input class="search-input" type="date" id="tarikh_terima_dokumen" name="tarikh_terima_dokumen" value="<?= isset($_POST['tarikh_terima_dokumen']) ? $_POST['tarikh_terima_dokumen'] : '' ?>"><br>
    </div>

    <button type="submit" name="submit_search">Cari</button><br><br>
</form>

<script>
function showAdvancedSearch() {
    document.getElementById("advanced-search").style.display = "block";
}
</script>


<!-- Table to display search results -->
<table>
    <thead>
        <tr>
            <th>Bil</th>
            <th>Nama Program</th>
            <th>Kod Program</th>
            <th>Kolej Pengajian/Fakulti/Kampus</th>
            <th>Alamat Program Dijalankan</th>
            <th>Jenis Permohonan</th>
            <th>Tarikh Terima Dokumen</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if ($result->num_rows > 0) {
                $bil = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $bil . "</td>";
                    echo "<td>" . $row['nama_program_bm'] . "</td>";
                    echo "<td>" . $row['kod_program'] . "</td>";
                    echo "<td>" . $row['kampus'] . "</td>";
                    echo "<td>" . $row['alamat_program'] . "</td>";
                    echo "<td>" . $row['jenis_permohonan'] . "</td>";
                    echo "<td>" . $row['tarikh_terima_dokumen'] . "</td>";
                    echo "<td>" . $row['status_permohonan'] . "</td>";
                    echo "</tr>";
                    $bil++;
                }
            } else {
                echo "<tr><td colspan='8'>Tiada rekod dijumpai.</td></tr>";
            }
        ?>
    </tbody>
</table>
		<a href="statuspermohonan.php"><button style="position: fixed; bottom: 20px; right: 20px;">Muat Semula</button></a>
    	<a href="index.php"><button style="position: fixed; bottom: 20px; right: 150px;">Kembali</button></a>
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