<?php
include "config.php";
$id=$_REQUEST['id'];
$query="update teacher set added='1' where Login_id='$id'" ;
$result=mysqli_query($db,$query);
if($result)
{
    echo "<script>window.location.href='see teachers requests.php';</script>";
}
else
{
    echo "<script> alert('Failed!!!');window.lcation.href='see teachers requests.php';</script>";
}
mysqli_close($db);
?>