<?php include 'head.php'?>
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
<h2>Schedule</h2>
                    
                </div>
            </nav>
     
<div class="col-md-6">    
     <form action="" method="post">
                <label><b>DoctorName</b></label>
                    <div class="form-group">
                         <select name="nm" class="custom-select">
                             <option value="">Select name</option>
                        <?php
  
    $sql="select * from doctors";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['docid'];
        $docid=$row['name'];
      echo "<option value=$hid>".$docid."</option>"; 
    }}
    
        ?>
                        
                        
                        </select>
    </div>
   

           
    <div class="col-md-2"></div>
            <div class="col-md-6">
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
                   
                    <tr> 
                        <td><input type="text" required  name="mon" class="form-control"></td>
                 
                 
                        <td><input type="text" requiredname="tue" class="form-control"></td>
    
        
                        <td><input type="text" required name="wed" class="form-control"></td>
                 
                  
                        <td><input type="text" requiredname="thu" class="form-control"></td>
                 
                  
                        <td><input type="text" required name="fri" class="form-control"></td>
                 
                 
                        <td><input type="text" required  name="sat" class="form-control"></td>
                
                 
                        <td><input type="text" required name="sun" class="form-control"></td>
                 </tr>
                </table>
           
    
    <div class="form-group">
                    <input type="submit" name="save1" value="Submit" class="btn btn-dark">
                </div>
         </div>
                              
    <?php
    if(isset($_POST['save1']))
    {
       
        $sql="INSERT INTO schedule (docid,MONDAY,TUESDAY,WEDNESDAY,THURSDAY,FRIDAY,SATURDAY,SUNDAY)  VALUES('$_POST[nm]','$_POST[mon]','$_POST[tue]','$_POST[wed]','$_POST[thu]','$_POST[fri]','$_POST[sat]','$_POST[sun]')";
        if($conn->query($sql)==TRUE)
         echo"<script>window.alert('updated successfully');window.location='sch.php'</script>";
            else
                echo"<div class='alert alert-danger'>Error".$sql."<br/>".$conn->error."</div>";
    }
    ?>
            
                </form>

    
    
    
    

<?php include'foot.php'?>