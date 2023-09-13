<?php include 'config.php';
include 'TU_HOMEPAGE NEW.php';
$id = $_SESSION['username'];
$name="select * from tutor where Login_id='$id'";
$NAME=mysqli_query($db,$name);
 $rows1=mysqli_fetch_assoc($NAME);
 $Email=$rows1['Email_id'];
 $class=$rows1['tutor_id']; 
 $ugpg=$rows1['UG_PG'];
 $dep=$rows1['Department'];
 $yr=$rows1['Year_of_Admission'];


 $max=mysqli_query($db,"select MAX(att_id) AS maximum from attendence_info where upload_by='$Email'");
 $max2=mysqli_fetch_assoc($max);
 $maximum=$max2['maximum'];
 $statement1="select * from attendence_info where att_id='$maximum'";
 $query1=mysqli_query($db,$statement1);
 $result1=mysqli_fetch_assoc($query1);



if(isset($_POST['submit']))
{
    
      //echo "1234";
      //$Date = $_POST['date'];
      //$time = $_POST['time'];
      $Subject= $_POST['subject'];
      $duration = $_POST['duration'];
      $total = $_POST['totalattendence'];
      $class =$_POST['class'];
      $student = $_POST['student'];
      $current=date('d-m-y');
      $uploadby=$rows1['Email_id'];
      $studentattendence =$_POST['studentattendence'];
    
      $rollno=$_POST['rollno'];


     

      

}
  

  
  ?>






<!DOCTYPE html>
<html>
<head>
<style> 
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
 background-color: #fafad2;
}

label{ font-weight: italic; color: #696969;}


select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
 background-color: #fafad2;
}
  

textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
  color: #fffacd;
}

button.submit {
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

button.sumbit:hover {
  opacity: 0.8;
}



</style>
</head>
<body>
<center>
<center><h1 style="background-color:lightgrey;">Students Attendence Upload</h1></center>





<form id="attendence" action="Attendence Tutor upload.php" method="post">


<?php
if($result1==NULL)
{
?>


<table cellspacing="5px"cellpading="5px" width=600px>

  


<tr>
    <td><label for="subject">Subject Name</label></td>
    <td><input type="text" id="subject" name="subject"></td>
</tr>




<tr>
    <td><label for="duration">Duration of uploading Attendence</label></td>
    <td><input type="text" id="duration" name="duration"></td>
</tr>

<tr>
    <td><label for="totalattendence">Total Number of Attendence</label></td>
    <td> <input type="text" id="totalattendence" name="totalattendence"></td>
</tr>




<tr> 
<td><input type="text" id="uploadby" name="uploadby" readonly value="<?php echo $Email; ?>"></td>
<td><input type="text" id="class" name="class" value="<?php echo $class; ?>" readonly></td>
</tr>


<tr>
<?php

$st="select * from student where UG_PG='$ugpg' && Department='$dep' && Year_of_Addmission='$yr' order by Reg_no";
$q=mysqli_query($db,$st);


?>


   <td> <label for="student">Name of Student</label></td>
 <td>  <select name="student" id="student" required>
 <option selected="selected" disabled="disabled" style="display:none;"></option>
  <?php
  
   while($rw=mysqli_fetch_assoc($q))
{
?>

    <option  value="<?php echo $rw['Email_id']; ?>"><?php echo $rw['Student_name']; ?></option>
    
<?php 
}
 ?>
 </select>
 </td>



</tr>



<tr>  <td><label for="studentattendence">Number of Attendence of this student</label></td>
    <td><input type="text" id="studentattendence" name="studentattendence"></td>
</tr>

</table><br><br>
<div>
  <button type="submit" name="submit" type="submit" class="submit">Update</button></div>



<?php
}
?>





<?php
if($result1!=NULL)
{
?>



<table cellspacing="5px"cellpading="5px" width=600px>

  


<tr>
    <td><label for="subject">Subject Name</label></td>
    <td><input type="text" id="subject" name="subject" value="<?php echo $result1['sub'] ; ?>"></td>
</tr>




<tr>
    <td><label for="duration">Duration of uploading Attendence</label></td>
    <td><input type="text" id="duration" name="duration" value="<?php echo $result1['duration'] ; ?>"></td>
</tr>

<tr>
    <td><label for="totalattendence">Total Number of Attendence</label></td>
    <td> <input type="text" id="totalattendence" name="totalattendence" value="<?php echo $result1['total_attendence'] ; ?>" ></td>
</tr>



<tr> 
<td><input type="text" id="uploadby" name="uploadby" readonly value="<?php echo $Email; ?>"></td>




<td><input type="text" id="class" name="class" value="<?php echo $class; ?>" readonly></td>
</tr>



<tr>
<td> <label for="student">Name of Student</label></td>
 <td>  <select name="student" id="student"  required>
 <option selected="selected" disabled="disabled" style="display:none;"></option>
  <?php
  
   while($rw=mysqli_fetch_assoc($q))
{
?>

    <option  value="<?php echo $rw['Email_id']; ?>"><?php echo $rw['Reg_no'].$rw['Student_name']; ?></option>


<?php 
}
 ?>
 </select>
 </td>



</tr>






<tr>  <td><label for="studentattendence">Number of Attendence of this student</label></td>
    <td><input type="text" id="studentattendence" name="studentattendence"></td>
</tr>

</table><br><br>
<div>
  <button type="submit" name="submit" type="submit" class="submit">Update</button></div>

  

<?php


}
?>


</form>


</center>


<script>
  if( window.history.replaceState)
  {
     window.history.replaceState(null, null, window.location.href);
  }
  </script>

</body>
</html>

