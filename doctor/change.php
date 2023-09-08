<?php include 'head.php'?>
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
                    
                    <h3>Change Password</h3>
                </div>
    </nav>
     <div class="container">
    <div class="form-row">
   <div class="col-md-3"></div>
        <div class='col-md-6 bg-light rounded rounded-lg p-5' style='margin-top:2em;'>
            <h1 class="mt-3 mb-4 text-center">
                <i class="icofont icofont-lock">Change Password</i></h1>
 
        
            <form action="" method="post"> 
               <label>Old Password</label>
<div class="form-group input-group">
            
<span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-lock'></i></span>
         <input type="password" required name="pwd" class="form-control" placeholder="********">
                </div>
                <label>New Password</label>
                <div class="form-group input-group">
                    <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-lock'></i></span>
         <input type="password" required name="npwd" class="form-control" title="Minimum 8 charcters that should include upper case,lower case,special characters,numbers." 
pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="********">
                </div>
                <label>Confirm Password</label>
              <div class="form-group input-group">
                  <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-lock'></i></span>
         <input type="password" required name="cpwd" class="form-control" placeholder="********">
                </div>
            <div class="form-group">
              
         <input type="submit" required name="save" class="btn btn-block btn-outline-light" value="Change password" style='  background-image:linear-gradient(to left,rgba(200,0,200,0.6),rgba(0,0,0,0.9));border-radius:100px;margin-top:2em;'>
           <div class='text-center pt-3'>     </div></div>
           </form>
            <?php
    if(isset($_POST['save']))
    {
        $sql="select * from doctors where docid='$_SESSION[docid]'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        $pwd=$row['password'];
        if($pwd==$_POST['pwd'])
        {
            if($_POST['npwd']==$_POST['cpwd'])
            {
                $sql="update doctors set password='$_POST[npwd]'where docid='$_SESSION[docid]'";
                if($conn->query($sql)==TRUE)
                    echo"password changed";
                else
                    echo"error".$sql."</br>".$conn->error;
            }
            else
                echo"incorrect confirm password";
        }
        else
            echo"incorrect old password";
    }
            ?>
        </div>
        <div class="col-md-3"></div>
        </div>
        </div>
    <?php include 'foot.php'?>
    