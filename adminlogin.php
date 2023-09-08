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
    <div class="container">
    <div class="form row">
   <div class="col-md-4">
        
        </div>
          
            
 <div class='col-md-4 bg-light rounded' style='margin-top:10em;'>
            <h1 class="mt-3 text-center">
                <i class="icofont icofont-users-social">Admin Login</i></h1>
                
    <form action="" method="post">
            <div class="form-group input-group">
               
              <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-ui-user'></i></span> 
         <input type="name" required name="em" class="form-control" placeholder="enter name">
            </div>
            <div class="form-group input-group">
                
              <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-lock'></i></span>
         <input type="password" required name="pwd" class="form-control"
 placeholder="enter password">
            </div>
            
            <div class="form-group">
             <input type="submit" name="save" class="btn btn-block btn-outline-light" value="login" style='  background-image:linear-gradient(to left,rgba(200,0,200,0.6),rgba(0,0,0,0.9));border-radius:100px;margin-top:2em;'>
           <div class='text-center pt-3'>
                </div></div></form>
     <?php
    if(isset($_POST['save']))
    {
        $sql="select * from admin where name='$_POST[em]' and password='$_POST[pwd]'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
      {      
       $row=$result->fetch_assoc();
        $_SESSION['ad']=$_POST['em'];
        echo"<script>window.location='admin/dashboard.php'</script>";
        }
else
    echo"incorrect email or password";
    
    }
    ?>
        </div></div></div></div>
        
    <?php include 'footer.php'?>
    