<?php include 'header.php'?>
<style>
    .form input, .form .input-group-text{
        border:none !important;
        border-radius: 100px;
        background:rgba(0,0,0,0.1);
    }
    .form .input-group-text{
        
        border-radius: 100px 0px 0px 100px !important;
              background:rgba(0,0,0,0.1) !important;
    }
    .form .col-md-4:nth-child(2){
        padding:1em 2em;
        background:rgba(255,255,255,0.8) !important;
        border-radius: 50px !important;
        
    }
    .form label{
        padding-top:8px;
        font-family: century gothic;
    }
</style>
     <div class="container-fluid login" style=";height:100%">
               <div class="row ">
        <div class="col-md-12 mt-3 ml-4">
            <h4><a href="index.php" style="text-decoration:none;color:white;font-family:courier;font-weight:bold"><i class="icofont icofont-home"></i>&nbsp;Mental Support and Counselling</a></h4>
            </div>
        
        </div>
    <div class="container">
    <div class="form row">
   <div class="col-md-4">
        
        </div>
          
            
 <div class='col-md-4 bg-light rounded' style='margin-top:10em;'>
            <h1 class="mt-3 text-center">
                <i class="icofont icofont-users-social">Reset Password</i></h1>
            <form action="" method="post">
    
            <div class="form-group input-group">
                <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-key'></i></span> 
         <input type="text" required name="otp" class="form-control" placeholder="Enter OTP">
            </div>
            <div class="form-group input-group">
                    <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-lock'></i></span>
         <input type="password" required name="pwd" class="form-control" placeholder="********">
            </div>
            <div class="form-group input-group">
                    <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-lock'></i></span>
         <input type="password" required name="cpwd" class="form-control" placeholder="********">
            </div>
            <div class="form-group input-group">
             <input type="submit" name="save" class="btn btn-block btn-outline-light" value="Reset Password" style='  background-image:linear-gradient(to left,rgba(200,0,200,0.6),rgba(0,0,0,0.9));border-radius:100px;margin-top:2em;'>
                </div></form>

               
         <?php
    if(isset($_POST['save']))
    {
        $pwd=$_SESSION['code'];
        if($pwd==$_POST['otp'])
        {
            if($_POST['pwd']==$_POST['cpwd'])
            {
                $sql="update doctors set password='$_POST[pwd]'where email='$_GET[id]'";
                if($conn->query($sql)==TRUE)
                    echo"password changed";
                else
                    echo"<div class='alert alert-danger'>Error".sql."</br>".$conn->error."</div>";
                
            }
        else
            echo"incorrect confim password";
    }
            else
                echo"Incorrect OTP";            
    }
            
            ?>
            
    
        </div></div></div></div>
    
    <?php include 'footer.php'?>
    