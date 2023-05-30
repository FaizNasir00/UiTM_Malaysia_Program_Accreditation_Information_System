<?php
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
	$sql = "SELECT * FROM users WHERE user_id = '$searchValue'";
} else {
	$sql = "SELECT * FROM users";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
	<title>Kemaskini Pengguna</title>
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
	    
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid #ddd;
      vertical-align: middle;
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
    <span style="position: fixed;left: 5%;font-size:30px;cursor:pointer" onclick="openNav()">☰</span>
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
	<h1 style="text-align:center;">Kemaskini Pengguna </h1>
	<form method="post" style="text-align:center">
		<label for="search">Cari Pengguna ID:</label>
		<input type="text" id="search" name="search" placeholder="Masukkan Pengguna ID">
		<button type="submit">Cari</button>
	</form>
	<br>
	<table>
		<thead>
			<tr>
				<th>Pengguna ID</th>
				<th>Nama Pengguna</th>
                <th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (mysqli_num_rows($result) > 0) {
				// Output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row["user_id"] . "</td>";
					echo "<td>" . $row["username"] . "</td>";
					echo "<td>" . $row["email"] . "</td>";
					echo "<td><a href='delete_user.php?id=" . $row["user_id"] . "'>Padam</a></td>";
					echo "</tr>";
				}				
			} else {
				echo "<tr><td colspan='5'>Tiada data tersedia</td></tr>";
			}
			mysqli_close($conn);
			?>
	</tbody>
	</table>
  <a href="index.php"><button style="position: fixed; bottom: 20px; right: 20px;">Kembali</button></a>
  <a href="manage_user.php"><button style="position: fixed; bottom: 20px; right: 110px;">Refresh</button></a>
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
