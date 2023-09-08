<?php include 'head.php'?>
<html>
<head>
<title>css</title>
 <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/icofont.css" rel="stylesheet">
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
                    
                    <h1>Add Doctor</h1>
                </div>
    </nav> 
<div class="container">
        <div class="row">
  
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
            <label><b>Name</b></label>
                    <div class="form-group">
        <input type="text" required autofocus   autocomplete="off" required name="nm" pattern="[A-Z a-z]{3,30}" class="form-control"placeholder="enter your name" title="format:alphabets only">
                </div>
            </div>
                        
                    <div class="col-md-6">
                <label><b>Email</b></label>
                    <div class="form-group">
                    <input type="email" required name="em" class="form-control"placeholder="Enter your email">
                </div>
                        </div></div>
                    <div class="row">
                    <div class="col-md-4"> 
                         <label><b>Gender</b></label>
                    <div class="form-group">
                         <select name="gen" class="custom-select">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            
          </select>     </div></div>
                    
                    <div class="col-md-4"> 
     <label><b>Contact</b></label>
                    <div class="form-group">
                    <input type="tel" pattern="[0-9]{10}" required name="phn"class="form-control"placeholder="Enter your phone number">
                </div>
                        </div>
                    <div class="col-md-4">      
                <label><b>DOB</b></label>
                    <div class="form-group">
                    <input type="date" required name="dob"class="form-control"placeholder="Enter your birthdate">
                </div>
                        </div>
                        </div>
                
                <div class="row">
                    <div class="col-md-4"> 
     <label><b>City</b></label>
                    <div class="form-group">
                    <input type="text" required name="cit"class="form-control"placeholder="Enter your city">
                </div>
                    </div>

                
            <div class="col-md-4"> 
                 <label><b>Zip code</b></label>
                    <div class="form-group">
                    <select required name="zip"class="form-control">
                        <option value="" selected>Select Zip Code</option>
                                        <?php
    $sql="select * from zipcode";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['zipcode'];
        echo "<option value=$hid>".$hid."</option>";
    }}?>
                        </select>
                </div>
                    </div>
                    
                    
                      <div class="col-md-4">      
                <label><b>State</b></label>
                    <div class="form-group">
                    <input type="state" required name="ste"class="form-control"placeholder="Enter your state">
                </div>
            </div>   
                    </div>
                 
                
                
                <div class="form-group">
                    <label><b>Address</b></label>
                 <textarea name="add" required class="form-control "rows="5"placeholder="Enter your address"></textarea>
             </div>
                <div class="row">
                         <div class="col-md-6">      
                <label><b>Qualification</b></label>
                    <div class="form-group">
                    <input type="text" required name="ql"class="form-control"placeholder="Enter your qualification">
                </div>
            </div>    
                         
                         <div class="col-md-6">      
                <label><b>Specialisation</b></label>
                    <div class="form-group">
                         <select name="sp" class="custom-select">
                             <option value="">Select specialization</option>
               <?php
    $sql="select * from specialization";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['sid'];
        $sid=$row['specialization'];
      echo "<option value=$hid>".$sid."</option>"; 
    }}
        ?>
            
          </select>     </div></div>
                    </div>
                      <div class="form-group">
                          <label><b>Experience</b></label>
                 <textarea required name="exp"class="form-control "rows="5"placeholder="Enter your experience"></textarea>
             </div>
                    <div class="form-group">
                        <label><b>Bio</b></label>
                 <textarea required name="bio"class="form-control "rows="5"placeholder="Write about yourself"></textarea>
             </div>
                   
                         
                    
   <div class="form-group">
                    <input type="submit" name="save1" value="Create" class="btn btn-dark">
                </div>
                    </form>
   <?php
    if(isset($_POST['save1']))
    {   if($_POST['gen']=='Male')
        $dp='image/docmale.jpeg';
     else
        $dp='image/docfemale.jpeg';
       $sql="INSERT INTO doctors (name,email,gender,contact,city,zipcode,state,dob,address,qualification,specialisation,experience,bio,image,password) VALUES('$_POST[nm]','$_POST[em]','$_POST[gen]','$_POST[phn]','$_POST[cit]','$_POST[zip]','$_POST[ste]','$_POST[dob]','$_POST[add]','$_POST[ql]','$_POST[sp]','$_POST[exp]','$_POST[bio]','$dp','$_POST[phn]')";
     if($conn->query($sql)==TRUE)
         echo"<script>window.alert('updated successfully');window.location='doc1.php'</script>";
            else
                echo"<div class='alert alert-danger'>Error".$sql."<br/>".$conn->error."</div>";
    }
     ?>
</div>
                    </div>
</div>
        
     
     
    <?php include'foot.php'?>
    
    