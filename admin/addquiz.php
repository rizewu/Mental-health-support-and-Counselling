    <?php include 'head.php' ?>	
<style>
	.quiz{
			display:block;font-family:century;position:relative;top:4em;
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
                    
                    <h3>Add Quizz</h3>
                </div>
    </nav>
<div class="container">
<div class="row">


   <div class='col-md-6 quiz pl-5 pr-5'><h3>Quiz</h3>
					<form action='' method='get' enctype='multipart/form-data'>
						<div class='input-group'>
							<span class='input-group-text rounded-0'>Category</span>
							<select class='form-control rounded-0' name='slct_ctg'	required>
								<option>Select Category</option>
								<?php 
								
									
										$slct_blg=$conn->query("select * from blog");
									while($row=$slct_blg->fetch_assoc()){ 
                                        echo "<option value=$row[blog_id]>". $row['blog_title']."</option>";}
								?>
								
									
							</select>
							<input type='submit' class='btn btn-primary rounded-0' name='quiz_add' value='add quiz for'/>
						</div>
					</form>
					<div class='bg-white border p-2'	>
					<form action='' method='post'>
					<?php 
						if(isset($_GET['quiz_add'])){
								for($i=1;$i<=8;$i++){ ?>
						<div class='input-group pt-2 pb-0'>
							<span class='input-group-text bg-danger text-light rounded-0 pt-0 pb-0' style='font-size:13px;border:none;background:rgba(240,240,240,0.8);'>Qs No. <?php echo $i;?></span>
							<input type='text' required  class='form-control rounded-0'style='font-size:13px;background:rgba(250,250,250,0.8);height:30px;' placeholder='Type Question Here..'name='quiz[]'/>
						</div>
						<?php } ?>
						
						<input type='submit' class='btn btn-dark mt-2 rounded-0 btn-block'value='upload quiz' name='quiz_btn'/>
						<?php } ?>
						</form>
						<?php 
							if(isset($_POST['quiz_btn'])){
								foreach($_POST['quiz'] as $q) {
									$insert_quiz="insert into quiz(blog_id,quiz)values('$_GET[slct_ctg]','$q')";
									if($conn->query($insert_quiz)==true){
										echo"";
									}
								}
								echo"<script>alert('uploaded Successfully');window.location='addquiz.php';</script>";
							}
								?>
								
						</div>
				</div>
    <div class='col-md-6 quiz pl-5 pr-5'><h3>Options</h3>
					<form action='' method='get' enctype='multipart/form-data'>
						<div class='input-group'>
							<span class='input-group-text rounded-0'>Category</span>
							<select class='form-control rounded-0' name='slct_ctg'	required>
								<option>Select Category</option>
								<?php 
								
									
										$slct_blg=$conn->query("select * from blog");
									while($row=$slct_blg->fetch_assoc()){ 
                                        echo "<option value=$row[blog_id]>". $row['blog_title']."</option>";}
								?>
								
									
							</select>
							<input type='submit' class='btn btn-primary rounded-0' name='option' value='add quiz for'/>
						</div>
					</form>
					<div class='bg-white border p-2'	>
					<form action='' method='post'>
					<?php 
						if(isset($_GET['option'])){
							{ ?>
						<div class='input-group pt-2 pb-0'>
							<span class='input-group-text bg-danger text-light rounded-0 pt-0 pb-0' style='font-size:13px;border:none;background:rgba(240,240,240,0.8);'>Qs No. 1</span>
							<input type='text' required  class='form-control rounded-0'style='font-size:13px;background:rgba(250,250,250,0.8);height:30px;' placeholder='Type Option Here..'name='option1'/>
						</div>
                        	<div class='input-group pt-2 pb-0'>
							<span class='input-group-text bg-danger text-light rounded-0 pt-0 pb-0' style='font-size:13px;border:none;background:rgba(240,240,240,0.8);'>Qs No. 2</span>
							<input type='text' required  class='form-control rounded-0'style='font-size:13px;background:rgba(250,250,250,0.8);height:30px;' placeholder='Type Option Here..'name='option2'/>
						</div>
                        	<div class='input-group pt-2 pb-0'>
							<span class='input-group-text bg-danger text-light rounded-0 pt-0 pb-0' style='font-size:13px;border:none;background:rgba(240,240,240,0.8);'>Qs No. 3</span>
							<input type='text' required  class='form-control rounded-0'style='font-size:13px;background:rgba(250,250,250,0.8);height:30px;' placeholder='Type Option Here..'name='option3'/>
						</div>
                        	<div class='input-group pt-2 pb-0'>
							<span class='input-group-text bg-danger text-light rounded-0 pt-0 pb-0' style='font-size:13px;border:none;background:rgba(240,240,240,0.8);'>Qs No. 4</span>
							<input type='text' required  class='form-control rounded-0'style='font-size:13px;background:rgba(250,250,250,0.8);height:30px;' placeholder='Type Option Here..'name='option4'/>
						</div>
                        <div class='input-group pt-2 pb-0'>
							<span class='input-group-text bg-danger text-light rounded-0 pt-0 pb-0' style='font-size:13px;border:none;background:rgba(240,240,240,0.8);'>Qs No. 5</span>
							<input type='text' required  class='form-control rounded-0'style='font-size:13px;background:rgba(250,250,250,0.8);height:30px;' placeholder='Type Option Here..'name='option5'/>
						</div>
						<?php } ?>
						
						<input type='submit' class='btn btn-dark mt-2 rounded-0 btn-block'value='upload ans' name='save'/>
						<?php } ?>
						</form>
						<?php 
							if(isset($_POST['save'])){
							
									$insert_quiz="insert into quiz_ans (blog_id,option1,option2,option3,option4,option5)values('$_GET[slct_ctg]','$_POST[option1]','$_POST[option2]','$_POST[option3]','$_POST[option4]','$_POST[option5]')";
									if($conn->query($insert_quiz)==true){
									
								
								echo"<script>alert('uploaded Successfully');window.location='addquiz.php';</script>";}
                                else
                                    echo "Error ".$insert_quiz."<br/>".$conn->error;
							}
								?>
								
    </div></div>
    </div>
                <?php include 'foot.php' ?>