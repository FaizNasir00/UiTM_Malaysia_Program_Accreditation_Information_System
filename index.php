<?php
  // Start a session
  session_start();

  // Redirect user to login page if not logged in
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    header("Location: ./login.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/icon.png">
    <title>UiTM Malaysia Program Accreditation Information System</title>
    <link rel="stylesheet" href="./css/index2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script>
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
      document.querySelector("footer").classList.add("hide");
    } else {
      document.querySelector("footer").classList.remove("hide");
    }
      }
    </script>
    
    
  </head>
  <body>
      
   <div class="loader" id="loader"></div>

    <div class="content" id="content">
     <header id="header">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      <img src="./img/logo.png" alt="UiTM Logo">
      <h1>PROGRAM ACCREDITATION INFORMATION SYSTEM</h1>
    </header>
    <br><br><br>
    
    <main id="main">
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
        
        
        <br><br>
        
        <div class="user-manual">
        <h2>Manual Pengguna untuk Sistem Maklumat Akreditasi Program (PAIS)</h2>
        
        <br>
        
        <h3>Pengenalan</h3>
        <p>Manual pengguna ini menyediakan panduan komprehensif tentang cara menggunakan Sistem Maklumat Akreditasi Program (PAIS). Sistem ini bertujuan untuk menyederhanakan dan mempercepatkan proses akreditasi program bagi universiti. Manual ini akan membawa anda melalui pelbagai ciri sistem dan menyediakan arahan yang jelas tentang cara menggunakannya.</p>
        
        <br> 
        
        <h3>1. Log Masuk</h3>
        <p>Untuk mengakses PAIS, layari halaman log masuk dan masukkan maklumat anda. Jika anda tidak mempunyai akaun, hubungi pentadbir sistem untuk membuat satu untuk anda. Jika anda sudah log masuk, sistem akan mengarahkan anda ke laman utama.</p>
        <br>
        <h3>2. Laman Utama</h3>
        <p>Laman utama memaparkan gambaran umum tentang ciri-ciri sistem. Ia termasuk menu navigasi yang boleh diakses dengan mengklik ikon "tiga garisan mendatar kecil" di sudut kiri atas halaman. Menu ini membolehkan anda melayari ke bahagian yang berbeza dalam sistem.</p>
        
        <br>
        
        <h3>3. Menu Navigasi</h3>
        <p>Menu navigasi mengandungi bahagian-bahagian berikut:</p>
        <ul>
          <li>Home - Mengembalikan anda ke laman utama.</li>
          <li>Permohonan - Menyediakan pilihan untuk menguruskan permohonan akreditasi.</li>
          <li>Panel - Membolehkan anda menguruskan panel dalaman dan luaran.</li>
          <li>Fakulti - Menyediakan pilihan untuk menguruskan fakulti.</li>
          <li>Laporan - Membolehkan anda menjana dan melihat pelbagai laporan.</li>
          <li>User - Membolehkan anda menguruskan akaun pengguna.</li>
          <li>Logout - Log keluar dari sistem.</li>
        </ul><br>
        
        <h3>4.Permohonan</h3>
        <p>Bahagian ini membolehkan anda membuat permohonan akreditasi baru dan mengemas kini yang sedia ada. Untuk membuat permohonan baru, klik pada "Permohonan Baru." Untuk mengemas kini permohonan yang sedia ada, klik pada "Kemaskini Permohonan."</p>
        
        <br>
        
        <h3>5. Panel</h3>
       <p>Bahagian ini membolehkan anda menguruskan panel dalaman dan luaran. Anda boleh melihat senarai panel dalaman dengan mengklik "Panel Dalam" dan senarai panel luaran dengan mengklik "Panel Luar." Untuk mengemas kini maklumat panel, klik pada "Kemaskini Panel."</p>
       <br>
        <h3>6. Fakulti</h3>
        <p>Bahagian ini membolehkan anda menguruskan fakulti. Untuk membuat fakulti baru, klik pada "Fakulti Baru." Untuk mengemas kini maklumat fakulti, klik pada "Kemaskini Fakulti."</p>
        <br>
        <h3>7. Laporan</h3>
        <p>Bahagian ini membolehkan anda menjana dan melihat pelbagai laporan yang berkaitan dengan permohonan akreditasi, penilai panel, dan status program. Klik pada laporan yang diingini untuk melihatnya.</p>
        <br>
        <h3>8. Pengurusan Pengguna</h3>
        <p>Bahagian ini membolehkan anda menguruskan akaun pengguna. Anda boleh memeriksa atau memadam akaun pengguna mengikut keperluan semasa.</p>
        <br>
        <h3>9. Log Keluar</h3>
        <p>Untuk log keluar dari sistem, klik pada "Logout" di menu navigasi.</p><br>
        <h3>10. Video Bantuan</h3>
        <p>Satu video tutorial disediakan di laman utama untuk membantu pengguna memahami cara menggunakan sistem. Klik icon 'kucing' di tepi skrin sekali untuk menonton video dan klik sekali lagi semula untuk menutup kembali video manual tersebut.</p>
        <br>
        <h3>* Sokongan</h3>
        <p>Jika anda memerlukan bantuan atau menghadapi sebarang masalah semasa menggunakan PAIS, sila hubungi pentadbir sistem untuk sokongan.</p>
        </div>
        
    
        <div class="video-icon" onclick="toggleVideo()">
          <img src="img/cat.jpg" alt="Cute Icon">
          <p>Video Manual Website? Klik sini untuk video</p>
        </div>
        
        <div id="video-container">
          <video id="video" src="video/test1.mp4" controls></video>
        </div>
        
        <script>
          function toggleVideo() {
            var videoContainer = document.getElementById("video-container");
            var video = document.getElementById("video");
        
            if (videoContainer.style.display === "none") {
              videoContainer.style.display = "block";
              video.play();
            } else {
              videoContainer.style.display = "none";
              video.pause();
            }
          }
        </script>
                
        <br><br><Br><br><br><Br><Br>
        <footer>
        <p>&copy; InQKA UiTM Shah Alam. All Rights Reserved.</p><br>
        <p>Developed by Muhammad Faiz bin Nasir (2021172523) & Iskandar Zulkarnain bin Yusof (2021119895)</p>
        </footer>
    </main>
  </div>
   
    
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
    // Show the loader
    document.getElementById("loader").style.display = "block";

    // Hide the loader and show the content after 3 seconds
    setTimeout(function() {
      document.getElementById("loader").style.display = "none";
      document.getElementById("content").classList.add("fade-in");
      document.getElementById("content").style.display = "block";
    }, 2000);
  </script>
  

  </body>
</html>

