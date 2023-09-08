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
<h2>Specialization</h2>
                    
                </div>
            </nav>

<div class="container">
        <div class="row">
            
                <div class="col-md-4">
                    <label><b>Enter Specialization</b></label>
                    <form action="" method="post">
                    <div class="form-group">
                    <input type="text" required name="sp" class="form-control" placeholder="Enter your specialisation">
                </div>
                          <div class="form-group">
                 <input type="submit" name="save" value="submit" class="btn btn-danger">
             </div>
                    </form>
                   
     <?php
    if(isset($_POST['save']))
    {
        $text=addslashes($_POST['sp']);
        $sql="INSERT INTO specialization (specialization)
        VALUES('$_POST[sp]')";
        if($conn->query($sql)==TRUE)
            echo "successfully sent";
        else
            echo "error".$sql."</br>".$conn->error;
        
    }
    ?>
    
   
            </div> 
            <div class="col-md-2"></div>
            <div class="col-md-6">
             <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    
                    
                    <th>Specialization</th>
                    <th>Delete</th>
                    </tr>
                    
                    <?php
    $sql="select * from specialization";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['sid'];
        echo "<tr>";

        echo "<td>".$row['specialization']."</td>";
        echo "<td><a href='Specialisation.php?id=$hid'><i class='icofont icofont-delete'></i></td>";
        echo "</tr>";
        }
    }
 else
    echo "No Result Found";
              
                

                ?>
               
                </table>
                <?php
                 if(isset($_GET['id']))
                 {
                $sql="Delete from specialization where sid='$_GET[id]'";
                if($conn->query($sql)==TRUE)
            echo "<script>window.alert('Deleted');window.location='specialisation.php'</script>";
        else
            echo "error".$sql."</br>".$conn->error;
                 }
                ?>
            
            </div>
    
    </div> 
                























<?php include 'foot.php'?>