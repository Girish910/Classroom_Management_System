<?php

include "TU_HOMEPAGE NEW1.php";
include "config.php";
$id=$_SESSION['username1'];
$statment1="select * from tutor where Login_id='$id'";
$result1=mysqli_query($db,$statment1);
if(!$result1)
{
  echo "result select failed!!!!!";
}






?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.img-radius {
    border-radius: 50%
}


table.table1 tr:nth-child(odd) {background-color: #fff0f5; }



button.buttonT {
color: #cd853f !important;
//text-transform: uppercase;
background: #ffffff;
padding: 7px;
border: 4px solid #66cdaa !important;
border-radius: 15px;
display: inline-block;
transition: all 0.3s ease 0s;

}



button.buttonT:hover {
color: #494949 !important;
border-radius: 50px;
border-color: #494949 !important;
transition: all 0.3s ease 0s;
}






.example_d {
color: #cd853f !important;
//text-transform: uppercase;
background: #ffffff;
padding: 6px;
border: 4px solid #66cdaa !important;
border-radius: 15px;
display: inline-block;
transition: all 0.3s ease 0s;
}



.example_d:hover {
color: #494949 !important;
border-radius: 50px;
border-color: #494949 !important;
transition: all 0.3s ease 0s;
}

.example_d1 {
color: #000000 !important;
//text-transform: uppercase;
background: #ffa07a;
padding: 10px;
border: 4px solid #ff8c00 !important;
border-radius: 15px;
display: inline-block;
transition: all 0.3s ease 0s;
}



.example_d1:hover {
color: red !important;
border-radius: 50px;
border-color: red !important;
transition: all 0.3s ease 0s;
}




</style>
</head>

<body>

<center><h1 style="background-color:lightgrey;">Students</h1></center>

<br>
<center>
<table cellpadding=5px width=50%>
 <tr><td width=300px></td>
<td align=center width=100></td>
<!--<td align=center><a class="example_d1" href="add Student.php" target="_blank" rel="nofollow noopener">ADD</a></td>
<td align=center><a class="example_d1" href="see student requests.php" target="_blank" rel="nofollow noopener">REQUESTS</a></td>-->
</tr>
</table>
</center>
<br>
<br>
<center>
<form action="student info.php" method="POST">
<table class=table1 cellpadding=5px width=50%>

<?php

$rows1=mysqli_fetch_assoc($result1);
$ugpg=$rows1['UG_PG'];
$dip=$rows1['Department'];
$adm=$rows1['Year_of_Admission'];
$class=$rows1['tutor_id'];
$count=1;
$statment2="select * from users where (class2='$class' or class3='$class' or class4='$class' or class5='$class' or class6='$class' or class7='$class' or class8='$class' or class9='$class' or class10='$class') AND class_type='5'  order by username asc";
$result2=mysqli_query($db,$statment2);


if (mysqli_num_rows($result2) >= 1)
 { 


while($rows2=mysqli_fetch_assoc($result2))
{

?>

<tr>
        <td align="center" width=30px><b><?php echo $count; ?></b></td>
        <td width=300px><b>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $rows2['username'] ?></b></td>
        
        <td align=center> <a class="example_d" href="My Profile student_tuturview_1.php?id=<?php echo $rows2['Email_id']; ?>" rel="nofollow noopener">Profile</a></td>
       <td align=center><a class="example_d" onClick="<?php echo "javascript: return confirm('Remove this Student from this class?');"?>" href="delete_1.php?id=<?php echo $rows2['Email_id']; ?>" class="example_d"><u>Remove</u></a></td>


        <td align=center><a class="example_d" href="internal_1.php?id=<?php echo $rows2['Email_id'];?>"  rel="nofollow noopener">Internal</a></td>
    </tr>


<?php
$count++;
}
}


else
{
echo "<br><br><br><center> <font color='grey'> <i>NO students in this Class...</i></font></center>";

}

?>


   
   
</table>

</form>


</center>


</body>
</html>
