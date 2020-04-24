<!DOCTYPE html>
<?php 
include("header.php");
require_once '../db_connect.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Student Records</title>
        <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../images/favicon.png" />
        <style>
            .icon{
                color: #e24826;
            }
            .icon:hover{
                color: #d3323a;
            }
        </style>
    </head>
    <body>
        <div class="container-scroller">
            <?php 
            include("nav.php"); 
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">	
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="page-header clearfix">
                                        <h2 style="float:left">Student Details</h2>
                                    </div>
                                    <?php 
                                    $sql = "SELECT * FROM student where studentId=".$_SESSION['id'];
                                    $result = $conn->query($sql); 
                                    $rownum = $result->num_rows;?>
                                    <?php                               
                                            $row = $result->fetch_assoc();
                                            $class_name_sql = "SELECT className FROM class WHERE classID='".$row['classID']."';";
                                            $class_name = $conn->query($class_name_sql);
                                            $class_name_row = $class_name->fetch_assoc();
                                    ?>
                                    <br/>
                                    <div class="table-responsive">
                                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                                            <thead>
                                                <tr>
                                                    <td class="border-top-0">Student ID</td>
                                                    <td class="border-top-0">:</td>
                                                    <td class="border-top-0"><?php echo $row['studentID']?></td>
                                                </tr>
                                                <tr>
                                                    <td >Student Name</td>
                                                    <td >:</td>
                                                    <td ><?php echo $row['firstName'].$row['lastName']?></td>
                                                </tr>
                                                <tr>
                                                    <td >Gender</td>
                                                    <td >:</td>
                                                    <td ><?php echo $row['gender']?></td>
                                                </tr>
                                                <tr>
                                                    <td >Class</td>
                                                    <td >:</td>
                                                    <td ><?php echo $class_name_row['className']?></td>
                                                </tr>
                                                <tr>
                                                    <td >Email</td>
                                                    <td >:</td>
                                                    <td ><?php echo $row['Email']?></td>
                                                </tr>
                                                <tr>
                                                    <td >Mobile No.</td>
                                                    <td >:</td>
                                                    <td ><?php echo $row['Mobile']?></td>
                                                </tr>
                                                <tr>
                                                    <td >Date Of Birth</td>
                                                    <td >:</td>
                                                    <td ><?php echo $row['Dob']?></td>
                                                </tr>
                                                <tr>
                                                    <td >City</td>
                                                    <td >:</td>
                                                    <td ><?php echo $row['City']?></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                include("../footer.php"); 
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
        <script src="../vendors/js/vendor.bundle.base.js"></script>
        <script src="../vendors/js/vendor.bundle.addons.js"></script>
        <script src="../js/off-canvas.js"></script>
        <script src="../js/misc.js"></script>
    </body>
</html>