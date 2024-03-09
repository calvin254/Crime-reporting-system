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
        header("location:headlogin.php");
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
   // mysqli_select_db("crime_portal",$conn);
    
    $query="select i_id,i_name,location from police_station";
    $result=mysqli_query($conn,$query);  
    ?>
    
	<title>Head View Police Station</title>
    <!--link to external css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body> 
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

  
<div  style="margin-left: 45%">
<a href="police_station_add.php"><input  type="button" value="Add Police Station" class="btnbtn" ></a>
   </div>
      
  <div style="padding:50px;">
     <table class="table table-bordered">
      <thead class="thead-dark" style="background-color: black; color: white; height:40px;">
        <tr>
          <th scope="col">Incharge Id</th>
          <th scope="col">Incharge Name</th>
          <th scope="col">Location of Police Station</th>
        </tr>
      </thead>
  
  <?php
        while($rows=mysqli_fetch_assoc($result)){
      ?> 
  
      <tbody style="background-color: white; color: black; height:40px; text-align:center;">
        <tr>
          <td><?php echo $rows['i_id']; ?></td>
          <td><?php echo $rows['i_name']; ?></td>     
          <td><?php echo $rows['location']; ?></td>         
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