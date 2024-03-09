<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIME PORTAL</title>
    <!--link to external css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body> 
<nav>
	<input id="nav-toggle" type="checkbox">
	<!--Logo-->
	<div class="logo"> <a href="home.php"><strong>Crime Portal</strong></a></div>
	<ul class="links">
            <li><a href="home.php" style="color:navy;">Home</a></li>
          <li><a href="userlogin.php">UserLogin <i class="fa fa-user"></i></a></li>
          <li><a href="official_login.php">Official Login <i class="fa fa-user"></i></a></li>
	</ul>
	<!--Three Bars On A Minimized Screen Size-->
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
<br><br><br><br>
<div class="homepage">
    <div class="content">
    <h1>Have a Complaint?</h1>
 				<h3> Register Below &nbsp &nbsp<i class="fa fa-hand-o-down" aria-hidden="true"></i></h3>
 				<hr><br><br>
          <a href="registration.php" class=" loginbtn btn btn-default btn-lg" role="button" aria-pressed="true">Sign Up!</a>
    </div>
</div>

</body>
</html>