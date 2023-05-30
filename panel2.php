<?php
  // Start a session
  session_start();

  // Redirect user to login page if not logged in
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    header("Location: ./login.php");
    exit;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Maklumat Panel Dalam</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="/img/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/panel-style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header id="header">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <img src="./img/logo.png" alt="UiTM Logo">
		<h1>MAKLUMAT PANEL BARU</h1>
	</header>
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
	<div class="main-container">
		<div class="header">
			MAKLUMAT PENILAI DALAM
		</div>
		<div class="big-box">
			<form method="post" action="connect4.php">
				<div class="input-box">
					<div class="input-title">Nama</div>
					<input type="text" name="nama_panel" class="input-field">
				</div>
				<div class="input-box">
					<div class="input-title">Kolej/Fakulti/ Kampus</div>
                        <select name="institusi" class="select-field-2" required>
                            <option value="" selected disabled>-- Pilih --</option>
                            <?php
                            // Connect to database
                            $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                            
                            // Execute SELECT DISTINCT statement, exclude NULL values
                            $result = mysqli_query($conn, 'SELECT DISTINCT nama_fakulti FROM fakulti WHERE nama_fakulti IS NOT NULL');
                            
                            // Generate option elements
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nama_fakulti'] . '">' . $row['nama_fakulti'] . '</option>';
                            }
                            
                            // Close database connection
                            mysqli_close($conn);
                            ?>
                        </select>
                        </div>
				<div class="input-box">
					<div class="input-title">No. Telefon</div>
					<input type="text" name="no_tel" class="input-field">
				</div>
				<div class="input-box">
					<div class="input-title">E-mel</div>
					<input type="text" name="emel" class="input-field">
				</div>
				<div class="input-box">
					<div class="input-title">Bidang</div>
					<input type="text" name="bidang" class="input-field">
				</div>
				<div class="input-box">
					<div class="input-title">CV</div>
					<input type="file" name="cv" class="file-field">
				</div>
				<div class="input-box">
					<div class="input-title">Borang Terima Pelantikan</div>
					<input type="file" name="borang" class="file-field">
				</div>
				<div class="input-box">
					<div class="input-title">Bayaran Honororium</div>
					<select name="bayaran_honororium" class="select-field">
						<option value="" selected disabled>-- Pilih --</option>
						<option value="yes">Ya</option>
						<option value="no">Tidak</option>
						</select>
				</div>
				<div class="input-box" style="opacity: 0.0;">
                        <div class="input-title">Jenis Panel</div>
                        <input type="text" value="Panel Dalam" name="jenis_panel" class="input-field" readonly>
                        </div>
				<div class="button-box">
					<input type="submit" name="submit" value="HANTAR" class="submit-button">
				</div>
			</form>
		</div>
	</div>

	<a href="panel2.php"><button style="position: fixed; top : 20px; right: 20px;">Muat Semula</button></a>
	<a href="index.php"><button style="position: fixed; top: 20px; right: 120px;">Kembali</button></a>
	
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

     <footer>
      <p>&copy; InQKA UiTM Shah Alam. All Rights Reserved.</p>
    </footer>
</body>
</html>
