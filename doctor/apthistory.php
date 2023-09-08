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
                    
                    <h1>Appointment History</h1>
                </div>
    </nav> 
    <div class="container">
<div class="row">
    
            <div class="col-md-12" style='margin-top:2em;'>
                <table class="table table-striped table-bordered">
                <tr class="bg-dark text-white">
                    <th>Patient</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>status</th>
                   
                                </tr>
                                    <?php
   
    $sql="select * from users,appointment where appointment.docid='$_SESSION[docid]' and appointment.aptby=users.userid";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $hid=$row['aptid'];
        echo "<tr>";
        echo "<td>".$row['uname']."</td>";
        echo "<td>".$row['contact']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['message']."</td>";
        echo "<td>".$row['time']."</td>";
          echo "<td>".$row['date']."</td>";
        echo "<td>".$row['status']."</td>";
    }
}
  ?>
                
<?php include 'foot.php'?>