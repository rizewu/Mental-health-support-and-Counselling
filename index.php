<?php include 'mainheader.php'?>
<style> .doctors img{
        border-bottom:3px solid rgba(0,120,150,1);
        
    }
    .doctors{
        text-align: center;
    }
    
    .doctors b{
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
    .doctors h4{
        color:black;
        font-family: century gothic;
        font-weight: 600;
        font-size:20px;
      
        
    }
    .doctors h6{
        color:rgba(0,120,150,1);
        text-transform: uppercase;
        font-family: century gothic;
        font-size:13px;
        font-weight: 600;
    }
    .doctors h5{
        color:gray;
        font-family:arial;
        font-size:17px;
        padding-top:1em;
       
    }
     .doctors h5:before ,  .doctors h5:after{
         content:'';
         position: absolute;
         height:2px;
         width:80px;
         background:gray;
         margin-top:10px;
    }
    .doc{
        box-shadow: 5px 5px 10px 0px lightgray;
    }
    .doctors h5:before{
        left:1.2em;
    }
    a{
        text-decoration: none !important;
    }
</style>
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="image/banner.jpg"  height="600px" alt="First slide">
          <div class="carousel-caption" style="background:rgba(0,0,0,0.6)">
  <div class="container">
      <form action="" method="post">
  <div class="row mt-3">
      
      <div class="col-md-3 "> <h4>Search a Doctor :</h4></div>
      <div class="col-md-6">
      <input list="zip" pattern="[0-9]{6}" required placeholder="Enter Zip Code" class='form-control' name='zip'>
        <datalist id="zip">
         <?php 
     echo"<option selected='selected'></option>";          
    $sql="select * from zipcode";
     $result=$conn->query($sql);
     if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())        
    {        
        $uid=$row['docid'];
                    $bid=$row['zipcode'];
                   echo "<option>".$bid."</option>";                     
                }}?>
            </datalist>      
      </div>
      <div class="col-md-1"><input type="submit" name="search" class="btn btn-outline-light" value="Search"></div>
      <div class="col-md-2"></div>              
          </div></form>      
      <?php
      if(isset($_POST['search']))
      {
          echo "<script>window.location='alldoctor.php?zip=$_POST[zip]'</script>";
      }
      ?>
      </div>
        </div></div>
   
    
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

        <div class='container mt-3'>
            <h1 class="text-center text-info" style=" font-family: century gothic;font-weight: bold;font-size:50px;">Our Experts</h1>
            <div class='row'>
                <?php
                    $sql="select * from doctors,specialization where doctors.specialisation=specialization.sid order by doctors.docid desc limit 3";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $did=$row['docid'];
                            ?>
                        <div class='col-md-4 mt-4 doctors'>
                            <div class='doc bg-white pb-3'>
                            <img src='doctor/<?php echo $row['image'];?>' style='width:100%; height:300'>
            <a href='doctor.php?doc_id=<?php echo  $did ?>'>
                <b class=''>+</b>
            </a>
                            
                            <h4><?php echo $row['name'];?></h4>
                            
                            <h6><?php echo $row['specialization'];?></h6>
                          <?php echo"  <a href='user/appointment.php?id=$did'><h5>MAKE APPOINTMENT</h5></a>"?>
                        </div>
                </div>
                
                    <?php } } ?>
                <h4 class="ml-auto mt-3 bg-info p-3 rounded rounded-lg">  <a href="alldoctor.php" style="text-decoration:none;  color:white">View All..</a></h4>
            </div>
        </div>
    

<div class="container mt-4">
<div class="row">
     <?php
    $sql="select * from category";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['ctg_id'];
        ?>
       <div class="col-md-4">
           <div class="row mb-3">
               <div class="col-md-2 mt-2">
    <h3><?php echo "<i class='icofont bg-info text-white p-3 rounded rounded-circle  icofont-$row[icofont]'></i>&nbsp;&nbsp;&nbsp;" ?></h3>
               </div> <div class="col-md-9 mt-2 ml-2"><h5><?php echo "<a href='allblog.php?cid=$hid'>".$row['ctg_title']."</a>"; ?></h5></div>
           </div>
               <p class="text-justify"><?php echo $row['description'] ?></p>
    </div> 
  <?php  }}?>
</div>
</div>
<div class="container-fluid" style="background:rgba(23,162,184,0.1)">
    <div class="container">
       <h1 class="text-center  pt-3 pl-3 pr-3 text-info" style="font-family:curtain">Latest Articles</h1><hr/>
<div class="row">
    <?php
    $sql="select * from article order by aid limit 3";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['aid']; ?>
        <div class="col-md-4">
      <img src='doctor/<?php echo $row['image'];?>' style='width:100%; height:250'>
           <p style="font-family: century gothic"><a style="text-decoration: none; color:black" href='viewarticle.php?aid=<?php echo $aid ?>'><?php echo $row['subject'] ?></a>
                                 </p>
    </div>
<?php    }}?>
        </div></div></div>
    <?php include 'footer.php'?>
    
