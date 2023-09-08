<?php include 'mainheader.php' ?>	
<style>
.blog-info{
	width:80%;
	float:right;
	position:relative;
	top:-15%;
}
.blog-info h3{
	font-family:century gothic;
}
.blog-info h6{
	font-family:Calisto MT;
	color:gray;
}
.blog-info p{
	font-family:Times New Roman;
}
</style>	
<div class='container-fluid bg-light' id='blog-info'>
			
				<div class='container'>
                    <div class='row '>
					<div class='col-md-8 pt-5'>
					<div class='row'>
						<?php 
    if(isset($_GET['cid']))
    {
       $blog="select * from blog where ctg_id='$_GET[cid]'"; 
    }else $blog="select * from blog";
							$all_blog=$conn->query($blog);
if($all_blog->num_rows>0){
							while($row=$all_blog->fetch_assoc()){ ?>
							<div class='col-md-12 '>
								<img src='<?php echo $row['blog_pic'];?>'style='width:100%;'/>
								<div class='blog-info bg-white p-3 border'>
									<h3 class='text-center'><?php echo $row['blog_title'];?></h3>
									<h6 class='text-center'><?php echo $row['blog_sub_title'];?></h6>
									<p><?php echo substr($row['blog_desc'],0,300);?>..<a href='blog.php?view=<?php echo $row['blog_id'];?>'>Read More</a></p>
								</div>
							</div>
							
							<?php  }} else echo "No Result Found" ?>
						</div>
					</div>
                        <div class="col-md-4 mt-5 ">
                            <div style='position:sticky;top:0'>                            <h1 class="text-center text-info" style="font-family:century gothic" >Latest Articles</h1><hr/>
                           
                        <?php 
    $sql="Select * from article order by aid limit 10";
$result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $aid=$row['aid']; 
                            ?>
                         <div class="row border p-3">
                             <div class="col-md-1"><i class='icofont icofont-2x icofont-hand-right'></i></div>
                              <div class="col-md-10 ml-2">
                            <h5><a href='viewarticle.php?aid=<?php echo $aid?>'style='text-decoration:none;color:black;font-family:century gothic'><?php echo $row['subject'] ?></a>
                                 </h5>
                             </div></div>
                     <?php   }}?>
                                </div> 
				</div>
                    </div></div></div>
<?php include 'footer.php'?>