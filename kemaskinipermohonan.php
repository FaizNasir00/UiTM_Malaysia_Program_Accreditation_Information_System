<?php
  // Start a session
  session_start();

  // Redirect user to login page if not logged in
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    header("Location: ./login.php");
    exit;
  }
    
// Connect to database
$servername = "localhost";
$username = "inqkacom_faiz123";
$password = "faiznasir123";
$dbname = "inqkacom_pais";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Search function
if (isset($_POST['search'])) {
	$searchValue = $_POST['search'];
	$sql = "SELECT * FROM permohonan WHERE kod_program LIKE '%$searchValue%' OR jenis_permohonan LIKE '%$searchValue%'";
} else {
	$sql = "SELECT * FROM permohonan";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
	<title>Senarai Permohonan</title>
	<style>
	    
	    body {
	        font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
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
	
	    h1{
	        text-align: center;
	        font-size: 3em;
	    }
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom:70px;
		}

		th, td {
        text-align: inherit;
        padding: 15px;
        font-size: 18px;
        border: 2px solid #ddd;
        vertical-align: middle;
}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: 50px;
        border-radius: 25px;
        cursor: pointer;
}

		button:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
    <span style="position:fixed;left:5%;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
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
	<h1>Senarai Permohonan </h1>
	<form method="post" style="text-align:center">
		<label style="font-size:18px;" for="search">Cari Kod Program atau Jenis Permohonan:</label>
		<input type="text" id="search" name="search" placeholder="Masukkan kod program atau jenis permohonan"><br><br>
		<button type="submit">Cari</button>
	</form>
	<br>
        <table>
            <thead>
                <tr>
                    <th>Bil.</th>
                    <th>Jenis Permohonan</th>
                    <th>Tarikh Permohonan</th>
                    <th>Status Permohonan</th>
                    <th>Kod Program</th>
                    <th>Lokasi</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $bil = 1; // Initialize the counter
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $bil . "</td>";
                        echo "<td>" . $row["jenis_permohonan"] . "</td>";
                        echo "<td>" . $row["tarikh_permohonan"] . "</td>";
                        echo "<td>" . $row["status_permohonan"] . "</td>";
                        echo "<td>" . $row["kod_program"] . "</td>";
                        echo "<td>" . $row["alamat_program"] . "</td>";
                        echo "<td><a href='edit.php?permohonan_id=" . $row["permohonan_id"] . "'>Ubah</a></td>";
                        echo "<td><a href='delete_permohonan.php?id=" . $row["permohonan_id"] . "'>Padam</a></td>";
                        echo "</tr>";
                        $bil++; // Increment the counter
                    }               
                } else {
                    echo "<tr><td colspan='5'>No data available</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>

  <a href="index.php"><button style="position: fixed; bottom: 20px; right: 20px;">Kembali</button></a>
  <a href="kemaskinipermohonan.php"><button style="position: fixed; bottom: 20px; right: 110px;">Muat Semula</button></a>
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
