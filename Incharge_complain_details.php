<!DOCTYPE html>
<html>
<head>
    
    <?php
    session_start();
   if(!isset($_SESSION['x']))
    header("location:inchargelogin.php");
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    
    $cid=$_SESSION['x'];
        
    $i_id=$_SESSION['x'];
    $result1=mysqli_query($conn,"SELECT location FROM police_station where i_id='$i_id'");
      
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];
    
    $query="select c_id,type_crime,d_o_c,description from complaint where inc_status='Assigned'";
    $result=mysqli_query($conn,$query); 
    if(isset($_POST['assign']))
    {
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $pname=$_POST['police_name'];
        $res1=mysqli_query("SELECT p_id FROM police where p_name='$pname'",$conn);
        $q3=mysqli_fetch_assoc($res1);
        $pid=$q3['p_id'];
      
      
        $res=mysqli_query("update complaint set inc_status='Assigned',pol_status='In Process',p_id='$pid' where c_id='$cid'",$conn);
      
        $message = "Case Assigned Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    ?>

<title>Assign Police</title>
    <!--link to external css file-->
    <link rel="stylesheet" href="style.css">
	
</head>
<body>
<nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Kasarani  Police Division Portal</strong></a></div>
	<ul class="links">
    <li ><a href="Incharge_complain_page.php">View Complaints</a></li>
        <li class="active" ><a href="incharge_complain_details.php">Complaints Details</a></li>
        <li><a href="inc_logout.php">Logout<i class="fa fa-sign-out"></i></a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>

    
<div style="padding:50px; margin-top:10px;">
<br><br><br>
  <h2>ASSIGNED CASES</h2>
   <table>
    <thead style="background-color: black; color: white; height:40px;">
    <tr>
      <th scope="col">Complaint Id</th>
      <th scope="col">Type of Crime</th>
      <th scope="col">Date of Crime</th>
      <th scope="col">Description</th>
    </tr>
       </thead>
      <?php
              while($rows=mysqli_fetch_assoc($result)){
             ?> 
       <tbody style="background-color: white; color: black; height:40px;">
    <tr>
        
      <td><?php echo $rows['c_id']; ?></td>
      <td><?php echo $rows['type_crime']; ?></td>
      <td><?php echo $rows['d_o_c']; ?></td>
      <td><?php echo $rows['description']; ?></td>
        
        
    </tr>
       </tbody>
       <?php
} 
?>
          
</table>
 </div>
 <div>  
<!--form was here-->
 </div>

 <div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
 
</body>
</html>