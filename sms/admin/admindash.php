 <?php
session_start();


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
     <div class="admintitle">
         <h4><a href="logout.php" style="float:right; margin-right: 30px; color: #fff; font-size:20px;">Logout</a></h4>
         <h1>Welcome to admin dashboard</h1>
         
     </div>

     <div class="dashboard">
         <table style="width:50%;" align="center">
             <tr>
                 <td>1.</td>
                 <td><a href="addstudent.php">Insert Student Details</a></td>
             </tr>
             <tr>
                 <td>2.</td>
                 <td><a href="updatestudent.php">Update Student Details</a></td>
             </tr>
             <tr>
                 <td>3.</td>
                 <td><a href="deletestudent.php">Delete Student Details</a></td>
             </tr>
         </table>
     </div>
 </body>

 </html>
