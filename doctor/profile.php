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
$sql="select * from doctors,specialization where docid='$_SESSION[docid]' and specialization.sid=doctors.specialisation";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
?>
    <div class="container">
        <div class="row">
            
                <div class="col-md-4">
            <?php echo"<img src='".$row['image']."'height='300px'width='100%'>"?>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <h3><u>Personal Details:</u></h3>
                <h2><?php echo $row['name']?></h2>
    <p><b>Gender:</b><?php echo $row['gender']?></p>   
                <p><b>Dob:</b><?php echo $row['dob']?></p>
                <h3><u>Contact Details:</u></h3>
                <p><b>Email:</b><?php echo $row['email']?></p>
                <p><b>Contact:</b><?php echo $row['contact']?></p>
                <p><b>City:</b><?php echo $row['city']?></p>
                <p><b>State:</b><?php echo $row['state']?></p>
                <p><b>Zipcode:</b><?php echo $row['zipcode']?></p>
                <p><b>Address:</b><?php echo $row['address']?></p>
                <h3><u>Professional Details:</u></h3>
                <p><b>Qualification:</b><?php echo $row['qualification']?></p>
                <p><b>Specialisation:</b><?php echo $row['specialization']?></p>
                <p><b>Experience:</b><?php echo $row['experience']?></p>
                <p><b>Consultancy Fee:</b><?php echo $row['fee']?></p>
                <p><b>Bio:</b><?php echo $row['bio']?></p>
            </div>
            
        </div>
    </div>
    <?php include'foot.php'?>
    
    
    
    
    
