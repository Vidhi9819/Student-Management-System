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
    
<form method="post" action="addstudent.php" enctype="multipart/form-data" name="myform" onsubmit="return validateForm()">
    <table border="1" align="center" style=" width:70%;  margin-top: 40px;">
        <tr>
            <th>Roll No.</th>
            <td><input type="text" name="rollno" placeholder="Enter roll no" required></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><input type="text" name="name" placeholder="Enter name" required></td>
        </tr>
        <tr>
            <th>City</th>
            <td><input type="text" name="city" placeholder="Enter city" required></td><td>
        </tr>
        <tr>
            <th>Parents contact num</th>
            <td><input type="text" name="pcon" placeholder="Enter parent contact num" id="pcon" required></td>
        </tr>
        <tr>
            <th>Standard</th>
            <td><input type="number" name="std" placeholder="Enter standard" required></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><input type="file" name="simg" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
        </tr>
        
    </table>

</form> 
    </body>
    
    <script>
    function validateForm()
        {
         var x=document.forms["myform"]["pcon"].value;
            
         if(x.length!=10){
             alert("not valid");
             return false;
         }
    </script>
</html>

<?php
   if(isset($_POST['submit']))
   {
       include('../dbcon.php');
       $rollno= $_POST['rollno'];
       $name =$_POST['name'];
       $city=$_POST['city'];
       $pcon=$_POST['pcon'];
       $std=$_POST['std'];
       $imagename = $_FILES['simg']['name'];
       $tempname = $_FILES['simg']['tmp_name'];
           
           
        move_uploaded_file($tempname,"../dataimg/$imagename");
       $qry="INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`,`image`) VALUES ('$rollno','$name','$city','$pcon','$std','$tempname')";
       
       $run= mysqli_query($con,$qry);
       
       if($run == true)
       {
           ?>
   <script>
       alert('Data inserted successfully');
</script>

    <?php
       }
   }

    