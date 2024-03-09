<!DOCTYPE html>
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
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        $u_id=$_POST['email'];
        //enctypt database
        $password=md5($pass);
        $_SESSION['u_id']=$u_id;
        $result=mysqli_query($conn,"SELECT u_id,u_pass FROM user where u_id='$name' and u_pass='$password'");
        if(!$result || mysqli_num_rows($result)==0)
        {
          $message = "Id or Password not Matched.";
          echo "<script type='text/javascript'>alert('$message');</script>";
          
             
        }
        else 
        {
          header("location:complainer_page.php");
          
        }
    }                
}
?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
     function f1()
        {
            var sta2=document.getElementById("exampleInputEmail1").value;
            var sta3=document.getElementById("exampleInputPassword1").value;
          var x2=sta2.indexOf(' ');
var x3=sta3.indexOf(' ');
    if(sta2!="" && x2>=0){
    document.getElementById("exampleInputEmail1").value="";
    document.getElementById("exampleInputEmail1").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("exampleInputPassword1").value="";
    document.getElementById("exampleInputPassword1").focus();
      alert("Space Not Allowed");
        }

}
    </script>
    
	<title>Complainant Login</title>
    <!--link to external css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <!--Navigation Bar-->
 <nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Crime Portal</strong></a></div>
	<!-- Links-->
	<ul class="links">
		<li><a href="userlogin.php" class="active">Complainer Login</a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<div class="userlogin">
    <form action="" method="post">
    <label for="exampleInputEmail1"><h1 style="color: #fff; margin-left:100px;">User Id</h1></label>
    <input type="email" class="forminput" id="exampleInputEmail1" style="margin-bottom:30px;" aria-describedby="emailHelp" placeholder="Enter Email id" required name="email" onfocusout="f1()">
    <label for="exampleInputPassword1"><h1 style="color: #fff; margin-left:100px;">Password</h1></label>
    <input type="password" class="forminput" id="exampleInputPassword1" placeholder="Password" required name="password" onfocusout="f1()">    
<br>
  <button type="submit"  class="submitbtn" name="s" onclick="f1()">Submit</button>
</form>
</div>

<div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</div>
</body>
</html>