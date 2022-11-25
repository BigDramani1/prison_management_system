<?php

require_once '../controllers/employeeController.php';

//creating an instance of Visitor 
$employeeObj = new Employee();

//creating an instance of db connection
$db = new DB_connection();


$sql = "SELECT SUM(salary) as 'Total'
FROM Employees";


$countEm = "SELECT * FROM Employees";

$countSalary = $db->connect()->query($sql);

$countEmp = $db->connect()->query($countEm);

//passing the array of result from the select of employees
$employees = $employeeObj->Display_All_Employees();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GPMS</title>
    <link rel="icon" href="../assets/images/imageedit_28_3939584200.png" type="image/png">
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <img src="../assets/images/GPMS_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        <a class="navbar-brand" href="index.html">GPMS</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
         <!-- Navbar Search-->
         <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <img src='../assets/images/255px-Flag_of_Ghana.svg.png' width="40" height="30" class="d-inline-block align-top" alt="">
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="./password.php">Reset Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../Dashboard.php?logout">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../Dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Administration
                            <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                        </a>
                        <div>
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="prisoner.php">Inmates</a>
                                <a class="nav-link" href="employee.php">Employees</a>
                                <a class="nav-link" href="visitor.php">Visitors</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: <?php echo $_SESSION['admin_email']; ?></div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Employees</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total No. of Employees</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><p ><?php if(mysqli_num_rows($countEmp) !== null){
                                        $number = mysqli_num_rows($countEmp);
                                        echo "<p style='text-align:center'><b>".$number."</b></p>";
                                    }else{
                                        echo 0;
                                    }   
                                    ?></p></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl ">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Salary (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <p><?php if (isset(
                                                        $countSalary
                                                    )) {
                                                        $num = $countSalary->fetch_assoc();
                                                        echo "<p><b>
                                                        <span>&#8373;</span>". $num['Total']. "</b></p>";
                                                    } else {
                                                        echo 0;
                                                    }
                                                    ?></p>
                                            </div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <span>&#8373;</span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Employee's Gender
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                    <!-- </div> -->
                    <!-- </div> -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Employees

                            <button class="btn btn-primary" id='addEmployee' style="float:right; margin-right:auto" onclick="document.location='./forms/employeeForm.php'"><i class="fas fa-user-plus"></i> Add</button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-toggle="table" data-show-toggle="true" data-toolbar="#toolbar" data-show-fullscreen="true" data-pagination-pre-text="Previous">

                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Salary</th>
                                            <th>Job</th>
                                            <th>SSN</th>
                                            <th>Prison</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Salary</th>
                                            <th>Job</th>
                                            <th>SSN</th>
                                            <th>Prison</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        
                                        if(is_array(($employees))):  
                                        foreach ($employees as $employee) {
                                        ?><?php
                                            $id = $employee['Employee_ID'];
                                            echo '
                                                <tr>
                                                    <td>' . $employee['Employee_fname'] . '</td>
                                                    <td>' . $employee['Employee_lname'] . '</td>
                                                    <td><span>&#8373;</span>' . $employee['salary'] . '</td>
                                                    <td>' . $employee['Job'] . '</td>
                                                    <td>' . $employee['SSN'] . '</td>
                                                    <td>' . $employee['Prison_name'] . '</td>
                                                    <td>' . '<a class="btn btn-primary" href="./viewEmployee.php?id=' . $employee['Employee_ID'] . '" role="button"><i class="fas fa-eye"></i></a> <a class="btn btn-success" href="../actions/updateEmployee.php?id=' . $employee['Employee_ID'] . '" role="button"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" id="btn-del" href="../actions/deleteEmployee.php?id=' . $employee['Employee_ID'] . '" role="button"><i class="fas fa-trash-alt"></i></a>' . '</td>
                                                </tr>
                                              
                                                ';

                                            ?><?php }  endif;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Eugene Daniels 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Creating and showing a flash message or alert if any -->
    <?php if (isset($_GET['message'])) : ?>
        <div class='flash-data' data-flashdata="<? $_GET['message'];?>"></div>
    <?php endif; ?>
    <?php if (isset($_GET['edit'])) : ?>
        <div class='flash-edit' data-flashedit="<? $_GET['edit'];?>"></div>
    <?php endif; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" crossorigin="anonymous"></script>
    <script src="
https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" crossorigin="anonymous"></script>
    <script src="

https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous"></script>
    <script src="
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>



    <script>
        $(document).ready(function() {
            showGraph1();
        });

        // A function to display the graph of different employee gender and their numbers 
        function showGraph1() {
            {
                $.post("../sql/employee_data.php",
                    function(data) {
                        console.log(data);
                        var sex = [];
                        var count = [];

                        for (var i in data) {
                            sex.push(data[i].sex);
                            count.push(data[i].count);
                        }

                        var chartdata = {
                            labels: sex,
                            datasets: [{
                                label: 'Employees Gender',
                                backgroundColor: ['#0d47a1', '#FF8800'],
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#3E4551',
                                hoverBorderColor: '#666666',
                                data: count
                            }]
                        };

                        var graphTarget = $("#myBarChart");

                        var barGraph = new Chart(graphTarget, {
                            type: 'bar',
                            data: chartdata,
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            stepSize: 1
                                        }
                                    }]
                                }
                            }
                        });
                    });
            }
        }

        // checking if the delete button is clicked and display a message 
        $(".btn-danger").on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }

            })
        })
        // creating a display message on delete success
        const flashdata = $('.flash-data').data('flashdata');

        if (flashdata) {
            Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Record Deleted',
                text: 'Employee record deleted!',

            }).then(function() {
                window.location.href = 'employee.php';
            });
        }
        // creating a display message on update success
        const flashedit = $('.flash-edit').data('flashedit');

        if (flashedit) {
            Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Record updated',
                text: 'Employee record updated!',

            }).then(function() {
                window.location.href = 'employee.php'; // redirecting admin to employee page
            });
        }
    </script>
</body>

</html>