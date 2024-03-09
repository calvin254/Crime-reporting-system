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
    //mysqli_select_db("crime_portal",$conn);
    
    $i_id=$_SESSION['email'];
    $result1=mysqli_query($conn,"SELECT location FROM police_station where i_id='$i_id'");
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];
    
    if(isset($_POST['s2']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cid=$_POST['cid'];
        
        $_SESSION['cid']=$cid;
        $qu=mysqli_query($conn,"select inc_status,location from complaint where c_id='$cid'");
        
        $q=mysqli_fetch_assoc($qu);
        $inc_st=$q['inc_status'];
        $loc=$q['location'];
        
        if(strcmp("$loc","$location")!=0)
        {
            $msg="Case Not of your Location";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        else if(strcmp("$inc_st","Unassigned")==0)
        {   
            header("location:Incharge_complain_details1.php");
            
        }
        else{
            header("location:incharge_complain_details.php");
        }
    }
    }
    
    $query="select c_id,type_crime,d_o_c,location,inc_status,p_id from complaint where location='$location' order by c_id desc";
    $result=mysqli_query($conn,$query);  
    ?>

	<title>Incharge Homepage</title>
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

<br>
<br>
<br>
<br>
<br>
<br>
 
<form style=" margin-left: 40%;" method="post">
      <input type="text" name="cid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Complaint Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="submitbtn" type="submit" value="Search" name="s2" style="margin-top: 10px; margin-left: 11%;">
        </div>
    </form>
    
    <button onclick="window.print();" style="margin-top:30px; margin-left:65px;"> Print this report</button>
    
 <div >
   <table>
    <thead style="background-color: black; color: white; height:40px;">
      <tr>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
        <th scope="col">Location</th>
        <th scope="col">Complaint Status</th>
          <th scope="col">Police ID</th>
      </tr>
    </thead>

            <?php
              while($rows=mysqli_fetch_assoc($result)){

             ?> 

            <tbody style="background-color: white; color: black; height:40px; text-align:center;">
      <tr >
        <td><?php echo $rows['c_id'];?></td>
        <td><?php echo $rows['type_crime'];?></td>     
        <td><?php echo $rows['d_o_c'];?></td>
          <td><?php echo $rows['location'];?></td>
          <td><?php echo $rows['inc_status']; ?></td>
          <td><?php echo $rows['p_id']; ?></td>
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
    </table>
  </div>
</form>
<br><br>
<div class="footer1">
         <h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
       </div> 
</body>
</html>