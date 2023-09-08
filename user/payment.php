<?php include 'head.php'?>
<script src="../editor/ckeditor.js"></script>
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
<h2>Payment</h2>
                    
                </div>
            </nav>
            
          

   <?php
$sql="select * from doctors,specialization where doctors.docid='$_GET[did]' and  specialization.sid=doctors.specialisation";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();

                            
                            ?>
<div class="container">
<div class="col-md-2"></div>
<div class="col-md-8">
    <form action="" method="post">
    <label><b>Name</b></label>
                    <div class="form-group">
                    <input readonly type="text"required name="nm"
                           value="<?php echo $row['name']?>"class="form-control">
                </div>
        <label><b>Specialization</b></label>
    <div class="form-group">
                    <input readonly type="text"name="spe"
                           value="<?php echo $row['specialization']?>"class="form-control">
                </div>
          <label><b>Consultancy Fee</b></label>
        <div class="form-group">
                    <input readonly type="text"name="fee"
                           value="<?php echo $row['fee']?>"class="form-control">
                </div>
   <label><b>Card Holder Name*</b></label>
        <div class="form-group">
           <input type="text" class="form-control" name="cname"> 
        </div>
           <label><b>Card Number*</b></label>
        <div class="form-group">
             <input type="text" pattern="[0-9]{16}" class="form-control" name="cnumber">  
        </div>
        <div class="row">
        <div class="col-md-4 form-group">
               <label><b>EXP Month*</b></label>
             <input type="text" class="form-control" name="emonth"> 
            </div>
        <div class="col-md-4 form-group">
              <label><b>EXP Year*</b></label>
             <input type="text" pattern="[0-9]{4}" class="form-control" name="eyear"> 
            </div>
        <div class="col-md-4 form-group">
              <label><b>CVV*</b></label>
             <input type="text" class="form-control" name="cvv"> 
            </div>
        
        </div>
        <div class="form-group">
        <input type="submit" name="save" class="btn btn-dark" value="Pay">
        </div>
    </form>
    <?php
    if(isset($_POST['save']))
    {
       $sql="INSERT INTO payment (userid,docid,cname,cno,eyear,cvv,amount,emonth) VALUES ('$_SESSION[uid]','$_GET[did]','$_POST[cname]','$_POST[cnumber]','$_POST[eyear]','$_POST[cvv]','$_POST[fee]','$_POST[emonth]')";
       $sql1="INSERT INTO consult_online (userid,docid,c_fee,status) VALUES ('$_SESSION[uid]','$_GET[did]','$_POST[fee]','1')";
        $sql2="Insert into chat (id_to,id_from,message)values('$_GET[did]','$_SESSION[uid]','Request for Online Consultation')";
     if($conn->query($sql)==TRUE){
     if($conn->query($sql1)==TRUE){
     if($conn->query($sql2)==TRUE){
  
        echo"<script>window.alert('Paid successfully');window.location='consultonline.php?id=$_GET[did]'</script>";
     
     }else  echo"<div class='alert alert-danger'>Error".$sql2."<br/>".$conn->error."</div>";}
          echo"<div class='alert alert-danger'>Error".$sql1."<br/>".$conn->error."</div>";}
         else
                echo"<div class='alert alert-danger'>Error".$sql."<br/>".$conn->error."</div>";
    }
     ?>
    
    
    </div>
    <div class="col-md-2"></div>
    </div></div>
    <?php include 'foot.php'?>