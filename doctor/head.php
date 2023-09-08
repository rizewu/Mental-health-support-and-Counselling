<?php include'../db.php'?>
<?php session_start();
if(!isset($_SESSION['docid']))
{
echo"<script>window.location='../doclogin.php'</script>";
}
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Mental Wellness and Counselling</title>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link href="../css/icofont.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style5.css">
     <link href="../image/logo.jpg" rel="shortcut icon " type="image/jpg">
</head>

<body>

   <div class="wrapper" style="background:rgba(0,0,0,0.5)">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4 class="text-center" style="font-family:curtain"><a href="../index.php">Mental Counselling and Support</a></h4>
            <hr style="background:white"/>

            <ul class="list-unstyled components">
                <p>Doctor Pannel</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Profile</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="profile.php">My Profile</a>
                        </li>
                        <li>
                            <a href="editpf.php">Edit Profile</a>
                        </li>
            
                    </ul>
                </li>
                 <li>
                       
                            <a href="chat.php">Patient's Requests </a>
                       
            </li>
                <li>
                    <a href="change.php">Change password</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Appointments</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="myapts.php">My Appointments</a>
                        </li>
                        <li>
                            <a href="apthistory.php">Appointment History</a>
                        </li>
                
                    </ul>
                </li>
               
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>

            </div>
        </nav>

        <!-- Page Content Holder -->
        
             
  