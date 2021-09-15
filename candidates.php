<?php

include 'controller.php';
if(!isset($_SESSION['admin_id'])){
   session_destroy();
   echo"<script>window.location = 'login.php'</script>";
}

$controller = new controller();
$conn = $controller->open();

$candidates = $controller->getListData($conn, "SELECT * FROM candidates")
;


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
                    <h1 class="h3 mb-2 text-gray-800">CANDIDATE</h1>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Add Candidate</button>
</div>
                   <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Candidates Data Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Matric Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Matric Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    if($candidates !=null) {
                                        foreach($candidates as $candidate){?>
                                        <tr>
                                            <td><?= $candidate['name'] ?></td>
                                            <td><?= $candidate['unique_id'] ?></td>
                                            <td>
                                            <a href="controller.php?mod=deleteCandidate&id=<?= $student['id'] ?>" onclick="return confirm('Sure ?')" class="btn btn-info btn-sm"><i class="fas fa-trash-alt"></i></a> 
                                            <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>
                                       <?php } } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Candidate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="controller.php?mod=addCandidate" method="post">
      <div class="modal-body">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="text" placeholder="Name" name="name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Matric Number</label>
      <input type="text" class="form-control" id="text" placeholder="Matric Number" name="matricnumber">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">CGPA</label>
    <input type="text" class="form-control" id="text" placeholder="CGPA" name="cgpa">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Image</label>
    <input type="file" class="form-control" placeholder="Image">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Course Code</label>
      <input type="text" class="form-control" id="inputCity" name="coursecode">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Faculty</label>
      <input type="text" class="form-control" id="text" name="faculty">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Semester</label>
      <input type="text" class="form-control" id="text" name="semester">
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