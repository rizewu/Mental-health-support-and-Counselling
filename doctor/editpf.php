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
                    
                    <h3>My Profile</h3>
                </div>
    </nav>
    <?php
$sql="select * from doctors where docid='$_SESSION[docid]'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
?>
    <div class="container">
        <div class="row">
            
                <div class="col-md-4">
            <?php echo"<img src='".$row['image']."'height='300px'width='100%'>"?><br>
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
            $sql="update doctors set image='$filename' where docid='$_SESSION[docid]'";
            if($conn->query($sql)==TRUE)
                echo"<script>window.alert('updated successfully');window.location='editpf.php'</script>";
            else
                echo"<div class='alert alert-danger'>Error".$sql."<br/>".$conn->error."</div>";
        
            
        }
            else
                echo"Error in file upload";
        }
    }
                    ?>     </div>
            <div class="col-md-8">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
            <label><b>Name</b></label>
                    <div class="form-group">
                    <input type="text"autofocus  autocomplete="off"  name="nm" pattern="[A-Z a-z]{3,30}"
                           value="<?php echo $row['name']?>"name="nm"class="form-control"placeholder="enter your name" title="format:alphabets only">
                </div>
            </div>
                        
                    <div class="col-md-6">
                <label><b>Email</b></label>
                    <div class="form-group">
                    <input type="email"  name="em" value="<?php echo $row['email']?>"class="form-control"placeholder="enter your email">
                </div>
                        </div></div>
                    <div class="row">
                    <div class="col-md-6"> 
                         <label><b>Gender</b></label>
                    <div class="form-group">
                    
                         <select  name="gen"class="custom-select">
            <option value="<?php echo $row['gender']?>"><?php echo $row['gender']?></option>
            <option value="Male">male</option>
            <option value="Female">female</option>
            
          </select>     </div></div>
                    
                    <div class="col-md-6"> 
     <label><b>Contact</b></label>
                    <div class="form-group">
                    <input type="tel" pattern="[0-9]{10}"  name="phn"
                           value="<?php echo $row['contact']?>"class="form-control"placeholder="enter your phone number">
                </div>
                        </div></div>
                
                <div class="row">
                    <div class="col-md-6"> 
     <label><b>City</b></label>
                    <div class="form-group">
                    <input type="text"  name="cit"
                           value="<?php echo $row['city']?>"class="form-control"placeholder="enter your city">
                </div>
                    </div>

                
            <div class="col-md-6"> 
                 <label><b>Zip code</b></label>
                    <div class="form-group">
                  <select name="zip"class="form-control">
                        <option value="<?php echo $row['zipcode'] ?>" selected><?php echo $row['zipcode'] ?></option>
                                        <?php
    $sqlz="select * from zipcode";
$resultz=$conn->query($sqlz);
if($resultz->num_rows>0)
{
    while($rowz=$resultz->fetch_assoc())
    {
        $hid=$rowz['zipcode'];
        echo "<option value='$hid'>".$hid."</option>";
    }}?>
                        </select> 
                        
                </div>
                    </div></div>
                    
                     <div class="row">
                      <div class="col-md-6">      
                <label><b>State</b></label>
                    <div class="form-group">
<input type="text"  name="ste"class="form-control" value="<?php echo $row['state'] ?>" placeholder="enter your state">
                </div>
            </div>    
                 
                      <div class="col-md-6">      
                <label><b>DOB</b></label>
                    <div class="form-group">
                    <input type="date" value="<?php echo $row['dob']?>"  name="dob"class="form-control" >
                </div>
                         </div>    </div>
                
                <div class="form-group">
                       <label><b>Address</b></label> 
    <textarea name="add"class="form-control " rows="7"  >
                     <?php echo $row['address']?></textarea>
                             </div>
             
                <div class="row">
                         <div class="col-md-6">      
                <label><b>Qualifications</b></label>
                    <div class="form-group">
                <input type="text" value="<?php echo $row['qualification']?>" name="ql" class="form-control">
                </div>
            </div>    
                         
               
                        
                         <div class="col-md-6">      
                <label><b>Experience</b></label>
                    <div class="form-group">
                    <input type="text"  name="exp"value="<?php echo $row['experience']?>"class="form-control" >
                </div>
                             </div>   </div> 
                     
                      <div class="row">
                         <div class="col-md-6"> 
                     <label><b>Consultancy fee</b></label>
                    <div class="form-group">
                    <input type="text"  name="fee" value="<?php echo $row['fee']?>"class="form-control" >
                             </div></div></div>
                    
                   <div class="form-group">
                       <label><b>Bio</b></label> 
                 <textarea  name="bio"class="form-control "rows="7" placeholder="write about yourself"><?php echo $row['bio']?></textarea>
                             </div>    
                         
                    
   <div class="form-group">
                    <input type="submit" name="save1" value="Save" class="btn btn-dark">
                </div>
                    </form>   
         <?php
    if(isset($_POST['save1']))
    {
        $sql="update doctors set
    name='$_POST[nm]',email='$_POST[em]',state='$_POST[ste]',Zipcode='$_POST[zip]',city='$_POST[cit]',contact='$_POST[phn]',dob='$_POST[dob]',gender='$_POST[gen]',address='$_POST[add]',qualification='$_POST[ql]',experience='$_POST[exp]',bio='$_POST[bio]',fee='$_POST[fee]'
   where docid='$_SESSION[docid]'";
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
    
    