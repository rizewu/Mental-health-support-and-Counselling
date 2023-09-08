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
                    
                    <h1>Help Messages</h1>
                </div>
    </nav> 
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8" style='margin-top:2em;'>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    <th>Subject</th>
                    <th>Help</th>
                    <th>Help by</th>
                    <th>Help on</th>
                    <th>delete</th>
                    <th>Reply</th>
                                </tr>
                    
                    <?php
    $sql="select * from help";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['helpid'];
        echo "<tr>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['help']."</td>";
        echo "<td>".$row['helpby']."</td>";
        echo "<td>".$row['helpon']."</td>";
         echo "<td><a href='allmsgs.php?did=$hid'><i class='icofont icofont-delete'></i></td>";
         echo "<td><a href='reply.php?id=$hid'><i class='icofont icofont-reply'></i></td>";
        
        echo "</tr>";
        }
    }
 else
    echo "not found";
              
                

                ?>
                </table>
                    <?php
                 if(isset($_GET['did']))
                 {
                $sql="Delete from help where helpid='$_GET[did]'";
                if($conn->query($sql)==TRUE)
            echo "<script>window.alert('Deleted');window.location='allmsgs.php'</script>";
        else
            echo "error".$sql."</br>".$conn->error;
                 }
                ?>
        </div>
        <div class="col-md-4"></div>
        </div>
                    
     
  <?php include 'foot.php'?>