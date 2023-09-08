<?php include'mainheader.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .page-top:before{
        position: absolute;
        content:'';
        background:url(image/doc1.PNG);
    background-size:79%;
        padding:4em;
        color:white;
        height:50%;
        width:100%;
        left:0;
        z-index:-1;
        font-family: century gothic;
        background-attachment: fixed;
        background-size: cover;
        background-repeat: no-repeat
    
    }
    .page-top:after{
        position: absolute;
        content:'';
        background:rgba(0,0,0,0.8);
        width:100%;
        height:50%;
        left:0;
        z-index:-1;
        top:156;
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
<div class='container-fluid page-top'>
    <div class='row'>
        <div class='col-md-6'>
            <h3>DOCTORS</h3>
        </div>
        <div class='col-md-6 text-right'>
            <div>
            <a href='index.php'><i class='icofont icofont-home'></i> Home</a>           
                <span class='text-white'> > </span>   <a href='alldoctor.php'>Doctors</a>
            </div>
        </div>
    </div>
</div>
<div class='container-fluid  bg-light'>
    <div class='row'>
        <div class='container'>
            <div class='row'>
                <?php
                if(isset($_GET['zip'])){
                    $sql="select * from doctors,specialization where doctors.zipcode='$_GET[zip]' and  doctors.specialisation=specialization.sid order by doctors.docid desc ";}
                else
                    $sql="select * from doctors,specialization where doctors.specialisation=specialization.sid order by doctors.docid desc";
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
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'?>