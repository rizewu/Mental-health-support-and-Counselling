<?php include'mainheader.php';?>


<style>
     
    
    
    .form input, .form .input-group-text{
        border:none !important;
        border-radius: 100px;
        
        background:rgba(0,0.8,0.7,0.1);
    }
    .form .input-group-text{
        
        border-radius: 100px 0px 0px 100px !important;
              background:rgba(0,0,0,0.1) !important;
        
    }
    .form .col-md-4:nth-child(2){
        padding:1em 2em;
        background:rgba(255,255,255,0.8) !important;
        border-radius: 50px !important;
        
    }
    .form label{
        padding-top:8px;
        font-family: century gothic;
    }
    
</style>

    <div class="container">
    <div class="form row">
    
   <div class="col-md-4">
        
        </div>
          
            
 <div class='col-md-4 bg-danger rounded' style='margin-top:0em;' >
     
            <h1 class="mt-3 text-center" >
                <i class="icofont icofont-phone">Contact Us</i></h1>
                                                            
                                                        
                
           <form action="" method="post">
               <label>Name</label>
            <div class="input-group">
              <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-ui-user'></i></span> 
         <input type="name"required name="nm" class="form-control" pattern="[A-Z a-z]{3,30}"placeholder="enter name">
            </div>
               
        <label>Email</label>
            <div class="input-group">
              <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-envelope'></i></span> 
         <input type="email" required name="em" class="form-control" placeholder="enter email">
            </div>
      <label>Phone Number</label>
         <div class="input-group">
              <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont icofont-phone'></i></span>
         <input type="tel" required name="phn" class="form-control" 
placeholder="enter your phone number">
            </div>
            <label>Message</label>
         <div class="input-group">
              <span class='input-group-text bg-white'style='border:none;border-bottom:1px solid lightgray;border-radius:0px;'><i class='icofont-ui-message'></i></span>
             <textarea required name="msg" class="form-control" placeholder="enter your message"></textarea>
            </div>
            
       <div class="form-group">
             <input type="submit" name="save" class="btn btn-block btn-outline-light" value="Submit" style='  background-image:linear-gradient(to left,rgba(200,0,200,0.6),rgba(0,0,0,0.9));border-radius:100px;margin-top:2em;'>
           <div class='text-center pt-3'>     </div></div>
           </form>
        </div></div></div>
               

<?php
    if(isset($_POST['save']))
    {
        $text=addslashes($_POST['msg']);
        $sql="insert into contact (name,email,phone,message)
        values('$_POST[nm]','$_POST[em]','$_POST[phn]','$_POST[msg]')";
        if($conn->query($sql)==TRUE)
            echo "successfully sent";
        else
            echo "error".$sql."</br>".$conn->error;
        
    }
    ?>
                
                
                










































<?php include'footer.php';?>