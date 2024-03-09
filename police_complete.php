<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police completed complaint</title>
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
     
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    $p_id=$_SESSION['pol'];
     $result=mysqli_query($conn,"SELECT c_id,type_crime,d_o_c,location,mob,u_addr FROM complaint natural join user where p_id='$p_id' and pol_status='ChargeSheet Filed' order by c_id desc");
    ?>
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
        <li ><a href="police_pending_complain.php">Pending Complaints</a></li>
        <li ><a href="police_complete.php">Completed Complaints</a></li>
        <li><a href="p_logout.php">Logout</a></li>
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

<button onclick="window.print();" style="margin-top:70px; margin-left:65px;"> Print this report</button>

<div >
   <table>
    <thead class="thead-dark" style="background-color: black; color: white; line-height:40px;">
      <tr>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
          <th scope="col">Location of Crime</th>
          <th scope="col">Complainant Mobile</th>
          <th scope="col">Complainant Address</th>
        
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black; line-height:40px;">
      <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['type_crime']; ?></td>     
        <td><?php echo $rows['d_o_c']; ?></td>   
        <td><?php echo $rows['location']; ?></td>
          <td><?php echo $rows['mob']; ?></td>
          <td><?php echo $rows['u_addr']; ?></td>
                  
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
   
 </div>

 <div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</body>
</html>