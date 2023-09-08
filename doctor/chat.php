<?php include 'head.php' ?>
<style>
.chats label{
	box-shadow:0px 0px 1px 0px rgba(0,0,0,0.5);
}
	.friend-img{
		height:75px;
		width:75px;
		border-radius:100%;
	}
	.chat h6{
		font-family:Calibri;
		font-size:14px;
		color:gray;
		font-weight:600;
		letter-spacing:1;
	}
	label{
		background:white;
		cursor:pointer;
		transition:.5s;
		margin:0;
	}
	.chat h5{
		font-size:17px;
	}
	.chat p:nth-child(1){
		font-size:13px;
	
		overflow:hidden;
		font-family:century gothic;
		color:gray;
	}
	
	.message-box{
		background:white;
		border-bottom:1px solid red;
		cursor:pointer;
		
	}
	
	
		/*----------------------------------------------------------------------------------box1---------------------------------------------*/


	
	
	.chat-boxes{
		overflow:hidden;
		max-height:0px;
}

	.message-body{
		max-height:300px;
		overflow-y:scroll;
		padding:1em;
		padding-bottom:3em;
		width:100%;
		
	}
	.message-body::-webkit-scrollbar{
		background:none;
		width:4px;
		
	}
	.message-body::-webkit-scrollbar-thumb{
		background:#DC3545;
		border-radius:6px;
		
	}
		.textarea{
	width:100%;	
	background:rgba(240,240,240,0.8);
	padding:10px !important;
	
	
	}
	form{
		padding:0;
		margin:0;
	}
	.textarea input[type=text]{
		padding:0.2em;
		background:white;
		font-size:12px;
		padding-left:1em;
		max-width:80% !important;
		
		border-radius:100px 0px 0px 100px !important;
		
	}
	.textarea input[type=submit]{
		background:#DC3545;
		right:0;
		color:white;
		z-index:0;
		width:20%;
		z-index:2;
		height:px;
		padding:0.7em;
		
		border-radius:0px 100px 100px 0px  !important;
	}
	.message-body p{
		margin:0px;
		font-family:arial;
		font-size:14px;
		position:relative;
	}
	input[type=text], input[type=submit]:focus{
		box-shadow:none !important;
		border:none;
	outline:none !important;

	}
	input[type=text]::placeholder{
	padding-left:1em;
		padding-top:0.5em;
	}
	input[type=submit]{
		font-family:arial;
		font-size:13px;
		border:none;
	}
	input[type=checkbox]{
		display:none;
		font-size:0px;
	}
	.chats{
		position:absolute;
		
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
                    
                    <h3>Patient's Requests</h3>
                </div>
    </nav>
<div class='row'>
	<div class='col-md-12 chats'>
<div class='row pl-3 pr-3 chat'>
	
	<?php
//echo $_SESSION['uid'];	
		$chat=$conn->query("select *  from chat c,users u,doctors d where c.id_from=u.userid and c.id_to='$_SESSION[docid]' group by c.id_from order by message_on desc");
if($chat->num_rows>0){
			while($row=$chat->fetch_assoc()){?>
			<style>
	#message-box<?php echo $row['id_from'];?>:checked~ .message-box<?php echo $row['id_from'];?>{
	background:rgba(250,250,250,1);
	transition:.5s;
	cursor:default;
	}
	#message-box<?php echo $row['id_from'];?>:checked~ .message-box<?php echo $row['id_from'];?> .chat-boxes{
		max-height:100%;
		transition:.5s;
		width:100%;
		
	}
	#message-box<?php echo $row['id_from'];?>:checked~ .message-box<?php echo $row['id_from'];?> .chat-title1{
		display:none;
		background:red;
		transition:.5s;
	}
			</style>
	
	<input type='checkbox' id='message-box<?php echo $row['id_from'];?>' name='m-box[]' <?php if(isset($_GET["open_chat$row[id_from]"])){ ?> checked <?php } else { ?> <?php } ?> value='box-lara<?php echo $row['id_from'];?>'/>
	<label for='message-box<?php echo $row['id_from'];?>' class='message-box<?php echo $row['id_from'];?>'>
		<div class='col-md-12 pt-2 pb-1 chat-title1'>
			<div class='row'>
				<div class='col-md-4 pl-1 text-center'>
					<img class='friend-img' src='../user/<?php echo $row['uimage'];?>'/>
				</div>
				<div class='col-md-8 pl-2 pt-1'>
					<h5 class='mb-0'style='text-transform:uppercase;font-family:century gothic;'><?php echo $row['uname'];?><span style='font-size:12px;float:right;font-family:arial;text-transform:capitalize;color:gray;'> From-<i class='icofont icofont-location-pin'></i><?php echo $row['ucity'];?></span></h5>
					<?php $full_message=$conn->query("select * from chat where id_from='$row[id_from]' order by chat_id desc"); 
								$all_msg=$full_message->fetch_assoc();
								$date=$all_msg['message_on'];
								?>
					<p class='p-0 mb-1 mt-1'><?php echo $all_msg['message'];?></p>
					<div class='input-group p-0 m-0'>
					&nbsp;<?php echo get_time_ago($row['message_on']);?></div>
				</div>
			</div>
		</div>
		<div class='col-md-12 chat-boxes border bg-white'>
		<div class='row'>
			<div class='col-md-2 pl-1 pb-1 pt-1' style='border-bottom:1px solid lightgray;'>
				<img class='friend-img' src='../user/<?php echo $row['uimage'];?>' style='height:40px;width:40px;'/>
			</div>
			<div class='col-md-5 pt-2 p-0  'style='border-bottom:1px solid lightgray;'>
				<h5 class='mb-0 'style='font-size:13px;text-transform:uppercase;font-weight:bold;letter-spacing:1.5px;'><?php echo $row['uname'];?><h6 class='pt-1'>From-<i class='icofont icofont-location-pin'></i><?php echo $row['ucity'];?></h6></h5>
				
			</div>
			<div class='col-md-5 pt-2 mt-1 text-left'style='border-bottom:1px solid lightgray;'>
				<div class='input-group'><h6 class='p-0 m-0' style='margin-top:px;font-size:13px;'>&nbsp;<?php echo get_time_ago($date);?></h6></div>
			</div>
			<div class='message-body'>
		
			
			<?php
				$recived=$conn->query("select * from chat order by message_on asc");
				$i=0;
				while($recived_row=$recived->fetch_assoc()){
					$i++;
					
				?>
	
					<p class='text-success'id='text-<?php echo $recived_row['chat_id'];?>'>
						
						<?php if($recived_row['id_from']==$_SESSION['docid']  and $recived_row['id_to']==$row['id_from']){ ?>
						<?php include'chat-style.php';?>
						<span class=' tringle'>
							<?php echo $recived_row['message'];?>
						</span>
						<?php } ?>
						<?php if($recived_row['id_from']==$row['id_from']){ ?>
						<?php include'chat-style.php';?>
						<span class=' tringle'>
							<?php echo $recived_row['message'];?>
							</span>
						<?php } ?>
					
					</p>
				
					
				<?php } ?>
			</div>
			<form action='' method='post' style='width:100%;'>
			<div class='textarea  p-0'>
				<div class='input-group'>
				<input type='text'  rows=0 style=''name='message' class='form-control' required placeholder='Chat with your patient'>
				<input type='submit' class='btn  'style='' name='send_btn<?php echo $row['id_from'];?>' value='Send'/>
				</div>
		
			</div>
				</form>
				
			<?php
		
				if(isset($_POST["send_btn$row[id_from]"])){
			
				$add_into_chat="insert into chat(id_from,id_to,message) values('$_SESSION[docid]','$row[id_from]','$_POST[message]')";
				if($conn->query($add_into_chat)==true){
					echo"<script> window.location='chat.php?open_chat$row[id_from]';</script>";
				}
				}
			
			?>
					
		
			<style>
				
			</style>
			
		</div>
	</div>
	</label>
			<?php } }else
    echo "<h1 class='text-white'>No Request Found</h1>";?>
</div>
<?php
			
		date_default_timezone_set('Asia/Calcutta');	
		
	function get_time_ago($timestamp)
			{
			 $time_ago=strtotime($timestamp);
				 $current_time=time();
				$time_difference=$current_time-$time_ago;
				$seconds=$time_difference;
				
				$minutes=round($time_difference/60);	
				$hours=round($time_difference/3600);
				$days=round($time_difference/86400);
				$weeks=round($time_difference/604800);
				$months=round($time_difference/2629440);
				$years=round($time_difference/31553280);
				
				if($seconds<=60)
				{
					return"<h6 class='m-0 p-0' style='border-radius:100%;height:10px;width:10px;background:orange;'></h6>&nbsp;<h6 class='m-0 p-0'>Just Now</h6>";
				 }
					
				
				elseif ($minutes<=60)
				{
					if($minutes==1)
					{
						return" one minute ago";
					}
					else
					{
						return "<span style='font-size:14px;'>$minutes minutes ago</span>";
					}
				}
				
				elseif ($hours<=24)
				{
					if($hours==1)
					{
						return"an hour ago";
					}
					else
					{
						return"<span style='font-size:14px;'>$hours hours ago</span>";
					}
				}
					
					elseif ($days<=7)
				{
					if($days==1)
					{
						return"Yesterday";
					}
					else
					{
						return"<span style='font-size:14px;'>$days days ago</span>";
					}
				}
					
					elseif ($weeks<=4.3)
				{
					if($weeks==1)
					{
						return"<span style='font-size:14px;'>a week ago</span>";
					}
					else
					{
						return"<span style='font-size:14px;'>$weeks weeks ago</span>";
					}
				}
					
					elseif ($months<=12)
				{
					if($months==1)
					{
						return"<span style='font-size:14px;'>a month ago</span>";
					}
					else
					{
						return"<span style='font-size:14px;'>$months months ago</span>";
					}
				}
				
				else
				{
						if ($years==1)
					{
					
						return"<span style='font-size:14px;'>one year ago</span>";
					}
					else
					{
						return"<span style='font-size:14px;'>$years years ago</span>";
					}
				}
				
			}	?>
        <?php include 'foot.php' ?>