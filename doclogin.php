<?php include 'header.php'?>

    <div class="container-fluid login" style=";height:100%">
              <div class="row ">
        <div class="col-md-12 mt-3 ml-4">
            <h4><a href="index.php" style="text-decoration:none;color:white;font-family:courier;font-weight:bold"><i class="icofont icofont-home"></i>&nbsp;Mental Support and Counselling</a></h4>
            </div>
        
        </div>
    <div class="container">
    <div class="form-row">
   <div class="col-md-2">
        
        </div>
        <div class="col-md-8 mt-5 mb-3 p-5"style="">
            <div class='row login-element'>
            
            <div class='col-md-6'>
                
                <h3>Mental info</h3>
       <p>it my text, will be changed </p>
       
       <h6>info of docs</h6>
          <p>it my text, will be chait my text, will be chait my text, will be changed </p>
       <h6>info of docs</h6>
          <p>it my text, will be chait my text, will be chait my text, will be changed </p>
     <h6>info of docs</h6>
          <p>it my text, will be chait my text, will be chait my text, will be changed </p>    
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
             <input type="submit" name="save" class="btn btn-block btn-outline-light" value="signup">
                </div></form>
     <?php
    if(isset($_POST['save']))
    {
        $sql="select * from doctors where email='$_POST[em]' and password='$_POST[pwd]'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
      {      
       $row=$result->fetch_assoc();
        $_SESSION['docid']=$row['docid'];
        $_SESSION['doc']=$_POST['em'];
        echo"<script>window.location='doctor/profile.php'</script>";
        }
else
    echo"incorrect email or password";
    
    }
    ?>
        </div>
            </div>
        </div>
        </div>
        </div>
</div>
    
    <?php include 'footer.php'?>
    