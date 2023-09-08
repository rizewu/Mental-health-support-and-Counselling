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
            <?php echo"<img src='".$row['uimage']."'height='230px'width='100%'>"?><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form group">
                    <input type="file" name="image">
                    </div><br>
                <div class="form-group">
                    <input type="submit" name="save" value="upload" class="btn btn-dark">
                </div>
                    </form>
            <?php
    if(isset($_POST['save']))
    {
        $dirname="image/";
        $filename=$_FILES['image']['name'];
        $tmpname=$_FILES['image']['tmp_name'];
        $filetype=pathinfo($filename,PATHINFO_EXTENSION);
        if($filetype!='jpg'&&$filetype='jpeg'&&$filetype!='png'&&$filetype!='JPG'&&$filetype!='JPEG'&&$filetype!='PNG')
        {
            echo"only jpg,jpeg,png file allowed";
        }
        else
        {
        $filename=$dirname.$filename;
        if(move_uploaded_file($tmpname,$filename))
            
        {
            $sql="update users set uimage='$filename' where userid='$_SESSION[uid]'";
            if($conn->query($sql)==TRUE)
                echo"<script>window.alert('updated successfully');window.location='editpf.php'</script>";
            else
                echo"<div class='alert alert-danger'>Error".$sql."<br/>".$conn->error."</div>";
        
            
        }
            else
                echo"Error in file upload";
        }
    }
                    ?>       
            </div>
            <div class="col-md-8">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
            <label><b>Name</b></label>
                    <div class="form-group">
                    <input type="text" required name="nm" pattern="[A-Z a-z]{3,30}" value="<?php echo $row['uname']?>"class="form-control">
                </div>
            </div>
                    <div class="col-md-6">
                <label><b>Email</b></label>
                    <div class="form-group">
                    <input type="email" required name="em" value="<?php echo $row['email']?>" class="form-control">
                </div>
                        </div></div>
                <div class="row">
                    <div class="col-md-6">        
                        <label><b>State</b></label>
                    <div class="form-group">
                    <input type="text" required name="ste" value="<?php echo $row['state']?>"class="form-control">
                </div>
                    </div> 
            <div class="col-md-6"> 
                 <label><b>Zip code</b></label>
                    <div class="form-group">
                    <input type="text" required name="zip" value="<?php echo $row['zipcode']?>"class="form-control">
                </div>
                    </div></div>
                    <div class="row">
                    <div class="col-md-6"> 
     <label><b>City</b></label>
                    <div class="form-group">
                    <input type="text" required name="cit" value="<?php echo $row['ucity']?>"class="form-control">
                </div>
                    </div>

                    <div class="col-md-6"> 
     <label><b>Contact</b></label>
                    <div class="form-group">
                    <input type="tel" pattern="[0-9]{10}" required name="phn" value="<?php echo $row['contact']?>"class="form-control">
                </div>
                        </div></div>
                    <div class="row">
                      <div class="col-md-6">      
                <label><b>DOB</b></label>
                    <div class="form-group">
                    <input type="date" required name="dob" value="<?php echo $row['dob']?>"class="form-control">
                </div>
            </div>    
                       <div class="col-md-6"> 
                         <label><b>Gender</b></label>
                    <div class="form-group">
                    <input type="text" required name="gen" value="<?php echo $row['gender']?>"class="form-control">
                </div>
                        </div></div>
                <div class="form-group">
                 <textarea required name="add"class="form-control "rows="5"><?php echo $row['address']?></textarea>
             </div>
    
   <div class="form-group">
                    <input type="submit" name="save1" value="update" class="btn btn-dark">
                </div>
                    </form>
   <?php
    if(isset($_POST['save1']))
    {
        $sql="update users set
    uname='$_POST[nm]',email='$_POST[em]',state='$_POST[ste]',Zipcode='$_POST[zip]',ucity='$_POST[cit]',contact='$_POST[phn]',dob='$_POST[dob]',gender='$_POST[gen]',address='$_POST[add]'
   where userid='$_SESSION[uid]'";
     if($conn->query($sql)==TRUE)
         echo"<script>window.alert('updated successfully');window.location='editpf.php'</script>";
            else
                echo"<div class='alert alert-danger'>Error".$sql."<br/>".$conn->error."</div>";
    }
     ?>
</div>
                    </div>
</div>
        
     
     
    <?php include'foot.php'?>
    
    
    
    
    






