<?php include 'mainheader.php' ?>	
<style>
.main-box{
	position:fixed;
	
	padding:4em;
	z-index:3;
	
	  position: fixed;
  background-color: rgba(5, 5, 5,0.9);
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 3;
  top:0;	
  transition: all 0.3s;
}
.blog-box{
	border-radius:10px;
	background:white;
	position:absolute;
	width:50%;
	left:25%;
	text-align:center;
	justify-content:center;
	box-shadow:0px 0px 10px 0px black;
	max-height:300px;
	overflow:hidden;
}	
.blog-box h3{
	font-family:century gothic;
}
.blog-box h6{
	font-family:arial;
}
.metter{
	height:400px;
	width:400px;
	left:20%;
	position:relative;
	border-radius:100% 100% 0% 0%;
	background-image:linear-gradient(to right,green,lightgreen,orange,red);
	z-index:1;
	top:2em;
}
.metter:before{
	content:'';
	position:absolute;
	height:300px;
	width:300px;
	border-radius:100%;
	background:white;
	z-index:2;
	top:5em;
	left:12%;
}
.metter-pin{
	position:relative;
	left:-2%;
}
.metter-pin:after{
	content:'';
	position:absolute;
	border-left:10px solid transparent;
	border-right:10px solid transparent;
	border-bottom:80px solid rgba(60,60,60,60);
	z-index:;
	filter:drop-shadow(3px 8px 0px rgba(0,0,0,0.4));
	left:21em;
	transform:rotate(65deg);
	top:7em;
}


.metter-pin:before{
	content:'80% depression';
	
	transition:.5s;
	position:absolute;
	
	color:white;
	width:150px;
	font-family:century gothic;
	border-radius:4px;
	padding:0.4em;
	box-shadow:5px 5px 5px 0px rgba(0,0,0,0.3);
	
}
	
.meter-text{
	position:relative;
	top:6.6em;
	z-index:6;
	font-family:century gothic;
	color:red;
	font-weight:bold;
	font-size:23px;
	text-shadow:1px 1px lightgray;
}
</style>	
<div class='container-fluid bg-light' id='blog-info'>
			<div class='row '>
				<div class='container'>
					<h1 class='text-center' style="padding-top:20px">Mental Health Tests, Quizzes, Self-Assessments, & Screening Tools</h1>
					<div class='row'>
						<?php 
							$all_blog=$conn->query("select * from blog where blog_id='$_GET[view]'");
							while($row=$all_blog->fetch_assoc()){ ?>
							<div class='col-md-7'>
								<div class='p-3 bg-white border mt-3' style='position:sticky;top:0;'>
									<img src='<?php echo $row['blog_pic'];?>'style='width:100%;height:250px'/>
										<h3 class='text-center pt-4' style='font-family:Adobe Fan Heiti Std;'><?php echo $row['blog_title'];?></h3>
									<h6 class='text-center'style='font-family:century gothic;color:gray'>( <?php echo $row['blog_sub_title'];?> )</h6>
									<p class='text-justify' style='font-family:Calibri;'><?php echo $row['blog_desc'];?>	</p>
								</div>
							</div>
							<div class='col-md-5'>
								<div class='mt-3 border bg-white p-3' style=''>
									<form action="" method="post">
						<?php
									$all_quiz=$conn->query("select * from quiz where blog_id='$_GET[view]'");
									if($all_quiz->num_rows>0){ 
									$j=0; $i=1;
									$count=0;
									while($row=$all_quiz->fetch_assoc()){
										$j++;
									?>
									<?php if($j<=1){ ?>
									<style>
										.quiz{
												
													top:0;
												}
												
										.quizs{
												font-family:Candara;
										}
									</style>
									<?php } ?>
								
									<label style='' class='quiz'><?php echo $j.'. '.$row['quiz'];?></label><br/>
									<?php $quiz=$conn->query("select * from quiz_ans where blog_id='$_GET[view]'");
									$ans=$quiz->fetch_assoc(); ?>
									<input type='radio'value='2.5'required name="q<?php echo $j;?>[]"><span class='quizs' > <?php echo $ans['option1'] ?></span><br/>
									<input type='radio'value='5' required name="q<?php echo $j;?>[]"><span class='quizs' > <?php echo $ans['option2'] ?></span><br/>
									<input type='radio'value='7.5'required name="q<?php echo $j;?>[]"><span class='quizs' > <?php echo $ans['option3'] ?></span><br/>
									<input type='radio'value='10'required name="q<?php echo $j;?>[]"><span class='quizs' > <?php echo $ans['option4'] ?></span><br/>
									<input type='radio'value='12.5'required name="q<?php echo $j;?>[]"><span class='quizs' > <?php echo $ans['option5'] ?></span>
									
									<hr/>
							
									<?php 
									//	echo $_POST['q '.$j];
                                  if(isset($_POST['save']))
                                        {
											
										foreach($_POST['q'.$j] as $myans2){
											$count+=$myans2;
											
										}
										
									} }
									?>
									<input type="submit" class="btn btn-dark" name="save" value="Calculate"> 
									</form>
								</div>
									  </div>
									</div><?php
									if(isset($_POST['save'])){ ?>
									
									<div class='main-box'>
										<div class='blog-box'>
										<a href='blog.php?view=<?php echo $_GET['view'];?>'style='position:absolute;right:0.4em;top:0;color:red;font-weight:bold;font-size:20px;z-index:10;'>X</a>
											<h3 class='pt-3'>Mental Health Test Result</h3>
											<h6 class=''>Your Score:<span class='text-danger'></span></h6>
											<div class='metter'>
												<div class='metter-pin'></div>
												<span class='meter-text'>Mental health Severity Meter</span>
											</div>
										</div>
									</div>
									<?php
									if($count>0 and $count<=20){ ?>
									<style>
									.metter-pin:before{
										content:'<?php echo $count;?>% severity';
										background:green;
										border:1px solid rgba(0,0,0,0.3);
										text-shadow:1px 1px rgba(0,0,0,0.4);
										font-weight:bold;
										left:-6em;
										top:5em;
									}
									.metter-pin:after{
											transform:rotate(-55deg);
											left:4em;
											top:7em;
									}
									</style>
									<?php } elseif($count>20 and $count<=40){ ?>
									<style>
									.metter-pin:before{
										content:'<?php echo $count;?>% severity';
										background:#5EC85E;
										border:1px solid rgba(0,0,0,0.3);
										text-shadow:1px 1px rgba(0,0,0,0.4);
										font-weight:bold;
										left:0em;
										top:0;
									}
									.metter-pin:after{
											transform:rotate(-23deg);
											left:8em;
											top:3em;
									}
									</style>
									<?php } elseif($count>40 and $count<=60){?>
									<style>
									.metter-pin:before{
										content:'<?php echo $count;?>% severity';
										background:yellow;
										border:1px solid rgba(0,0,0,0.3);
										text-shadow:1px 1px rgba(0,0,0,0.4);
										font-weight:bold;
										left:8em;
										top:-1.3em;
									}
									.metter-pin:after{
											transform:rotate(-1deg);
											left:12em;
											top:2.3em;
									}
									</style>
									<?php } elseif($count>60 and $count<=80){ ?>
									<style>
									.metter-pin:before{
										content:'<?php echo $count;?>% severity';
										background:orange;
										border:1px solid rgba(0,0,0,0.3);
										text-shadow:1px 1px rgba(0,0,0,0.4);
										font-weight:bold;
										left:15em;
										top:0;
									}
									.metter-pin:after{
											transform:rotate(23deg);
											left:17em;
											top:2.5em;
									}
									</style>
									<?php } elseif($count>80 and $count<=100){ ?>
									<style>
									.metter-pin:before{
										content:'<?php echo $count;?>% severity';
										background:red;
										border:1px solid rgba(0,0,0,0.3);
										text-shadow:1px 1px rgba(0,0,0,0.4);
										font-weight:bold;
										left:24em;
										top:7em;
									}
									.metter-pin:after{
											transform:rotate(65deg);
											left:21em;
											top:7em;
									}
									</style>
									<?php } }?>
									
										
								</div>
							</div>
							<?php }  } ?>
					</div>
				
<script>
	 $(window).load(function(){        
	   $('#myModal').modal('show');
		});
</script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<?php include'footer.php';?>