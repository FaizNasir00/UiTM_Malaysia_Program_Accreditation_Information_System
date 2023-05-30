<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="/img/icon.png">
	<title>Kemaskini Permohonan</title>
	<link rel="stylesheet" href="css/edit.css">
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
        <a href="edit_fakulti_page(main).php">Kemaskini Fakulti</a>
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
    </div>
      <a href="manage_user.php">User</a>
      <a href="logout.php">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <h1>KEMASKINI PERMOHONAN</h1><br><br>
		<?php

        // Database connection
        $conn = mysqli_connect("", "", "", "");
        
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Update the permohonan data in the database based on the permohonan_id
        if (isset($_POST['submit'])) {
            $permohonan_id = $_POST['permohonan_id'];
            $jenis_permohonan = $_POST['jenis_permohonan'];
            $kampus = $_POST['kampus'];
            $alamat_program = $_POST['alamat_program'];
            $no_fon = $_POST['no_fon'];
            $no_faks = $_POST['no_faks'];
            $emel_rasmi = $_POST['emel_rasmi'];
            $tarikh_permohonan = $_POST['tarikh_permohonan'];
            $kod_program = $_POST['kod_program'];
            $nama_program_bm = $_POST['nama_program_bm'];
            $nama_program_bi = $_POST['nama_program_bi'];
            $no_bil_jkpt = $_POST['no_bil_jkpt'];
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
            $tarikh_diterima_uhek = $_POST['tarikh_diterima_uhek'];
            $tarikh_senat = $_POST['tarikh_senat'];
            $bil_senat = $_POST['bil_senat'];
            $no_rujukan_mqa = $_POST['no_rujukan_mqa'];
            $sijil_mqa_bm = $_POST['sijil_mqa_bm'];
            $sijil_mqa_bi = $_POST['sijil_mqa_bi'];
            $panel_dalam = $_POST['panel_dalam'];
            $panel_luar = $_POST['panel_luar'];
            $status_permohonan = $_POST['status_permohonan'];

            
            $sql = "UPDATE permohonan SET jenis_permohonan='$jenis_permohonan', kampus='$kampus', alamat_program='$alamat_program', no_fon='$no_fon', no_faks='$no_faks', emel_rasmi='$emel_rasmi', tarikh_permohonan='$tarikh_permohonan', kod_program='$kod_program', nama_program_bm='$nama_program_bm', nama_program_bi='$nama_program_bi', no_bil_jkpt='$no_bil_jkpt', tahap_mqf='$tahap_mqf', bidang_nec='$bidang_nec', kod_nec='$kod_nec', tarikh_program_dimulakan='$tarikh_program_dimulakan', tarikh_kohort_pertama_bergraduat='$tarikh_kohort_pertama_bergraduat', nama_pic='$nama_pic', jawatan_pic='$jawatan_pic', no_tel_pejabat_pic='$no_tel_pejabat_pic', no_tel_bimbit_pic='$no_tel_bimbit_pic', pautan_dokumen_penilaian='$pautan_dokumen_penilaian', tarikh_diterima_uhek='$tarikh_diterima_uhek', tarikh_senat='$tarikh_senat', bil_senat='$bil_senat', no_rujukan_mqa='$no_rujukan_mqa', sijil_mqa_bm='$sijil_mqa_bm', sijil_mqa_bi='$sijil_mqa_bi', panel_dalam='$panel_dalam', panel_luar='$panel_luar', status_permohonan='$status_permohonan' WHERE permohonan_id=$permohonan_id";
            
         if (mysqli_query($conn, $sql)) {
            // Query executed successfully
            $message = "Permohonan berjaya dikemaskini";
            echo "<script>alert('$message');</script>";
            echo "<script>window.location.href = 'kemaskinipermohonan.php';</script>";
            exit();
        } else {
            // Query execution failed
            $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "<script>alert('$message');</script>";
            // handle the error condition, such as displaying an error message
        }
        }
        
        // Retrieve the permohonan data from the database based on the permohonan_id
        $permohonan_id = $_GET['permohonan_id'];
        $sql = "SELECT * FROM permohonan WHERE permohonan_id = $permohonan_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        // Display the retrieved data in input fields
        echo '<div class="box">';
        echo '<form method="post" action="edit.php">';
        echo '<input type="hidden" name="permohonan_id" value="' . $row['permohonan_id'] . '">';
        
        echo '<label for="jenis_permohonan">Jenis Permohonan:</label>';
        echo '<input type="text" name="jenis_permohonan" value="' . $row['jenis_permohonan'] . '"><br><br>';
        
        echo '<label for="kampus">Kolej/Fakulti/Kampus:</label>';
        echo '<input type="text" name="kampus" value="' . $row['kampus'] . '"><br><br>';
        
        echo '<label for="alamat_program">Alamat Program:</label>';
        echo '<input type="text" name="alamat_program" value="' . $row['alamat_program'] . '"><br><br>';
        
        echo '<label for="no_fon">Nombor Telefon:</label>';
        echo '<input type="tel" name="no_fon" value="' . $row['no_fon'] . '"><br><br>';
        
        echo '<label for="no_faks">No. Faks:</label>';
        echo '<input type="tel" name="no_faks" value="' . $row['no_faks'] . '"><br><br>';
        
        echo '<label for="emel_rasmi">E-mel:</label>';
        echo '<input type="email" name="emel_rasmi" value="' . $row['emel_rasmi'] . '"><br><br>';
        
        echo '<label for="tarikh_permohonan">Tarikh Permohonan:</label>';
        echo '<input type="date" name="tarikh_permohonan" value="' . $row['tarikh_permohonan'] . '"><br><br>';
        
        echo '<label for="kod_program">Kod Program:</label>';
        echo '<input type="text" name="kod_program" value="' . $row['kod_program'] . '"><br><br>';
        
        echo '<label for="nama_program_bm">Nama Program (BM):</label>';
        echo '<input type="text" name="nama_program_bm" value="' . $row['nama_program_bm'] . '"><br><br>';
        
        echo '<label for="nama_program_bi">Nama Program (BI):</label>';
        echo '<input type="text" name="nama_program_bi" value="' . $row['nama_program_bi'] . '"><br><br>';
        
        echo '<label for="no_bil_jkpt">No. Bilangan JKPT:</label>';
        echo '<input type="text" name="no_bil_jkpt" value="' . $row['no_bil_jkpt'] . '"><br><br>';
        
        echo '<label for="tahap_mqf">Tahap MQF:</label>';
        echo '<input type="text" name="tahap_mqf" value="' . $row['tahap_mqf'] . '"><br><br>';
        
        echo '<label for="bidang_nec">Bidang NEC:</label>';
        echo '<input type="text" name="bidang_nec" value="' . $row['bidang_nec'] . '"><br><br>';
        
        echo '<label for="kod_nec">Kod NEC:</label>';
        echo '<input type="text" name="kod_nec" value="' . $row['kod_nec'] . '"><br><br>';
        
        echo '<label for="tarikh_program_dimulakan">Tarikh Program Dimulakan:</label>';
        echo '<input type="date" name="tarikh_program_dimulakan" value="' . $row['tarikh_program_dimulakan'] . '"><br><br>';
        
        echo '<label for="tarikh_kohort_pertama_bergraduat">Tarikh Kohort Pertama Bergraduat:</label>';
        echo '<input type="date" name="tarikh_kohort_pertama_bergraduat" value="' . $row['tarikh_kohort_pertama_bergraduat'] . '"><br><br>';
        
        echo '<label for="nama_pic">Nama Pegawai:</label>';
        echo '<input type="text" name="nama_pic" value="' . $row['nama_pic'] . '"><br><br>';
        
        echo '<label for="jawatan_pic">Jawatan Pegawai:</label>';
        echo '<input type="text" name="jawatan_pic" value="' . $row['jawatan_pic'] . '"><br><br>';
        
        echo '<label for="no_tel_pejabat_pic">No. Telefon Pejabat:</label>';
        echo '<input type="text" name="no_tel_pejabat_pic" value="' . $row['no_tel_pejabat_pic'] . '"><br><br>';
        
        echo '<label for="no_tel_bimbit_pic">No Telefon Bimbit:</label>';
        echo '<input type="text" name="no_tel_bimbit_pic" value="' . $row['no_tel_bimbit_pic'] . '"><br><br>';
        
        echo '<label for="pautan_dokumen_penilaian">Pautan ke Dokumen Penilaian:</label>';
        echo '<input type="text" name="pautan_dokumen_penilaian" value="' . $row['pautan_dokumen_penilaian'] . '"><br><br>';
        
        echo '<label for="tarikh_diterima_uhek">Tarikh Mesyuarat JKPPP:</label>';
        echo '<input type="text" name="tarikh_diterima_uhek" value="' . $row['tarikh_diterima_uhek'] . '"><br><br>';
        
        echo '<label for="tarikh_senat">Tarikh Mesyuarat Senat:</label>';
        echo '<input type="text" name="tarikh_senat" value="' . $row['tarikh_senat'] . '"><br><br>';
        
        echo '<label for="bil_senat">Nombor Bilangan Mesyuarat Senat:</label>';
        echo '<input type="text" name="bil_senat" value="' . $row['bil_senat'] . '"><br><br>';
        
        echo '<label for="no_rujukan_mqa">Nombor Rujukan MQA:</label>';
        echo '<input type="text" name="no_rujukan_mqa" value="' . $row['no_rujukan_mqa'] . '"><br><br>';

        echo '<label for="panel_dalam">Panel Dalam:</label>';
        echo '<input type="text" name="panel_dalam" value="' . $row['panel_dalam'] . '"><br><br>';
        
        echo '<label for="panel_luar">Panel Luar:</label>';
        echo '<input type="text" name="panel_luar" value="' . $row['panel_luar'] . '"><br><br>';
        
        echo '<div style="display: flex; flex-direction: column; align-items: center;">';
        echo '<div style="display: flex; flex-direction: column; align-items: center; text-align: center;">';
        echo '<label for="sijil_mqa_bm" style="text-align: center;">Salinan Sijil MQA (BM):</label>';
        echo '<a href="' . $row['sijil_mqa_bm'] . '" download class="btn">Muat Turun</a><br><br>';
        
        echo '<label for="sijil_mqa_bi" style="text-align: center;">Salinan Sijil MQA (BI):</label>';
        echo '<a href="' . $row['sijil_mqa_bi'] . '" download class="btn">Muat Turun</a><br><br>';
        echo '</div>';
        
        echo '<label for="status_permohonan" style="text-align: center;">Status:</label>';
        echo '<select name="status_permohonan" style="text-align: center;">';
        echo '<option value="Terima Dokumen" ' . ($row['status_permohonan'] == 'Terima Dokumen' ? 'selected' : '') . '>Terima Dokumen</option>';
        echo '<option value="Lantik Panel" ' . ($row['status_permohonan'] == 'Lantik Panel' ? 'selected' : '') . '>Lantik Panel</option>';
        echo '<option value="Penilaian Pertama" ' . ($row['status_permohonan'] == 'Penilaian Pertama' ? 'selected' : '') . '>Penilaian Pertama</option>';
        echo '<option value="Maklumbalas Pertama" ' . ($row['status_permohonan'] == 'Maklumbalas Pertama' ? 'selected' : '') . '>Maklumbalas Pertama</option>';
        echo '<option value="Penilaian Kedua" ' . ($row['status_permohonan'] == 'Penilaian Kedua' ? 'selected' : '') . '>Penilaian Kedua</option>';
        echo '<option value="Maklumbalas Kedua" ' . ($row['status_permohonan'] == 'Maklumbalas Kedua' ? 'selected' : '') . '>Maklumbalas Kedua</option>';
        echo '<option value="JKPPP" ' . ($row['status_permohonan'] == 'JKPPP' ? 'selected' : '') . '>JKPPP</option>';
        echo '<option value="Senat" ' . ($row['status_permohonan'] == 'Senat' ? 'selected' : '') . '>Senat</option>';
        echo '<option value="Penghantaran ke MQA" ' . ($row['status_permohonan'] == 'Penghantaran ke MQA' ? 'selected' : '') . '>Penghantaran ke MQA</option>';
        echo '<option value="Tersenarai di MQR" ' . ($row['status_permohonan'] == 'Tersenarai di MQR' ? 'selected' : '') . '>Tersenarai di MQR</option>';
        echo '<option value="Selesai" ' . ($row['status_permohonan'] == 'Selesai' ? 'selected' : '') . '>Selesai</option>';
        echo '</select>';
        echo '<br><br>';
        echo '</div>';


     echo '<label for="" hidden></label>';
        echo '<input type="text" name="" value="' . $row[''] . '" hidden readonly><br><br>';

        
        
        // Repeat for all input fields
        
        echo '<input type="submit" name="submit" value="Kemaskini Permohonan">';
        echo '</form>';
        echo '</div>';
        
        
        ?>
        
        <a href="kemaskinipermohonan.php"><button style="position: fixed; bottom: 40px; right: 20px; background-color: #3f51b5;
          color: #fff;
          border: none;
          border-radius: 4px;
          font-size: 20px;
          font-weight: bold;
          padding: 10px 20px;
          cursor: pointer;
          transition: background-color 0.2s;">Kembali</button></a>
          
         
    
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
