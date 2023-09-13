<?php
include "config.php";
$id=$_REQUEST['id'];
$query="DELETE from teacher where Login_id='$id'" ;
$result=mysqli_query($db,$query);
if($result)
{
    echo "<script>alert('Removed Successfully');window.location.href='see teachers requests.php';</script>";
}
else
{
    echo "<script> alert('Failed!!!');window.location.href='see teachers requests.php';</script>";
}
mysqli_close($db);
?>