<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incharge Login</title>
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
        //enctypt password
        $password=md5($pass);
        $result=mysqli_query($conn,"SELECT i_id,i_pass FROM police_station where i_id='$name' and i_pass='$password' ");
        
        $_SESSION['email']=$name;
        if(!$result || mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:incharge_complain_page.php");
        }
    }                
}
?> 
    <script>
    function f1()
    {
      var sta2=document.getElementById("exampleInputEmail1").value;
      var sta3=document.getElementById("exampleInputPassword1").value;
      var x2=sta2.indexOf(' ');
      var x3=sta3.indexOf(' ');
      if(sta2!="" && x2>=0)
      {
        document.getElementById("exampleInputEmail1").value="";
        document.getElementById("exampleInputEmail1").focus();
        alert("Space Not Allowed");
      }
      else if(sta3!="" && x3>=0)
      {
        document.getElementById("exampleInputPassword1").value="";
        document.getElementById("exampleInputPassword1").focus();
        alert("Space Not Allowed");
      }

}
</script>
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
          <li><a href="inchargelogin.php"  class="active">Incharge Login</a></li>
          
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
<label for="exampleInputEmail1"  ><h1 style="color:white; margin-left: 130px;">Incharge Id</h1></label>
    <input type="text" name="email" class="forminput" id="exampleInputEmail1" aria-describedby="emailHelp" size="5" placeholder="Enter user id" required onfocusout="f1()">
    <br><br>
    <label for="exampleInputPassword1"><h1 style="color:white; margin-left:130px">Password</h1></label>
    <input type="password" name="password" class="forminput" id="exampleInputPassword1" placeholder="Password" required onfocusout="f1()">
<br>
  <button type="submit"  class="submitbtn" name="s" onclick="f1()">Submit</button>
</form>
</div>

<div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</body>
</html>