<?php include'../db.php'?>
<?php session_start();
if(!isset($_SESSION['uid']))
{
echo"<script>window.location='../login.php'</script>";
}
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Mental Support and Counselling</title>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link href="../css/icofont.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style5.css">
    <link href="../css/formstyle.css"rel="stylesheet">
      <link href="../image/logo.jpg" type="image/jpg" rel="shortcut icon">

</head>
<style>
    
    .collapse{
      background:   linear-gradient(#b263fc,#fba2d5,#b263fc) !important;
    }
    </style>
<body>

<div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4 class="text-center" style="font-family:curtain"><a href="../index.php">Mental Support and Counselling</a></h4>
            <hr style="background:white"/>
           

            <ul class="list-unstyled components">
                <p>User- Pannel</p>
                <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="profile1.php">My Profile</a>
                        </li>
                        <li>
                            <a href="editpf.php">Edit Profile</a>
                        </li>
                       
                    </ul>
                </li>
                <li class="">
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Messages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="help.php">Send Messages</a>
                        </li>
                        <li>
                            <a href="mymsgs.php">View Reply</a>
                        </li>
                       
                    </ul>  
                </li>
                 <li>
                       
                            <a href="../alldoctor.php">Make an Appointment</a>
                       
            </li>
                <li>
                       
                            <a href="review.php">Review</a>
                       
            </li>
               
                
                <li>
                    <a href="change.php">Change Password</a>
                </li>
                <li>
                     <a href="logout.php">Logout</a>
                </li>
            
            </ul>
            </div>
        </nav>

        <!-- Page Content Holder -->
        
             
  