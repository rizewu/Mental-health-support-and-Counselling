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
<h2>Depression Type</h2>
                    
                </div>
            </nav>

<div class="container">
        <div class="row">
            
                <div class="col-md-4">
                    <label><b>Depression Types</b></label>
                    <form action="" method="post">
                    <div class="form-group">
                    <input type="text" name="dp"class="form-control"placeholder="Enter Depression Type">
                </div>
                        <div class="form-group">
                    <input type="text" name="ico"class="form-control"placeholder="Icofont">
                </div>
                        <div class="form-group">
                 <textarea required="required" rows="5" class="form-control" name="dec"
                     placeholder="Enter Description"></textarea>
                        </div>
                          <div class="form-group">
                 <input type="submit" name="save" value="submit" class="btn btn-danger">
             </div>
                    </form>
                   
     <?php
    if(isset($_POST['save']))
    {
        $text=addslashes($_POST['save']);
        $sql="INSERT INTO category (ctg_title,description,icofont)
        VALUES('$_POST[dp]','$_POST[dec]','$_POST[ico]')";
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
                    
                    
                    <th>Icofont</th>
                    <th>Depression Type</th>
                    <th>Depression Description</th>
                    <th>Delete</th>
                    </tr>
                    
                    <?php
    $sql="select * from category";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['ctg_id'];
        echo "<tr>";

        echo "<td>".$row['icofont']."</td>";
        echo "<td>".$row['ctg_title']."</td>";
         echo "<td>".$row['description']."</td>";
        echo "<td><a href='category.php?id=$hid'><i class='icofont icofont-delete'></i></td>";
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
                $sql="Delete from depression where dpid='$_GET[id]'";
                if($conn->query($sql)==TRUE)
            echo "<script>window.alert('Deleted');window.location='deptype.php'</script>";
        else
            echo "error".$sql."</br>".$conn->error;
                 }
                ?>
            
            </div>
    
    </div> 
                























<?php include 'foot.php'?>