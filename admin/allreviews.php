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
                    
                    <h1>All Reviews</h1>
                </div>
    </nav> 
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-6" style='margin-top:2em;'>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    <th>subject</th>
                    <th>review</th>
                    <th>review by</th>
                    <th>review on</th>
                   
                    <th>delete</th>
                    </tr>
                    
                    <?php
    $sql="select * from review";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['revid'];
        echo "<tr>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['review']."</td>";
        echo "<td>".$row['reviewby']."</td>";
        echo "<td>".$row['reviewon']."</td>";
       
         echo "<td><a href='allreviews.php?id=$hid'><i class='icofont icofont-delete'></i></td>";
        echo "</tr>";
        }
    }
 else
    echo "not found";
              
                

                ?>
                </table>
                 <?php
                 if(isset($_GET['id']))
                 {
                $sql="Delete from review where revid='$_GET[id]'";
                if($conn->query($sql)==TRUE)
            echo "<script>window.alert('Deleted');window.location='allreviews.php'</script>";
        else
            echo "error".$sql."</br>".$conn->error;
                 }
                ?>
        </div>
        <div class="col-md-4"></div>
        </div>
                    
      
  <?php include 'foot.php'?>