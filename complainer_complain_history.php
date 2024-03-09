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
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    //mysqli_select_db("crime_portal",$conn);
    
    if(!isset($_SESSION['x']))
    header("location:userlogin.php");
    
        $u_id=$_SESSION['u_id'];
        $result1=mysqli_query($conn,"SELECT a_no FROM user where u_id='$u_id'");
      
        $q2=mysqli_fetch_assoc($result1);
        $a_no=$q2['a_no'];
    
    
    
    
    if(isset($_POST['s2']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            
            $cid=$_POST['cid'];

            $_SESSION['cid']=$cid;
            
            $resu=mysqli_query($conn,"SELECT a_no FROM complaint where c_id='$cid'");
            $qn=mysqli_fetch_assoc($resu);
                
            
           if($qn['a_no']==$q2['a_no'])
           {
                header("location:complainer_complain_details.php"); 
           }
            else
            {
              $message = "Not Your Case";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    }
    
    
    
    $query="select c_id,type_crime,d_o_c,location,description from complaint where a_no='$a_no' order by c_id desc";
    $result=mysqli_query($conn,$query);  
    ?>
    
	<title>Complaint History</title>
    
    <script>
     function f1()
        {
          
            var sta2=document.getElementById("ciid").value;
            var x2=sta2.indexOf(' ');
  
            if(sta2!="" && x2>=0)
            {
                  document.getElementById("ciid").value="";
                  alert("Space Not Allowed");
            }
        }
    </script>

</head>

    
<body style="background-color: #dfdfdf">
       
<nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Crime Portal</strong></a></div>
	<ul class="links">
    <li ><a href="complainer_page.php">Log New Complain</a></li>
      <li class="#active"><a href="complainer_complain_history.php">Complaint History</a></li>
      <li><a href="logout.php">Logout</a></li>
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

    <div>
      
        <form style="float: right; margin-right: 100px; margin-top: 65px; margin-bottom:20px;" method="post">
            <input type="text" name="cid" style="width: 250px; height: 30px; margin-bottom:20px; color: black;" placeholder="&nbsp Complain Id" id="ciid" onfocusout="f1()" required>
            <input class="btnbtn" type="submit" value="Search" style="margin-top:2px; margin-left:20px;" name="s2">
            <button onclick="window.print();"> Print this report</button>
        </form>
        
    </div>


    <div style="padding:50px;">
      <table class="table table-bordered">
       <thead class="thead-dark" style="background-color: black; color: white; height:40px;">
         <tr>
          <th scope="col">Complaint Id</th>
          <th scope="col">Type of Crime</th>
        <th scope="col">Description of Crime</th>
          <th scope="col">Date of Crime</th>
          <th scope="col">Location of Crime</th>
        </tr>
      </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black; height:40px; text-align:center;">
      <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['type_crime']; ?></td>  
                <td><?php echo $rows['description']; ?></td>     
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
       </div> 

</body>
</html>