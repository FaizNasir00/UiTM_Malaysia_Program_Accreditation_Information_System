<!DOCTYPE html>
<html>
<head>
    <title>Permohonan Backup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        form {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: #ffffff;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #212529;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 3px;
            font-size: 14px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
            border-radius: 3px;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    // Database connection details
    $servername = "localhost";
    $username = "inqkacom_faiz123";
    $password = "faiznasir123";
    $dbname = "inqkacom_pais";
    
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to generate dropdown options
    function generateDropdownOptions($conn, $table, $valueColumn, $displayColumn)
    {
        $sql = "SELECT DISTINCT $valueColumn, $displayColumn FROM $table";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row[$valueColumn] . "'>" . $row[$displayColumn] . "</option>";
            }
        }
    }
    

    // Function to handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if at least one field is filled
    $isDataFilled = false;
    foreach ($_POST as $value) {
        if (!empty($value)) {
            $isDataFilled = true;
            break;
        }
    }

    if ($isDataFilled) {
        $servername = "";
        $username = "";
        $password = "";
        $dbname = "";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement to insert data into the permohonan table
        $stmt = $conn->prepare("INSERT INTO permohonan (jenis_permohonan, kampus, alamat_program, no_fon, no_faks, emel_rasmi, tarikh_permohonan, kod_program, nama_program_bm, nama_program_bi, no_bil_jkpt, no_ruj_jkpt, tahap_mqf, bidang_nec, kod_nec, tarikh_program_dimulakan, tarikh_kohort_pertama_bergraduat, nama_pic, jawatan_pic, no_tel_pejabat_pic, no_tel_bimbit_pic, pautan_dokumen_penilaian, tarikh_senat, bil_senat, no_rujukan_mqa, panel_dalam1, panel_dalam2, panel_dalam3, panel_dalam4, panel_luar1, panel_luar2, panel_luar3, panel_luar4, institusi_dalam1, institusi_dalam2, institusi_dalam3, institusi_dalam4, institusi_luar1, institusi_luar2, institusi_luar3, institusi_luar4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        

        // Bind the form data to the prepared statement parameters
        $stmt->bind_param("sssssssssssssssssssssssssssssssssssssssss", $jenis_permohonan, $kampus, $alamat_program, $no_fon, $no_faks, $emel_rasmi, $tarikh_permohonan, $kod_program, $nama_program_bm, $nama_program_bi, $no_bil_jkpt, $no_ruj_jkpt, $tahap_mqf, $bidang_nec, $kod_nec, $tarikh_program_dimulakan, $tarikh_kohort_pertama_bergraduat, $nama_pic, $jawatan_pic, $no_tel_pejabat_pic, $no_tel_bimbit_pic, $pautan_dokumen_penilaian, $tarikh_senat, $bil_senat, $no_rujukan_mqa, $panel_dalam1, $panel_dalam2, $panel_dalam3, $panel_dalam4, $panel_luar1, $panel_luar2, $panel_luar3, $panel_luar4, $institusi_dalam1, $institusi_dalam2, $institusi_dalam3, $institusi_dalam4, $institusi_luar1, $institusi_luar2, $institusi_luar3, $institusi_luar4);

        if ($stmt->execute()) {
            echo "Data saved successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Please fill out at least one field.";
    }
}
?>
   
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label>Jenis Permohonan:</label>
    <select name="jenis_permohonan">

    </select>
    <br><br>

    <label>Kampus:</label>
    <select name="kampus">
        <?php generateDropdownOptions($conn, "permohonan", "kampus", "kampus"); ?>
    </select>
    <br><br>

    <label>Alamat Program:</label>
    <select name="alamat_program">
        <?php generateDropdownOptions($conn, "permohonan", "alamat_program", "alamat_program"); ?>
    </select>
    <br><br>

    <label>No. Fon:</label>
    <input type="text" name="no_fon" />
    <br><br>

    <label>No. Faks:</label>
    <input type="text" name="no_faks" />
    <br><br>

    <label>Emel Rasmi:</label>
    <input type="email" name="emel_rasmi" />
    <br><br>

    <label>Tarikh Permohonan:</label>
    <input type="date" name="tarikh_permohonan" />
    <br><br>

    <label>Kod Program:</label>
    <input type="text" name="kod_program" />
    <br><br>

    <label>Nama Program (Bahasa Melayu):</label>
    <input type="text" name="nama_program_bm" />
    <br><br>

    <label>Nama Program (English):</label>
    <input type="text" name="nama_program_bi" />
    <br><br>

    <label>No. Bil JKPT:</label>
    <input type="text" name="no_bil_jkpt" />
    <br><br>

    <label>No. Rujukan JKPT:</label>
    <input type="text" name="no_ruj_jkpt" />
    <br><br>

    <label>Tahap MQF:</label>
    <input type="text" name="tahap_mqf" />
    <br><br>

    <label>Bidang NEC:</label>
    <input type="text" name="bidang_nec" />
    <br><br>

    <label>Kod NEC:</label>
    <input type="text" name="kod_nec" />
    <br><br>

    <label>Tarikh Program Dimulakan:</label>
    <input type="date" name="tarikh_program_dimulakan" />
    <br><br>

    <label>Tarikh Kohort Pertama Bergraduat:</label>
    <input type="date" name="tarikh_kohort_pertama_bergraduat" />
    <br><br>

    <label>Nama PIC:</label>
    <input type="text" name="nama_pic" />
    <br><br>

    <label>Jawatan PIC:</label>
    <input type="text" name="jawatan_pic" />
    <br><br>

    <label>No. Tel Pejabat PIC:</label>
    <input type="text" name="no_tel_pejabat_pic" />
    <br><br>

    <label>No. Tel Bimbit PIC:</label>
    <input type="text"     name="no_tel_bimbit_pic" />
    <br><br>

    <label>Pautan Dokumen Penilaian:</label>
    <input type="text" name="pautan_dokumen_penilaian" />
    <br><br>

    <label>Tarikh Senat:</label>
    <input type="date" name="tarikh_senat" />
    <br><br>

    <label>Bil. Senat:</label>
    <input type="text" name="bil_senat" />
    <br><br>

    <label>No. Rujukan MQA:</label>
    <input type="text" name="no_rujukan_mqa" />
    <br><br>

    <label>Sijil MQA (Bahasa Melayu):</label>
    <input type="file" name="sijil_mqa_bm" />
    <br><br>

    <label>Sijil MQA (English):</label>
    <input type="file" name="sijil_mqa_bi" />
    <br><br>

    <label>Panel Dalam 1:</label>
    <select name="panel_dalam1">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Institusi Dalam 1:</label>
    <select name="institusi_dalam1">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Panel Dalam 2:</label>
    <select name="panel_dalam2">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Institusi Dalam 2:</label>
    <select name="institusi_dalam2">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Panel Dalam 3:</label>
    <select name="panel_dalam3">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Institusi Dalam 3:</label>
    <select name="institusi_dalam3">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Panel Dalam 4:</label>
    <select name="panel_dalam4">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Institusi Dalam 4:</label>
    <select name="institusi_dalam4">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Panel Luar 1:</label>
    <select name="panel_luar1">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    
        <br><br>

    <label>Institusi Luar 1:</label>
    <select name="institusi_luar1">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Panel Luar 2:</label>
    <select name="panel_luar2">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Institusi Luar 2:</label>
    <select name="institusi_luar2">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Panel Luar 3:</label>
    <select name="panel_luar3">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <label>Institusi Luar 4:</label>
    <select name="institusi_luar4">
        <?php generateDropdownOptions($conn, "panel", "nama_panel", "nama_panel"); ?>
    </select>
    <br><br>

    <input type="submit" value="Save">
</form>

</body>
</html>
