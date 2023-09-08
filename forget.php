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
                <i class="icofont icofont-users-social">Forgot password</i></h1>
 
            <form action="" method="post"> 
                
<div class="form-group input-group">
     <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-envelope'></i></span> 
         <input type="email" required name="em" class="form-control" placeholder="enter your email">
                </div>
              
            <div class="form-group">
             <input type="submit" name="save" class="btn btn-block btn-outline-light" value="Send" style='  background-image:linear-gradient(to left,rgba(200,0,200,0.6),rgba(0,0,0,0.9));border-radius:100px;margin-top:2em;'>
           <div class='text-center pt-3'>     </div></div>
           </form>
               
     
    <?php
    if(isset($_POST['save']))
    {
        $sql="select * from users where email='$_POST[em]'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
          $code=rand(1000,9999);
            $_SESSION['code']=$code;
        
                require 'PHPMailer-master/PHPMailerAutoload.php';
            $em=$_POST['em'];
$email='manpreet.kaur081794@gmail.com';
$password='Manpreet@123';
$to_id=$_POST['em'];
$subject='welcome here';
$message='dear'.$_POST['em'].'use this code to reset your password:'.$code."<a href='http://localhost/dashboard/Mentallwellness/reset.php?id=$em'>click here</a>to reset your account";
$mail=new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPSecure='tls';
$mail->SMTPAuth=true;
$mail->Username=$email;
$mail->Password=$password;
$mail->addAddress($to_id);
$mail->Subject=$subject;
$mail->msgHTML($message);
if(!$mail->send())
{
$error="Mailer Error:".$mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else
{
echo "<div class='alert alert-success '>Message has been sent</div>";
}}
  else
      echo"enter your registered email id";}
                   ?>
        </div>
        </div>
        </div></div>
    <?php include 'footer.php'?>
    