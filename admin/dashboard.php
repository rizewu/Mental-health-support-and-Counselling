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
<h2>Dashboard</h2>
                    
                </div>
            </nav>
<?php
$result=$conn->query("select * from blog");
$blog=$result->num_rows;

 $result=$conn->query("select * from doctors");
$doc=$result->num_rows;   
    ?>

    <div class="container">
    <div class="row">
    <div class="col-md-3 bg-danger text-white">
        <div class="row  p-3">
        <div class="col-md-4 mt-2">
            <i class="icofont icofont-5x icofont-doctor"></i>
            </div>
        <div class="col-md-8">
             <h2>Doctors</h2>
        <h6><?php echo $doc ?></h6>
        <a href="alldocs.php">View Detail..</a>
            </div>
        </div>
       
        </div>
           <div class="col-md-3 bg-dark text-white ml-3">
        <div class="row  p-3">
        <div class="col-md-4 mt-2">
            <i class="icofont icofont-5x icofont-social-blogger"></i>
            </div>
        <div class="col-md-8">
             <h2>Blogs</h2>
        <h6><?php echo $blog ?></h6>
        <a href="allblogs.php">View Detail..</a>
            </div>
        </div>
       
        </div>
        
        </div>
    </div>






<?php include 'foot.php'?>