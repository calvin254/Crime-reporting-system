<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  <title>Add Police Station</title>
  <?php
    session_start();
    //if(!isset($_SESSION['x']))
        //header("location:headlogin.php");
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $loc=$_POST['location'];
        $i_name=$_POST['incharge_name'];
        $i_id=$_POST['incharge_id'];
        $u_pass=$_POST['password'];
        //password enctypt
        $password=md5($u_pass);
    
    $reg="insert into police_station values('$i_id','$i_name','$loc','$password')";
     //mysqli_select_db("crime_portal");
        $res=mysqli_query($con,$reg);
        if(!$res)
            {
        $message1 = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            
        else
    {
        $message = "Police Station Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
?>
<script>
     function f1()
        {
         var sta=document.getElementById("station").value;
         var sta1=document.getElementById("iname").value;
         var sta2=document.getElementById("iid").value;
         var sta3=document.getElementById("pas").value;
         var x=sta.trim();
         var x2=sta2.indexOf(' ');
         var x1=sta1.trim();
         var x3=sta3.indexOf(' ');
 if(sta!="" && x==""){
    document.getElementById("station").value="";
    document.getElementById("station").focus();
      alert("Space Not Allowed");
        }
        
         else if(sta1!="" && x1==""){
    document.getElementById("iname").value="";
    document.getElementById("iname").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("iid").value="";
    document.getElementById("iid").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }
      }
</script>
  
</script>
</head>


<nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Crime Portal</strong></a></div>
	<ul class="links">
    <li><a href="headHome.php">View Complaints</a></li>
        <li ><a href="head_view_police_station.php"  style="color:blue;">Police Station</a></li>
        <li><a href="h_logout.php">Logout</a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<div class="registration" style="background:white; height: 650px;">
    <div>
<form action="#" method="post"  class="login-form">
    <h1 style="text-align:center; color:rgb(80, 80, 253); line-height:40px; margin-bottom:10px;">Log Police Station</h1>
<p style="color:#dfdfdf">Police Station Location</p>
<input type="text"  name="location" placeholder="Station Location"  id="station" onfocusout="f1()"/>
					<p style="color:#dfdfdf">Incharge Name</p> 
                    <input type="text"  name="incharge_name" placeholder="Incharge Name" id="iname" onfocusout="f1()"/>
                    <p style="color:#dfdfdf"> Incharge Id</p>
                    <input type="text"  name="incharge_id" placeholder="Incharge Id"  id="iid" onfocusout="f1()"/>
          <br>
          <p style="color:#dfdfdf">Password</p>
          <input type="password"  name="password" placeholder="Password" id="pas" onfocusout="f1()"/>
			<input type="submit" value="Submit" name="s">
				</form>	
</div>
</div>
<div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</div>
 
</body>
</html>