<?php
include "config.php";
$id=$_REQUEST['id'];
$msg=$_REQUEST['msg'];

$query="update message set Reply='$msg' id_no='$id'" ;
$result=mysqli_query($db,$query);
if($result)
{
    echo "<script>window.location.href='request_.php';</script>";
}
else
{
    echo "<script> alert('Failed!!!');window.lcation.href='request_.php';</script>";
}
mysqli_close($db);
?>