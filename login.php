<?php include 'header.php'?>

    <div class="container-fluid login" style="height:100%">
         <div class="row ">
        <div class="col-md-12 mt-3 ml-4">
            <h4><a href="index.php" style="text-decoration:none;color:white;font-family:courier;font-weight:bold"><i class="icofont icofont-home"></i>&nbsp;Mental Support and Counselling</a></h4>
            </div>
        
        </div>
    <div class="container">
       
    <div class="form-row">
   <div class="col-md-2">
        
        </div>
        <div class="col-md-8  mb-3 p-3"style="">
            <div class='row login-element'>
            
            <div class='col-md-6'>
                
                <h3>Mental info</h3>
       <p>your mental health is our priority,your happiness is an essential,your self care is a necessity</p>
       
       <h6> QUIZ</h6>
          <p>take the easy quiz and find about your problems</p>
       <h6>ARTICLES</h6>
          <p>articles are published every week by experts </p>
     <h6>CONSULT NEAREST DOCTORS</h6>
          <p>find nearest doctor through our zipcode facility</p>    
                </div>
                 <div class='col-md-6 bg-light'>
            <h1 class="mt-5 text-center">
                <i class="icofont icofont-users-social">Login</i></h1>
                <hr style='width:150px;border-color:purple;border-width:2px;margin-left:5.6em;'/>
    <form action="" method="post">
        <label>Email</label>
            <div class="input-group">
              <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-envelope'></i></span> 
         <input type="email" required name="em" class="form-control" placeholder="enter email">
            </div>
      <label>Password</label>
         <div class="input-group">
              <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-lock'></i></span>
         <input type="password" required name="pwd" class="form-control" placeholder="********">
            </div>
            
            <div class="form-group">
             <input type="submit" required name="save" class="btn danger btn-block btn-outline-light" value="Login">
                <div class='text-center pt-3'>
                    
                <span style='font-family:century gothic;'><a href='forget.php'>Forgot password?</a></span>
                </div>
                <div class='text-center pt-3'>
        
                <span style='font-family:century gothic;'>Don't have an account <a href='register.php'>Sign up?</a></span>
                </div>
        </div></form>
     <?php
    if(isset($_POST['save']))
    {
        $sql="select * from users where email='$_POST[em]' and password='$_POST[pwd]'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
      {      
       $row=$result->fetch_assoc();
        $_SESSION['uid']=$row['userid'];
        $_SESSION['euid']=$_POST['em'];
            if(isset($_GET['id']))
            {
        echo"<script>window.location='doctor.php?doc_id=$_GET[id]'</script>";
            }
            else
        echo"<script>window.location='alldoctor.php'</script>";
        }
else
    echo"incorrect email or password";
    
    }
    ?>
                </div></div></div><div class="col-md-2"></div></div></div></div>
    
    <?php include 'footer.php'?>
    
