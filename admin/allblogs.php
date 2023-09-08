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
                    
                    <h1>Blog</h1>
                </div>
    </nav> 
    <div class="container">
    <div class="row">
        
            <div class="col-md-12" style='margin-top:2em;'>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    <th>Subject</th>
        
                    <th>Image</th>
                    <th>Category</th>
                     <th>Description</th>
                    <th>Delete</th>
                                </tr>
                    
                    <?php
    $sql="select * from blog,category where blog.ctg_id=category.ctg_id";
     $result=$conn->query($sql);
    if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $bid=$row['blog_id'];
        echo "<tr>";
        echo "<td>".$row['ctg_title']."</td>";
        echo "<td><img src='".$row['blog_pic']."' height='60' width='90'></td>";
        echo "<td>".$row['blog_title']."</td>";
        echo "<td>".$row['blog_desc']."</td>";
          echo "<td><a href='allblogs.php?id=$bid'><i class='icofont icofont-delete'></i></td>";
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
                $sql="Delete from blog where blog_id='$_GET[id]'";
                if($conn->query($sql)==TRUE)
            echo "<script>window.alert('Deleted');window.location='allblogs.php'</script>";
        else
            echo "error".$sql."</br>".$conn->error;
                 }
                ?>
            
        </div>
        <div class="col-md-4"></div>
        </div>
                    
      
  <?php include 'foot.php'?>