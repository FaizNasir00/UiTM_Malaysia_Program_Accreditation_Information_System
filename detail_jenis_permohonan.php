<?php
// Connect to the database
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the jenis_permohonan value from the URL
$jenis_permohonan = mysqli_real_escape_string($conn, $_GET['jenis_permohonan']);

// Prepare the query to retrieve the details for the selected jenis_permohonan
$sql = "SELECT permohonan_id, jenis_permohonan, kod_program, nama_program_bm, nama_program_bi, alamat_program, tarikh_program_dimulakan, tarikh_kohort_pertama_bergraduat
        FROM permohonan
        WHERE jenis_permohonan = '$jenis_permohonan'
        ORDER BY permohonan_id";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="/img/icon.png">
    <title>Detail Jenis Permohonan <?= $jenis_permohonan ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
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
    
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
            color: cadetblue;
            font-size: 3.5em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            margin-bottom: 100px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 5px;
            
        }

        th {
            background-color: cadetblue;
            color: #ffffff;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <span style="position:fixed;left:5%;top: 7%;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
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
    </div>
      <a href="manage_user.php">User</a>
      <a href="logout.php">Logout</a>
    </div>

    <h1><?= $jenis_permohonan ?></h1>
    
    <table>
    <thead>
        <tr>
            <th>Bil.</th>
            <th>Jenis Permohonan</th>
            <th>Kod Program</th>
            <th>Nama Program (BM)</th>
            <th>Nama Program (BI)</th>
            <th>Alamat</th>
            <th>Tarikh Program Dimulakan</th>
            <th>Tarikh Kohort Pertama Bergraduat</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $bil = 1; // Initialize the bil. (number) counter
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $bil . "</td>"; // Display the bil. (number)
                echo "<td>" . $row["jenis_permohonan"] . "</td>";
                echo "<td>" . $row["kod_program"] . "</td>";
                echo "<td>" . $row["nama_program_bm"] . "</td>";
                echo "<td>" . $row["nama_program_bi"] . "</td>";
                echo "<td>" . $row["alamat_program"] . "</td>";
                echo "<td>" . $row["tarikh_program_dimulakan"] . "</td>";
                echo "<td>" . $row["tarikh_kohort_pertama_bergraduat"] . "</td>";
                echo "<td><a href='edit.php?permohonan_id=" . $row["permohonan_id"] . "' class='btn' style='display: inline-block; padding: 10px 20px; background-color: grey; color: #fff; text-decoration: none; border-radius: 5px;'>Ubah</a></td>";
                echo "</tr>";
                $bil++; // Increment the bil. (number) counter
            }
        } else {
            echo "<tr><td colspan='9'>No records found</td></tr>";
        }

        ?>
    </tbody>
</table>


    <td><button type="button" onclick="window.location.href='penerimaandokumen.php'" style="bottom:5%; position:fixed; right:3%; padding: 10px; font-size: 18px; background-color: cadetblue; color: white; border: none; border-radius: 5px;">Kembali</button></td>
    

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
<script>
    // Add your JavaScript and other body content here
</script>
</body>
</html>
