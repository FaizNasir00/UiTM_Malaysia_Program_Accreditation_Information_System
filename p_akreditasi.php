<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
	<title>SENARAI PERMOHONAN AKREDITASI</title>
	<style>
	    element.style {
            text-align: center;
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
	
		body {
			font-family: Calibri, sans-serif;
		}
		
		span {
		    position: fixed;
		    left:5%;
		}
		
		h1 {
			font-size: 50px;
			color: #0056b3;
			text-align : center;
			margin-left:100px;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {background-color: #f5f5f5;}

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
		
		.submit{
		    background-color: #4CAF50;
            color: white;
            border: none;
            padding: 3px 10px;
            border-radius: 4px;
            cursor: pointer;
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
      link.download = 'p_akreditasi_report.csv';
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
	<h1>SENARAI PERMOHONAN AKREDITASI</h1>

    <button onclick="downloadCsv()">Muat Turun</button><br>
    <br>
	
	<form method="post" action="p_akreditasi.php">
    Jenis Akreditasi:
    <select name="jenis_permohonan">
        <option value="Semua" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'Semua' ? 'selected' : '' ?>>Semua</option>
        <option value="IQA01(B)" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA01(B)' ? 'selected' : '' ?>>IQA01 (B)</option>
        <option value="IQA01(T/L)" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA01(T/L)' ? 'selected' : '' ?>>IQA01 (T/L)</option>
        <option value="IQA02(B)" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA02(B)' ? 'selected' : '' ?>>IQA02 (B)</option>
        <option value="IQA02(T/L)" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA02(T/L)' ? 'selected' : '' ?>>IQA02 (T/L)</option>
        <option value="IQA03" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA03' ? 'selected' : '' ?>>IQA03</option>
        <option value="IQA04" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA04' ? 'selected' : '' ?>>IQA04</option>
        <option value="IQA05" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA05' ? 'selected' : '' ?>>IQA05</option>
        <option value="IQA06" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA06' ? 'selected' : '' ?>>IQA06</option>
        <option value="IQA07" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA07' ? 'selected' : '' ?>>IQA07</option>
        <option value="IQA08" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA08' ? 'selected' : '' ?>>IQA08</option>
        <option value="IQA09" <?= isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] == 'IQA09' ? 'selected' : '' ?>>IQA09</option>
    
        </select>
        <input class="submit" type="submit" value="Cari">
        </form><br>



			<?php
				// Database connection
				$servername = "localhost";
                $username = "inqkacom_faiz123";
                $password = "faiznasir123";
                $dbname = "inqkacom_pais";
				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Get data from database based on selected jenis_permohonan
				$sql = "SELECT nama_program_bm, kod_program, kampus, alamat_program, tarikh_terima_dokumen, tarikh_penghantaran_ke_mqa, status_permohonan FROM permohonan JOIN status ON permohonan.permohonan_id = status.permohonan_id";
				if (isset($_POST['jenis_permohonan']) && $_POST['jenis_permohonan'] != "Semua") {
					$jenis_permohonan = $_POST['jenis_permohonan'];
					$sql .= " WHERE jenis_permohonan = '$jenis_permohonan'";
				}

				// Execute the SQL query
				$result = mysqli_query($conn, $sql);
							// Check if there are any results
			if (mysqli_num_rows($result) > 0) {

				// Start creating the table
				echo "<table>";

				// Create the table header
				echo "<thead><tr><th>No.</th><th>Nama Program</th><th>Kod Program</th><th>Kolej Pengajian/Fakulti/Kampus</th><th>Alamat Program Dijalankan</th><th>Tarikh Terima Dokumen</th><th>Tarikh Penghantaran Dokumen Ke MQA</th><th>Status (Terkini)</th></tr></thead>";

				// Start creating the table body
				echo "<tbody>";

				// Loop through each row of data
				$i = 1;
				while ($row = mysqli_fetch_assoc($result)) {

					// Create the row
					echo "<tr>";

					// Create the cells for each column
					echo "<td>".$i."</td>";
					echo "<td>".$row['nama_program_bm']."</td>";
					echo "<td>".$row['kod_program']."</td>";
					echo "<td>".$row['kampus']."</td>";
					echo "<td>".$row['alamat_program']."</td>";
					echo "<td>".$row['tarikh_terima_dokumen']."</td>";
					echo "<td>".$row['tarikh_penghantaran_ke_mqa']."</td>";
					echo "<td>".$row['status_permohonan']."</td>";

					// Close the row
					echo "</tr>";

					$i++;
				}

				// Close the table body and table
				echo "</tbody></table>";

			} else {
				// If there are no results, display a message to the user
				echo "Tiada rekod yang ditemui.";
			}

			// Close the database connection
			mysqli_close($conn);
	?>
</div>

<a href="p_akreditasi.php"><button style="position: fixed; bottom: 20px; right: 20px;">Muat Semula</button></a>
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
