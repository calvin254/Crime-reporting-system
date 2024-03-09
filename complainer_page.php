<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  <title>Complainer Home Page</title>
   
<?php
session_start();
    if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    //mysqli_select_db("crime_portal",$conn);
    
    $u_id=$_SESSION['u_id'];
        
        $result=mysqli_query($conn,"SELECT a_no FROM user where u_id='$u_id' ");
        $q2=mysqli_fetch_assoc($result);
        $a_no=$q2['a_no'];
    
        $result1=mysqli_query($conn,"SELECT u_name FROM user where u_id='$u_id' ");
        $q2=mysqli_fetch_assoc($result1);
        $u_name=$q2['u_name'];
    
    
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        
        $location=$_POST['location'];
        $type_crime=$_POST['type_crime'];
        $d_o_c=$_POST['d_o_c'];
        $description=$_POST['description'];
        
        $var=strtotime(date("Ymd"))-strtotime($d_o_c);
        
        
    if($var>=0)
    {
          
      $comp="INSERT into complaint(a_no,location,type_crime,d_o_c,description) values('$a_no','$location','$type_crime','$d_o_c','$description')";
      mysqli_select_db($conn,"crime_portal"); 
      $res=mysqli_query($conn,$comp);
      
      if(!$res)
      {
        $message1 = "Complaint already filed";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Complaint Registered Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
          header("location:complainer_complain_history.php");
      }
    }
    else
    {
     $message = "Enter Valid Date";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}
?>
    
 <script>
     function f1()
        {
           var sta1=document.getElementById("desc").value;
           var x1=sta1.trim();
          if(sta1!="" && x1==""){
          document.getElementById("desc").value="";
          document.getElementById("desc").focus();
          alert("Space Found");
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
    <li class="active"><a href="complainer_page.php">Log New Complain</a></li>
        <li><a href="complainer_complain_history.php">Complaint History</a></li>
        <li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<div class="registration" style="background:white; height:800px;">
    <div>
    
    <form action="#" method="post" class="login-form" style="color: gray; margin-right:50px; width:500px;" >
    <div class="login-form"><p><h2 style="color:white; font-size:30px; text-align:center;">Welcome <?php echo "$u_name" ?></h2></p><br>
        <p><h2 style="color:blue; text-align:center; font-size:28px; ">Log New Complain</h2></p><br>
    <p style="color:#dfdfdf">Address </p>
					<input type="text"  name="aadhar_number" placeholder="Aadhar Number" required="" disabled value=<?php echo "$a_no"; ?>>
					
                    <p style="color:#dfdfdf">Location of Crime</p>
                    
                    <select class="form-control" name="location" style="background-color:rgba(235, 235, 235, 0.15);width:380px !important;">
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
				
                    <p style="color:#dfdfdf">Type of Crime</p>
					<select class="form-control" name="type_crime" style="background-color:rgba(235, 235, 235, 0.15); width:380px !important;">
						<option>Theft</option>
						<option>Robbery</option>
                        <option>Pick Pocket</option>
                        <option>Murder</option>
                        <option>Rape</option>
                        <option>Molestation</option>
                        <option>Kidnapping</option>
                        <option>Missing Person</option>
				    </select>
				
					
                <p style="color:#dfdfdf">Date Of Crime</p>
						<input style="background-color:rgba(235, 235, 235, 0.15);color: white;" type="date" name="d_o_c" required>
					
					<br>
					<p style="color:#dfdfdf">Description</p>
						<textarea  name="description" rows="3" cols="50" placeholder="Describe the incident in details with time" onfocusout="f1()" id="desc" required></textarea>
					
					<input type="submit" value="Submit" name="s">
				</form>	
</div>
</div>
                    </div>
<div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</div>

</body>
</html>