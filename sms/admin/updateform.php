<?php 
session_start(); //if user is logged in then only show this page
 

    if(isset($_SESSION['uid']))  //if it exits
      {
          echo "";
        }
    else
    {
        header('location: ../login.php'); //one directory back
    } 
?>


<!DOCTYPE HTML>
<html lang="en_US">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="admintitle" align="center">
        <h4><a href="admindash.php" style="float:left; margin-right:30px; color:#fff; font-size:20px;">Back to Dashboard</a></h4>
        <h4><a href="logout.php" style="float:right; margin-right: 30px; color: #fff; font-size:20px;">Logout</a></h4>
        <h1>Welcome to admin dashboard</h1>

    </div>
    <?php
     include('../dbcon.php');
    
    $sid = $_GET['sid'];
    
    $sql="SELECT * FROM `student` WHERE `id` = '$sid'";
    $run=mysqli_query($con,$sql);
    
    $data=mysqli_fetch_assoc($run);
    ?>

    <form method="post" action="updatedata.php" enctype="multipart/form-data">
        <table border="1" align="center" style=" width:70%;  margin-top: 40px;">
            <tr>
                <th>Roll No.</th>
                <td><input type="text" name="rollno" value=<?php echo $data['rollno'] ?> required></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" value=<?php echo $data['name'] ?> required></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input type="text" name="city" value=<?php echo $data['city'] ?> required></td>
                <td>
            </tr>
            <tr>
                <th>Parents contact num</th>
                <td><input type="text" name="pcon" value=<?php echo $data['pcont'] ?> required></td>
            </tr>
            <tr>
                <th>Standard</th>
                <td><input type="number" name="std" value=<?php echo $data['standard'] ?> required></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><input type="file" name="simg" required></td>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                <input type="hidden" name="sid" value="<?php echo $data['id']; ?>" />
                <input type="submit" name="submit" value="Submit"></td>
            </tr>

        </table>
    </form>
