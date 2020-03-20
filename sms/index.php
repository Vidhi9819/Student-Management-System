<!DOCTYPE HTML>
<html lang = "en_US">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <h3 align="right" style="margin-right:20px;"><a href="login.php">Admin Login</a></h3> 
    <h1 class="grow" align="center">Welcome to Student Management System</h1>
    <br>
    
<form method="POST" acion="index.php" >
<table style="width:50%;" align="center" border="3">
    <tr>
        <td align="center" colspan="2">Student Information</td>
    </tr>
    <tr>
        <td align="right">choose standard</td>
        <td>
            <select name="std" required>
                <option value="1">1st</option>
                <option value="2">2nd</option>
                <option value="3">3rd</option>
                <option value="4">4th</option>
                <option value="5">5th</option>
                <option value="6">6th</option>
                <option value="7">7th</option>
                <option value="8">8th</option>
                <option value="9">9th</option>
                <option value="10">10th</option>
                <option value="11">11th</option>
                <option value="12">12th</option>
            </select>
        </td>
    </tr>
    <tr>
        <td align="right">Enter Roll Number</td>
        <td>
            <input type="text" name="rollno" required>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2"><input type="submit" name="submit" value="show info"></td>
    </tr>
</table>
</form>
    
        </div>
</body>
    
    
</html>

<?php

if(isset($_POST['submit']))
{
    $standard = $_POST['std'];
    $rollno = $_POST['rollno'];
    
    include('dbcon.php');
    include('function.php');
    
    showdetails($standard,$rollno);
}

?>