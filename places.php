<?php 
    session_start();
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


    $sql = "SELECT * FROM location";
    $result = mysqli_query($conn, $sql);
    $totalR = mysqli_num_rows($result);

    if(isset($_POST['delete'])){

        $id = $_POST['sid'];
    
        $sql = "DELETE FROM location WHERE location_id='$id'";

        if(mysqli_query($conn, $sql)){
            echo "<script>
                    alert('Successfully delete location!');
                    window.location.href= 'places.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed to delete location!');
                    window.location.href= 'places.php';
                  </script>";
        }
        mysqli_close($conn);
    }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="/img/icon.png">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InQKA Query</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/lightbox/dist/css/lightbox.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <div style="background:white;padding:10px;text-align:center"><h1 style="color:cadetblue">Senarai Kolej Pengajian/Fakulti/Kampus</h1></div>
                
                <!-- End of Topbar -->
<br>
                <!-- Begin Page Content -->
                <div class="container-fluid" id="form-table">

                    <!-- Page Heading -->
                    

                    <div class="card">
                        <!-- Sidenav -->
                        <span style="top: 4%;color:black;position:fixed;left:5%;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
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
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h1 class="h3 mb-0 text-gray-800 display-7">Senarai</h1>
                                <a class="btn btn-sm btn-dark btn-add mb-0 px-4" href="new-place.php">Tambah</a>
                            </div>
                            
                        </div>
                        <div class="card-body" style="overflow: auto;">

                                <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Bil.</th>
                                            <th>Nama Lokasi</th>
                                            <th>Alamat</th>
                                            <th>Bilangan Program Tersedia</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>

                                        <?php
                                            
                                            
                                            if($totalR > 0){
                                                $count = 1;
                                                while($rows = mysqli_fetch_assoc($result)){

                                                 


                                            ?>


                                                <tr>   
                                                    <td><?php echo $count; ?>.</td>
                                                    <td><?php echo $rows['location_name']; ?></td>
                                                    <td><?php echo nl2br($rows['address']); ?></td>
                                                    <td><?php echo $rows['number_of_programme']; ?></td>
                                                    
                                                    <td>
                                                        
                                                        
                                                         <div class="d-flex align-items-center">

                                                          
                                                            <a class="btn btn-dark  btnIcon py-2-5 ml-2" href="edit-place.php?eid=<?php echo $rows['location_id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-pen"></i></a>

                                                             <form method="POST" action="places.php" onsubmit="javascript:return confirm('Confirm to delete location info?')">

                                                             <input value="<?php echo $rows['location_id'] ?>" name="sid" type="hidden" />

                                                           
                                                             <button type="submit" name="delete" class="btn btn-danger btnIcon py-2-5 ml-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                                                            </form>

                                                           
                                                        </div>
                                                        

                                                    </td>

                                               
                                                                                    
                                                    <?php $count++; ?>
                                            
                                                </tr>

                                                


                                                <?php } ?>

                                        <?php }else{ ?>



                                        <?php } ?>
                                        
                                    
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Bil.</th>
                                            <th>Nama Lokasi</th>
                                            <th>Alamat</th>
                                            <th>Bilangan Program Tersedia</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </tfoot>
                                </table>
                        </div>
                    </div>

                </div>       
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'component/modal.php' ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/admin.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/lightbox/dist/js/lightbox.min.js"></script>
    <script type="text/javascript">
      
        $(document).ready(function() {
            
            $('#overlay').fadeIn();
            $('[data-bs-toggle="tooltip"]').tooltip();
            $('#tableData tfoot th').each(function () {
                var title = $(this).text();
                if(title == 'Action'){
                     $(this).html('-');
                }else{
                     $(this).html('<input class="form-control form-control-sm" type="text" placeholder="Cari ' + title + '" />');
                }
            });
         
            // DataTable
            var table = $('#tableData').DataTable({
                initComplete: function () {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function () {
                            var that = this;
         
                            $('input', this.footer()).on('keyup change clear', function () {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
            });
            $('a[href="places.php"]').addClass('active');
            $('a[data-target="#collapseMenuP"]').parent().addClass('active');
            if(window.matchMedia('(min-width: 769px)').matches){
                $('#collapseMenuP').addClass('show');
            }

            window.setTimeout(function(){

                $('#overlay').fadeOut();

            }, 500);
            
        });

      
    </script>
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
