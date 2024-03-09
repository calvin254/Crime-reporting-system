<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--link to external css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body> 
<nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Crime Portal</strong></a></div>
	<ul class="links">
            <li><a href="official_login.php" class="active">Official Login</a></li>
         
	</ul>
    
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<div class="officialogin">
<div class="row">
  <div class="column">
  <h3>Police Login</h3>
      <p>
 <a href="policelogin.php" class="submitbtn" style="height:40px; width:50px; margin-right:10px;">Police Login</a>
</p>
  </div>
  <div class="column">
  <h3>Incharge Login</h3>
        <p>
        <a href="inchargelogin.php" class="submitbtn" style="height:40px; width:50px; margin-right:10px;">Incharge Login</a>
     </p>
  </div>
  <div class="column">
  <h3>HQ Login</h3>
     <p>
        <a href="headlogin.php" class="submitbtn" style="height:40px; width:50px; margin-right:10px;">HQ Login</a>
    </p>
  </div>
</div>

</div>
<div class="footer1">
<h4 style="color: white;">&copy <b>Crime Portal 2021</b></h4>
</div>
</body>
</html>