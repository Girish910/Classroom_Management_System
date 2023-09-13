<?php

session_start(); 
$user=$_SESSION['username'];

include "config.php";
$id=$_REQUEST['id'];
$query="update student set added='1' where Email_id='$id'" ;
$result=mysqli_query($db,$query);


$st555="select * from student where Email_id='$id'";
$query555=mysqli_query($db,$st555);
$rw555=mysqli_fetch_assoc($query555);

$username=$rw555['Student_name'];
$LoginId=$rw555['Login_id'];
$email=$rw555['Email_id'];
$psw=$rw555['passwrd'];

$statement2="INSERT INTO users(username, Login_id, Email_id,class_type, passwrd)
 VALUES('$username', '$LoginId' , '$email','5', '$psw')";
$sql2=mysqli_query($db,$statement2);

if($result && $sql2)
{
    //echo "<script>window.location.href='see student requests.php';</script>";


$x=mysqli_query($db,"SELECT * from tutor where Login_id='$user'");
$xx=mysqli_fetch_assoc($x);

   
 $class=$xx['tutor_id'];

 $st4="UPDATE users set class2='$class' where Email_id='$id'";
 $query4=mysqli_query($db,$st4);

 $st5="UPDATE student set class='$class' where Email_id='$id'";
 $query5=mysqli_query($db,$st5);
 

}


if(!$query4)
{
    echo "<script>alert('Failed!!!!');window.location.href='see student requests.php';</script>";
}


if($query4)
{
    echo "<script>window.location.href='see student requests.php';</script>";
}

mysqli_close($db);
?>