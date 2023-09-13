<?php
session_start(); 

//include "refresh_prevent.js";
include "config.php";
$id1=$_REQUEST['id'];
echo $id1;


$query="select * from student_work where id_no='$id1'";
$result=mysqli_query($db,$query);

if($query)
{
 //echo "result selected";
}

if(!$query)
{
  echo "result select failed!!!!!";
}


?>


<!DOCTYPE html>
<html>
<head>
<style> 


label{ font-weight: italic; color: #696969;}



button {
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  font-size:20px;
  border-radius:50%;
  
}

button:hover {
  opacity: 0.8;
}





</style>
</head>
<body>
<pre align="right"><a href="see works_teacherview.php" ><b><font size="6px" color="red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>
<center>
<center><h1 style="background-color:lightgrey;">Edit Students Works Upload</h1></center>
<center>
<form id="edit work" action="edit student work upload.php" method="POST">

<table cellspacing="7px"cellpading="7px" width=600px>


<?php
$rows=mysqli_fetch_assoc($result);

?>


  <!--<tr>  <td><label for="date">Today's Date ( dd/mm/yy )</label></td>
    <td><input type="text" id="date" name="date"></td>
</tr>-->


<tr>
    <td><label for="subject"> Subject Name</label></td>
    <td><input value="<?php echo $rows['subjectname']; ?>" type="text" id="subject" name="subject"></td>
</tr>




<tr>
    <td><label for="Work"> Work</label></td>
    <td><input value="<?php echo $rows['Work']; ?>" type="text" id="work" name="work"></td>
</tr>

<tr>
    <td><label for="topic">Topic</label></td>
    <td> <input value="<?php  echo $rows['Topic'];?> " type="text" id="topic" name="topic"> </td>
</tr>

<tr>
    <td><label for="discription">Description</label></td>
    <td> <textarea  name="discription" id="discription" cols=20 rows=4><?php  echo $rows['descriptn'];?>  </textarea> </td>
</tr>


<tr>
    <td><label for="lastdate">Due Date </label></td>
    <td> <input value="<?php  echo $rows['Last_Date'];?>" type="text" id="lastdate" name="lastdate"> </td>
</tr>

</table><br><br>
<div>
  <button type="submit" name="submit" id="submit">Update</button></div>

</center>

<?php


if(isset($_POST['submit']))
{
  
     $Subject = $_POST['subject'];
      $work = $_POST['work'];
      $topic = $_POST['topic'];
      $lastdate = $_POST['lastdate'];
      $Description = $_POST['discription'];
      $id2=$id1;

  $statement2="UPDATE student_work SET subjectname='$Subject', Work='$work', Topic='$topic', Last_Date='$lastdate', descriptn='$Description' WHERE id_no='$id2'";
  $sql2=mysqli_query($db,$statement2);

  $st="select * from student_work where id_no='$id2'";
  $stm=mysqli_query($db,$st);
  $rw=mysqli_fetch_assoc( $stm);

 // echo $rw['subjectname'].$rw['Work'].$rw['Topic'].$rw['Last_Date'].$rw['descriptn'];
  
 // echo "890"; 
?>
<font color="red">
<?php
 if(!$sql2)
 {
  
   echo "Updation failed!!!!!";
 }
?>

</font>
<font color="blue">
<?php


  if($sql2)
  
    {
      
     
    // echo "<script> location.reload();  </script>";
     //header('location: see works_teacherview.php'); 
      
    }

    if($sql2)
  
    {
      
     
      echo "<br><b>Updated sucessfully</>";
     /* echo "<script> alert('<?php echo $rw['subjectname'].$rw['Work'].$rw['Topic'].$rw['Last_Date'].$rw['descriptn']; ?>');</script>"; */
    }

  }


  //mysqli_close($db);


?>



</center>


</form>
</body>
</html>

