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

    <table align="center">
        <form action="deletestudent.php" method="POST">
            <tr>
                <th>Enter Standard</th>
                <td><input type="number" name="standard" placeholder="Enter standard" required="required" /></td>
                <br>

                <th>Enter Student Name</th>
                <td><input type="text" name="stuname" placeholder="Enter student Name" required="required" /></td>

                <td colspan="2"><input type="submit" name="submit" value="send request"></td>
            </tr>

        </form>
    </table>

    <table align="center" width="80%" border="1" style="margin-top: 10px;">
        <tr style="background-color: #000; color: #fff;">
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Rollno</th>
            <th>Edit</th>
        </tr>


        <?php
    if(isset($_POST['submit']))
    {
        include('../dbcon.php');
        
        $standard = $_POST['standard'];
        $name = $_POST['stuname'];
        echo $standard;
        
        $sql="SELECT * FROM `student` WHERE `standard`='$standard' AND `name` LIKE '%$name%'";
        $run=mysqli_query($con,$sql);
        
        if(mysqli_num_rows($run)<1)
        {
            echo "<tr><td colspan='5'>No records Found</td></tr>";
        }
        //data fetch
        else
        {
            $count=0;
            while($data=mysqli_fetch_assoc($run))
            {
                $count++;
                ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;" /></td>
            <td>
                <?php echo $data['name']; ?>
            </td>
            <td>
                <?php echo $data['rollno']; ?>
            </td>
            <td><a href="deleteform.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
        </tr>
        <?php
            }
        }
        
    }
    
?>

    </table>
</body>

</html>
