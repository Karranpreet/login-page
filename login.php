<?php
$hostname="localhost";
$username="root";
$passw="";
$dbname="project";
$conn=mysqli_connect($hostname,$username,$passw,$dbname);


if(isset($_POST['log'])) 
{ $email=$_POST[email];
  $password=$_POST[pass];
  
$userid="SELECT * from user where email='$email' && password='$password' ";
$result=mysqli_query($conn,$userid);
$count=mysqli_num_rows($result);
if($count==1)
{ header("location: home.html"); }
else { echo "<script type='text/javascript'>alert('invalid email/password');</script>"; }
}

if(isset($_POST['signup']))
{
$firstname=$_POST["fname"];
$lastname=$_POST["lname"];
$email=$_POST["email"];
$password=$_POST["pass"];
$gender=$_POST["gend"]; 

$userid="SELECT * from user where email='$email' ";
$result=mysqli_query($conn,$userid);
$count=mysqli_fetch_array($result);
if( $count['email']===$email)
{echo "<script type='text/javascript'>alert('already registered');</script>"; }
else {


$sql= "INSERT INTO user(firstname,lastname,email,password,gender) Values('$firstname','$lastname','$email','$password','$gender')";
$insert=mysqli_query($conn,$sql);

header("location: home.html"); }
}



?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body{ background-image: url(bgimage.jpg); background-repeat: repeat; background-size: cover;animation: animate 20s linear infinite;}
@keyframes animate{ 0%{ background-position: 0 0 ; } 100%{ background-position: 100px 650px ; } }
.position-absolute{ left: 20px; }
button {
    background-color: green;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;border: 1px solid black;
}
.container{ width: 300px;padding: 10px; margin-left: 100px;margin-top: 100px;}
.avatar { width: 100px;height: 100px; }
.container { background-color: lightgray;}
.font{ font-size: 30px; }
.signup{ width: 300px; height: 340px;padding: 10px; margin-left: 600px;position: absolute; top: 100px;background-color: lightgray;}
.page { position: absolute; left: 100px;}
</style>
</head>
<body>
<form action="login.php" method="post">
<div class="page">
<div class="container">
<center><span class="font">Log in here</span></center><hr>
<div class="imgcontainer">
    <center><img src="user.png" alt="Avatar" class="avatar"></center>
  </div>

  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="pass" placeholder="Password" required>
    </div>
   <a href="forgotpassword.php">Forgotten password?</a>
<button type="submit" name="log">Login</button>    
</div>
</form>


<div class="signup">
<center><span class="font">Sign up</span></center><hr>
<form action="login.php" method="post">
  <div class="input-group">
      <input type="text" class="form-control" name="fname" placeholder="Firstname" required>
      <input type="text" class="form-control" name="lname" placeholder="Lastname" required>
      <input type="email" class="form-control" name="email" placeholder="Email" required>
      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
      <input type="checkbox" onclick="password()">show password<br>
  <script>
function password() {
    var x = document.getElementById("pass");
    if (x.type =='password') {
        x.type = 'text';
    } else {
        x.type = 'password';
    }
}
</script>
      <center>I am<input type="radio" name="gend" value="Male">Male
      <input type="radio" name="gend" value="Female">Female</center>
    </div>
<button type="submit" name="signup">Sign up</button>    
</div>
</form>
</div>
</body>
</html>
