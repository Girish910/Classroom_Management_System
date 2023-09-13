<?php
session_start(); 

date_default_timezone_set('Asia/kolkata');
//include "TU_HOMEPAGE NEW.php";
include "config.php";
include "refresh_prevent.js";

$id=$_SESSION['username'];
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


<script type="text/javascript">
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
}
</script>



<style>

table.table1 tr:nth-child(odd) {background-color: #ffd700; }


.button {
  border: none;
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 50%;
}

.button1 {background-color: #0000ff;} 
.button2 {background-color: #008000;}
.button3 {background-color: #ff0000;}







</style>
</head>

<body>
<br>
<pre align="right"><a href="student info.php" ><b><font size="6px" color="Red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>
<center><h1 style="background-color:lightgrey;">Students Requests</h1></center>

<br>


<center>
<form action="see student requests.php" method="POST">

<table class=table1 cellpadding=5px width=50%>


<?php

$rows1=mysqli_fetch_assoc($result1);
$ugpg=$rows1['UG_PG'];
$dip=$rows1['Department'];
$adm=$rows1['Year_of_Admission'];

$count=1;
$statment2="select * from student where UG_PG='$ugpg' AND Department='$dip' AND Year_of_Addmission='$adm' AND added='0' order by Student_name";
$result2=mysqli_query($db,$statment2);

if (mysqli_num_rows($result2) >= 1)
 { 




while($rows2=mysqli_fetch_assoc($result2))
{

?>

   
    <tr>
    <td align="center" width=30px><b><?php echo $count; ?></b></td>
        <td width=300px><b><?php echo $rows2['Student_name'] ?></b></td>
        <td align=center>  <a class="button button1" href="My Profile student_tuturview1.php?id=<?php echo $rows2['Email_id']; ?>"> Details </button> </td>
        <td align=center> <a class="button button2" href="accept.php?id=<?php echo $rows2['Email_id']; ?>"><b>Accept</b></button> </td>
        <td align=center> <a class="button button3" onClick="<?php echo "javascript: return confirm('Delete this Request?');"?>" href="deletereq.php?id=<?php echo $rows2['Email_id']; ?>"><b>Delete</b></button> </td>
    </tr>


<?php

$count++;
}

}


else
{
echo "<br><br><br><center> <font color='grey'> <i>Empty Requests...</i></font></center>";

}



?>


</table>

</center>


</body>
</html>
