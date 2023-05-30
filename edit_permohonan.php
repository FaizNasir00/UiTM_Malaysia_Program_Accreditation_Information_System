<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
    <title>Kemaskini Permohonan</title>
    <style>
  body {
    background-color: #f8f8f8;
    font-family: Arial, sans-serif;
    padding: 20px;
  }

  table {
    border-collapse: collapse;
    margin: 0 auto;
    width: 500%;
  }

  th {
    background-color: #4CAF50;
    color: white;
    padding: 20px;
    text-align: center;
  }

  td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
    text-align: center;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    margin-top: 20px;
    padding: 12px 20px;
    text-align: center;
    text-decoration: none;
    width: auto;
  }

  input[type="text"], select {
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    display: inline-block;
    margin-bottom: 10px;
    padding: 12px;
    width: 100%;
  }

  label {
    display: block;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .form-group {
    margin-bottom: 20px;
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

    <script>
      function editRow(permohonan_id) {
    // Get the row data from the server using AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Display the edit form with the row data
            showEditForm(JSON.parse(this.responseText));
        }
    };
    xhttp.open("GET", "get_row_data.php?permohonan_id=" + permohonan_id, true);
    xhttp.send();
  }
  </script>
  
  <script> 
    function showEditForm(rowData) {
    // Create the edit form HTML
    var formHtml = "<form method=\"post\" action=\"update_row.php\">";
    formHtml += "<input type=\"hidden\" name=\"permohonan_id\" value=\"" + rowData.permohonan_id + "\">";
    formHtml += "<label for=\"jenis_permohonan\">Jenis Permohonan:</label>";
    formHtml += "<input type=\"text\" name=\"jenis_permohonan\" value=\"" + rowData.jenis_permohonan + "\">";
    formHtml += "<label for=\"nama_pemohon\">Nama Pemohon:</label>";
    formHtml += "<input type=\"text\" name=\"nama_pemohon\" value=\"" + rowData.nama_pemohon + "\">";
    formHtml += "<label for=\"email\">Email:</label>";
    formHtml += "<input type=\"email\" name=\"email\" value=\"" + rowData.email + "\">";
    formHtml += "<label for=\"no_telepon\">No. Telepon:</label>";
    formHtml += "<input type=\"text\" name=\"no_telepon\" value=\"" + rowData.no_telepon + "\">";
    // Add more form fields for each column in the table

    formHtml += "<input type=\"submit\" value=\"Save\" action=\"update_table.php\">";
    formHtml += "</form>";

    // Display the edit form in a modal dialog
    var modal = document.createElement('div');
    modal.innerHTML = formHtml;
    modal.style.position = 'fixed';
    modal.style.top = '0';
    modal.style.left = '0';
    modal.style.width = '100%';
    modal.style.height = '100%';
    modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
    modal.style.display = 'flex';
    modal.style.justifyContent = 'center';
    modal.style.alignItems = 'center';
    document.body.appendChild(modal);
  }
</script>

</head>
<body>

<form method="get" action="">
    <label for="permohonan_id">Carian permohonan berdasarkan ID:</label>
    <input type="text" name="permohonan_id" id="permohonan_id">
    <input type="submit" value="Cari" name="search"><br><br>
  </form>

<?php
// Database connection
$conn = mysqli_connect("", "", "", "");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Display data if search form is submitted
if (isset($_GET['search'])) {
  $permohonan_id = $_GET['permohonan_id'];
  $sql = "SELECT * FROM permohonan WHERE permohonan_id='$permohonan_id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      // Display table with data
      echo "<table>";
      echo "<tr><th>Permohonan ID</th><th>Jenis Permohonan</th><th>Tarikh Permohonan</th><th>Kampus</th><th>Alamat Program</th><th>No. Fon</th><th>No. Faks</th><th>Emel Rasmi</th><th>Kod Program</th><th>Nama Program (BM)</th><th>Nama Program (BI)</th><th>Tarikh JKPT</th><th>Tahap MQF</th><th>Kod NEC</th><th>Tarikh Program Dimulakan</th><th>Tarikh Kohort Pertama Bergraduat</th><th>Nama PIC</th><th>Jawatan PIC</th><th>No. Tel. Pejabat PIC</th><th>No. Tel. Bimbit PIC</th><th>Pautan Dokumen Penilaian</th><th>Tarikh Diterima UHEK</th><th>Tarikh Senat</th><th>Bil. Senat</th><th>No. Rujukan MQA</th><th>Sijil MQA (BM)</th><th>Sijil MQA (BI)</th><th>Panel Dalam</th><th>Panel Luar</th><th>Status Permohonan</th><th>Edit</th></tr>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<td><input type='text' name='permohonan_id' value='".$row["permohonan_id"]."'></td>";
        echo "<td><input type='text' name='jenis_permohonan' value='".$row["jenis_permohonan"]."'></td>";
        echo "<td><input type='date' name='tarikh_permohonan' value='".$row["tarikh_permohonan"]."'></td>";
        echo "<td><input type='text' name='kampus' value='".$row["kampus"]."'></td>";  
        echo "<td><input type='text' name='alamat_program' value='".$row["alamat_program"]."'></td>";
        echo "<td><input type='text' name='no_fon' value='".$row["no_fon"]."'></td>";
        echo "<td><input type='text' name='no_faks' value='".$row["no_faks"]."'></td>";
        echo "<td><input type='text' name='emel_rasmi' value='".$row["emel_rasmi"]."'></td>";
        echo "<td><input type='text' name='kod_program' value='".$row["kod_program"]."'></td>";
        echo "<td><input type='text' name='nama_program_bm' value='".$row["nama_program_bm"]."'></td>";
        echo "<td><input type='text' name='nama_program_bi' value='".$row["nama_program_bi"]."'></td>";
        echo "<td><input type='text' name='no_bil_jkpt' value='".$row["no_bil_jkpt"]."'></td>";
        echo "<td><input type='text' name='tahap_mqf' value='".$row["tahap_mqf"]."'></td>";
        echo "<td><input type='text' name='kod_nec' value='".$row["kod_nec"]."'></td>";
        echo "<td><input type='date' name='tarikh_program_dimulakan' value='".$row["tarikh_program_dimulakan"]."'></td>";
        echo "<td><input type='date' name='tarikh_kohort_pertama_bergraduat' value='".$row["tarikh_kohort_pertama_bergraduat"]."'></td>";
        echo "<td><input type='text' name='nama_pic' value='".$row["nama_pic"]."'></td>";
        echo "<td><input type='text' name='jawatan_pic' value='".$row["jawatan_pic"]."'></td>";
        echo "<td><input type='text' name='no_tel_pejabat_pic' value='".$row["no_tel_pejabat_pic"]."'></td>";
        echo "<td><input type='text' name='no_tel_bimbit_pic' value='".$row["no_tel_bimbit_pic"]."'></td>";
        echo "<td><input type='text' name='pautan_dokumen_penilaian' value='".$row["pautan_dokumen_penilaian"]."'></td>";
        echo "<td><input type='date' name='tarikh_diterima_uhek' value='".$row["tarikh_diterima_uhek"]."'></td>";
        echo "<td><input type='date' name='tarikh_senat' value='".$row["tarikh_senat"]."'></td>";
        echo "<td><input type='text' name='bil_senat' value='".$row["bil_senat"]."'></td>";
        echo "<td><input type='text' name='no_rujukan_mqa' value='".$row["no_rujukan_mqa"]."'></td>";
        echo "<td><input type='text' name='sijil_mqa_bm' value='".$row["sijil_mqa_bm"]."'></td>";
        echo "<td><input type='text' name='sijil_mqa_bi' value='".$row["sijil_mqa_bi"]."'></td>";
        echo "<td><input type='text' name='panel_dalam' value='".$row["panel_dalam"]."'></td>";
        echo "<td><input type='text' name='panel_luar' value='".$row["panel_luar"]."'></td>";
        echo "<td><input type='text' name='status_permohonan' value='".$row["status_permohonan"]."'></td>";
        echo "<td><button onclick=\"editRow(".$row['permohonan_id'].")\">Update</button></td>";
        echo "</tr>";
        }
        echo "</table><br><br>";
      }
      
    }


// Update data in tables
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
    $tahap_mqf = $_POST['tahap_mqf'];
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

    
    $sql = "UPDATE permohonan SET
        jenis_permohonan='$jenis_permohonan',
        kampus='$kampus',
        tarikh_permohonan='$tarikh_permohonan',
        alamat_program='$alamat_program',
        no_fon='$no_fon',
        no_faks='$no_faks',
        emel_rasmi='$emel_rasmi',
        kod_program='$kod_program',
        nama_program_bm='$nama_program_bm',
        nama_program_bi='$nama_program_bi',
        no_bil_jkpt='$no_bil_jkpt',
        tahap_mqf='$tahap_mqf',
        kod_nec='$kod_nec',
        tarikh_program_dimulakan='$tarikh_program_dimulakan',
        tarikh_kohort_pertama_bergraduat='$tarikh_kohort_pertama_bergraduat',
        nama_pic='$nama_pic',
        jawatan_pic='$jawatan_pic',
        no_tel_pejabat_pic='$no_tel_pejabat_pic',
        no_tel_bimbit_pic='$no_tel_bimbit_pic',
        pautan_dokumen_penilaian='$pautan_dokumen_penilaian',
        tarikh_diterima_uhek='$tarikh_diterima_uhek',
        tarikh_senat='$tarikh_senat',
        bil_senat='$bil_senat',
        no_rujukan_mqa='$no_rujukan_mqa',
        sijil_mqa_bm='$sijil_mqa_bm',
        sijil_mqa_bi='$sijil_mqa_bi',
        panel_dalam='$panel_dalam',
        panel_luar='$panel_luar',
        status_permohonan='$status_permohonan'
        WHERE permohonan_id='$permohonan_id'";
        
 
        
            // Execute the first query
        $result1 = mysqli_query($conn, $sql);
    
        // Update status table
        $sql2 = "UPDATE status SET 
            status_terkini='$status_permohonan' WHERE status.permohonan_id='$permohonan_id'";
            
        // Execute the second query
        $result2 = mysqli_query($conn, $sql2);
        
       if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Permohonan Berjaya Dikemaskini');</script>";
        } else {
        echo "<script>alert('Permohonan TIDAK Berjaya Dikemaskini: " . mysqli_error($conn) . "');</script>";
        }
    }
    
    // Retrieve data from tables
    $sql = "SELECT * FROM permohonan";
    $result = mysqli_query($conn, $sql);
    
    
    ?>
    
    <table>
        <tr>
            <th>Permohonan ID</th>
            <th>Jenis Permohonan</th>
            <th>Tarikh Permohonan</th>
            <th>Kampus</th>
            <th>Alamat Program</th>
            <th>Nombor Telefon</th>
            <th>Nombor Faks</th>
            <th>Emel Rasmi</th>
            <th>Kod Program</th>
            <th>Nama Program (BM)</th>
            <th>Nama Program (Bi)</th>
            <th>No. Bilangan Mesyuarat JKPT</th>
            <th>Tahap MQF</th>
            <th>Kod NEC</th>
            <th>Tarikh Program Dimulakan</th>
            <th>Tarikh Kohort Pertama Bergraduat</th>
            <th>Nama Pegawai</th>
            <th>Jawatan Pegawai</th>
            <th>Nombor Telefon Pejabat Pegawai</th>
            <th>Nombor Telefon Bimbit Pegawai</th>
            <th>Pautan ke Dokumen Penilaian</th>
            <th>Tarikh Diterima UHEK</th>
            <th>Tarikh Mesyuarat Senat</th>
            <th>Nombor Bilangan Mesyuarat</th>
            <th>No. Rujukan MQA</th>
            <th>Salinan Sijil MQA (BM)</th>
            <th>Salinan Sijil MQA (BI)</th>
            <th>Panel Dalam</th>
            <th>Panel Luar</th>
            <th>Status Permohonan</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <td><?php echo $row['permohonan_id']; ?><input type="hidden" name="permohonan_id" value="<?php echo $row['permohonan_id']; ?>"></td>
                    <td><input type="text" name="jenis_permohonan" value="<?php echo $row['jenis_permohonan']; ?>"></td>
                    <td><input type="text" name="tarikh_permohonan" value="<?php echo $row['tarikh_permohonan']; ?>"></td>
                    <td><input type="text" name="kampus" value="<?php echo $row['kampus']; ?>"></td>
                    <td><input type="text" name="alamat_program" value="<?php echo $row['alamat_program']; ?>"></td>
                    <td><input type="text" name="no_fon" value="<?php echo $row['no_fon']; ?>"></td>
                    <td><input type="text" name="no_faks" value="<?php echo $row['no_faks']; ?>"></td>
                    <td><input type="text" name="emel_rasmi" value="<?php echo $row['emel_rasmi']; ?>"></td>
                    <td><input type="text" name="kod_program" value="<?php echo $row['kod_program']; ?>"></td>
                    <td><input type="text" name="nama_program_bm" value="<?php echo $row['nama_program_bm']; ?>"></td>
                    <td><input type="text" name="nama_program_bi" value="<?php echo $row['nama_program_bi']; ?>"></td>
                    <td><input type="text" name="no_bil_jkpt" value="<?php echo $row['no_bil_jkpt']; ?>"></td>
                    <td><input type="text" name="tahap_mqf" value="<?php echo $row['tahap_mqf']; ?>"></td>
                    <td><input type="text" name="kod_nec" value="<?php echo $row['kod_nec']; ?>"></td>
                    <td><input type="date" name="tarikh_program_dimulakan" value="<?php echo $row['tarikh_program_dimulakan']; ?>"></td>
                    <td><input type="date" name="tarikh_kohort_pertama_bergraduat" value="<?php echo $row['tarikh_kohort_pertama_bergraduat']; ?>"></td>
                    <td><input type="text" name="nama_pic" value="<?php echo $row['nama_pic']; ?>"></td>
                    <td><input type="text" name="jawatan_pic" value="<?php echo $row['jawatan_pic']; ?>"></td>
                    <td><input type="text" name="no_tel_pejabat_pic" value="<?php echo $row['no_tel_pejabat_pic']; ?>"></td>
                    <td><input type="text" name="no_tel_bimbit_pic" value="<?php echo $row['no_tel_bimbit_pic']; ?>"></td>
                    <td><input type="text" name="pautan_dokumen_penilaian" value="<?php echo $row['pautan_dokumen_penilaian']; ?>"></td>
                    <td><input type="date" name="tarikh_diterima_uhek" value="<?php echo $row['tarikh_diterima_uhek']; ?>"></td>

                    <td><input type="date" name="tarikh_senat" value="<?php echo $row['tarikh_senat']; ?>"></td>
                    <td><input type="text" name="bil_senat" value="<?php echo $row['bil_senat']; ?>"></td>
                    <td><input type="text" name="no_rujukan_mqa" value="<?php echo $row['no_rujukan_mqa']; ?>"></td>
                    <td><input type="text" name="sijil_mqa_bm" value="<?php echo $row['sijil_mqa_bm']; ?>"></td>
                    <td><input type="text" name="sijil_mqa_bi" value="<?php echo $row['sijil_mqa_bi']; ?>"></td>
                    <td><input type="text" name="panel_dalam" value="<?php echo $row['panel_dalam']; ?>"></td>
                    <td><input type="text" name="panel_luar" value="<?php echo $row['panel_luar']; ?>"></td>
                    <td><input type="text" name="status_permohonan" value="<?php echo $row['status_permohonan']; ?>"></td>
                    <td><input type="submit" name="submit" value="Kemaskini"></td>
            </form>
        </tr>
    <?php } ?>
</table>

<?php mysqli_close($conn); ?>

<a href="kemaskinipermohonan.php"><button style="position: fixed; bottom: 20px; right: 20px;">Back</button></a>
</body>
</html>
