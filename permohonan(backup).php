<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="/img/icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.default.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
	<title>Permohonan Penilaian Dokumen</title>
	
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
    
        <script>
        $(document).ready(function() {
          // Hide panels and institusi on page load
          hideInputs();
          
          // Show/hide inputs when the dropdown value changes
          $('#jenis_permohonan').change(function() {
            hideInputs();
          });
        });
        
        function hideInputs() {
          var selectedValue = $('#jenis_permohonan').val();
          
          if (selectedValue === 'IQA04') {
            // Hide panel luar 2, 3, 4
            $('#panel_luar2').hide();
            $('#panel_luar3').hide();
            $('#panel_luar4').hide();
            
            // Hide panel dalam 2, 3, 4
            $('#panel_dalam2').hide();
            $('#panel_dalam3').hide();
            $('#panel_dalam4').hide();
            
            // Hide institusi luar 2, 3, 4
            $('#institusi_luar2').hide();
            $('#institusi_luar3').hide();
            $('#institusi_luar4').hide();
            
            // Hide institusi dalam 2, 3, 4
            $('#institusi_dalam2').hide();
            $('#institusi_dalam3').hide();
            $('#institusi_dalam4').hide();
          } else {
            // Show all panels and institusi
            $('#panel_luar2').show();
            $('#panel_luar3').show();
            $('#panel_luar4').show();
            $('#panel_dalam2').show();
            $('#panel_dalam3').show();
            $('#panel_dalam4').show();
            $('#institusi_luar2').show();
            $('#institusi_luar3').show();
            $('#institusi_luar4').show();
            $('#institusi_dalam2').show();
            $('#institusi_dalam3').show();
            $('#institusi_dalam4').show();
          }
        }
        </script>
        
	<style>
		body {
			margin: 0;
			padding: 0;
			background-color: #f2f2f2;
			font-family: 'Roboto', sans-serif;
		}
		
        header {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 20vh;
			background-color: #ffffff;
		}
		
		header span {
            position: fixed;
            left: 5%;
        }
		
		header img {
            height: 60%;
            margin-right: 100px;
            margin-left:100px;
        }

		h1 {
			font-size: 40px;
			color: #111111;
			text-align: center;
			font-family: Roboto, sans-serif;
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
		

	.box {
		margin: 50px auto;
		width: 80%;
		border: 2.5px solid #2548ba;
		padding: 30px;
		border-radius: 10px;
		background-color: #fff;
		box-shadow: 0 0 10px rgba(0,0,0,0.2);
	}

	.box input[type="text"],
	.box input[type="number"],
	.box select {
		display: block;
		margin-bottom: 20px;
		width: 100%;
		padding: 10px;
		font-size: 16px;
		border: 1px solid #ccc;
		border-radius: 5px;
		box-shadow: none;
		box-sizing: border-box;
	}

	.box select {
		color: #111;
	}

	.box select option {
		color: #000;
	}

	.box input[type="date"]::-webkit-calendar-picker-indicator {
		color: #aaa;
	}

	.box input[type="submit"] {
		background-color: #1e90ff;
		color: #fff;
		border: none;
		padding: 10px 20px;
		font-size: 16px;
		border-radius: 5px;
		cursor: pointer;
		display: inline-block;
        margin-right: 10px;
	}

	.box input[type="submit"]:hover {
		background-color: darkblue;
	}

	.subheader {
		font-weight: bold;
		margin-top: 20px;
		margin-bottom: 10px;
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
    
   #kod_nec_container {
  display: flex;
}

#kod_nec_container input[type="number"] {
  width: 50px;
  height: 50px;
  font-size: 16px;
  text-align: center;
  margin-right: 5px;
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
  width: 100%;
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

@media only screen and (max-width: 768px) {
  header {
    height: 15vh;
  }

  header span {
      position: absolute;
    right:0;
  }
  
  header img {
    height: 30%;
    margin-right: 5px;
  }

  header h1 {
    font-size: 15px;
  }
  
}

</style>

</head>
<body>
    <header id="header">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <img src="./img/logo.png" alt="UiTM Logo">
		<h1>PERMOHONAN PENILAIAN DOKUMEN</h1>
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
		<form id="myForm" action="connect5.php" method="post">
		    <label for="jenis_permohonan">Jenis Permohonan </label><br><br>
                <select name="jenis_permohonan" id="jenis_permohonan">
                <option value="">Tekan disini untuk pilih jenis permohonan</option>
                    <option value="IQA01(B)">Akreditasi Sementara bagi Program Baharu (IQA01(B))</option>
                    <option value="IQA01(T/L)">Akreditasi Sementara bagi Program Sedia Ada di Lokasi Baharu (IQA01(TL))</option>
                    <option value="IQA02(B)">Akreditasi Penuh bagi Program Baharu (IQA02(B))</option>
                    <option value="IQA02(T/L)">Akreditasi Penuh bagi Program Sedia Ada di Lokasi Baharu (IQA02(TL))</option>
                    <option value="IQA03">Semakan Kurikulum Melebihi 30% (IQA03)</option>
                    <option value="IQA04">Audit Pematuhan (IQA04)</option>
                    <option value="IQA05">Pindah Premis (IQA05)</option>
                    <option value="IQA06">Akreditasi Sementara bagi Program ODL (COPPA-ODL) (IQA06)</option>
                    <option value="IQA07">Akreditasi Penuh bagi Program ODL (COPPA-ODL) (IQA07)</option>
                    <option value="IQA08">Akreditasi Sementara bagi Program TVET (COPTPA) (IQA08)</option>
                    <option value="IQA09">Akreditasi Penuh bagi Program TVET (COPTPA) (IQA09)</option>
                </select><br>

                
                <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
    
                <script>
                    $(document).ready(function() {
                        $('#jenis_permohonan').selectize();
                    });
                </script>

            <label for="kampus">Kampus </label><br><br>
                <select name="kampus" id="kampus">
                    <option value="">Pilih Kolej/Fakulti/Kampus</option>
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
                
                <script>
                    $(document).ready(function() {
                        $('#kampus').selectize();
                    });
                </script><br>

            <label for="alamat_program">Alamat Program Dijalankan </label><br><Br>
                <select name="alamat_program" id="alamat_program">
                    <option value="">Pilih Alamat Program</option>
                    <?php
                    // Connect to database
                    $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                
                    // Execute SELECT DISTINCT statement, exclude NULL and empty values
                    $sql = "SELECT DISTINCT alamat_fakulti FROM fakulti WHERE alamat_fakulti IS NOT NULL AND alamat_fakulti <> '' ORDER BY alamat_fakulti ASC";
                    $result = mysqli_query($conn, $sql);
                
                    // Generate option elements
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['alamat_fakulti'] . '">' . $row['alamat_fakulti'] . '</option>';
                        }
                    } else {
                        echo "No options available";
                    }
                
                    // Close database connection
                    mysqli_close($conn);
                    ?>
                </select><br>
                
                <script>
                    $(document).ready(function() {
                        $('#alamat_program').selectize();
                    });
                </script>

            <label for="no_fon">Nombor Telefon </label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="tel" name="no_fon" id="no_fon" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <label for="no_faks">Nombor Faks </label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="tel" name="no_faks" id="no_faks">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <label for="emel_rasmi">E-mel </label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="emel_rasmi" id="emel_rasmi" >&nbsp;&nbsp;

            <br> <br><br> 
            
            <label for="tarikh_permohonan">Tarikh Diterima Dari UHEK / Tarikh Terima Permohonan &nbsp &nbsp</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="date" id="tarikh_permohonan" name="tarikh_permohonan" ><br><br><br>
            

			<label id="kod_program1" for="kod_program">Kod Program</label><br><br>
			<input type="text" id="kod_program" name="kod_program" >
			

			<label for="nama_program_bm">Nama Program (BM)</label><br><br>
			<input type="text" id="nama_program_bm" name="nama_program_bm" >
			


			<label for="nama_program_bi">Nama Program (BI)</label><br><br>
			<input type="text" id="nama_program_bi" name="nama_program_bi" >
			

			<label for="no_bil_jkpt">No. Bil JKPT &nbsp</label> <br><br>
			<input type="text" id="no_bil_jkpt" name="no_bil_jkpt" >
			


			<label for="no_ruj_jkpt">No. Rujukan Surat JKPT &nbsp</label> <br><br>
			<input type="text" id="no_ruj_jkpt" name="no_ruj_jkpt" >
			


			<label for="tahap_mqf">Tahap MQF</label><br><br>
			<select id="tahap_mqf" name="tahap_mqf" >
				<option value="" selected>Tekan disini untuk tahap MQF</option>
				<option value="0">0 (Foundation)</option>
				<option value="3">3 (Sijil)</option>
				<option value="4">4 (Diploma)</option>
				<option value="5">5 (Diploma Lanjutan)</option>
                <option value="6">6 (Sarjana Muda)</option>
                <option value="7">7 (Sarjana)</option>
                <option value="8">8 (Doktor Falsafah)</option>
                </select>
                

            <label id="bidang_nec" for="bidang_nec">Bidang NEC</label><br><br>
			<input type="text" id="bidang_nec" name="bidang_nec" >
			

             <label for="kod_nec">Kod NEC</label><br><br>
                <div id="kod_nec_container">
                    <input type="text" id="kod_nec_1" name="kod_nec_1" maxlength="1" >
                    <input type="text" id="kod_nec_2" name="kod_nec_2" maxlength="1" >
                    <input type="text" id="kod_nec_3" name="kod_nec_3" maxlength="1" >
                    <input type="text" id="kod_nec_4" name="kod_nec_4" maxlength="1" >
                </div>
                


                
        	<label for="tarikh_program_dimulakan">Tarikh Program Dimulakan / Dijangka Bermula &nbsp &nbsp</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		<input type="date" id="tarikh_program_dimulakan" name="tarikh_program_dimulakan" ><br><br>
    		


    		<label for="tarikh_kohort_pertama_bergraduat">Tarikh Kohort Pertama Bergraduat / Dijangka Bergraduat &nbsp </label>&nbsp;&nbsp;&nbsp;&nbsp; 		
    		<input type="date" id="tarikh_kohort_pertama_bergraduat" name="tarikh_kohort_pertama_bergraduat" ><br><br>
    		


    		<h2 class="subheader">PEGAWAI YANG BOLEH DIHUBUNGI</h2><br><br>
    		

    		<label for="nama_pic">Nama Pegawai</label>
    		<input type="text" id="nama_pic" name="nama_pic" >
    		


    		<label for="jawatan_pic">Jawatan Pegawai</label>
    		<input type="text" id="jawatan_pic" name="jawatan_pic" >
    		

    		<label for="no_tel_pejabat_pic">No. Telefon Pejabat</label>
    		<input type="text" id="no_tel_pejabat_pic" name="no_tel_pejabat_pic" >
    		


    		<label for="no_tel_bimbit_pic">No Telefon Bimbit</label>
    		<input type="text" id="no_tel_bimbit_pic" name="no_tel_bimbit_pic" >
    		

    		
    		<label for="pautan_dokumen_penilaian">Pautan ke Dokumen Penilaian</label>
    		<input type="text" id="pautan_dokumen_penilaian" name="pautan_dokumen_penilaian" ><br>
    		

    	
    		<label for="tarikh_senat">Tarikh Mesyuarat Senat &nbsp &nbsp</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		<input type="date" id="tarikh_senat" name="tarikh_senat" ><br><br><br>
    		

    		<label for="bil_senat"> Nombor Bilangan Mesyuarat Senat </label><br><br>
    		<input type="text" id="bil_senat" name="bil_senat" >
    		

    		<label id="no_rujukan_mqa1" for="no_rujukan_mqa"> Nombor Rujukan MQA </label><br><br>
    		<input type="text" id="no_rujukan_mqa" name="no_rujukan_mqa" >
    		

                <form action="upload.php" method="POST" enctype="multipart/form-data">
                  <div class="input-box">
                    <div class="input-title">Salinan Sijil MQA (BM) / Surat</div> <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="sijil_mqa_bm" class="input-field" > 
                  </div> <br>
                
                  <div class="input-box">
                    <div class="input-title">Salinan Sijil MQA (BI) / Surat</div> <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="sijil_mqa_bi" class="input-field" > 
                  </div> <br>
                </form>
    	

    	    
    	     <label for="panel_dalam"><strong>Panel Dalam </strong></label><br>
            <br><select name="panel_dalam1" id="panel_dalam1">
                <option value="">Pilih Panel Dalam 1</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                // Execute SELECT statement
                $sql = "SELECT jenis_panel, nama_panel FROM panel WHERE jenis_panel = 'Panel Dalam' ORDER BY nama_panel ASC";
                $result = mysqli_query($conn, $sql);
                
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_panel'] . '">' . $row['nama_panel'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
                
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            
           <select name="institusi_dalam1" id="institusi_dalam1">
                <option value="">Pilih Institusi Untuk Panel Dalam 1</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                // Execute SELECT statement
                $sql = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'Panel Dalam' ORDER BY institusi ASC";
                $result = mysqli_query($conn, $sql);
            
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['institusi'] . '">' . $row['institusi'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
            
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            

            <select name="panel_dalam2" id="panel_dalam2">
                <option value="">Pilih Panel Dalam 2</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                // Execute SELECT statement
                $sql = "SELECT jenis_panel, nama_panel FROM panel WHERE jenis_panel = 'Panel Dalam' ORDER BY nama_panel ASC";
                $result = mysqli_query($conn, $sql);
                
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_panel'] . '">' . $row['nama_panel'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
                
                // Close database connection
                mysqli_close($conn);
                ?>
                
            </select>
        
           <select name="institusi_dalam2" id="institusi_dalam2">
                <option value="">Pilih Institusi Untuk Panel Dalam 2</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                // Execute SELECT statement
                $sql = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'Panel Dalam' ORDER BY institusi ASC";
                $result = mysqli_query($conn, $sql);
            
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['institusi'] . '">' . $row['institusi'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
            
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>

            <select name="panel_dalam3" id="panel_dalam3">
                <option value="">Pilih Panel Dalam 3</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                // Execute SELECT statement
                $sql = "SELECT jenis_panel, nama_panel FROM panel WHERE jenis_panel = 'Panel Dalam' ORDER BY nama_panel ASC";
                $result = mysqli_query($conn, $sql);
                
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_panel'] . '">' . $row['nama_panel'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
                
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            
           <select name="institusi_dalam3" id="institusi_dalam3">
                <option value="">Pilih Institusi Untuk Panel Dalam 3</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                // Execute SELECT statement
                $sql = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'Panel Dalam' ORDER BY institusi ASC";
                $result = mysqli_query($conn, $sql);
            
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['institusi'] . '">' . $row['institusi'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
            
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            

            <select name="panel_dalam4" id="panel_dalam4">
                <option value="">Pilih Panel Dalam 4</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                // Execute SELECT statement
                $sql = "SELECT jenis_panel, nama_panel FROM panel WHERE jenis_panel = 'Panel Dalam' ORDER BY nama_panel ASC";
                $result = mysqli_query($conn, $sql);
                
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_panel'] . '">' . $row['nama_panel'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
                
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>

           <select name="institusi_dalam4" id="institusi_dalam4">
                <option value="">Pilih Institusi Untuk Panel Dalam 4</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                // Execute SELECT statement
                $sql = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'Panel Dalam' ORDER BY institusi ASC";
                $result = mysqli_query($conn, $sql);
            
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['institusi'] . '">' . $row['institusi'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
            
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            

            <label for="panel_luar"><strong>Panel Luar</strong></label><br><br>            <select name="panel_luar1" id="panel_luar1">
                <option value="">Pilih Panel Luar 1</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                // Execute SELECT statement
                $sql = "SELECT jenis_panel, nama_panel FROM panel WHERE jenis_panel = 'Panel Luar' ORDER BY nama_panel ASC";
                $result = mysqli_query($conn, $sql);
                
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_panel'] . '">' . $row['nama_panel'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
                
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            
            <select name="institusi_luar1" id="institusi_luar1">
                <option value="">Pilih Institusi Untuk Panel Luar 1</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                // Execute SELECT statement
                $sql = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'Panel Luar' ORDER BY institusi ASC";
                $result = mysqli_query($conn, $sql);
            
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['institusi'] . '">' . $row['institusi'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
            
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            

             <select name="panel_luar2" id="panel_luar2">
                <option value="">Pilih Panel Luar 2</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                // Execute SELECT statement
                $sql = "SELECT jenis_panel, nama_panel FROM panel WHERE jenis_panel = 'Panel Luar' ORDER BY nama_panel ASC";
                $result = mysqli_query($conn, $sql);
                
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_panel'] . '">' . $row['nama_panel'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
                
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            
            <select name="institusi_luar2" id="institusi_luar2">
                <option value="">Pilih Institusi Untuk Panel Luar 2</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                // Execute SELECT statement
                $sql = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'Panel Luar' ORDER BY institusi ASC";
                $result = mysqli_query($conn, $sql);
            
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['institusi'] . '">' . $row['institusi'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
            
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            

             <select name="panel_luar3" id="panel_luar3">
                <option value="">Pilih Panel Luar 3</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                // Execute SELECT statement
                $sql = "SELECT jenis_panel, nama_panel FROM panel WHERE jenis_panel = 'Panel Luar' ORDER BY nama_panel ASC";
                $result = mysqli_query($conn, $sql);
                
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_panel'] . '">' . $row['nama_panel'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
                
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>

           <select name="institusi_luar3" id="institusi_luar3">
                <option value="">Pilih Institusi Untuk Panel Luar 3</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                // Execute SELECT statement
                $sql = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'Panel Luar' ORDER BY institusi ASC";
                $result = mysqli_query($conn, $sql);
            
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['institusi'] . '">' . $row['institusi'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
            
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            

             <select name="panel_luar4" id="panel_luar4">
                <option value="">Pilih Panel Luar 4</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                // Execute SELECT statement
                $sql = "SELECT jenis_panel, nama_panel FROM panel WHERE jenis_panel = 'Panel Luar' ORDER BY nama_panel ASC";
                $result = mysqli_query($conn, $sql);
                
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nama_panel'] . '">' . $row['nama_panel'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
                
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            
           <select name="institusi_luar4" id="institusi_luar4">
                <option value="">Pilih Institusi Untuk Panel Luar 4</option>
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'inqkacom_faiz123', 'faiznasir123', 'inqkacom_pais');
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            
                // Execute SELECT statement
                $sql = "SELECT DISTINCT institusi FROM panel WHERE jenis_panel = 'Panel Luar' ORDER BY institusi ASC";
                $result = mysqli_query($conn, $sql);
            
                // Generate option elements
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['institusi'] . '">' . $row['institusi'] . '</option>';
                    }
                } else {
                    echo "No options available";
                }
            
                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
            

    		<label for="status_permohonan">Status</label>
    			<select id="status_permohonan" name="status_permohonan" >
    				<option value="" selected>Tekan disini untuk pilih status</option>
    				<option value="Terima Dokumen">Terima Dokumen</option> 
                </select>
                
            <label for="status_date">Tarikh Status</label>
            <input type="date" id="status_date" name="status_date" ><br><br><br>
    
    	<button type="button" onclick="submitForm()">SIMPAN</button>


		</form>

    </div>
    
    <script>
  function submitForm() {
    // Get the form element
    var form = document.getElementById('myForm');

    // Submit the form
    form.submit();
  }
</script>
    
    <script>
    
            // Get the input elements
            const kodNec1 = document.getElementById("kod_nec_1");
            const kodNec2 = document.getElementById("kod_nec_2");
            const kodNec3 = document.getElementById("kod_nec_3");
            const kodNec4 = document.getElementById("kod_nec_4");
            
            // Get the combined code element
            const combinedCode = document.getElementById("combined_code");
            
            // Validate the input values
            function validateKodNec() {
              const kodNecValues = [
                kodNec1.value.trim(),
                kodNec2.value.trim(),
                kodNec3.value.trim(),
                kodNec4.value.trim(),
              ];
              
              // Check if all the values are valid
              const isValid = kodNecValues.every(value => /^[0-9]{1}$/i.test(value));
              
              // If all the values are valid, combine them and set the value of the combined code element
              if (isValid) {
                const combinedValue = kodNecValues.join("");
                combinedCode.value = combinedValue;
              } else {
                combinedCode.value = "";
              }
            }
            
            // Add event listeners to the input fields
            kodNec1.addEventListener("input", validateKodNec);
            kodNec2.addEventListener("input", validateKodNec);
            kodNec3.addEventListener("input", validateKodNec);
            kodNec4.addEventListener("input", validateKodNec);
        
    </script>
    

  <a href="index.php"><button style="position: fixed; bottom: 20px; right: 20px;">Kembali</button></a>
  
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