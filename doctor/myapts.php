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
                    
                    <h1>My Appointment</h1>
                </div>
    </nav> 
<div class="container">
<div class="row">
    
            <div class="col-md-12" style='margin-top:2em;'>
                <h2>Clients waiting for Appointment</h2>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    <th>Patient</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Action</th>
                   
                                </tr>
                    
                    <?php
   
    $sql="select * from users,appointment where appointment.docid='$_SESSION[docid]' and appointment.aptby=users.userid and appointment.status='Pending'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['aptid'];
        echo "<tr>";
        echo "<td>".$row['uname']."</td>";
        echo "<td>".$row['contact']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['message']."</td>";
        echo "<td>".$row['time']."</td>";
       
        echo "<td>".$row['date']."</td>";
  ?>
        <form action="" method="post">
            
            <td> <div class="btn-group"><button class="btn btn-sm btn-success" value="Accept">       <?php echo"<a href='myapts.php?aid=$hid'>Accept</a>"?>   </button>
                <button name="rej" class="btn btn-sm btn-danger" value="Reject"> <?php echo"<a href='myapts.php?rid=$hid'>Reject</a>"?> </button>        
           </div></td>
        </form>   
                    <?php
         if(isset($_GET['aid']))
    {
     $sql="update appointment set status='Accepted'
        where aptid='$_GET[aid]'";
     if($conn->query($sql)==TRUE)
         echo"<script>window.alert('updated successfully');window.location='myapts.php'</script>";
            else
                echo"<div class='alert alert-danger'>Error".$sql."<br/>".$conn->error."</div>";
         }
    
             if(isset($_GET['rid']))
             {
                 $sql="update appointment set status='Rejected'
        where aptid='$_GET[rid]'";
     if($conn->query($sql)==TRUE)
         echo"<script>window.alert('updated successfully');window.location='myapts.php'</script>";
            else
                echo"<div class='alert alert-danger'>Error".$sql."<br/>".$conn->error."</div>";
         
      
        }
        
        
        
        ?>
                    <?php
        echo "</tr>";
        }
    }
 else
    echo "not found";
              
                

                ?>
                </table>
    </div>
                    <?php
                 if(isset($_GET['aptid']))
                 {
                $sql="Delete from appointment where hid='$_GET[aptid]'";
                if($conn->query($sql)==TRUE)
            echo "<script>window.alert('Deleted');window.location='myapts.php'</script>";
        else
            echo "error".$sql."</br>".$conn->error;
                 }
                ?>
        </div>
        <div class="col-md-4"></div>
        </div>
                    
           
    <div class="container">
<div class="row">
            <div class="col-md-12" style='margin-top:2em;'>
                <h2>Scheduled Appointments</h2>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    <th>User Name</th>
                    <th>User ID</th>
                    <th>message</th>
                    
                    <th>time</th>
                    
                    <th>date</th>
                      
                                </tr>
                    
                    <?php
    $sql="select * from users,appointment where appointment.docid='$_SESSION[docid]' and appointment.aptby=users.userid and appointment.status='Accepted'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['aptid'];
        echo "<tr>";
        echo "<td>".$row['uname']."</td>";
        echo "<td>".$row['aptby']."</td>";
        echo "<td>".$row['message']."</td>";
        echo "<td>".$row['time']."</td>";      
        echo "<td>".$row['date']."</td>";
        
        echo "</tr>";
        }
    }
 else
    echo "not found";
              
                

                ?>
                </table>
                <div class="col-md-2">
                </div> 

<?php include 'foot.php'?>