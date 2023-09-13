<?php
include "config.php";
$id=$_REQUEST['id'];
$query="DELETE from student where Email_id='$id'" ;
$result=mysqli_query($db,$query);
if($result)
{
    echo "<script>alert('Removed Successfully');window.location.href='see student requests.php';</script>";
}
else
{
    echo "<script> alert('Failed!!!');window.location.href='see student requests.php';</script>";
}
mysqli_close($db);
?>