<?php include 'mainheader.php' ?>
<style>
    .article{background-image: url(image/article.jpg); background-position: center;padding: 80px; margin-bottom: 10px}
    .article h1{color: white; text-align: center; font-family: century gothic}
    .text{padding: 10px;font-family: century gothic; text-align: justify}
</style>
<?php 
    $sql="Select * from article where aid='$_GET[aid]'";
$result=$conn->query($sql);
                    $row=$result->fetch_assoc(); 
                            ?>

<div class="container-fluid article">
<div class="row">
<div class="col-md-12">
    <h1 class="text-right"><?php echo $row['subject'] ?></h1>
    </div>
    </div></div>
<div class="container mb-3">
     <div class="row">

         <div class="col-md-5">
             <div class="row p-3" style="background-color:lightgrey;box-shadow:5px 5px 10px lightgrey">
                 <div class="col-md-12">
                     <h1 class="text-center mb-3">Latest Quiz</h1>
              <?php    $blog="select * from blog order by blog_id desc";
							$all_blog=$conn->query($blog);
if($all_blog->num_rows>0){
							while($row1=$all_blog->fetch_assoc()){ ?>
    
  
    <p><?php echo "<a href='blog.php?view=$row1[blog_id]' style='color:black'> <i class='icofont icofont-tick-boxed'></i> &nbsp;".$row1['blog_title']."</a>"?></p>
									
             
             <?php }} ?>
                 </div></div>
         </div>
         
                        <div class="col-md-7">
                                   <img src='doctor/<?php echo $row['image'];?>' style='width:100%; height:400'>
                            <p class="text"><?php echo $row['article'] ?>
                                 </p>
                             </div></div></div>
<?php include 'footer.php' ?>	
