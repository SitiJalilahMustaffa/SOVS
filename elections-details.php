<?php
 
include 'controller.php';
if(!isset($_SESSION['admin_id'])){
   session_destroy();
   echo"<script>window.location = 'login.php'</script>";
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title>SB Admin 2 - Tables</title>
 
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
 
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
 
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
</head>
 
<body id="page-top">
 
    <!-- Page Wrapper -->
    <div id="wrapper">
 
        <?php include 'sidebar.php' ?>
 
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
 
            <!-- Main Content -->
            <div id="content">
 
                <?php include 'topbar.php' ?>
 
                <!-- Begin Page Content -->
                <div class="container-fluid">
 
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">ELECTIONS DATA</h1>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                            data-target="#exampleModal">Add Election</button>
                    </div>
 
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    test
                                </div>
                            </div>
                        </div>
 
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            test
                                        </div>
                                    </div>
                                </div>
 
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            test
                                        </div>
                                    </div>
                                </div>
 
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            test
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 
                </div>
                <!-- /.container-fluid -->
 
            </div>
            <!-- End of Main Content -->
 
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Insert Election</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
 
                        <form action="controller.php?mod=addElection" method="post">
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputname">Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputtype">Type</label>
                                        <input type="text" class="form-control" placeholder="Type" name="type">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputdescription">Description</label>
                                    <input type="text" class="form-control" placeholder="Description"
                                        name="description">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputdatestart">Date Start</label>
                                        <input type="date" class="form-control" name="datestart">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputdateend">Date End</label>
                                        <input type="date" class="form-control" name="dateend">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php include 'footer.php' ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
 
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
 
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
 
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
 
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
 
</body>
 
</html>