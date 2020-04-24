<!DOCTYPE html>
<?php 
include("header.php");
require_once '../db_connect.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Add Student</title>
        <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
        <link rel="stylesheet" href="../vendors/icheck/skins/all.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../images/favicon.png" />
        <?php
        if(isset($_POST['insert'])){
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            else{
                $studentFirstName=isset($_POST['studentFirstName'])?$_POST['studentFirstName']:null;
                $studentLastName=isset($_POST['studentLastName'])?$_POST['studentLastName']:null;
                $studentGender=isset($_POST['studentGender'])?$_POST['studentGender']:null;
                 $Email=isset($_POST['Email'])?$_POST['Email']:null;
                 $Mobile=isset($_POST['Mobile'])?$_POST['Mobile']:null;
                 $Dob=isset($_POST['Dob'])?$_POST['Dob']:null;
                 $City=isset($_POST['City'])?$_POST['City']:null;
                 $Rollno=isset($_POST['rno'])?$_POST['rno']:null;
                 $uname=isset($_POST['uname'])?$_POST['uname']:null;
                 $pass=(isset($_POST['pass'])?$_POST['pass']:null);
                 $pass = password_hash($pass, PASSWORD_DEFAULT); 

                $sql = "INSERT INTO teacher (firstName, lastName, gender, Email, Mobile, Dob, City,subjectID,username) VALUES ('$studentFirstName', '$studentLastName', '$studentGender', '$Email', '$Mobile', '$Dob', '$City','$Rollno','$uname');";
                $sql2 = "INSERT INTO users (Username,Password,Role) VALUES ('$uname','$pass','Teacher');";
                if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) ) {
                    echo "<script> alert('".$studentFirstName." ".$studentLastName." Student Added Successfully!'); location.href='teacherviwe.php'; </script>";
                }
                else {
                    echo "error ";
                }	
            }
        }
        if(isset($_POST['cancel'])){
            header('Location:teacherviwe.php');				
        }
        ?>
    </head>

    <body>
        <div class="container-scroller">
            <?php 
            include("nav.php"); 
            ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-stretch grid-margin">
                            <div class="row flex-grow">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="page-header clearfix">
                                                <h2 style="float:left">Add Teacher</h2>				
                                            </div>
                                            <form class="forms-sample" method="post">
                                                <div class="form-group">
                                                    <br/>
                                                    <label for="studentFirstName">Teacher First Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="studentFirstName" id="studentFirstName" required>
                                                </div>
                                                <div class="form-group">
                                                    <br/>
                                                    <label for="studentLastName">Teacher Last Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="studentLastName" id="studentLastName" required>
                                                </div>
                                                <div class="form-group">
                                                    <br/>
                                                    <label>Gender</label>
                                                    <select class="form-control" name="studentGender" required>
                                                        <option value="" selected disabled hidden>Select One</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <br/>
                                                    <label for="Email">Email</label>
                                                    <input type="text" class="form-control" placeholder="" name="Email"  required>
                                                </div>
                                                <div class="form-group">
                                                    <br/>
                                                    <label for="Mobile">Mobile</label>
                                                    <input type="int" class="form-control" placeholder="" name="Mobile"  required>
                                                </div>
                                                <div class="form-group">
                                                    <br/>
                                                    <label for="Dob">Dob</label>
                                                    <input type="Date" class="form-control" placeholder="" name="Dob"  required>
                                                </div>
                                                <div class="form-group">
                                                    <br/>
                                                    <label for="City">City</label>
                                                    <input type="text" class="form-control" placeholder="" name="City"  required>
                                                </div>
                                                <div class="form-group">
                                                    <br/>
                                                    <label>Subject</label>
                                                    <select class="form-control" name="rno" required>
                                                        <option value="" selected disabled hidden>Select One</option>   
                                                        <?php 
                                                            $sql = mysqli_query($conn,"SELECT * FROM `subject` WHERE 1"); 
                                                            while ($row = $sql->fetch_assoc()){
                                                            echo "<option value=\"". $row['subjectID'] ."\">" . $row['subjectName'] . "</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <br/>
                                                    <label for="Username">Username</label>
                                                    <input type="text" class="form-control" placeholder="" name="uname"  required>
                                                </div>
                                                <div class="form-group">
                                                    <br/>
                                                    <label for="Password">Password</label>
                                                    <input type="password" placeholder="*********" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"class="form-control" required>
                                                </div>
                                                <br/>
                                                <button type="submit" class="btn btn-dark mr-2" name="insert">Submit</button>
                                                <input type="button" class="btn btn-light" name="cancel" value="Cancel" onclick="window.location.href='teacherviwe.php'"/>
                                            </form>
                                        </div>
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
        </div>
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <script src="../vendors/js/vendor.bundle.addons.js"></script>
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    </body>

</html>