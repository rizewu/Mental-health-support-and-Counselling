<?php include 'head.php' ?>
		<style>
			h3{
				font-family:century gothic;
				font-size:23px;
				text-transform:uppercase;
				font-weight:600;
				text-align:center;
			}
		
			input[type=checkbox]{
				display:none;
				
			}
		
				#blog-info{
					position:relative;	
					transition:.5s;
					top:-2em;
					right:0;
				}
		input:focus, select:focus, textarea:focus{
			box-shadow:none !important;
		}
	
		</style>
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
                    
                    <h3>Add Blog</h3>
                </div>
    </nav>


			<div class='container'>
			<div class='row'>
                
			
				<div class='col-md-7'><h3>Blog</h3>
					<form action='' method='post' enctype='multipart/form-data'>
						<div class='input-group'>
							<span class='input-group-text rounded-0'>Category</span>
							<select class='form-control rounded-0' name='slct_ctg'	required>
								<option>Select Category</option>
								<?php 
									$slct_ctg=$conn->query("select * from category");
									while($ctg_row=$slct_ctg->fetch_assoc()){ 
								?>
								<option value='<?php echo $ctg_row['ctg_id'];?>'><?php echo $ctg_row['ctg_title'];?></option>
									<?php } ?>
							</select>
						</div>
						<div class='input-group pt-3'>
							<input type='text' class='form-control rounded-0' name='blg_title' required />
							<span class='input-group-text rounded-0'>Blog Title</span>
						</div>
						<div class='input-group pt-3'>
							<input type='file' class='form-control rounded-0' name='blg_pic' required />
							<span class='input-group-text rounded-0'>Blog Picture</span>
						</div>
						<div class='input-group pt-3'>
							<input type='text' class='form-control rounded-0' name='blg_sub_title' required />
							<span class='input-group-text rounded-0'>Blog Sub Title</span>
						</div>
						<div class='input-group pt-3'>
							<span class='input-group-text rounded-0'>Blog Description</span>
							<textarea class='form-control rounded-0' rows=5 name='blg_desc'></textarea>
						</div>
						<input type='submit' class='btn btn-danger rounded-0 mt-3' name='send' value='Add Now!'/>
					</form>
					<?php	
						if(isset($_POST['send'])){
							
							$blg=addslashes($_POST['blg_desc']);
							$slct_blg=$conn->query("select * from blog where blog_title='$_POST[blg_title]' and blog_desc='$blg'");
							if($slct_blg->num_rows>0){
								echo"<script>alert('already added');window.location='blog.php';</script>";
							}
							else {
								
								   $errors=array();
								   $dir="image/";
								   $file_name=$dir.$_FILES['blg_pic']['name'];
								   $file_size=$_FILES['blg_pic']['size'];
								   $file_tmp=$_FILES['blg_pic']['tmp_name'];
								   $file_ext=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
								   $extensions=array("jpg","jpeg","png");
								if(in_array($file_ext,$extensions)===false){
									$errors[]="please choose a JPEG or PNG file.";
								}
								if($file_size>2097152){
									$errors[]='File must be exactly 2 MB';
								}
								
									if(move_uploaded_file($file_tmp,$file_name)){
								
							$insert_ctg2="insert into blog(ctg_id,blog_title,blog_pic,blog_sub_title,blog_desc)values('$_POST[slct_ctg]','$_POST[blg_title]','$file_name','$_POST[blg_sub_title]','$blg')";
							if($conn->query($insert_ctg2)===true){
								echo"<div class='alert alert-success'>Added successfully</div>";
							}
							}
							else 
								echo "image error";
							}
						}
					?>
				</div>

			</div>
        </div>
	
</div>
<?php include 'foot.php' ?>