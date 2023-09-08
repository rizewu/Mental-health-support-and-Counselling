<?php include 'mainheader.php' ?>
<style>
    .article{background-image: url(image/article.jpg); background-position: center;padding: 80px; margin-bottom: 10px}
    .article h1{color: white; text-align: center; font-size: 70px; font-family: century gothic}
    .text{padding: 10px;font-family: century gothic }
</style>

<div class="container-fluid article">
<div class="row">
<div class="col-md-12">
    <h1>Articles</h1>
    </div>
    </div></div>
<div class="container">
     <div class="row">
<?php 
    $sql="Select * from article order by aid DESC";
$result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $aid=$row['aid']; 
                            ?>
                        
                              <div class="col-md-4"><br/>
                                   <img src='doctor/<?php echo $row['image'];?>' style='width:100%; height:300'>
                            <p class="text"><a style="text-decoration: none; color:black" href='viewarticle.php?aid=<?php echo $aid ?>'><?php echo $row['subject'] ?></a>
                                 </p>
                             </div>
                     <?php   }}?>
    
    
    </div></div>
<?php include 'footer.php' ?>	
