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
<h2>Consult Online</h2>
                    
                </div>
            </nav>
            
          
                  <?php
    $sql="select * from consult_online where userid='$_SESSION[uid]' and docid='$_GET[id]' and status='1'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
while($row=$result->fetch_assoc())
{
    ?>
    <?php include 'chat.php' ?>
<?php }
}
else
  echo "<script>window.alert('Pay first to start consulation');window.location='payment.php?did=$_GET[id]'</script>";  

?>
    
    

    <?php include 'foot.php'?>