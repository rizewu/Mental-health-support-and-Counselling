<?php include 'head.php'?>
<script src="../editor/ckeditor.js"></script>
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
<h2>help and support</h2>
                    
                </div>
            </nav>
            
          

    <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4">
               
                <form action="" method="post">
                    
                    <div class="form-group">
                 <input type="text" required name="sub" class="form-control"
                     placeholder="subject">
             </div>
                    
                <div class="form-group">
                 <textarea rows="5"class="form-control" id="editor" name="msg"
                     placeholder="enter your message"></textarea>
             </div>
             <div class="form-control">
                 <input type="submit" name="save" value="submit" class="btn btn-danger">
             </div>
                
                </form>
                <?php
    if(isset($_POST['save']))
    {
        $text=addslashes($_POST['msg']);
        $sql="insert into help (subject,help,helpby)
        values('$_POST[sub]','$_POST[msg]','$_SESSION[uid]')";
        if($conn->query($sql)==TRUE)
            echo "successfully sent";
        else
            echo "error".$sql."</br>".$conn->error;
        
    }
    ?>
                
                
                
                
                
        </div>
        <div class="col-md-4"></div>
        </div>
                    
      <script>CKEDITOR.replace('editor')</script>
    <?php include 'foot.php'?>