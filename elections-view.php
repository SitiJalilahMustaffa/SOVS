<?php
 
include 'controller.php';
if(!isset($_SESSION['admin_id'])){
   session_destroy();
   echo"<script>window.location = 'login.php'</script>";
}
 
$controller = new controller();
$conn = $controller->open();

$elections = $controller->getListData($conn, "SELECT * FROM elections")
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
                        <h1 class="h3 mb-2 text-gray-800">ELECTIONS DATA</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <!-- DataTales Example -->
                    
                                         
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Number of students has voted</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-check-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                    
                        </div>
                        </div>
                        <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Number of students did not vote</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-times-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                    
                        </div>
                        </div>

                        <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Election on going
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Pilihanraya Majlis Perwakilan Pelajar</div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                    
                        </div>
                        </div>

                        <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                End date countdown</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18 Days</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-stopwatch fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                    
                        </div>
                        </div>
                        

                        
                        

                        
 
                </div>

                <div class="row">
                        <div class="col-md-7 ">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="h5 mb-2 text-gray-800">Candidates Data Table</h6>
                           <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Add Candidate</button>
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
                                    <?php
                                    if($elections !=null) {
                                        foreach($elections as $election){?>
                                        <tr>
                                            <td><?= $election['name'] ?></td>
                                            <td><?= $election['type'] ?></td>
                                            <td><?= $election['description'] ?></td>
                                            <td><?= $election['dateend'] ?></td>
                                          
                                            <td>
                                            <a href="elections-details.php?id=<?= $election['id'] ?>" onclick="return confirm('Sure ?')" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="controller.php?mod=deleteElection&id=<?= $election['id'] ?>" onclick="return confirm('Sure ?')" class="btn btn-info btn-sm"><i class="fas fa-trash-alt"></i></a> 
                                            <a href="elections-view.php?id=<?= $election['id'] ?>" onclick="return confirm('Sure ?')" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        </td>
                                        </tr>
                                       <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>

                        <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Voting Result</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                               </div>

                        
                    </div>

                </div>
                <!-- /.container-fluid -->


               

                   
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