<style>
					<?php 
				
					if($recived_row['id_from']==$_SESSION['docid']){ ?>
					#text-<?php echo $recived_row['chat_id'];?>{
						
						
						text-align:right;
						position:relative;
						width:80%;
						right:-4.5em;
				
						margin-top:10px;
					
					
					}
					#text-<?php echo $recived_row['chat_id'];?> span{
						
						background:rgba(0,100,0,0.1);
						border-radius:5px;
							padding:3px 5px;
							height:100%;
							word-break:keep-all;
							color:white;
							margin-top:10px;
							background:#DC3545;
							<?php if(strlen($recived_row['message'])>100){ ?>
							display:block;
							<?php } ?>
							box-shadow:-5px 5px 10px 0px rgba(0,0,0,0.2);
						
					}
					#text-<?php echo $recived_row['chat_id'];?> .tringle:after{
						content:' \25B6';
						
						color:#DC3545;
						position:absolute;
						right:-10px;
						z-index:1;
						height:100%;
					}
					<?php } else {?>
					#text-<?php echo $recived_row['chat_id'];?>{
						
						
						text-align:left;
						position:relative;
						width:80%;
							
				
						margin-top:10px;
					
					
					}
					#text-<?php echo $recived_row['chat_id'];?> span{
						
						background:rgba(0,100,0,0.1);
						border-radius:5px;
							padding:3px 5px;
							height:100%;
							word-break:keep-all;
							box-shadow:5px 5px 10px 0px rgba(0,0,0,0.2);
							color:white;
							margin-top:10px;
							background:#28A745;
							<?php if(strlen($recived_row['message'])>100){ ?>
							display:block;
							<?php } ?>
						
					}
					#text-<?php echo $recived_row['chat_id'];?> .tringle:after{
						content:' \25B6';
						
						color:#28A745;
						position:absolute;
						left:-8px;
						z-index:1;
						transform:rotate(60deg);
						height:100%;
					}
					<?php } ?>
					
				</style>