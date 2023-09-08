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
                    
                    <h1>Details of all Doctors</h1>
                </div>
    </nav> 
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-4" style='margin-top:2em;'>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Image</th>
                    <th>Specialisation</th>
                    <th>delete></th>
                    </tr>
                    
                    <?php
    $sql="select * from doctors,specialization where doctors.specialisation=specialization.sid";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['docid'];
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['contact']."</td>";
         echo "<td><img src='../doctor/".$row['image']."' height='60' width='90'></td>";
        echo "<td>".$row['specialization']."</td>";
         echo "<td><a href='alldocs.php?did=$hid'><i class='icofont icofont-delete'></i></td>";
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
                $sql="Delete from doctors where docid='$_GET[did]'";
                if($conn->query($sql)==TRUE)
            echo "<script>window.alert('Deleted');window.location='alldocs.php'</script>";
        else
            echo "error".$sql."</br>".$conn->error;
                 }
                ?>
        </div>
        <div class="col-md-4"></div>
        </div>
                    
    

<?php include 'foot.php'?>
