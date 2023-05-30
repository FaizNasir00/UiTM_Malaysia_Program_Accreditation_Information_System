<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="/img/icon.png">
  <title>Kemaskini Status</title>
  <style>
  body {
    background-color: #f8f8f8;
    font-family: Arial, sans-serif;
    padding: 20px;
  }

  table {
    border-collapse: collapse;
    margin: 0 auto;
    width: 100%;
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
      function editRow(status_id) {
    // Get the row data from the server using AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Display the edit form with the row data
            showEditForm(JSON.parse(this.responseText));
        }
    };
    xhttp.open("GET", "get_row_data.php?status_id=" + status_id, true);
    xhttp.send();
  }
  </script>

  <script>
    function showEditForm(rowData) {
    // Create the edit form HTML
    var formHtml = "<form method=\"post\" action=\"update_row.php\">";
    formHtml += "<input type=\"hidden\" name=\"status_id\" value=\"" + rowData.status_id + "\">";
    formHtml += "<label for=\"status_terkini\">Status Terkini:</label>";
    formHtml += "<input type=\"text\" name=\"status_terkini\" value=\"" + rowData.status_terkini + "\">";
    formHtml += "<label for=\"tarikh_terima_dokumen\">Tarikh Terima Dokumen:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_terima_dokumen\" value=\"" + rowData.tarikh_terima_dokumen + "\">";
    formHtml += "<label for=\"tarikh_lantik_panel\">Tarikh Pelantikan Panel:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_lantik_panel\" value=\"" + rowData.tarikh_lantik_panel + "\">";
    formHtml += "<label for=\"tarikh_penilaian_pertama\">Tarikh Penilaian Pertama:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_penilaian_pertama\" value=\"" + rowData.tarikh_penilaian_pertama + "\">";
        formHtml += "<label for=\"tarikh_maklumbalas_pertama\">Tarikh Maklumbalas Pertama:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_maklumbalas_pertama\" value=\"" + rowData.tarikh_maklumbalas_pertama + "\">";
        formHtml += "<label for=\"tarikh_penilaian_kedua\">Tarikh Penilaian Kedua:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_penilaian_kedua\" value=\"" + rowData.tarikh_penilaian_kedua + "\">";
        formHtml += "<label for=\"tarikh_maklumbalas_kedua\">Tarikh Maklumbalas Kedua:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_maklumbalas_kedua\" value=\"" + rowData.tarikh_maklumbalas_kedua + "\">";
        formHtml += "<label for=\"tarikh_jkppp\">Tarikh JKPPP:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_jkppp\" value=\"" + rowData.tarikh_jkppp + "\">";
        formHtml += "<label for=\"tarikh_senat\">Tarikh Senat:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_senat\" value=\"" + rowData.tarikh_senat + "\">";
        formHtml += "<label for=\"tarikh_penghantaran_ke_mqa\">Tarikh Penghantaran ke MQA:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_penghantaran_ke_mqa\" value=\"" + rowData.tarikh_penghantaran_ke_mqa + "\">";
        formHtml += "<label for=\"tarikh_tersenarai_di_mqr\">Tarikh Tersenarai do MQR:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_tersenarai_di_mqr\" value=\"" + rowData.tarikh_tersenarai_di_mqr + "\">";
        formHtml += "<label for=\"tarikh_selesai\">Tarikh Selesai:</label>";
    formHtml += "<input type=\"date\" name=\"tarikh_selesai\" value=\"" + rowData.tarikh_selesai + "\">";
    formHtml += "<input type=\"submit\" value=\"Save\">";
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
    <label for="status_id">Carian melalui Status ID:</label>
    <input type="text" name="status_id" id="status_id">
    <input type="submit" value="Cari" name="search"><br><br>
  </form>

<?php
// Database connection
$conn = mysqli_connect("localhost", "inqkacom_faiz123", "faiznasir123", "inqkacom_pais");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Display data if search form is submitted
if (isset($_GET['search'])) {
  $status_id = $_GET['status_id'];
  $sql = "SELECT * FROM status WHERE status_id='status_id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Display table with data
    echo "<table>";
    echo "<tr><th>Status ID</th><th>Status Terkini</th><th>Tarikh Terima Dokumen</th><th>Tarikh Pelantikan Panel</th><th>Tarikh Penilaian Pertama</th><th>Tindakan</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><input type='text' name='status_id' value='" . $row["status_id"] . "' readonly></td>";
        echo "<td><input type='text' name='nama_fakulti' value='".$row["nama_fakulti"]."'></td>";
        echo "<td><input type='text' name='alamat_fakulti' value='".$row["alamat_fakulti"]."'></td>";
        echo "<td><input type='text' name='no_tel_fakulti' value='".$row["no_tel_fakulti"]."'></td>";
        echo "<td><input type='text' name='no_fax_fakulti' value='".$row["no_fax_fakulti"]."'></td>";
        echo "<td><button onclick=\"editRow(".$row['fakulti_id'].")\">Kemaskini</button></td>";
        echo "</tr>";
    }
    echo "</table><br><br>";
	} else {
    echo "No results found.";
}
}

// Update data in tables
if (isset($_POST['submit'])) {
    $fakulti_id = $_POST['fakulti_id'];
    $nama_fakulti = $_POST['nama_fakulti'];
    $alamat_fakulti = $_POST['alamat_fakulti'];
    $no_tel_fakulti = $_POST['no_tel_fakulti'];
    $no_fax_fakulti = $_POST['no_fax_fakulti'];


    $sql = "UPDATE fakulti SET
        nama_fakulti='$nama_fakulti',
        alamat_fakulti='$alamat_fakulti',
        no_tel_fakulti='$no_tel_fakulti',
        no_fax_fakulti='$no_fax_fakulti'

        WHERE fakulti_id='$fakulti_id'";

       if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Permohonan Berjaya Dikemaskini');</script>";
        } else {
        echo "<script>alert('Permohonan TIDAK Berjaya Dikemaskini: " . mysqli_error($conn) . "');</script>";
        }
    }

    // Retrieve data from tables
    $sql = "SELECT * FROM fakulti";
    $result = mysqli_query($conn, $sql);


    ?>

    <table>
        <tr>
            <th>Fakulti ID</th>
            <th>Nama Fakulti</th>
            <th>Alamat Fakulti</th>
            <th>Nombor Telefon Fakulti</th>
            <th>Nombor Faks Fakulti</th>

            <th>Tindakan</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <td><?php echo $row['fakulti_id']; ?><input type="hidden" name="fakulti_id" value="<?php echo $row['fakulti_id']; ?>"></td>
                    <td><input type="text" name="nama_fakulti" value="<?php echo $row['nama_fakulti']; ?>"></td>
                    <td><input type="text" name="alamat_fakulti" value="<?php echo $row['alamat_fakulti']; ?>"></td>
                    <td><input type="text" name="no_tel_fakulti" value="<?php echo $row['no_tel_fakulti']; ?>"></td>
                    <td><input type="text" name="no_fax_fakulti" value="<?php echo $row['no_fax_fakulti']; ?>"></td>

                    <td><input type="submit" name="submit" value="Kemaskini"></td>
            </form>
        </tr>
    <?php } ?>
</table>

<?php mysqli_close($conn); ?>

<a href="fakultioption.php"><button style="position: fixed; bottom: 20px; right: 20px;">Kembali</button></a>
<a href="edit_fakulti_page(main).php"><button style="position: fixed; bottom: 20px; right: 120px;">Segar Semula</button></a>
</body>
</html>
