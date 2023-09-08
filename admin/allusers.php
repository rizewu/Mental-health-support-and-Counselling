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
                    
                    <h1>User Data</h1>
                </div>
    </nav> 
    <div class="container">
    <div class="row">
        
            <div class="col-md-12" style='margin-top:2em;'>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
        <th>gender</th>
                    
                                <th>zipcode</th>
                    <th>address</th>
                    <th>state</th>
                    <th>Image</th>
                    <th>Delete</th>
                                </tr>
                    
                    <?php
    $sql="select * from users";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $bid=$row['userid'];
        echo "<tr>";
      
        echo "<td>".$row['uname']."</td>";
              echo "<td>".$row['email']."</td>";
              echo "<td>".$row['contact']."</td>";
              echo "<td>".$row['gender']."</td>";
              echo "<td>".$row['zipcode']."</td>";
              echo "<td>".$row['address']."</td>";
              echo "<td>".$row['state']."</td>";
        
        echo "<td><img src='".$row['uimage']."' height='60' width='90'></td>";
       
          echo "<td><a href='allusers.php?id=$bid'><i class='icofont icofont-delete'></i></td>";
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
                $sql="Delete from users where bid='$_GET[id]'";
                if($conn->query($sql)==TRUE)
            echo "<script>window.alert('Deleted');window.location='allusers.php'</script>";
        else
            echo "error".$sql."</br>".$conn->error;
                 }
                ?>
            
        </div>
        <div class="col-md-4"></div>
        </div>
                    
      
  <?php include 'foot.php'?>