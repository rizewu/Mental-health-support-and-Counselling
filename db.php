<?php
$servername="localhost:3307";
$username="root";
$password="";
$dbname="mentalsup";
$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn)
{
  die("error".mysqli_connection_error());
}
?>