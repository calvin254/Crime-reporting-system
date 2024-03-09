<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  <title>Add Police</title>
  <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:inchargelogin.php");
    
    $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
     //mysqli_select_db("crime_portal");
    
    $i_id=$_SESSION['email'];

    $result1=mysqli_query($con,"SELECT location FROM police_station where i_id='$i_id'");
      
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];
    
if(isset($_POST['s'])){
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $p_name=$_POST['police_name'];
        $p_id=$_POST['police_id'];
        $spec=$_POST['police_spec'];
        $p_pass=$_POST['password'];
        //enctypt password
        $password=md5($p_pass);

    $reg="insert into police values('$p_name','$p_id','$spec','$location','$password')";
    
        $res=mysqli_query($con,$reg);
        if(!$res)
         {
          $message = "User already Exists.";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else
        {
          $message = "Police Added Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}
?>
    
     <script>
     function f1()
    {
      var sta=document.getElementById("pname").value;
      var sta1=document.getElementById("pid").value;
      var sta2=document.getElementById("pspec").value;
      var sta3=document.getElementById("pas").value;
      var x=sta.trim();
      var x1=sta1.indexOf(' ');
      var x2=sta2.trim();
      var x3=sta3.indexOf(' ');
  if(sta!="" && x==""){
    document.getElementById("pname").value="";
    document.getElementById("pname1p").focus();
      alert("Space Not Allowed");
        }
        
         else if(sta1!="" && x1>=0){
    document.getElementById("pid").value="";
    document.getElementById("pid").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2==""){
    document.getElementById("pspec").value="";
    document.getElementById("pspec").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }      
}
</script>
</head>


<nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Crime Portal</strong></a></div>
	<ul class="links">
  <li ><a href="Incharge_complain_page.php">View Complaints</a></li>
        <li ><a href="incharge_view_police.php">Police Officers</a></li>
        <li><a href="inc_logout.php">Logout</a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<div class="registration">
    <div>
<form action="#" method="post"  class="login-form">
    <h1 style="text-align:center; color:rgb(80, 80, 253); line-height:40px; margin-bottom:10px;">Log Police Officer</h1>
<p style="color:#dfdfdf">Police Name</p>
					<input type="text"  name="police_name" placeholder="Police Name" required="" id="pname" onfocusout="f1()"/>
					<p style="color:#dfdfdf">Police Id</p> 
                    <input type="text"  name="police_id" placeholder="Police Id" required="" id="pid" onfocusout="f1()"/>
                    <p style="color:#dfdfdf"> Specialist</p>
                    <input type="text"  name="police_spec" placeholder="Specialist" id="pspec" required onfocusout="f1()"/>
                    
                    <p style="color:#dfdfdf">Location of Police Officer</p>
                    <input type="text" required  name="location" disabled value="<?php echo "$location"; ?>">
          <br>
          <p style="color:#dfdfdf">Password</p>
          <input type="password"  name="password" placeholder="Password" id="pas" onfocusout="f1()" required/>
			<input type="submit" value="Submit" name="s">
				</form>	
</div>
</div>
<div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</div>

</body>
</html>