<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="/img/icon.png">
	<title>FAKULTI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
			font-family: Roboto, sans-serif;
		}
		
		header {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 20vh;
			background-color: #ffffff;
			margin-top: 20px;
		}
		
		header span {
            position: fixed;
            left: 5%;
            top: 70px;
        }
		
		header img {
        height: 50%;
        margin-right: 80px;
        margin-left: 100px;
        }

		h1 {
			font-size: 40px;
			color: cadetblue;
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
          padding: 6px 8px 6px 16px;
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
          left: 145px;
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

    	.box {
        margin: 65px auto;
        width: 60%;
        border: 2.5px solid whitesmoke;
        border-radius: 18px;
        padding: 50px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
			font-size: 18px;
		}

		input[type="text"] {
			width: 100%;
			padding: 11px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 20px;
			font-size: 16px;
		}

		.button {
			background-color: forestgreen;
			border: none;
			color: white;
			padding: 15px 23px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
		}

		.button:hover {
			background-color: #006699;
		}
		
		
		/* Footer styles */
        footer {
          background-color: #333;
          color: #fff;
          padding: 3px;
          text-align: center;
          position: static;
          left: 0;
          bottom: 0;
        }
        
        /* Link styles within the footer */
        footer a {
          color: #fff;
          text-decoration: none;
          border-bottom: 1px dotted #fff;
        }
        
        footer a:hover {
          color: #fff;
          border-bottom: none;
        }
        
        @media only screen and (max-width: 800px) {
          header {
            height: 15vh;
          }
        
          header span {
            right:0;
          }
          
          header img {
            height: 30%;
            margin-right: 5px;
          }
        
          header h1 {font-size: 15px;}
          .box      {width: 80%;}
        }
        
	</style>
</head>
<body>
	<header id="header">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <img src="./img/logo.png" alt="UiTM Logo">
		<h1>KOLEJ PENGAJIAN / FAKULTI / <br> INSTITUSI / KAMPUS BARU</h1>
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
	<div id="box" class="box">
		<form action="insert_fakulti.php" method="POST">
			<label for="nama_fakulti">Nama Kolej Pengajian/Fakulti/Kampus</label>
			<input type="text" id="nama_fakulti" name="nama_fakulti" required>
			<label for="alamat_fakulti">Alamat</label>
			<input type="text" id="alamat_fakulti" name="alamat_fakulti" required>
			<label for="no_tel_fakulti">Telefon</label>
			<input type="text" id="no_tel_fakulti" name="no_tel_fakulti" required>
			<label for="no_fax_fakulti">Fax</label>
			<input type="text" id="no_fax_fakulti" name="no_fax_fakulti" required><br><br>
			<button class="selesai-button button" type="submit">Tambah</button><br><br>
		</form>
		<a href="edit_fakulti.php" class="senarai-button button">Senarai & Edit</a>
		<a href="index.php" style="position:fixed; bottom:2%; right:1%" class="kembali-button button">Kembali</a>
	</div>

	<?php
		// Connect to database
		$servername = "localhost";
		$username = "inqkacom_faiz123";
		$password = "faiznasir123";
		$dbname = "inqkacom_pais";

		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
	
		// Close database connection
		$conn->close();
	?>
	
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