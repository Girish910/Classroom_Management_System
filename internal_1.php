<?php
include "config.php";
session_start(); 

date_default_timezone_set('Asia/kolkata');
$user=$_SESSION['username1'];

$id=$_REQUEST['id'];
$query="UPDATE users set internal='$id' where Login_id='$user'";
$result=mysqli_query($db,$query);
if($result)
{
    echo "<script>window.location.href='internal_tutorview_1.php';</script>";
}
else
{
    echo "<script> alert('Failed!!!');</script>";
}
mysqli_close($db);
?>