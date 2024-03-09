<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HQ Homepage</title>
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:headlogin.php");
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    if(isset($_POST['s1']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cid=$_POST['cid'];
        $_SESSION['cid']=$cid;
        header("location:head_case_details.php");
    }
    }
    
    $loc=$_SESSION['loc'];
    $query="select * from complaint where location='$loc' order by c_id desc";
    $result=mysqli_query($conn,$query);  
    $rows=mysqli_fetch_assoc($result);
?>
  <script>
     function f1()
        {
          var sta2=document.getElementById("ciid").value;
          var x2=sta2.indexOf(' ');
          if(sta2!="" && x2>=0)
          {
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
	<div class="logo"> <a  href="home.php"><b>Kasarani  Police Division Portal</b></a></div>
	<ul class="links">
    <li  ><a href="headHome.php">View Complaints</a></li>
        <li ><a href="head_view_police_station.php">Police Station</a></li>
        <li><a href="h_logout.php">Logout <i class="fa fa-sign-out"></i></a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>

<div >
    <br><br><br><br><br><br>
<form style="margin-left: 40%;" method="post">
      <input type="text" name="cid" style="width: 250px; height: 30px;" placeholder="&nbsp Complaint Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-primary" type="submit" value="Search" name="s1" style="margin-top: 10px; margin-left: 11%;">
     </div>
     </form>
 </div>
    <h1>Cases in <?php echo $rows['location']; ?></h1>
    <button onclick="window.print();"> Print this report</button>
<div style="padding:50px;">
   <table class="table table-bordered">
       <thead class="thead-dark" style="background-color: black; color:white; height:40px;">
    <tr>
      <th scope="col">Complainant adress</th>
      <th scope="col">Type of Crime</th>
      <th scope="col">Date Of Crime</th>
      <th scope="col">Description</th>
            <th scope="col">Date of complaint</th>

      <th scope="col">Incharge Status</th>
      <th scope="col">Police Status</th>
            <th scope="col">Police Id</th>


    </tr>
       </thead>
      <?php
          while($rows=mysqli_fetch_array($result)){
        ?> 
       <tbody style="background-color: white; color: black; height:40px;">
       <tr>
      <td><?php echo $rows['a_no']; ?></td>
      <td><?php echo $rows['type_crime']; ?></td>     
      <td><?php echo $rows['d_o_c']; ?></td>     
      <td><?php echo $rows['description']; ?></td>  
      <td><?php echo $rows['d_o_c']; ?></td>         
      <td><?php echo $rows['inc_status']; ?></td>         
      <td><?php echo $rows['pol_status']; ?></td>         
      <td><?php echo $rows['p_id']; ?></td>          
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