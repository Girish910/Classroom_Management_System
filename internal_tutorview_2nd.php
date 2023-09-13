<?php include 'config.php';
include 'TU_HOMEPAGE NEW.php';
  
$id = $_SESSION['username'];

$s=mysqli_query($db,"select * from users where Login_id='$id'");
$s2=mysqli_fetch_assoc($s);

$student=$s2['internal'];
$id = $_SESSION['username'];
      $name="select * from tutor where Login_id='$id'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);
      $Email=$rows1['Email_id'];
      $class=$rows1['tutor_id'];


    $display="select * from student_work where class='$class' AND upload_by='$Email'";
    $count=0;
    $result=mysqli_query($db,$display);



    if($result==NULL)
    {


    }

    $display11="select * from student where Email_id='$student'";
  
    $result11=mysqli_query($db,$display11);
    $studentname=mysqli_fetch_assoc($result11);
    $student_name=$studentname['Student_name'];
    

   
    
    if($display)
    {
     // echo "result selected";
    }
    
    if(!$display)
    {
      echo "result select failed!!!!!";
    }
    
    
  ?>




<!DOCTYPE html>
<html>
<head><!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th{
  text-align: center;
  padding: 8px;
  color: gray;
  font-size: 15px;
  
}

 td {
  text-align: center;
  padding: 8px;
  border-spacing: 5px;
}

tr:nth-child(even) {background-color: #ffe4b5;}
button{size: 5px;}


</style>
</head>
<body>

<center><h1 style="background-color:lightgrey;">Student Internal</h1></center>
<br>
<mark><b>Student Name: <font color="red"> <?php echo $student_name; ?></font></b></mark>
<br>
<br>


<div style="overflow-x:auto;">
  <table>
    <tr>
      <th></th>
      <th>uploaded Date&Time</th>
      <th>Subject</th>
      <th>Work</th>
      <th>Topic</th>
      <th>Description</th>
      <th>Last Date of Submission</th>
      <th>Submitted Date</th>
      <th>Obtained Mark</th>
      <th>OUT OF</th>
      <th></th> 
    </tr>



    <?php



$sn=1;
while($rows=mysqli_fetch_assoc($result))
{

?>

<tr>
      <td>  <?php echo $sn;  ?>  </td>
      <td> <font size="2px"> <?php  echo $rows['current'];?> </font></td>

      
      <td> <?php  echo $rows['subjectname'];?> </td>
      <td> <?php  echo $rows['Work'];?>  </td>
      <td>  <?php  echo $rows['Topic'];?> </td>
      
      <td> <?php  echo $rows['descriptn'];?>  </td>
      <td> <?php  echo $rows['Last_Date'];?>  </td>
      

<?php

$wrkid=$rows['work_id'];

$st="select * from work_update where student='$student' AND work_id='$wrkid'";
$st1=mysqli_query($db,$st);
$st2=mysqli_fetch_assoc($st1);


if($st2!=NULL)
{

?>


      
      <td> <?php  echo $st2['submitted_date'];?>  </td>
      <td> <?php  echo $st2['mark'];?>  </td>

<?php }  ?>


<?php


if($st2==NULL)
{

?>


      
      <td><font color="red"><b>  -- </b></font></td>
      <td><font color="red"> <b> --</b> </font></td>

<?php } 


$idno1=$wrkid;
$student1=$student;

?>





      <td> <?php  echo $rows['out_of'];?>  </td>
      <td><button  onclick="window.location.href='edit internal.php?id=<?php echo $idno1;?> &name=<?php echo $student1; ?>'">Edit</button></td>
    </tr>

    <?php
    $sn++;
   }
?>

  </table>
</div>

</body>
</html>

