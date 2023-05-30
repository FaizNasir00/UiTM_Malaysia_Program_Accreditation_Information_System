


<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
	<title>SENARAI PANEL PENILAI</title>
	<link rel="stylesheet" type="text/css" href="/css/senaraipanel.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
      link.download = 'senaraipanel.csv';
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
	<header>
		<h1 class="title">SENARAI PANEL PENILAI</h1>
	</header>

	<main>
	<div class="container">
      <div class="panel-type">
        <form method="POST" action="">
          <label for='jenis_panel'>Jenis Panel Penilai</label>
          <select id="jenis_panel" name="jenis_panel">
            <option value="Panel Luar" <?php echo (isset($_POST['jenis_panel']) && $_POST['jenis_panel'] == "Panel Luar") ? "selected" : ""; ?>>Panel Penilai Luar</option>
            <option value="Panel Dalam" <?php echo (isset($_POST['jenis_panel']) && $_POST['jenis_panel'] == "Panel Dalam") ? "selected" : ""; ?>>Panel Penilai Dalam</option>
            <option value="semua" <?php echo (!isset($_POST['jenis_panel']) || $_POST['jenis_panel'] == "semua") ? "selected" : ""; ?>>Semua</option>
          </select>
          <button type="submit" style="position: absolute;">Cari</button> <br>
        </form>
      </div>
    </div>




		</div>

        
        
		<table>
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Panel Penilai</th>
					<th>Nama Institusi</th>
					<th>Bidang</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Connect to database
					$conn = mysqli_connect("localhost", "inqkacom_faiz123", "faiznasir123", "inqkacom_pais");
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}

					if (isset($_POST['jenis_panel'])) {
                        $jenis_panel = $_POST['jenis_panel'];
                    } else {
                        $jenis_panel = "";
                    }

					

					// Fetch data from database
					if($jenis_panel == 'semua' ){
                        $sql = "SELECT * FROM panel";
                    }else if ($jenis_panel === 'Panel Dalam' ||  $jenis_panel === 'Panel Luar' ){
                        $sql = "SELECT * FROM panel WHERE  jenis_panel = '$jenis_panel'";
                    }else{
                        $sql = "SELECT * FROM panel";
                    }


					$result = mysqli_query($conn, $sql);

					// Display data in table
					if (mysqli_num_rows($result) > 0) {
						$i = 1;
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $i . "</td>";
							echo "<td>" . $row["nama_panel"] . "</td>";
							echo "<td>" . $row["institusi"] . "</td>";
							echo "<td>" . $row["bidang"] . "</td>";
							echo "</tr>";
							$i++;
						}
					} else {
						echo "<tr><td colspan='4'>Tiada rekod.</td></tr>";
					}

					// Close database connection
					mysqli_close($conn);
				?>
			</tbody>
		</table>
	</main>
	
	<br>
	
	 <div style="position: fixed; bottom: 20px; right: 200px; display: flex; gap: 10px;">
      <button onclick ="downloadCsv()" style="background-color: green; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer;">Muat Turun</button></a>
	<a href="senaraipanel.php"><button style="position: fixed; bottom: 20px; right: 20px; background-color: green; color: white; padding: 10px 18px; border: none; border-radius: 4px; cursor: pointer;">Refresh</button></a>
    <a href="index.php"><button style="position: fixed; bottom: 20px; right: 120px; background-color: green; color: white; padding: 10px 18px; border: none; border-radius: 4px; cursor: pointer;">Kembali</button></a>
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
