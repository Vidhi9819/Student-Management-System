<?php
session_start();
if(isset($_SESSION['uid']))
{
    header('location:admin/admindash.php');
}

?>
<!DOCTYPE HTML>
<html lang = "en_US">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <title>Admin Login</title>
</head>

<body>
    <h3 align="right" style="margin-right:20px;"><a href="index.php" style="color:#fff;">Home</a></h3>
    <h1 align="center">Admin Login</h1>
    
    <div class="bg-img">
    <form action="login.php" method="post" class="container">
        
        <table align="center" cellspacing="20">
            <tr>
                <td>Username</td><br><td><input type="text" name="uname" required</td>
            </tr>
            <tr>
                <td>Password</td><td><input type="password" name="pass" required</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type='submit' name="login" value="login">
                </td>
            </tr>
        </table>
        
    </form>
        </div>
</body>
    
</html>
<?php

include('dbcon.php'); // conn with db

if(isset($_POST['login']))
{
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    
    $qry="SELECT * FROM admin WHERE username='$username' AND password='$password'"; //i made mistake here :(
        
    $run = mysqli_query($con,$qry);
    $row = mysqli_num_rows($run);
    if($row <1)
    {
        ?>
        <script>
            alert('Username or password do not match !!');
            window.open('login.php','_self'); //refresh page
        </script>
<?php
    }
    else
    {
        $data = mysqli_fetch_assoc($run); // query eresult in data
        
        $id=$data['id'];
        
        
        
        $_SESSION['uid']=$id; //id set on session
        
        //for redirecting on admin folder
        header('location:admin/admindash.php');
    }
}




?>