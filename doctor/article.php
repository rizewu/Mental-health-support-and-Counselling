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
<h2>Article</h2>
                    
                </div>
            </nav>
            
          

    <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6">
               
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                 <input type="text" required name="sub" class="form-control"
                     placeholder="Article subject">
             </div>
                        
                    <div class="form-group">
                 <input type="file" required name="image" class="form-control">
             </div>
                     <div class="form-group">
                         <select class="custom-select" name="cat" required>
                             <option value="" >Select Category</option>
                    <?php
    $sql="select * from category";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['ctg_id'];
        $did=$row['ctg_title'];
        echo "<option value=$hid>".$did."</option>";
        
    }}?></select></div>
                <div class="form-group">
                 <textarea required="required" rows="5" class="form-control" id="editor" name="msg"
                     placeholder="Enter your Article"></textarea>
                    
             </div>
             <div class="form-group">
                 <input type="submit" name="save" value="Add Article" class="btn btn-danger">
             </div>
                
                </form>
                   <?php
    if(isset($_POST['save']))
    {
        $text=addslashes($_POST['msg']);
        
        $dirname="image/";
        $filename=$_FILES['image']['name'];
        $tmpname=$_FILES['image']['tmp_name'];
        $filetype=pathinfo($filename,PATHINFO_EXTENSION);
        if($filetype!='jpg'&&$filetype='jpeg'&&$filetype!='png'&&$filetype!='JPG'&&$filetype!='JPEG'&&$filetype!='PNG')
        {
            echo"only jpg,jpeg,png file allowed";
        }
        else
        {
        $filename=$dirname.$filename;
        if(move_uploaded_file($tmpname,$filename))
            
        {
        $sql="insert into article (subject,article,image,ctg_id)
        values('$_POST[sub]','$_POST[msg]','$filename','$_POST[cat]')";
        if($conn->query($sql)==TRUE)
            echo "successfully sent";
        else
            echo "error".$sql."</br>".$conn->error;
        
    }else
                echo"Error in file upload";
        }
    }
    ?>
                   </div>
        <div class="col-md-3"></div>
        </div>
                    
      <script>CKEDITOR.replace('editor')</script>
    <?php include 'foot.php'?>
