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

<style>
.dropbtn {
  background-color: #0000FF;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #0000FF;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #0000FF;}
</style>

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
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Add Election</button>
            </div>

        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>
</div>
                   <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Students Data Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Election Name</th>
                                            <th>Type of Election</th>
                                            <th>Faculty</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Election Name</th>
                                            <th>Type of Election</th>
                                            <th>Faculty</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>PMPP</td>
                                            <td>General</td>
                                            <td>All</td>
                                            <td>12/8/2021</td>
                                            <td>
                                            <button class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-info btn-sm"><i class="fas fa-trash-alt"></i></button> 
                                            <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PMPP</td>
                                            <td>Faculty</td>
                                            <td>FSTM</td>
                                            <td>12/8/2021</td>
                                            <td>
                                            <button class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-info btn-sm"><i class="fas fa-trash-alt"></i></button> 
                                            <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                            </td>
                                      
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

           
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    </div>
            <!-- End of Main Content -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert students' data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="controller.php?mod=addElection" method="post">
      <div class="modal-body">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputname">Name</label>
      <input type="text" class="form-control"  placeholder="Name" name="name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputtype">Type</label>
      <input type="text" class="form-control"  placeholder="Type" name="type">
    </div>
  </div>
  <div class="form-group">
    <label for="inputdescription">Description</label>
    <input type="text" class="form-control"  placeholder="Description" name="description">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputdatestart">Date Start</label>
      <input type="date" class="form-control"  name="datetstart">
    </div>
    <div class="form-group col-md-6">
      <label for="inputdateend">Date End</label>
      <input type="date" class="form-control"  name="dateend">
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