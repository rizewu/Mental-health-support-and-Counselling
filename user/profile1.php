<?php include 'head.php'?>
<html>
<head>
<title>css</title>
<link href="../css/bootstrap.min.css"rel="stylesheet">
    </head>
<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    
                    <h3>My Profile</h3>
                </div>
    </nav>
    <?php
$sql="select * from users where userid='$_SESSION[uid]'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
?>
    <div class="container">
        <div class="row">
            
                <div class="col-md-4">
            <?php echo"<img src='".$row['uimage']."'height='250px'width='100%'>"?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <h2><u>Personal Detail:-</u></h2>
                <h3><?php echo $row['uname']?></h3>
    <p><b>Gender:</b><?php echo $row['gender']?></p>   
                <p><b>Dob:</b><?php echo $row['dob']?></p>
                <h2><u>Contact Detail:</u></h2>
                <p><b>Email:</b><?php echo $row['email']?></p>
                <p><b>contact:</b><?php echo $row['contact']?></p>
                <p><b>City:</b><?php echo $row['ucity']?></p>
                <p><b>State:</b><?php echo $row['state']?></p>
                <p><b>Zipcode:</b><?php echo $row['zipcode']?></p>
                <p><b>Address:</b><?php echo $row['address']?></p>
            </div>
            
        </div>
    </div>
    <?php include'foot.php'?>
    
    
    
    
    






