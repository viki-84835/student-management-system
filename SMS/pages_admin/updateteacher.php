<!-- All the fields should be autopouplate including the checkboxes and select from database-->
<!DOCTYPE html>
<?php 
include("header.php");
require_once '../db_connect.php';
$id = $_GET["id"];
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Update Student Records</title>
        <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../images/favicon.png" />
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
                                                <h2 style="float:left">Update Student - <?php echo $id; ?></h2>				
                                            </div>
                                            <form class="forms-sample" method="post">
                                                <?php
                                                $namesql = 'SELECT * FROM teacher WHERE TeacherID="'.$id. '"'; 
                                                $result = $conn->query($namesql); 
                                                while($row = $result->fetch_assoc()) {
                                                    $firstName = $row['firstName'];
                                                    $lastName = $row['lastName'];
                                                    $gender = $row['gender'];
                                                    $subjectID = $row['subjectID'];
                                                }
                                                ?>

                                                <div class="form-group">
                                                    <br/>
                                                    <label for="studentFirstName">Teacher First Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="studentFirstName" id="studentFirstName" value="<?php echo $firstName; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="studentLastName">Teacher Last Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="studentLastName" id="studentLastName" value="<?php echo $lastName; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="studentGender">
                                                        <?php
                                                        $arr = array('Male','Female');
                                                        foreach($arr as $value){
                                                            if($gender == $value)
                                                                echo '<option value="'.$value.'" selected>'.$value.'</option>';
                                                            else
                                                                echo '<option value="'.$value.'">'.$value.'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>	
                                                <div class="form-group">
                                                    <label>Subject Name</label>
                                                    <select class="form-control" name="className">
                                                        <?php
                                                          $cityQuery = "select *from subject";
                                                          $rsCity = mysqli_query($conn,$cityQuery);
                                                          while($rowCity =$rsCity->fetch_assoc())
                                                          {
                                                          ?>
                                                        <option value="<?php echo $rowCity['subjectID']?>" <?php if($subjectID ==$rowCity['subjectID']) echo "selected"; ?>> <?php echo $rowCity['subjectName']?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>		
                                                <br/>												
                                                <button type="submit" class="btn btn-dark mr-2" name="update">Update</button>
                                                <button class="btn btn-light" name="Delete">Delete</button>	
                                                <?php 
                                                if (isset($_POST['update'])){ 
                                                    $studentFirstName = trim($_POST['studentFirstName']);
                                                    $studentLastName = trim($_POST['studentLastName']);
                                                    $studentGender = trim($_POST['studentGender']);
                                                    $className = trim($_POST['className']);
                                                        $sql = 'UPDATE teacher SET
                                                                firstName = "'.$studentFirstName.'",
                                                                lastName = "'.$studentLastName.'",
                                                                gender = "'.$studentGender.'",
                                                                subjectID = "'.$className.'"
                                                                WHERE teacherID ="'.$id.'";';

                                                        if ($result = $conn->query($sql)) {
                                                            $scMSG = "Updated successfully";
                                                            echo "<script> alert('Student ".$studentFirstName." ".$studentLastName." Record Updated Successfully!'); location.href='teacherViwe.php'; </script>";
                                                        } 
                                                        else {
                                                            $errMSG = mysqli_error($conn);
                                                        }
                                                }

                                                if (isset($_POST['Delete'])){
                                                    $namesql = 'SELECT * FROM teacher WHERE TeacherID="'.$id. '"'; 
                                                    $result = $conn->query($namesql);$row = $result->fetch_assoc();
                                                        $firstName = $row['firstName'];
                                                        $lastName = $row['lastName'];
                                                        $username=$row['username'];

                                                    $dsql = 'DELETE FROM teacher WHERE teacherID = "'.$id. '"';
                                                    $dsql2 = 'DELETE FROM users WHERE Username = "'.$username.'"'; 
                                                    if ($result = $conn->query($dsql) && $result = $conn->query($dsql2)) {
                                                        $scMSG = "Deleted successfully";
                                                        echo "<script> alert('Student ".$firstName." ".$lastName." Record Deleted Successfully!'); location.href='teacherViwe.php'; </script>";
                                                    } 
                                                    else {
                                                        $errMSG = mysqli_error($conn);
                                                    }	
                                                }
                                                echo '<br/><br/>';

                                                if (isset($errMSG)) {
                                                ?>
                                                <div class="form-group">
                                                    <div class="alert alert-danger alert-icon-left alert-arrow-left alert-info mb-2" role="alert">
                                                        <span class="alert-icon"><i class="fas fa-info"></i></span> <?php echo $errMSG; ?>
                                                    </div>
                                                </div>
                                                <?php
                                                }

                                                if (isset($scMSG)) {

                                                ?>
                                                <div class="form-group">
                                                    <div class="alert alert-success alert-icon-left alert-arrow-left alert-info mb-2" role="alert">
                                                        <span class="alert-icon"><i class="fas fa-info"></i></span> <?php echo $scMSG; ?>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                ?>
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
        <script src="../vendors/js/vendor.bundle.base.js"></script>
        <script src="../vendors/js/vendor.bundle.addons.js"></script>
        <script src="../js/off-canvas.js"></script>
        <script src="../js/misc.js"></script>
    </body>
</html>