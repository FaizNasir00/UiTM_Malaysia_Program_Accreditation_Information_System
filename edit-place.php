<?php 

    session_start();
    include 'dbcon.php';

    if( isset($_GET["eid"]) ){
        $edtid = $_GET['eid'];
        $sqlE = "SELECT *  FROM location WHERE location_id = '$edtid'";
        $resultE = mysqli_query($conn, $sqlE);
        $rowE = mysqli_fetch_assoc($resultE);
        
    }else{
        echo "<script>alert('Select one kolej/fakulti/kampus.');</script>";
        echo "<script>window.location.href='places.php';</script>";
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
    <title>Edit Location</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style type="text/css">
       input[type='file']::file-selector-button {
          font-size: 12px;
          transform: translateY(-1px);
       }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">

        <?php include 'component/sidebar.php' ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include 'component/navbar.php' ?>

                <div class="container-fluid">

                    <div class="row">

                        <!-- User Card -->
                        <div class="col-12 col-md-6 mb-4">
                            <div class="card shadow h-100 pb-2">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="text-uppercase mb-0">Update Kolej/Fakulti/Kampus</h6>
                                    <a class="btn btn-sm btn-dark btn-add mb-0 px-4" href="places.php">Back</a>
                                </div>
                                <div class="card-body">
                                  <?php if(isset($_SESSION['msg']) && !empty($_SESSION['msg']) ){ ?>

                                      <div class="alert alert-<?php echo $_SESSION['msg_status'] ?> alert-dismissible fade show" role="alert">
                                        <strong><?php echo $_SESSION['msg'] ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>

                                  <?php $_SESSION['msg'] = ''; $_SESSION['msg_status'] = ''; } ?>
                                  <form action="functions.php" enctype="multipart/form-data" method="post">
                                         
                                        <div class="row">
                                    
                                        
                                            <div class="col-12 col-md-12">

                                                <input type="hidden" class="form-control" id="eid" placeholder="Edit ID" name="eid" value="<?php echo $rowE['location_id'] ?>">
                                                  
                                                <div class="form-group">
                                                    <label for="name">Nama Kolej/Fakulti/Kampus*</label>
                                                    <input type="text" class="form-control" id="name" placeholder="Nama" name="name" value="<?php echo $rowE['location_name'] ?>" required>
                                                </div>

                                            </div>
                                                        
                                          
                                            <div class="col-12 col-md-12">
                                                  
                                                <div class="form-group">
                                                    <label for="address">Address*</label>
                                                    <textarea class="form-control" id="address" placeholder="Address" name="address" required rows="10"><?php echo $rowE['address'] ?></textarea>
                                                </div>

                                            </div>

                                            <div class="col-12 col-md-12">
                                                  
                                                <div class="form-group">
                                                    <label for="number_of_programme">Number Of Programme*</label>
                                                    <input type="number" class="form-control" id="number_of_programme" placeholder="Number Of Programme" name="number_of_programme" required value="<?php echo $rowE['number_of_programme'] ?>">
                                                </div>

                                            </div>
                                        

                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="submit" name="update-location" class="btn  btn-dark">Update</button>
                                        </div>

                              
                                  </form>
                                    

                                </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>

            <?php include 'component/footer.php'; ?>

        </div>

    </div>

    <?php include 'component/modal.php'; ?>
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/admin.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('[data-bs-toggle="tooltip"]').tooltip();

            // $('a[data-target="#collapseMenu"]').parent().addClass('active');
            // if(window.matchMedia('(min-width: 769px)').matches){
            //     $('#collapseMenu').addClass('show');
            // }
            
        });
    </script>
  
</body>

</html>