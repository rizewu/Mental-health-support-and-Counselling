<?php include'header.php';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .page-top:before{
        position: absolute;
        content:'';
        background:url(image/doc1.PNG);
    background-size:100%;
        padding:5em;
        color:white;
        height:100%;
        width:100%;
        background-position: center;
        left:0; 
        z-index:-1;
        font-family: century gothic;
        background-attachment: fixed;
    
    }
    .page-top:after{
        position: absolute;
        content:'';
        background:rgba(0,0,0,0.8);
        width:100%;
        height:100%;
        left:0;
        z-index:-1;
        top:0;
    }
    .page-top a{
        color:white;
    }
    .page-top h3{
        padding:3em 2em;
        position: relative;
        z-index: ;
        font-size:40px;
        color:white;
        font-weight: bold;
    }
    .page-top .col-md-6:nth-child(2){
        padding:10em 4em;
        
    }
     .page-top .col-md-6:nth-child(2) div{
         background:rgba(130,130,100,0.5);
         padding:1em;
    }
    .page-top a{
        padding:10px 15px;
        font-family: arial;
        font-weight: bold;
        font-size:17px;
        text-transform: uppercase;
        text-decoration: none;
    }
    .page-top span{
        font-weight: bold;
        font-size:23px;
    }
    .doctors img{
        border-bottom:3px solid rgba(0,120,150,1);
        
    }
    .doctors{
        text-align: center;
        font-family: century gothic !important;
        font-weight: 600 !important;
    }
    
    h1,h2{
        font-family: century gothic;
        font-weight: bold;
    }
    h3,h4,h5{
        font-family: arial;
        color:gray;
    }
    h5{
        font-size:17px;
        text-transform: uppercase;
        font-weight: 600;
        color:gray;
    }
    .doctors i{
        background: rgba(0,120,150,1);
        color:white;
        padding:1px 13px;
        border-radius: 100%;
        padding-bottom:5px;
        font-size:30px;
        font-weight: bold;
        position: relative;
        top:-0.7em;
    }
    .doctors h3{
        
        color:gray;
        font-family: Arial;
        font-weight: 500;
        font-size:20px;
      text-transform: uppercase;
        margin-top:15px;
    }
    .doctors h6{
        color:gray;
        
        font-family: century gothic;
        font-size:16px;
        font-weight: 400;
        margin-top:18px;
    }
    

    .doc{
        box-shadow: 5px 5px 10px 0px lightgray;
    }
    a{
        text-decoration: none !important;
    }
    .btn-outline-primary{
        border:2px solid rgba(0,130,150,1);
        font-size:17px;
        font-weight: 600 ;
        color:black;
    }
    p{
        font-family: Calibri;
        font-weight: normal;
        font-size:17px;
        color:gray;
        
    }
   
</style>
  <?php
                    $sql="select * from doctors,specialization where doctors.specialisation=specialization.sid and doctors.docid='$_GET[doc_id]'";
                    $result=$conn->query($sql);
                 
                 $row=$result->fetch_assoc();
                            
                            ?>
<div class='container-fluid page-top'>
    <div class='row'>
        <div class='col-md-6'>
            <h3>DOCTORS</h3>
        </div>
        <div class='col-md-6 text-right'>
            <div>
            <a href='index.php'><i class='icofont icofont-home'></i> Home</a>           
                <span class='text-white'> > </span>    <a href='alldoctor.php'>Doctors</a>
                 <span class='text-white'> > </span> 
                <a href='#'><?php echo $row['name'];?></a>
            </div>
        </div>
    </div>
</div>
<div class='container-fluid  bg-light '>
    <div class='row'>
        <div class='container'>
            <div class='row'>
              
                        <div class='col-md-3 mt-4 doctors'>
                            <div class='doc bg-white pb-4'>
                            <img src='doctor/<?php echo $row['image'];?>' style='width:100%;height:300'>
                            
                        
                        </div>
                            
                </div>
                <div class='col-md-1'></div>
                <div class='col-md-8 pt-5 text-left doctors'>
                    <h2><?php echo $row['name'];?></h2>
                            
                            <h5><?php echo $row['specialization'];?></h5>
                    
                    
               <p><?php echo $row['bio'];?></p>
                    <form action="" method="post">
                   <?php echo "<button type='submit' name='app' class='btn btn-outline-primary pl-4 pr-4 pt-2 pb-2 rounded-0'>MAKE APPOINTMENT</button>"?><br><br>
                       <?php echo "<button type='submit' name='con' class='btn btn-outline-primary pl-4 pr-4 pt-2 pb-2 rounded-0'>CONSULT ONLINE</button>"?>
                    </form>
                    <?php
                    if(isset($_POST['app']))
                    {
                        if(isset($_SESSION['uid']))
                        {
                            echo "<script>window.location='user/appointment.php?id=$_GET[doc_id]'</script>";
                        }
                        else
                             echo "<script>window.location='login.php?id=$_GET[doc_id]'</script>";
                    }
                    if(isset($_POST['con']))
                    {
                        if(isset($_SESSION['uid']))
                        {
                            echo "<script>window.location='user/consultonline.php?id=$_GET[doc_id]'</script>";
                        }
                        else
                             echo "<script>window.location='login.php?id=$_GET[doc_id]'</script>";
                    }
                    ?>
                        </div>
            </div>
        </div>
    </div>
</div>
<div class='row'>
    <div class='col-md-4'></div>

<div class='col-md-8'>
   <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Schedule</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Experience</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Qualification</a>
  </li>
</ul>
    
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
     <br><h4>Schedule of <?php echo $row['name'];?> is:</h4><br>
<div class="row">
    
            <div class="col-md-6" style='margin-top:2em;'>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                   <th>MONDAY</th>
                    <th>TUESDAY</th>
                    <th>WEDNESDAY</th>
                    <th>THURSDAY</th>
                    <th>FRIDAY</th>
                    <th>SATURDAY</th>
                    <th>SUNDAY</th>
                   
                                </tr>
               
    
                <?php
                      $sql="select * from schedule where docid='$_GET[doc_id]'";
                    $result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['scid'];
        echo "<tr>";
        echo "<td>".$row['MONDAY']."</td>";
        echo "<td>".$row['TUESDAY']."</td>";
        echo "<td>".$row['WEDNESDAY']."</td>";
        echo "<td>".$row['THURSDAY']."</td>";
        echo "<td>".$row['FRIDAY']."</td>";
          echo "<td>".$row['SATURDAY']."</td>";
        echo "<td>".$row['SUNDAY']."</td>";
        echo "</tr>";
    }
}
                ?> </table></div></div>
    </div>
     <?php
                    $sql="select * from doctors where docid='$_GET[doc_id]'";
                    $result=$conn->query($sql);
                 
                 $row=$result->fetch_assoc();
                            
                            ?>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <br><h4>Experience of <?php echo $row['name'];?> is:</h4><br>
        <?php echo $row['experience'];?>
      
    </div>
    
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <br><h4>Qualification of <?php echo $row['name'];?> is:</h4><br>
    <?php echo $row['qualification'];?>
                </div>
    </div></div></div>

<?php include'footer.php'?>