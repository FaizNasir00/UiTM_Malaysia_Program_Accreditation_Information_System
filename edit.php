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

// Get permohonan details by ID
if (isset($_GET['permohonan_id'])) {
	$permohonan_id = $_GET['permohonan_id'];
	$sql = "SELECT * FROM permohonan WHERE permohonan_id = $permohonan_id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$panel = mysqli_fetch_assoc($result);
	} else {
		die("Permohonan tidak dijumpai");
	}
} else {
	die("Permohonan ID not specified");
}

// Update panel details
if (isset($_POST['submit'])) {
    $permohonan_id = $_POST['permohonan_id'];
    $jenis_permohonan = $_POST['jenis_permohonan'];
    $tarikh_permohonan = $_POST['tarikh_permohonan'];
    $kampus = $_POST['kampus'];
    $alamat_program = $_POST['alamat_program'];
    $no_fon = $_POST['no_fon'];
    $no_faks = $_POST['no_faks'];
    $emel_rasmi = $_POST['emel_rasmi'];
    $kod_program = $_POST['kod_program'];
    $nama_program_bm = $_POST['nama_program_bm'];
    $nama_program_bi = $_POST['nama_program_bi'];
    $no_bil_jkpt = $_POST['no_bil_jkpt'];
    $no_ruj_jkpt = $_POST['no_ruj_jkpt'];
    $tahap_mqf = $_POST['tahap_mqf'];
    $bidang_nec = $_POST['bidang_nec'];
    $kod_nec = $_POST['kod_nec'];
    $tarikh_program_dimulakan = $_POST['tarikh_program_dimulakan'];
    $tarikh_kohort_pertama_bergraduat = $_POST['tarikh_kohort_pertama_bergraduat'];
    $nama_pic = $_POST['nama_pic'];
    $jawatan_pic = $_POST['jawatan_pic'];
    $no_tel_pejabat_pic = $_POST['no_tel_pejabat_pic'];
    $no_tel_bimbit_pic = $_POST['no_tel_bimbit_pic'];
    $pautan_dokumen_penilaian = $_POST['pautan_dokumen_penilaian'];
    $tarikh_jkppp = $_POST['tarikh_jkppp'];
    $bil_jkppp = $_POST['bil_jkppp'];
    $tarikh_senat = $_POST['tarikh_senat'];
    $bil_senat = $_POST['bil_senat'];
    $no_rujukan_mqa = $_POST['no_rujukan_mqa'];
    $sijil_mqa_bm = $_POST['sijil_mqa_bm'];
    $sijil_mqa_bi = $_POST['sijil_mqa_bi'];
    $panel_dalam1 = $_POST['panel_dalam1'];
    $panel_dalam2 = $_POST['panel_dalam2'];
    $panel_dalam3 = $_POST['panel_dalam3'];
    $panel_dalam4 = $_POST['panel_dalam4'];
    $panel_luar1 = $_POST['panel_luar1'];
    $panel_luar2 = $_POST['panel_luar2'];
    $panel_luar3 = $_POST['panel_luar3'];
    $panel_luar4 = $_POST['panel_luar4'];
    $institusi_dalam1 = $_POST['institusi_dalam1'];
    $institusi_dalam2 = $_POST['institusi_dalam2'];
    $institusi_dalam3 = $_POST['institusi_dalam3'];
    $institusi_dalam4 = $_POST['institusi_dalam4'];
    $institusi_luar1 = $_POST['institusi_luar1'];
    $institusi_luar2 = $_POST['institusi_luar2'];
    $institusi_luar3 = $_POST['institusi_luar3'];
    $institusi_luar4 = $_POST['institusi_luar4'];
    $status_permohonan = $_POST['status_permohonan'];
    $catatan = $_POST['catatan'];
    $status_date = $_POST['status_date'];

	$sql = "UPDATE permohonan SET
        jenis_permohonan = '$jenis_permohonan',
        tarikh_permohonan = '$tarikh_permohonan',
        kampus = '$kampus',
        alamat_program = '$alamat_program',
        no_fon = '$no_fon',
        no_faks = '$no_faks',
        emel_rasmi = '$emel_rasmi',
        kod_program = '$kod_program',
        nama_program_bm = '$nama_program_bm',
        nama_program_bi = '$nama_program_bi',
        no_bil_jkpt = '$no_bil_jkpt',
        no_ruj_jkpt = '$no_ruj_jkpt',
        tahap_mqf = '$tahap_mqf',
        bidang_nec = '$bidang_nec',
        kod_nec = '$kod_nec',
        tarikh_program_dimulakan = '$tarikh_program_dimulakan',
        tarikh_kohort_pertama_bergraduat = '$tarikh_kohort_pertama_bergraduat',
        nama_pic = '$nama_pic',
        jawatan_pic = '$jawatan_pic',
        no_tel_pejabat_pic = '$no_tel_pejabat_pic',
        no_tel_bimbit_pic = '$no_tel_bimbit_pic',
        pautan_dokumen_penilaian = '$pautan_dokumen_penilaian',
        tarikh_jkppp = '$tarikh_jkppp',
        bil_jkppp = '$bil_jkppp',
        tarikh_senat = '$tarikh_senat',
        bil_senat = '$bil_senat',
        no_rujukan_mqa = '$no_rujukan_mqa',
        sijil_mqa_bm = '$sijil_mqa_bm',
        sijil_mqa_bi = '$sijil_mqa_bi',
        panel_dalam1 = '$panel_dalam1',
        panel_dalam2 = '$panel_dalam2',
        panel_dalam3 = '$panel_dalam3',
        panel_dalam4 = '$panel_dalam4',
        panel_luar1 = '$panel_luar1',
        panel_luar2 = '$panel_luar2',
        panel_luar3 = '$panel_luar3',
        panel_luar4 = '$panel_luar4',
        institusi_dalam1 = '$institusi_dalam1',
        institusi_dalam2 = '$institusi_dalam2',
        institusi_dalam3 = '$institusi_dalam3',
        institusi_dalam4 = '$institusi_dalam4',
        institusi_luar1 = '$institusi_luar1',
        institusi_luar2 = '$institusi_luar2',
        institusi_luar3 = '$institusi_luar3',
        institusi_luar4 = '$institusi_luar4',
        catatan = '$catatan',
        status_permohonan = '$status_permohonan'
        WHERE permohonan_id = $permohonan_id";

	if (mysqli_query($conn, $sql)) {
		echo '<script>
			alert("Permohonan updated successfully");
			window.location.href = window.location.href;
		</script>';
	} else {
		echo '<script>
			alert("Error updating permohonan: ' . mysqli_error($conn) . '");
			window.location.href = window.location.href;
		</script>';
	}
	
	if (mysqli_query($conn, $sql)) {
        // Check if permohonan_id exists in status table
        $sql_status_check = "SELECT * FROM status WHERE permohonan_id = $permohonan_id";
        $result_status_check = mysqli_query($conn, $sql_status_check);
    
        if (mysqli_num_rows($result_status_check) === 0) {
            // permohonan_id not found in status table, so insert a new row
            $sql_insert_status = "INSERT INTO status (status_id, permohonan_id) VALUES ($permohonan_id, $permohonan_id)";
            if (!mysqli_query($conn, $sql_insert_status)) {
                echo "Error: " . mysqli_error($conn);
            }
        }
    
        echo '<script>
            alert("Permohonan berjaya dikemaskini");
            window.location.href = window.location.href;
        </script>';
    } else {
        echo '<script>
            alert("Permohonan tidak berjaya dikemaskini ' . mysqli_error($conn) . '");
            window.location.href = window.location.href;
        </script>';
    }
	
	// Determine the column name based on the selected status_permohonan
        $column_name = 'tarikh_' . str_replace(' ', '_', strtolower($status_permohonan));
        

        
        // Update the columns with the status date and the status_terkini
        $sql = "UPDATE status SET $column_name = '$status_date', status_terkini = '$status_permohonan' WHERE permohonan_id = $permohonan_id";
        mysqli_query($conn, $sql);
        
        
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
	<title>Kemaskini Permohonan</title>
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
	        text-align: center;
	        font-size: 3em;
	        color: cadetblue;
	    }
		table {
			border-collapse: collapse;
			width: 100%;
			text-align: center;
		}

		th, td {
			text-align: left;
			padding: 40px;
			border: 2px solid #ddd;
            vertical-align: middle;
            font-size: 20px;
            color: darkgreen;
		}

        select {
        font-style: "Times New Roman";
        font-weight: ;
        font-stretch: ;
        font-size: 18px;
        font-family: Calibri;
;
        text-rendering: auto;
        color: fieldtext;
        letter-spacing: normal;
        word-spacing: normal;
        line-height: normal;
        text-transform: none;
        text-indent: 0px;
        text-shadow: none;
        display: inline-block;
        text-align: start;
        appearance: auto;
        box-sizing: border-box;
        align-items: center;
        white-space: pre;
        -webkit-rtl-ordering: logical;
        background-color: field;
        cursor: default;
        margin: 0em;
        border-width: 1px;
        border-style: solid;
        border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
        border-image: initial;
        border-radius: 0px;
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
		
		body {
		    background-color: #fcfcfc;
            display: block;
            margin: 20px;
        }
        

		button:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
    <div style="background-color:white"><h1>Kemaskini Permohonan</h1></div>
    <span style="position:fixed;left:5%;top:6%;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
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
	<form method="post" style="text-align:center">
	    
	    <br><br>
	    
    <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="permohonan_id" value="<?php echo $panel['permohonan_id']; ?>" >
            <tr>
                <td>
                    <label for="jenis_permohonan">Jenis Permohonan:</label>
                </td>
                <td>
                    <select name="jenis_permohonan" id="jenis_permohonan" style="width: 800px; padding: 5px;">
                        <option value="">Tekan disini untuk pilih jenis permohonan</option>
                        <option value="IQA01(B)" <?php if ($panel['jenis_permohonan'] == 'IQA01(B)') echo 'selected'; ?>>Akreditasi Sementara bagi Program Baharu (IQA01(B))</option>
                        <option value="IQA01(T/L)" <?php if ($panel['jenis_permohonan'] == 'IQA01(T/L)') echo 'selected'; ?>>Akreditasi Sementara bagi Program Sedia Ada di Lokasi Baharu (IQA01(T/L))</option>
                        <option value="IQA02(B)" <?php if ($panel['jenis_permohonan'] == 'IQA02(B)') echo 'selected'; ?>>Akreditasi Penuh bagi Program Baharu (IQA02(B))</option>
                        <option value="IQA02(T/L)" <?php if ($panel['jenis_permohonan'] == 'IQA02(T/L)') echo 'selected'; ?>>Akreditasi Penuh bagi Program Sedia Ada di Lokasi Baharu (IQA02(T/L))</option>
                        <option value="IQA03" <?php if ($panel['jenis_permohonan'] == 'IQA03') echo 'selected'; ?>>Semakan Kurikulum Melebihi 30% (IQA03)</option>
                        <option value="IQA04" <?php if ($panel['jenis_permohonan'] == 'IQA04') echo 'selected'; ?>>Audit Pematuhan (IQA04)</option>
                        <option value="IQA05" <?php if ($panel['jenis_permohonan'] == 'IQA05') echo 'selected'; ?>>Pindah Premis (IQA05)</option>
                        <option value="IQA06" <?php if ($panel['jenis_permohonan'] == 'IQA06') echo 'selected'; ?>>Akreditasi Sementara bagi Program ODL (COPPA-ODL) (IQA06)</option>
                        <option value="IQA07" <?php if ($panel['jenis_permohonan'] == 'IQA07') echo 'selected'; ?>>Akreditasi Penuh bagi Program ODL (COPPA-ODL) (IQA07)</option>
                        <option value="IQA08" <?php if ($panel['jenis_permohonan'] == 'IQA08') echo 'selected'; ?>>Akreditasi Sementara bagi Program TVET (COPTPA) (IQA08)</option>
                        <option value="IQA09" <?php if ($panel['jenis_permohonan'] == 'IQA09') echo 'selected'; ?>>Akreditasi Penuh bagi Program TVET (COPTPA) (IQA09)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tarikh_permohonan">Tarikh Permohonan:</label>
                </td>
                <td>
                    <input type="date" name="tarikh_permohonan" id="tarikh_permohonan" value="<?php echo $panel['tarikh_permohonan']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kampus">Kampus:</label>
                </td>
                <td>
                    <select name="kampus" id="kampus" style="width: 800px; padding: 5px;">
                        <?php
                        $kampusOptions = "SELECT DISTINCT nama_fakulti FROM fakulti";
                        $kampusResult = mysqli_query($conn, $kampusOptions);
                        while ($row = mysqli_fetch_assoc($kampusResult)) {
                            $selected = ($row['nama_fakulti'] == $panel['kampus']) ? 'selected' : '';
                            echo "<option value='" . $row['nama_fakulti'] . "' $selected>" . $row['nama_fakulti'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="alamat_program">Alamat Program:</label>
                </td>
                <td>
                    <select name="alamat_program" id="alamat_program" style="width: 800px; padding: 5px;">
                        <?php
                        $alamatProgramOptions = "SELECT DISTINCT alamat_fakulti FROM fakulti";
                        $alamatProgramResult = mysqli_query($conn, $alamatProgramOptions);
                        while ($row = mysqli_fetch_assoc($alamatProgramResult)) {
                            $selected = ($row['alamat_fakulti'] == $panel['alamat_program']) ? 'selected' : '';
                            echo "<option value='" . $row['alamat_fakulti'] . "' $selected>" . $row['alamat_fakulti'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="no_fon">No. Telefon :</label>
                </td>
                <td>
                    <input type="text" name="no_fon" id="no_fon" value="<?php echo $panel['no_fon']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="no_faks">No. Faks:</label>
                </td>
                <td>
                    <input type="text" name="no_faks" id="no_faks" value="<?php echo $panel['no_faks']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="emel_rasmi">Emel Rasmi:</label>
                </td>
                <td>
                    <input type="email" name="emel_rasmi" id="emel_rasmi" value="<?php echo $panel['emel_rasmi']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kod_program">Kod Program:</label>
                </td>
                <td>
                    <input type="text" name="kod_program" id="kod_program" value="<?php echo $panel['kod_program']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama_program_bm">Nama Program (BM):</label>
                </td>
                <td>
                    <input type="text" name="nama_program_bm" id="nama_program_bm" value="<?php echo $panel['nama_program_bm']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama_program_bi">Nama Program (BI):</label>
                </td>
                <td>
                    <input type="text" name="nama_program_bi" id="nama_program_bi" value="<?php echo $panel['nama_program_bi']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="no_bil_jkpt">No. Bil JKPT:</label>
                </td>
                <td>
                    <input type="text" name="no_bil_jkpt" id="no_bil_jkpt" value="<?php echo $panel['no_bil_jkpt']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td><label for="no_ruj_jkpt">No. Rujukan JKPT:</label></td>
                <td><input type="text" name="no_ruj_jkpt" id="no_ruj_jkpt" value="<?php echo $panel['no_ruj_jkpt']; ?>" style="width: 784px; padding: 6px;"></td>
            </tr>
            <tr>
                <td>
                    <label for="tahap_mqf">Tahap MQF:</label>
                </td>
                <td>
                    <input type="text" name="tahap_mqf" id="tahap_mqf" value="<?php echo $panel['tahap_mqf']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bidang_nec">Bidang NEC:</label>
                </td>
                <td>
                    <input type="text" name="bidang_nec" id="bidang_nec" value="<?php echo $panel['bidang_nec']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kod_nec">Kod NEC:</label>
                </td>
                <td>
                    <input type="text" name="kod_nec" id="kod_nec" value="<?php echo $panel['kod_nec']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tarikh_program_dimulakan">Tarikh Program Dimulakan:</label>
                </td>
                <td>
                    <input type="date" name="tarikh_program_dimulakan" id="tarikh_program_dimulakan" value="<?php echo $panel['tarikh_program_dimulakan'];  ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tarikh_kohort_pertama_bergraduat">Tarikh Kohort Pertama Bergraduat:</label>
                </td>
                <td>
                    <input type="date" name="tarikh_kohort_pertama_bergraduat" id="tarikh_kohort_pertama_bergraduat" value="<?php echo $panel['tarikh_kohort_pertama_bergraduat']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama_pic">Nama PIC:</label>
                </td>
                <td>
                    <input type="text" name="nama_pic" id="nama_pic" value="<?php echo $panel['nama_pic']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                        <label for="jawatan_pic">Jawatan PIC:</label>
                </td>
                <td>
                        <input type="text" name="jawatan_pic" id="jawatan_pic" value="<?php echo $panel['jawatan_pic']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                        <label for="no_tel_pejabat_pic">No. Tel Pejabat PIC:</label>
                </td>
                <td>
                    <input type="text" name="no_tel_pejabat_pic" id="no_tel_pejabat_pic" value="<?php echo $panel['no_tel_pejabat_pic']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                        <label for="no_tel_bimbit_pic">No. Tel Bimbit PIC:</label>
                </td>
                <td>
                        <input type="text" name="no_tel_bimbit_pic" id="no_tel_bimbit_pic" value="<?php echo $panel['no_tel_bimbit_pic']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pautan_dokumen_penilaian">Pautan Dokumen Penilaian:</label>
                </td>
                <td>
                    <input type="text" name="pautan_dokumen_penilaian" id="pautan_dokumen_penilaian" value="<?php echo $panel['pautan_dokumen_penilaian']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tarikh_jkppp">Tarikh JKPPP:</label>
                </td>
                <td>
                        <input type="date" name="tarikh_jkppp" id="tarikh_jkppp" value="<?php echo $panel['tarikh_jkppp']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bil_jkppp">Bil JKPPP:</label>
                </td>
                <td>
                    <input type="text" name="bil_jkppp" id="bil_jkppp" value="<?php echo $panel['bil_jkppp']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tarikh_senat">Tarikh Senat:</label>
                </td>
                <td>
                        <input type="date" name="tarikh_senat" id="tarikh_senat" value="<?php echo $panel['tarikh_senat']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bil_senat">Bil Senat:</label>
                </td>
                <td>
                    <input type="text" name="bil_senat" id="bil_senat" value="<?php echo $panel['bil_senat']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="no_rujukan_mqa">No Rujukan MQA :</label>
                </td>
                <td>
                    <input type="text" name="no_rujukan_mqa" id="no_rujukan_mqa" value="<?php echo $panel['no_rujukan_mqa']; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="sijil_mqa_bm">Sijil MQA BM:</label>
                </td>
                <td>
                    <a href="<?php echo $panel['sijil_mqa_bm']; ?>" download>
                        <button type="button">Muat Turun</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="sijil_mqa_bi">Sijil MQA BI:</label>
                </td>
                <td>
                    <a href="<?php echo $panel['sijil_mqa_bi']; ?>" download>
                        <button type="button">Muat Turun</button>
                    </a>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="panel_dalam1">Panel Dalam 1:</label>
                </td>
                <td>
                    <select name="panel_dalam1" id="panel_dalam1" style="width: 800px; padding: 5px;">
                        <?php
                        $panelDalamOptions = "SELECT DISTINCT nama_panel FROM panel WHERE jenis_panel = 'panel dalam'";
                        $panelDalamResult = mysqli_query($conn, $panelDalamOptions);
                        while ($row = mysqli_fetch_assoc($panelDalamResult)) {
                            $selected = ($row['nama_panel'] == $panel['panel_dalam1']) ? 'selected' : '';
                            echo "<option value='" . $row['nama_panel'] . "' $selected>" . $row['nama_panel'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="institusi_dalam1">Institusi Dalam 1:</label>
                </td>
                <td>
                    <select name="institusi_dalam1" id="institusi_dalam1" style="width: 800px; padding: 5px;">
                        <?php
                        $institusiDalamOptions = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'panel dalam'";
                        $institusiDalamResult = mysqli_query($conn, $institusiDalamOptions);
                        while ($row = mysqli_fetch_assoc($institusiDalamResult)) {
                            $selected = ($row['institusi'] == $panel['institusi_dalam1']) ? 'selected' : '';
                            echo "<option value='" . $row['institusi'] . "' $selected>" . $row['institusi'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="panel_dalam2">Panel Dalam 2:</label>
                </td>
                <td>
                    <select name="panel_dalam2" id="panel_dalam2" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Panel Dalam 2 --</option> <!-- Empty option added here -->
                        <?php
                        $panelDalamOptions = "SELECT DISTINCT nama_panel FROM panel WHERE jenis_panel = 'panel dalam'";
                        $panelDalamResult = mysqli_query($conn, $panelDalamOptions);
                        while ($row = mysqli_fetch_assoc($panelDalamResult)) {
                            $selected = ($row['nama_panel'] == $panel['panel_dalam2']) ? 'selected' : '';
                            echo "<option value='" . $row['nama_panel'] . "' $selected>" . $row['nama_panel'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="institusi_dalam2">Institusi Dalam 2:</label>
                </td>
                <td>
                    <select name="institusi_dalam2" id="institusi_dalam2" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Institusi Dalam 2 --</option> <!-- Empty option added here -->
                        <?php
                        $institusiDalamOptions = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'panel dalam'";
                        $institusiDalamResult = mysqli_query($conn, $institusiDalamOptions);
                        while ($row = mysqli_fetch_assoc($institusiDalamResult)) {
                            $selected = ($row['institusi'] == $panel['institusi_dalam2']) ? 'selected' : '';
                            echo "<option value='" . $row['institusi'] . "' $selected>" . $row['institusi'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="panel_dalam3">Panel Dalam 3:</label>
                </td>
                <td>
                    <select name="panel_dalam3" id="panel_dalam3" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Panel Dalam 3 --</option> <!-- Empty option added here -->
                        <?php
                        $panelDalamOptions = "SELECT DISTINCT nama_panel FROM panel WHERE jenis_panel = 'panel dalam'";
                        $panelDalamResult = mysqli_query($conn, $panelDalamOptions);
                        while ($row = mysqli_fetch_assoc($panelDalamResult)) {
                            $selected = ($row['nama_panel'] == $panel['panel_dalam3']) ? 'selected' : '';
                            echo "<option value='" . $row['nama_panel'] . "' $selected>" . $row['nama_panel'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="institusi_dalam3">Institusi Dalam 3:</label>
                </td>
                <td>
                    <select name="institusi_dalam3" id="institusi_dalam3" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Institusi Dalam 3 --</option> <!-- Empty option added here -->
                        <?php
                        $institusiDalamOptions = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'panel dalam'";
                        $institusiDalamResult = mysqli_query($conn, $institusiDalamOptions);
                        while ($row = mysqli_fetch_assoc($institusiDalamResult)) {
                            $selected = ($row['institusi'] == $panel['institusi_dalam3']) ? 'selected' : '';
                            echo "<option value='" . $row['institusi'] . "' $selected>" . $row['institusi'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="panel_dalam4">Panel Dalam 4:</label>
                </td>
                <td>
                    <select name="panel_dalam4" id="panel_dalam4" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Panel Dalam 4 --</option> <!-- Empty option added here -->
                        <?php
                        $panelDalamOptions = "SELECT DISTINCT nama_panel FROM panel WHERE jenis_panel = 'Panel Dalam'";
                        $panelDalamResult = mysqli_query($conn, $panelDalamOptions);
                        while ($row = mysqli_fetch_assoc($panelDalamResult)) {
                            $selected = ($row['nama_panel'] == $panel['panel_dalam4']) ? 'selected' : '';
                            echo "<option value='" . $row['nama_panel'] . "' $selected>" . $row['nama_panel'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="institusi_dalam4">Institusi Dalam 4:</label>
                </td>
                <td>
                    <select name="institusi_dalam4" id="institusi_dalam4" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Institusi Dalam 4 --</option> <!-- Empty option added here -->
                        <?php
                        $institusiDalamOptions = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'panel dalam'";
                        $institusiDalamResult = mysqli_query($conn, $institusiDalamOptions);
                        while ($row = mysqli_fetch_assoc($institusiDalamResult)) {
                            $selected = ($row['institusi'] == $panel['institusi_dalam4']) ? 'selected' : '';
                            echo "<option value='" . $row['institusi'] . "' $selected>" . $row['institusi'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="panel_luar1">Panel Luar 1:</label>
                </td>
                <td>
                    <select name="panel_luar1" id="panel_luar1" style="width: 800px; padding: 5px;">
                        <?php
                        $panelLuarOptions = "SELECT DISTINCT nama_panel FROM panel WHERE jenis_panel = 'panel luar'";
                        $panelLuarResult = mysqli_query($conn, $panelLuarOptions);
                        while ($row = mysqli_fetch_assoc($panelLuarResult)) {
                            $selected = ($row['nama_panel'] == $panel['panel_luar1']) ? 'selected' : '';
                            echo "<option value='" . $row['nama_panel'] . "' $selected>" . $row['nama_panel'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="institusi_luar1">Institusi Luar 1:</label>
                </td>
                <td>
                    <select name="institusi_luar1" id="institusi_luar1" style="width: 800px; padding: 5px;">
                        <?php
                        $institusiLuarOptions = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'panel luar'";
                        $institusiLuarResult = mysqli_query($conn, $institusiLuarOptions);
                        while ($row = mysqli_fetch_assoc($institusiLuarResult)) {
                            $selected = ($row['institusi'] == $panel['institusi_luar1']) ? 'selected' : '';
                            echo "<option value='" . $row['institusi'] . "' $selected>" . $row['institusi'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="panel_luar2">Panel Luar 2:</label>
                </td>
                <td>
                    <select name="panel_luar2" id="panel_luar2" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Panel Luar 2 --</option> <!-- Empty option added here -->
                        <?php
                        $panelLuarOptions = "SELECT DISTINCT nama_panel FROM panel WHERE jenis_panel = 'panel luar'";
                        $panelLuarResult = mysqli_query($conn, $panelLuarOptions);
                        while ($row = mysqli_fetch_assoc($panelLuarResult)) {
                            $selected = ($row['nama_panel'] == $panel['panel_luar2']) ? 'selected' : '';
                            echo "<option value='" . $row['nama_panel'] . "' $selected>" . $row['nama_panel'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="institusi_luar2">Institusi Luar 2:</label>
                </td>
                <td>
                    <select name="institusi_luar2" id="institusi_luar2" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Institusi Luar 2 --</option> <!-- Empty option added here -->
                        <?php
                        $institusiLuarOptions = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'panel luar'";
                        $institusiLuarResult = mysqli_query($conn, $institusiLuarOptions);
                        while ($row = mysqli_fetch_assoc($institusiLuarResult)) {
                            $selected = ($row['institusi'] == $panel['institusi_luar2']) ? 'selected' : '';
                            echo "<option value='" . $row['institusi'] . "' $selected>" . $row['institusi'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="panel_luar3">Panel Luar 3:</label>
                </td>
                <td>
                    <select name="panel_luar3" id="panel_luar3" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Panel Luar 3 --</option> <!-- Empty option added here -->
                        <?php
                        $panelLuarOptions = "SELECT DISTINCT nama_panel FROM panel WHERE jenis_panel = 'panel luar'";
                        $panelLuarResult = mysqli_query($conn, $panelLuarOptions);
                        while ($row = mysqli_fetch_assoc($panelLuarResult)) {
                            $selected = ($row['nama_panel'] == $panel['panel_luar3']) ? 'selected' : '';
                            echo "<option value='" . $row['nama_panel'] . "' $selected>" . $row['nama_panel'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="institusi_luar3">Institusi Luar 3:</label>
                </td>
                <td>
                    <select name="institusi_luar3" id="institusi_luar3" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Institusi Luar 3 --</option> <!-- Empty option added here -->
                        <?php
                        $institusiLuarOptions = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'panel luar'";
                        $institusiLuarResult = mysqli_query($conn, $institusiLuarOptions);
                        while ($row = mysqli_fetch_assoc($institusiLuarResult)) {
                            $selected = ($row['institusi'] == $panel['institusi_luar3']) ? 'selected' : '';
                            echo "<option value='" . $row['institusi'] . "' $selected>" . $row['institusi'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="panel_luar4">Panel Luar 4:</label>
                </td>
                <td>
                    <select name="panel_luar4" id="panel_luar4" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Institusi Luar 4 --</option> <!-- Empty option added here -->
                        <?php
                        $panelLuarOptions = "SELECT DISTINCT nama_panel FROM panel WHERE jenis_panel = 'panel luar'";
                        $panelLuarResult = mysqli_query($conn, $panelLuarOptions);
                        while ($row = mysqli_fetch_assoc($panelLuarResult)) {
                            $selected = ($row['nama_panel'] == $panel['panel_luar4']) ? 'selected' : '';
                            echo "<option value='" . $row['nama_panel'] . "' $selected>" . $row['nama_panel'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="institusi_luar4">Institusi Luar 4:</label>
                </td>
                <td>
                    <select name="institusi_luar4" id="institusi_luar4" style="width: 800px; padding: 5px;">
                        <option value="">-- Tiada Institusi Luar 4 --</option> <!-- Empty option added here -->
                        <?php
                        $institusiLuarOptions = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'panel luar'";
                        $institusiLuarResult = mysqli_query($conn, $institusiLuarOptions);
                        while ($row = mysqli_fetch_assoc($institusiLuarResult)) {
                            $selected = ($row['institusi'] == $panel['institusi_luar4']) ? 'selected' : '';
                            echo "<option value='" . $row['institusi'] . "' $selected>" . $row['institusi'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status_permohonan">Status Permohonan:</label>
                </td>
                <td>
                    <select name="status_permohonan" id="status_permohonan" style="width: 800px; padding: 5px;">
                        <option value="Terima Dokumen" <?php if($panel['status_permohonan'] == 'Terima Dokumen') echo 'selected'; ?>>Terima Dokumen</option>
                        <option value="Lantik Panel" <?php if($panel['status_permohonan'] == 'Lantik Panel') echo 'selected'; ?>>Lantik Panel</option>
                        <option value="Penilaian Pertama" <?php if($panel['status_permohonan'] == 'Penilaian Pertama') echo 'selected'; ?>>Penilaian Pertama</option>
                        <option value="Maklumbalas Pertama" <?php if($panel['status_permohonan'] == 'Maklumbalas Pertama') echo 'selected'; ?>>Maklumbalas Pertama</option>
                        <option value="Penilaian Kedua" <?php if($panel['status_permohonan'] == 'Penilaian Kedua') echo 'selected'; ?>>Penilaian Kedua</option>
                        <option value="Maklumbalas Kedua" <?php if($panel['status_permohonan'] == 'Maklumbalas Kedua') echo 'selected'; ?>>Maklumbalas Kedua</option>
                        <option value="JKPPP" <?php if($panel['status_permohonan'] == 'JKPPP') echo 'selected'; ?>>JKPPP</option>
                        <option value="Senat" <?php if($panel['status_permohonan'] == 'Senat') echo 'selected'; ?>>Senat</option>
                        <option value="Penghantaran ke MQA" <?php if($panel['status_permohonan'] == 'Penghantaran ke MQA') echo 'selected'; ?>>Penghantaran ke MQA</option>
                        <option value="Tersenarai di MQR" <?php if($panel['status_permohonan'] == 'Tersenarai di MQR') echo 'selected'; ?>>Tersenarai di MQR</option>
                        <option value="Selesai" <?php if($panel['status_permohonan'] == 'Selesai') echo 'selected'; ?>>Selesai</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status_date">Tarikh Status:</label>
                </td>
                <td>
                    <?php
                        $status_permohonan = $panel['status_permohonan'];
                        $column_name = 'tarikh_' . str_replace(' ', '_', strtolower($status_permohonan));
                        
                        // Retrieve the corresponding status row based on the permohonan_id
                        $status_query = "SELECT $column_name FROM status WHERE permohonan_id = $permohonan_id";
                        $status_result = mysqli_query($conn, $status_query);
                        $status_row = mysqli_fetch_assoc($status_result);
                        $status_date = $status_row[$column_name];
                    ?>
                    <input type="date" id="status_date" name="status_date" value="<?php echo $status_date; ?>" style="width: 784px; padding: 6px;">
                </td>
            </tr>

            <tr>
            <td>
                <label for="catatan">Catatan:</label>
            </td>
            <td>
                <textarea name="catatan" id="catatan" style="height: 300px; width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; text-align: left;"><?php echo htmlspecialchars($panel['catatan']); ?></textarea>
            </td>
            </tr>

        <tr>
            <td colspan="2" align="center" valign="middle"><button type="submit" name="submit" style="padding: 10px; font-size: 18px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Kemaskini</button></td>
        </tr>
        </form>
    </table>

    <br><br><br>

    <td><button type="button" onclick="window.location.href='kemaskinipermohonan.php'" style="padding: 10px; font-size: 18px; background-color: #008CBA; color: white; border: none; border-radius: 5px;">Kembali</button></td>
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