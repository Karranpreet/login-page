<?php
$hostname="localhost";
$username="root";
$passw="";
$dbname="project";
$conn=mysqli_connect($hostname,$username,$passw,$dbname);

if(isset($_POST['change']))
{$email=$_POST['email'];
 $password=$_POST['pass'];
 $newpassword=$_POST['newpass'];

$userid="SELECT * from user where email='$email' ";
$result=mysqli_query($conn,$userid);
$count=mysqli_fetch_array($result);
if( $count['email']!==$email)
{echo "<script type='text/javascript'>alert('Not a registered email');</script>"; }
if($password!==$newpassword)
{echo "<script type='text/javascript'>alert('password doesn't match');</script>";}
else { $userid="update user set password='$password' where email='$email' ";
$result=mysqli_query($conn,$userid);
header("location: login.php"); }
}
?>



<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.container{ width: 500px; }
.button { width: 100%;background-color: lightblack;color: black;height: 7%; }
</style>
<body>
<span style="font-size: 30px"><center><b>Change Your Password</b></center></span><br><br><br>
<form action="forgotpassword.php" method="post">
<div class="container">
<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="pass" placeholder="New Password" required>
    </div>
<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="newpass" placeholder="Retype Password" required>
    </div><br>
<button class="button" type="submit" name="change">Change Password</button> 
</div>
</form>
</body>
</html>