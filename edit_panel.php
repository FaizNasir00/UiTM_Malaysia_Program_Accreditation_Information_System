<?php
// Connect to database
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get panel details by ID
if (isset($_GET['panel_id'])) {
	$panel_id = $_GET['panel_id'];
	$sql = "SELECT * FROM panel WHERE panel_id = $panel_id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$panel = mysqli_fetch_assoc($result);
	} else {
		die("Panel not found");
	}
} else {
	die("Panel ID not specified");
}

// Update panel details
if (isset($_POST['submit'])) {
	$jenisPanel = $_POST['jenis_panel'];
	$namaPanel = $_POST['nama_panel'];
	$bidang = $_POST['bidang'];
	$cv = $POST['cv'];
	$borang_terima_pelantikan = $POST['borang_terima_pelantikan'];
	$institusi = $_POST['institusi'];
	$noTel = $_POST['no_tel'];
	$emel = $_POST['emel'];

	$sql = "UPDATE panel SET jenis_panel = '$jenisPanel', nama_panel = '$namaPanel', bidang = '$bidang', $cv = '$cv', $borang_terima_pelantikan = '$borang_terima_pelantikan', institusi = '$institusi', no_tel = '$noTel', emel = '$emel' WHERE panel_id = $panel_id";

	if (mysqli_query($conn, $sql)) {
		echo "Panel berjaya dikemaskini";
	} else {
		echo "Panel tidak boleh dikemaskini: " . mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
	<title>Kemaskini Panel</title>
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
	    
	    h1{
	        font-size: 55px;
	        text-align: center;
	        margin-top: 6%;
            margin-bottom: 5%;
	    }
	    
		table {
			border-collapse: collapse;
			width: 80%;
			text-align: center;
			position: relative;
            left: 10%;
            right: 10%;
		}
		
		input[type="email" i] {
            padding: 1px 2px;
            width: 80%;
            height: 25px;
            font-size: 20px;
        }

		th, td {
			text-align: center;
            padding: 30px;
            border: 2px solid #ddd;
            vertical-align: middle;
            font-size: 20px;
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
		
		input[type="text" i] {
        padding: 1px 2px;
        font-size: 20px;
        height: 25px;
        width: 600px;
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
	<h1>Kemaskini Panel</h1>
	<form method="post" style="text-align:center">
        <table>
              <tr>
                <td align="center" valign="middle">Jenis Panel:</td>
                <td align="center" valign="middle"><input type="text" name="jenis_panel" value="<?php echo $panel['jenis_panel']; ?>" style="width: 600px;"></td>
              </tr>
              <tr>
                <td align="center" valign="middle">Nama Panel:</td>
                <td align="center" valign="middle"><input type="text" name="nama_panel" value="<?php echo $panel['nama_panel']; ?>" style="width: 600px;"></td>
              </tr>
              <tr>
                <td align="center" valign="middle">Bidang:</td>
                <td align="center" valign="middle"><input type="text" name="bidang" value="<?php echo $panel['bidang']; ?>" style="width: 600px;"></td>
              </tr>
              <tr>
                <td>
                    <label for="cv">Resume Panel :</label>
                </td>
                <td>
                    <a href="<?php echo $panel['cv']; ?>" download>
                        <button type="button">Muat Turun</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="borang_terima_pelantikan">Borang Terima Pelantikan:</label>
                </td>
                <td>
                    <a href="<?php echo $panel['borang_terima_pelantikan']; ?>" download>
                        <button type="button">Muat Turun</button>
                    </a>
                </td>
            </tr>
              <tr>
                <td align="center" valign="middle">Institusi:</td>
                <td align="center" valign="middle"><input type="text" name="institusi" value="<?php echo $panel['institusi']; ?>" style="width: 600px;"></td>
              </tr>
              <tr>
                <td align="center" valign="middle">No. Telefon:</td>
                <td align="center" valign="middle"><input type="text" name="no_tel" value="<?php echo $panel['no_tel']; ?>" style="width: 600px;"></td>
              </tr>
              <tr>
                <td align="center" valign="middle">Emel:</td>
                <td align="center" valign="middle"><input type="email" name="emel" value="<?php echo $panel['emel']; ?>" style="width: 600px;"></td>
              </tr>
              <tr>
                <td colspan="2" align="center" valign="middle"><button type="submit" name="submit">Kemaskini</button></td>
              </tr>
        </table>

		
		<br><br><br>
		
		<td><button type="button" onclick="window.location.href='editpanel.php'">Kembali</button></td>
	</form>
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
