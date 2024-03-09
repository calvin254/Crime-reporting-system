<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Pending Complains</title>
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
    $conn=mysqli_connect("localhost","root","","crime_portal");
     if(!$conn)
    {
        die("could not connect".mysqli_error());
     }
    
    if(isset($_POST['s2']))
    {
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
       $cid=$_POST['cid'];
       $_SESSION['cid']=$cid;
       $alok=mysqli_query($conn,"SELECT p_id FROM complaint WHERE c_id='$cid'");
       $row = mysqli_fetch_assoc($alok);
       $p_id=$_SESSION['pol'];
     if($row['p_id']==$p_id){
     header("location:police_complainDetails.php");}
     else{
         $message = "Not in your scope";
        echo "<script type='text/javascript'>alert('$message');</script>";
     }
 }
}
    
    $p_id=$_SESSION['pol'];
     $result=mysqli_query($conn,"SELECT c_id,type_crime,d_o_c,location FROM complaint where p_id='$p_id' and pol_status='In Process' order by c_id desc");
    ?>
 <script>
     function f1()
        {
        var sta2=document.getElementById("ciid").value;
        var x2=sta2.indexOf(' ');
      if(sta2!="" && x2>=0){
          document.getElementById("ciid").value="";
          alert("Blank Field Found");
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
<form style="margin-top: 7%; margin-left: 40%;" method="post">
    <input type="text" name="cid" style="width: 250px; height: 30px; background-color:white; color:grey; margin-top:5px;" placeholder="&nbsp Complaint Id" onfocusout="f1()" required id="ciid">
        <div>
      <input class="submitbtn" type="submit" value="Search" name="s2" style="margin-top: 10px; margin-left: 11%;">
        </div>
        
    </form>
    <div style="padding:50px;">
    <button onclick="window.print();"style="margin-left:65px; margin: bottom 10px;"> Print this report</button>
    <br>
   <table >
    <thead class="thead-dark" style="background-color:black; color: white; line-height:40px;">
      <tr>
        <th>Complaint Id</th>
        <th>Type of Crime</th>
        <th>Date of Crime</th>
        <th>Location of Crime</th>
        
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['type_crime']; ?></td>     
        <td><?php echo $rows['d_o_c']; ?></td> 
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

</body>
</html>