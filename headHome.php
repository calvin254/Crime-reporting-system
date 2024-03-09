<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Head Homepage</title>
       
<?php
session_start();
    if(!isset($_SESSION['x']))
        header("location:headlogin.php");
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    if(isset($_POST['s1']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cid=$_POST['cid'];
        $_SESSION['cid']=$cid;
        header("location:head_case_details.php");
    }
    }
    
    if(isset($_POST['s2']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $loc=$_POST['loc'];
        $_SESSION['loc']=$loc;
        header("location:headHome1.php");
    }
    }
    
        
?>
  <script>
     function f1()
        {
          
            var sta2=document.getElementById("ciid").value;
  var x2=sta2.indexOf(' ');

    if(sta2!="" && x2>=0){
    document.getElementById("ciid").value="";
          alert("Blank Field Not Allowed");
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
        <li ><a href="headHome.php">View Complaints</a></li>
        <li ><a href="head_view_police_station.php">Police Station</a></li>
        <li><a href="h_logout.php">Logout</a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>

<div class="headhome">
    <form  method="post">
      <input type="text" name="cid" style="width: 250px; height: 30px;" placeholder="&nbsp Complaint Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btnbtn" type="submit" value="Search" name="s1" style="margin-top: 13px; margin-left: 23%; width:130px;">
     </div>
     </form>
        
     <form style="margin-top:17%; margin-left: 40%;" method="post">
     <select name="loc" class="form-control" style="width: 250px;">
         
						<?php
                        $loc=mysqli_query($conn,"select location from police_station");
                        while($row=mysqli_fetch_array($loc))
                        {
                            ?>
                                	<option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>
     </select>
        <br>
          <input class="btnbtn" type="submit" value="Search" name="s2" style="margin-top: 13px; margin-left: 23%; width:130px;;">
    </form>
 </div>

 
<div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</div>
</body>
</html>