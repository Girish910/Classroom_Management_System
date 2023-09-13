<?php

session_start();
$tutor=$_SESSION['username'];

include "config.php";
$user=$_REQUEST['id'];





$st5="select * from tutor where Login_id='$tutor'";
 $query5=mysqli_query($db,$st5);
 $row5=mysqli_fetch_assoc($query5);



$class=$row5['tutor_id'];

$st4="select * from users where Login_id='$user'";
$query4=mysqli_query($db,$st4);
$row=mysqli_fetch_assoc($query4);
//$class1=$row['class1'];
$class2=$row['class2'];
$class3=$row['class3'];
$class4=$row['class4'];
$class5=$row['class5'];
$class6=$row['class6'];
$class7=$row['class7'];
$class8=$row['class8'];
$class9=$row['class9'];
$class10=$row['class10'];



if($row['class2']==$class)
{
  
    $st1="update users set class2='0' where Login_id='$user'";
    $stm1=mysqli_query($db,$st1);
 
}


else if($row['class3']==$class)
{
    $st1="update users set class3='0' where Login_id='$user'";
    $stm1=mysqli_query($db,$st1);
}

else if($row['class4']==$class)
{
    $st1="update users set class4='0' where Login_id='$user'";
    $stm1=mysqli_query($db,$st1);
}

else if($row['class5']==$class)
{
    $st1="update users set class5='0' where Login_id='$user'";
    $stm1=mysqli_query($db,$st1);
}

else if($row['class6']==$class)
{
    $st1="update users set class6='0' where Login_id='$user'";
    $stm1=mysqli_query($db,$st1);
}

else if($row['class7']==$class)
{
    $st1="update users set class7='0' where Login_id='$user'";
    $stm1=mysqli_query($db,$st1);
}

else if($row['class8']==$class)
{
    $st1="update users set class8='0' where Login_id='$user'";
    $stm1=mysqli_query($db,$st1);
}

else if($row['class9']==$class)
{
    $st1="update users set class9='0' where Login_id='$user'";
    $stm1=mysqli_query($db,$st1);
}

else if($row['class10']==$class)
{
    $st1="update users set class10='0' where Login_id='$user'";
    $stm1=mysqli_query($db,$st1);
}

else {

 echo "<script>
 alert('class Selection Failed!!----else')
 
 </script>";


}



if($stm1)
{
    echo "<script>alert('Removed Successfully!!!');window.location.href='Teacher info.php';</script>";
}
else
{
    echo "<script> alert('Failed!!!');window.lcation.href='Teacher info.php.php';</script>";
}
mysqli_close($db);
?>