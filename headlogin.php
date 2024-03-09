<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Head Login</title>
  <?php

if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        //password enctypt
        $result=mysqli_query($conn,"SELECT h_id,h_pass FROM head where h_id='$name' and h_pass='$pass' ");
        
        if(mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:headHome.php");
        }
    }                
}
?> 
    <!--link to external css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body> 
<nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Crime Portal</strong></a></div>
	<ul class="links">
            <li><a href="official_login.php">Official Login</a></li>
          <li><a href="headlogin.php"  class="active">HQ Login</a></li>
          
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<div class="policelogin">
<form action="" method="post">
<label for="exampleInputEmail1"  ><h1 style="color:white; margin-left:130px;">HQ Id</h1></label>
    <input type="email" name="email" class="forminput" id="exampleInputEmail1" aria-describedby="emailHelp" size="5" placeholder="Enter user id" required>
    <br><br>
    <label for="exampleInputPassword1"><h1 style="color:white; margin-left:130px;">Password</h1></label>
    <input type="password" name="password" class="forminput" id="exampleInputPassword1" placeholder="Password" required>
<br>
  <button type="submit"  class="submitbtn" name="s" onclick="f1()">Submit</button>
</form>
</div>
<div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</div>
</body>
</html>