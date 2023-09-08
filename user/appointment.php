<?php include'head.php';?>

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
                    
                    <h3>Make An Appointment</h3>
                </div>
    </nav>
<?php
$sql="select * from doctors,specialization where doctors.docid='$_GET[id]' and specialization.sid=doctors.specialisation";
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
    <label><b>Time</b></label>
        <div class="form-group">
                    <input type="time"required name="time"
                           class="form-control">
                </div>
        <label><b>Date</b></label>
        <div class="form-group">
                    <input type="date" required name="date"
                           class="form-control">
                </div>
    <div class="form-group">
                       <label><b>Message</b></label> 
                 <textarea required name="msg"class="form-control "rows="7"placeholder="write your Message here"></textarea>
                             </div>
    <div class="form-group">
                    <input type="submit" name="save" value="Save" class="btn btn-dark">
                </div>
                    </form> 
 <?php
    if(isset($_POST['save']))
    {
       $sql="INSERT INTO appointment (message,date,time,fee,aptby,docid) VALUES('$_POST[msg]','$_POST[date]','$_POST[time]','$_POST[fee]','$_SESSION[uid]','$_GET[id]')";
     if($conn->query($sql)==TRUE)
        echo"<script>window.alert('sent successfully');window.location='appointment.php?id=$_GET[id]'</script>";
            else
                echo"<div class='alert alert-danger'>Error".$sql."<br/>".$conn->error."</div>";
    }
     ?>


<?php include'foot.php';?>