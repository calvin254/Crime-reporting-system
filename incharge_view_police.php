<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:inchargelogin.php");
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
   // mysqli_select_db("crime_portal",$conn);
    
    $i_id=$_SESSION['email'];

    $result1=mysqli_query($conn,"SELECT location FROM police_station where i_id='$i_id'");
      
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];
    
     if(isset($_POST['s2']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $pid=$_POST['pid'];
            
            $q1=mysqli_query($conn,"delete from police where p_id='$pid'");
            $q3=mysqli_query($conn,"update complaint set pol_status='null',inc_status='Unassigned',p_id='Null' where p_id='$pid'");
        }
    }
    
    
    $result=mysqli_query($conn,"select p_id,p_name,spec,location from police where location='$location'");  
    
   
    ?>
	<title>Incharge View Police</title>
  <script>
     function f1()
        {
          
            var sta2=document.getElementById("ciid").value;
            var x2=sta2.indexOf(' ');
            if(sta2!="" && x2>=0){
            document.getElementById("ciid").value="";
            alert("Blank Field not Allowed");
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
<br><br><br><br><br><br>
<div  style="margin-left: 40%">
   <a href="police_add.php"><input  type="button" name="add" value="Add Police Officers" class="btnbtn" ></a>
 </div>

 <button onclick="window.print();" style="margin-top 30px; margin-left:65px;"> Print this report</button>   
    <div >
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white; height:40px;">
      <tr>
        <th scope="col">Police Id</th>
        <th scope="col">Police Name</th>
        <th scope="col">Specialist</th>
        <th scope="col">Location</th>
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black; height:40px; text-align:center;">
      <tr>
        <td><?php echo $rows['p_id']; ?></td>
        <td><?php echo $rows['p_name']; ?></td>     
        <td><?php echo $rows['spec']; ?></td>          
        <td><?php echo $rows['location']; ?></td>          
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 </div>
    
    <form style="margin-top: 5%; margin-left: 40%;" method="post">
      <input type="text" name="pid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Police Id" id="ciid" onfocusout="f1()" required>
        <div><br>
      <input class="btnbtn" type="submit" value="Delete Police" name="s2" style="margin-top: 10px; width:140px; margin-left:6%; background:#C40234;">
        </div>
    </form>
  </div>
  
  <div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</body>
</html>