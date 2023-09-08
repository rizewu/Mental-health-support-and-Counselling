<?php include 'db.php'?>
<?php session_start();

?>
<html>
<head>
<title>Mental Wellness and Counselling</title>
<link href="css/bootstrap.min.css"rel="stylesheet">
    <link href="css/icofont.css"rel="stylesheet">
    <link href="css/formstyle.css"rel="stylesheet">
    <link href="css/footerstyle.css"rel="stylesheet">
    <link href="image/logo.jpg" type="image/jpg" rel="shortcut icon">
</head>
    <style>
      .navbar-nav  .nav-item .nav-link{color: white; font-size: 25px;font-family: courier;font-weight: bold}
    
    </style>
<body>
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-9">
    <h1 style="font-family:century gothic; "><img src="image/logo.jpg" height="80px" width="80px" style="border-radius:50%"> <a class="navbar-brand text-info" href="index.php"><font style="font-size:40">Mental Support and Counselling</font></a></h1>
    </div>
        <?php if(isset($_SESSION['uid']))
{ ?>
       <div class="col-md-3 mt-3"><a href="user/profile1.php" style="font-size:30; text-decoration:none;font-family:century gothic;font-weight:bold" class="text-info">My Profile / </a><a href="user/logout.php" style="font-size:30; text-decoration:none;font-family:century gothic;font-weight:bold" class="text-info">Log Out</a></div>
        <?php } else { ?>
        
        <div class="col-md-3 mt-3"><a href="login.php" style="font-size:30; text-decoration:none;font-family:century gothic;font-weight:bold" class="text-info">Sign In /</a><a href="register.php" style="font-size:30; text-decoration:none;font-family:century gothic;font-weight:bold" class="text-info">Sign Up</a></div> <?php } ?>       </div></div>
   <nav class="navbar navbar-expand-lg navbar-light" style="background:rgba(0,0,0,0.8)">
       
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="alldoctor.php">Doctors &nbsp;<span class="sr-only">(current)</span></a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="allblog.php">Quiz&nbsp;</a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="allarticles.php">Articles&nbsp;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us&nbsp;</a>
      </li>
      
    
    </ul>
   
  </div>
</nav>