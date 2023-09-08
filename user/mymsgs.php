<?php include '../db.php'?>
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
                    
                    <h1>Reply Status</h1>
                </div>
    </nav> 
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8" style='margin-top:2em;'>
                <h2>Questions waiting for reply</h2>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    <th>Subject</th>
                    <th>Help</th>
                    <th>Help on</th>
                   
                                </tr>
                    
                    <?php
    $sql="select * from help where helpby='$_SESSION[uid]' and status='0'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['helpid'];
        echo "<tr>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['help']."</td>";
       
        echo "<td>".$row['helpon']."</td>";
        echo "</tr>";
        }
    }
 else
    echo "not found";
              
                

                ?>
                </table>
                <div class="col-md-3">
                </div>
                    <?php
                 if(isset($_GET['did']))
                 {
                $sql="Delete from help where hid='$_GET[did]'";
                if($conn->query($sql)==TRUE)
            echo "<script>window.alert('Deleted');window.location='allmsgs.php'</script>";
        else
            echo "error".$sql."</br>".$conn->error;
                 }
                ?>
        </div>
        <div class="col-md-4"></div>
        </div>
                    
           
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8" style='margin-top:2em;'>
                <h2>Questions with reply</h2>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    <th>Subject</th>
                    <th>Help</th>
                    
                    <th>Help on</th>
                    
                    <th>Reply</th>
                      <th>Reply on</th>
                                </tr>
                    
                    <?php
    $sql="select * from help,reply where help.helpby='$_SESSION[uid]' and help.status='1' and help.helpid=reply.quesid";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['helpid'];
        echo "<tr>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['help']."</td>";
        echo "<td>".$row['helpon']."</td>";      
        echo "<td>".$row['reply']."</td>";
         echo "<td>".$row['replyon']."</td>";
        
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