
<?php
session_start(); 

//include "refresh_prevent.js";
include "config.php";
$id1=$_REQUEST['id'];
$name1=$_REQUEST['name'];
//echo $id1;
//echo $name1;
$user=$_SESSION['username'];

$query="SELECT * from work_update where work_id='$id1' AND student='$name1'";
$result1=mysqli_query($db,$query);
$q=mysqli_fetch_assoc($result1);
if($result1)
{
 //echo "result selected";
}

if(!$result1)
{
  echo "result select failed!!!!!";
}


$name="select * from tutor where Login_id='$user'";
$NAME=mysqli_query($db,$name);
$rows1=mysqli_fetch_assoc($NAME);
$Email=$rows1['Email_id'];
$class=$rows1['tutor_id'];
$work_id=$id1;

//echo $work_id;

$display="select * from student_work where work_id='$work_id'";
$count=0;
$result=mysqli_query($db,$display);

$display11=mysqli_query($db,"select * from student where Email_id='$name1'");
  
    $result11=mysqli_fetch_assoc($display11);


?>





<!DOCTYPE html>
<html>
<head>
<style> 



table.table1 {
  border-collapse: collapse;
  width: 90%;
}

th.th1{
  text-align: center;
  padding: 8px;
  color: gray;
  font-size: 15px;
  
}

 td.td1 {
  text-align: center;
  padding: 8px;
  border-spacing: 5px;
}

tr.tr1:nth-child(even) {background-color: #ffe4b5;}
button{size: 5px;}



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
<center>

<pre align="right"><a href="internal_tutorview.php" ><b><font size="6px" color="red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>
<center><h1 style="background-color:lightgrey;">Edit Internal</h1></center>



<table class="table1">
    <tr class="tr1">
      
      <th class="th1">uploaded Date&Time</th>
      <th class="th1">Subject</th>
      <th class="th1">Work</th>
      <th class="th1">Topic</th>
      <th class="th1">Description</th>
      <th class="th1">Last Date of Submission</th>
      
      <th>OUT OF</th>
     
    </tr>



    <?php



$rows=mysqli_fetch_assoc($result);


?>

<tr class=tr1>
      
      <td class="td1"> <font size="2px"> <?php  echo $rows['current'];?> </font></td>

      
      <td class="td1"> <?php  echo $rows['subjectname'];?> </td>
      <td class="td1"> <?php  echo $rows['Work'];?>  </td>
      <td class="td1">  <?php  echo $rows['Topic'];?> </td>
      
      <td class="td1"> <?php  echo $rows['descriptn'];?>  </td>
      <td class="td1"> <?php  echo $rows['Last_Date'];?>  </td>
      <td class="td1"> <?php  echo $rows['out_of'];?>  </td>
      
    </tr>

    </table>

    <?php
    
   
?>


<br><br>
<center>
<form id="edit work" method="post" action="edit internal.php">




<?php 

if($q==TRUE)
{


 // echo "TRUE";

?>

<table cellspacing="5px"cellpading="5px" width=600px>

<tr>
    <td></td>
    <td><input type="text" id="wrkid" name="wrkid" value="<?php echo $id1; ?>" hidden readonly><input type="text" name="name" value="<?php echo  $result11['Email_id']; ?>" hidden readonly>
    <input type="text" id="of" name="of" value="<?php echo $rows['out_of']; ?>" hidden readonly>
    </td>
</tr>


<tr>
    <td><mark><b>Student Name :<font color="red"> <?php echo $result11['Student_name']; ?> </font></b></mark></td>
    <td></td>

    <tr></tr>
</tr>

  <tr>  <td><label for="subdate">Submitted Date</label></td>
    <td><input type="date" id="subdate" name="subdate" value="<?php echo $q['submitted_date']; ?>"></td>
</tr>

<tr>
</tr>
<tr>
    <td><label for="mark">Obtained mark</label></td>
    <td><input type="text" id="mark" name="mark" value="<?php echo $q['mark']; ?>"></td>
</tr>

<tr>
</tr>


</table><br><br>
<div>




<button type="submit" name="submit">Update</button> 

 </div>
</form>

<?php
}
?>

</center>


<?php
 


if(isset($_POST['submit']))
{
    
     
      $wrkid1 = $_POST['wrkid'];
      $name11 = $_POST['name'];
      $date= $_POST['subdate']; 
      $mark = $_POST['mark'];
      $outof=$_POST['of'];

      if($mark > $outof)
      {

        echo "<script>
        alert('This value is GREATER than TOTAL INTERNAL MARK')
        window.location.href='internal_tutorview.php';
        </script>";

      }

else{
$stm=mysqli_query($db,"UPDATE work_update set submitted_date='$date', mark='$mark' where work_id='$wrkid1' AND student='$name11'");

$url="internal_tutorview.php?id=<?php echo $stu ?>";

  if($stm)
  
    {
      
    
    // echo "<script> location.reload();  </script>";
     
    echo "<script>
              alert('Updated Successfully')
              window.location.href='internal_tutorview.php';
           
      </script>";
      
    
      
    }


    if(!$stm)
  
    {
      
     
    // echo "<script> location.reload();  </script>";
     
    echo "<script>
              alert('Failed!!!!!!!!!!!!');
              
      </script>";

    

    }

    }

  }
      ?>








<center>


<?php 

if($q==FALSE)
{

 // echo "FALSE";
 ?>


<table cellspacing="5px"cellpading="5px" width=600px>

<tr>
    <td></td>
    <td><input type="text" id="wrkid" name="wrkid" value="<?php echo $id1; ?>" hidden readonly> <input type="text" name="name" value="<?php echo  $result11['Email_id']; ?>" hidden readonly>
    <input type="text" id="of" name="of" value="<?php echo $rows['out_of']; ?>" hidden readonly>
    </td>
</tr>


<tr>
    
    <td><mark><b>Student Name :<font color="red"> <?php echo $result11['Student_name']; ?> </font></b></mark></td>
    <td></td>
</tr>

<tr></tr>

  <tr>  <td><label for="subdate">Submitted Date</label></td>
    <td><input type="date" id="subdate" name="subdate"></td>
</tr>

<tr>
</tr>
<tr>
    <td><label for="mark">Obtained mark</label></td>
    <td><input type="text" id="mark" name="mark"></td>
</tr>

<tr>
</tr>


</table><br><br>
<div>




<button type="submit" name="ok">Update</button> 

 </div>
</form>


<?php
}
?>

</center>


<?php
  
 // echo $rows['out_of'];

if(isset($_POST['ok']))
{
    
     
      $wrkid1 = $_POST['wrkid'];
      $name11 = $_POST['name'];
      $date= $_POST['subdate']; 
      $mark = $_POST['mark'];
      $reg=  $result11['Reg_no'];
      $date1=date('d-m-y h:i:s');
     
      $outof=$_POST['of'];
     
      if($mark>$outof)
      {

        echo "<script>
        alert('This value is GREATER than TOTAL INTERNAL MARK')
        window.location.href='internal_tutorview.php';
        </script>";

      }

else{
$stm1="INSERT into work_update(work_id,date,student,reg_no,submitted_date,mark) VALUES('$wrkid1','$date1','$name11','$reg','$date','$mark')";
$stm=mysqli_query($db,$stm1);



  if($stm)
  
    {
      
    
    // echo "<script> location.reload();  </script>";
     
    echo "<script>
              alert('Updated Successfully')
              window.location.href='internal_tutorview.php';
           
      </script>";
      
    
      
    }


    if(!$stm)
  
    {
      
     
    // echo "<script> location.reload();  </script>";
     
    echo "<script>
              alert('Failed!!!!!!!!!!!!');
              
      </script>";

    



    }

  }
}
      ?>


</body>
</html>

