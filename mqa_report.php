<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
	<title>Senarai Program Baharu Yang Telah Dihantar Ke MQA</title>
	<style>
	    
	    .search{
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
	
		span {
		    position: fixed;
		    left:5%;
		    text-align: center;
		}
	    
	    h1 {
            font-size: 30px;
            color: #0056b3;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            text-align : center;
            margin-left:100px;
            margin-right:100px;
            margin-top: 100px;
        }
	    
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
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
		
		.submit {
		    background-color: #4CAF50;
			color: white;
			padding: 5px 10px;
			border: none;
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
      link.download = 'mqa_report.csv';
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
	<h1>SENARAI PROGRAM BAHARU YANG TELAH DIHANTAR KE MQA</h1><br><br><br>
	<form style="text-align: center;" method="get">
		<label for="search">Cari berdasarkan Nama Program (BM) : &nbsp </label> &nbsp
		<input type="text" id="search" name="search">
		<input class="submit" type="submit" value="Cari"><br><br>
	</form>
	
	<button onclick="downloadCsv()">Muat Turun</button>
	<br>

	<table>
		<thead>
			<tr>
				<br>
				<th>Bil.</th>
				<th>Nama Program (BM)</th>
				<th>Nama Program (BI)</th>
				<th>Lokasi Program</th>
				<th>Jenis Penilaian</th>
				<th>Tarikh Penghantaran ke MQA</th>
			</tr>
		</thead>
		<tbody>
			<?php
                // Connect to the database
                $servername = "";
                $username = "";
                $password = "";
                $dbname = "";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            
                 // Fetch the data from the database
                    if(isset($_GET['search'])){
                $search = $_GET['search'];
                $sql = "SELECT p.nama_program_bm, p.nama_program_bi, p.alamat_program, p.jenis_permohonan, s.tarikh_penghantaran_ke_mqa
                FROM permohonan p
                INNER JOIN status s ON p.permohonan_id = s.permohonan_id
                WHERE p.nama_program_bm LIKE '$search%' AND s.tarikh_penghantaran_ke_mqa IS NOT NULL AND s.tarikh_penghantaran_ke_mqa != '0000-00-00'";
    }
                $result = $conn->query($sql);
                    
                // Display the data in the table
                if ($result->num_rows > 0) {
                    $i = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row["nama_program_bm"] . "</td>";
                        echo "<td>" . $row["nama_program_bi"] . "</td>";
                        echo "<td>" . $row["alamat_program"] . "</td>";
                        echo "<td>" . $row["jenis_permohonan"] . "</td>";
                        echo "<td>" . $row["tarikh_penghantaran_ke_mqa"] . "</td>";
                        echo "</tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='5'>Tiada data dijumpai</td></tr>";
                }
            
                // Close the database connection
                $conn->close();
            ?>
	</tbody>
</table>

<a href="mqa_report.php?search="><button style="position: fixed; bottom: 20px; right: 20px;">Refresh</button></a>
<a href="index.php"><button style="position: fixed; bottom: 20px; right: 120px;">Kembali</button></a>

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
