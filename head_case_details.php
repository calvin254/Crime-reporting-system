<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Details</title>
    <!--link to external css file-->
    <link rel="stylesheet" href="style.css">
  <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:headlogin.php");
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    //mysqli_select_db("crime_portal",$conn);
    
    $c_id=$_SESSION['cid'];
        
    $query="select c_id,description,inc_status,pol_status,location from complaint where c_id='$c_id'";
    $result=mysqli_query($conn,$query);
     $res2=mysqli_query($conn,"select d_o_u,case_update from update_case where c_id='$c_id'");
  ?>

	
</head>
<body> 
<nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Crime Portal</strong></a></div>
	<ul class="links">
        <li ><a href="headHome.php">View Complaints</a></li>
        <li><a href="head_case_details.php" style="color:blue;">Complaints Details</a></li>
        <li><a href="h_logout.php">Logout</a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>

<br><br><br><br><br>
<button onclick="window.print();" style="float:right; margin-right:114px; margin-top:20px;"> Print this report</button>
<div style="padding:50px; ">
   <table>
       <thead style="background-color: black; color: white; height:40px;">
    <tr>
      <th scope="col">Complain Id</th>
      <th scope="col">Description</th>
      <th scope="col">Police Status</th>
      <th scope="col">Case Status</th>
        <th scope="col">Location of Crime</th>
    </tr>
       </thead>
      <?php
              while($rows=mysqli_fetch_assoc($result)){
             ?> 
       <tbody style="background-color: white; color: black; height:40px; text-align:center;">
    <tr>
      <td><?php echo $rows['c_id']; ?></td>
      <td><?php echo $rows['description']; ?></td>     
      <td><?php echo $rows['inc_status']; ?></td>     
      <td><?php echo $rows['pol_status']; ?></td>
        <td><?php echo $rows['location']; ?></td>
    </tr>
       </tbody>
             <?php
} 
?>
     </table>
    </div>
       
   
<div>
   <table class="table table-bordered">
    <thead style="background-color: black; color: white; height:40px;" >
    <tr>
      <th scope="col">Date Of Update</th>
      <th scope="col">Case Update</th>
    </tr>
       </thead>
      <?php
              while($rows1=mysqli_fetch_assoc($res2)){
             ?> 
       <tbody style="background-color: white; color: black; height:40px; text-align:center;">
    <tr>
        
      <td><?php echo $rows1['d_o_u']; ?></td>
      <td><?php echo $rows1['case_update']; ?></td>
        
        
    </tr>
       </tbody>
       <?php
} 
?>
          
</table>
 </div>
 <div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</div>
</body>
</html>