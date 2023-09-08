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
                    
                    <h1>Reply</h1>
                </div>
    </nav> 

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
    <h2>Reply</h2>
    <form action="" method="post">
        <div class="form-group">
           <div class="form-group">
                 <textarea required rows="5"class="form-control" id="editor" name="msg"
                     ></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="save" class="btn btn-danger">
            </div></div>
    </form>
    <?php
    if(isset($_POST['save']))
    {
        $sql2="select * from help where helpid='$_GET[id]'";
        $result=$conn->query($sql2);
        $row=$result->fetch_assoc();
        $status=$row['status'];
        if($status=='0')
        {
           $sql="Insert into reply(reply,quesid) values('$_POST[msg]','$_GET[id]')";
            $sql1="Update help set status='1' where helpid='$_GET[id]'";
            if($conn->query($sql)==TRUE)
            {
                      if($conn->query($sql1)==TRUE)
            
            echo "Successfully sent";}
        else
            echo "Error".$sql."</br>".$conn->error;
        
    }
            else
                echo"<script>window.alert('Already Replied')</script>";
        }
    ?>
            
            
    </div>
<div class="col-md-4"></div>
    </div>
          <script>CKEDITOR.replace('editor')</script>
<?php include'foot.php'?>
    