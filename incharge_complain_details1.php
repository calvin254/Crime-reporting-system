<!DOCTYPE html>
<html>
<head>
       
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:inchargelogin.php");
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    //mysqli_select_db("crime_portal",$conn);
    
    $cid=$_SESSION['cid'];
        
    $i_id=$_SESSION['email'];
    $result1=mysqli_query($conn,"SELECT location FROM police_station where i_id='$i_id'");
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];
    
    $query="select c_id,type_crime,d_o_c,description from complaint where c_id='$cid' and location='$location' order by c_id desc";
    $result=mysqli_query($conn,$query); 
    $res2=mysqli_query($conn,"select d_o_u,case_update from update_case where c_id='$cid'");
    if(isset($_POST['assign']))
    {
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $pname=$_POST['police_name'];
        $res1=mysqli_query($conn,"SELECT p_id FROM police where p_name='$pname'");
        $q3=mysqli_fetch_assoc($res1);
        $pid=$q3['p_id'];
      
      
        $res=mysqli_query($conn,"update complaint set inc_status='Assigned',pol_status='In Process',p_id='$pid' where c_id='$cid'");
      
        $message = "Case Assigned Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    
    ?>

	<title>Incharge Homepage</title>
</head>
<body>
          
<nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Crime Portal</strong></a></div>
	<ul class="links">
    <li ><a href="Incharge_complain_page.php">View Complaints</a></li>
    <li class="#active" ><a href="incharge_complain_details.php">Complaints Details</a></li>
    <li><a href="inc_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>    
<div style="padding:50px; margin-top:10px;">
   <table class="table table-bordered">
     <thead class="thead-dark" style="background-color: black; color: white; height:40px;" >
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
       <tbody style="background-color: white; color: black; height:40px; text-align:center;">
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
 <form method="post">
<select class="form-control" name="police_name" style="margin-left:40%; width:250px;">
            <?php
                        $p_name=mysqli_query($conn,"select p_name from police where location='$location'");
                        while($row=mysqli_fetch_array($p_name))
                        {
                            ?>
                                  <option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>
          
            </select>
            <input type="submit" name="assign" value="Assign Case" class="btn btn-primary" style="margin-top:10px; margin-left:45%;">
</form>


<div style="padding:50px; margin-top:8px;">
   <table class="table table-bordered">
        <thead class="thead-dark" style="background-color: black; color: white; height:40px;">
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