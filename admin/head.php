<?php include'../db.php'?>
<?php session_start();
if(!isset($_SESSION['ad']))
{
echo"<script>window.location='../adminlogin.php'</script>";
}
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Mental counselling and support</title>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link href="../css/icofont.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style5.css">
    <link href="../image/logo.jpg" rel="shortcut icon " type="image/jpg">
</head>

<body>

   <div class="wrapper" >
        <!-- Sidebar Holder -->
   
        <nav id="sidebar" >
            <div class="sidebar-header">
                <h4 class="text-center" style="font-family:curtain"><a href="../index.php">Mental Counselling and Support</a></h4>
            <hr style="background:white"/>

            <ul class="list-unstyled components">
                <p>Admin Pannel</p>
                <li class="active">
                    <a href="dashboard.php" >Dashboard</a></li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Doctors</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="doc1.php">Add Doctors</a>
                        </li>
                        <li>
                            <a href="sch.php">Add Schedule</a>
                        </li>
                        <li>
                            <a href="alldocs.php">All Doctors</a>
                        </li>
            
                    </ul>
                </li>
                <li>
                    <a href="specialisation.php">Specialization</a>
                </li>
                <li>
                    <a href="zipcode.php">Zip Code</a>
                </li>
                
                <li>
                    
                    
                            <a href="addquiz.php">Add Quiz</a>
                   
                </li> 
                
                    
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Blog</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="blog.php">Add Blog</a>
                        </li>
                        <li>
                            <a href="allblogs.php">All Blogs</a>
                        </li>
                
                    </ul>
                </li>
                <li>
                    <a href="allusers.php">Registered Users</a>
                </li>
                
                 <li>
                
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Messages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="allmsgs.php">Help Messages</a>
                        </li>
                        <li>
                            <a href="allreviews.php">Reviews</a>
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
        
             
  