<?php

include "TU_HOMEPAGE NEW1.php";
include "config.php";
$id=$_SESSION['username1'];
$statment1="select * from tutor where Login_id='$id'";
$result1=mysqli_query($db,$statment1);
$rw1=mysqli_fetch_assoc($result1);
$class=$rw1['tutor_id'];

if(!$result1)
{
  echo "result select failed!!!!!";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>

<center><h1 style="background-color:lightgrey;">Settings</h1>

<br>
<table width="70%"><tr><td>
<div style="background-color:#4169e1" style="opacity: 1;">


      <br><form action="settings_tutor.php" method="POST">
        <font size="5px" color="white">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  Change Tutor :</b> </font><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>  select new tutor : </b>


         <select name="change" required>

         <option disabled selected hidden value=""><font color="grey" >--Select Teacher from this Class--</font></option>

<?php
          $statment2="select * from users where (class2='$class' or class3='$class' or class4='$class' or class5='$class' or class6='$class' or class7='$class' or class8='$class' or class9='$class' or class10='$class') AND class_type='10' order by username asc";
          $result2=mysqli_query($db,$statment2);

          while($rows2=mysqli_fetch_assoc($result2))
{
    ?>

    <option  value="<?php echo $rows2['Email_id']; ?>"><?php echo $rows2['username']; ?></option>
    <?php } ?>
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// <!--href="deletetchr.php?id=<?php echo $rows2['Login_id']; ?>"-->
      </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      
      <button bordercolor="red" class="ok" name="ok" id="ok" onClick="<?php echo "javascript: return confirm('Admit this Teacher as this class TUTOR..?');"?>" >ok</button>
     <br><br> &nbsp;<font color="red">*</font>     <i> <b><font color="red" size="2px">(if you change tutor your tutor-Previllages will gone and assigned to selected one..you will NO longer remain in this class)</b></font></i>
      <br>  <br>
       <br>      
    </div>
    </td></tr></table> </form>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      
      



<table width="70%"><tr><td>
<div style="background-color:#4169e1" style="opacity: 1;">
<br>
<form action="settings_tutor.php" method="POST">
      
        <font size="5px" color="white">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  Dismiss Class</b> </font>
        &nbsp;&nbsp;&nbsp;&nbsp;
      
      <button bordercolor="red" class="ok1" name="ok1" id="ok1" onClick="<?php echo "javascript: return confirm('are you sure..DISMISS this CLASS..?');"?>" >ok</button>
       <br>   
       <br><br> &nbsp;<font color="red">*</font>     <i> <b><font color="red" size="2px">(This class AND class-data will lost by Dismissing the class..)</b></font></i>
       <br>  <br>
       <br>          
    </div>

</td></tr></table>

    </center>

    </form>



<?php

if(isset($_POST['ok']))
{
  
  $change = $_POST['change'];
//echo $change;echo $change;echo $change;echo $change;echo $change;echo $change;

$q1=mysqli_query($db,"SELECT * from teacher where Email_id='$change'");
$q=mysqli_fetch_assoc($q1);

$name1=$q['Teacher_name'];
$no=$q['Contact_no'];
$email1=$q['Email_id'];
$id1=$q['Login_id'];
$psw=$q['passwrd'];


$q11=mysqli_query($db,"UPDATE tutor set Tutor_name='$name1',Contact_no='$no', Email_id='$email1',Login_id='$id1',passwrd='$psw' where Login_id='$id'");
$q111=mysqli_query($db,"UPDATE users set class1='$class' where Email_id='$change'");
$q1111=mysqli_query($db,"UPDATE users set class1='0' where Login_id='$id'");



$st44="select * from users where Email_id='$change'";
$query44=mysqli_query($db,$st44);
$row=mysqli_fetch_assoc($query44);
$class1=$row['class1'];
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
    
      $st1="update users set class2='0' where Email_id='$change'";
      $stm1=mysqli_query($db,$st1);
   
  }
  
  
  else if($row['class3']==$class)
  {
      $st1="update users set class3='0' where Email_id='$change'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class4']==$class)
  {
      $st1="update users set class4='0' where Email_id='$change'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class5']==$class)
  {
      $st1="update users set class5='0' where Email_id='$change'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class6']==$class)
  {
      $st1="update users set class6='0' where Email_id='$change'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class7']==$class)
  {
      $st1="update users set class7='0' where Email_id='$change'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class8']==$class)
  {
      $st1="update users set class8='0' where Email_id='$change'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class9']==$class)
  {
      $st1="update users set class9='0' where Email_id='$change'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class10']==$class)
  {
      $st1="update users set class10='0' where Email_id='$change'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else 
  {
  
   
  
  }



if($q11 && $q111 && $q1111)
{


  echo "<script>alert('Tutor Changed Successfully')</script>";

  $g=mysqli_query($db,"UPDATE users set current_class='0',work_id='0',att_id='0',internal=NULL where Login_id='$id'");
	session_destroy(); 
	unset($_SESSION['username1']); 

  echo "<script>window.location.href='login tutor.php';</script>";
}

}


if(isset($_POST['ok1']))
{

  $u=mysqli_query($db,"SELECT * from student_work where class='$class'") ;
  while($r=mysqli_fetch_assoc($u))
  {
     $work=$r['work_id'];
     $query=mysqli_query($db,"DELETE from work_update where work_id='$work'") ;

  }
 


  $query1=mysqli_query($db,"DELETE from attendence where class='$class'") ;
  $query2=mysqli_query($db,"DELETE from attendence_info where class='$class'") ;
  $query3=mysqli_query($db,"DELETE from lecture where class='$class'") ;
  $query4=mysqli_query($db,"DELETE from metirials where class='$class'") ;
  $query5=mysqli_query($db,"DELETE from message where class='$class'") ;
  //$query6=mysqli_query($db,"DELETE from student where class='$class'") ;
  $query7=mysqli_query($db,"DELETE from student_work where class='$class'") ;
  //$query=mysqli_query($db,"DELETE from work_update where class='$class'") ;
  $query8=mysqli_query($db,"DELETE from request where class='$class'") ;
  //$query=mysqli_query($db,"DELETE from student_work where class='$class'") ;
  



  $st4="select * from users where (class1='$class' or class2='$class' or class3='$class' or class4='$class' or class5='$class' or class6='$class' or class7='$class' or class8='$class' or class9='$class' or class10='$class')";
  $query4=mysqli_query($db,$st4);
  while($row1=mysqli_fetch_assoc($query4))
  {




    $login=$row1['Login_id'];

    $st44="select * from users where Login_id='$login'";
$query44=mysqli_query($db,$st44);
while($row=mysqli_fetch_assoc($query44))
  {

  
  $class1=$row['class1'];
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
    
      $st1="update users set class2='0' where Login_id='$login'";
      $stm1=mysqli_query($db,$st1);
   
  }
  
  
  else if($row['class3']==$class)
  {
      $st1="update users set class3='0' where Login_id='$login'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class4']==$class)
  {
      $st1="update users set class4='0' where Login_id='$login'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class5']==$class)
  {
      $st1="update users set class5='0' where Login_id='$login'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class6']==$class)
  {
      $st1="update users set class6='0' where Login_id='$login'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class7']==$class)
  {
      $st1="update users set class7='0' where Login_id='$login'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class8']==$class)
  {
      $st1="update users set class8='0' where Login_id='$login'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class9']==$class)
  {
      $st1="update users set class9='0' where Login_id='$login'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else if($row['class10']==$class)
  {
      $st1="update users set class10='0' where Login_id='$login'";
      $stm1=mysqli_query($db,$st1);
  }
  
  else 
  {
  
   
  
  }
}
  
  }



echo "<script>alert('Class Dismissed successfully')</script>";

  $g=mysqli_query($db,"UPDATE users set current_class='0',work_id='0',att_id='0',internal=NULL where Login_id='$id'");
  $query9=mysqli_query($db,"DELETE from tutor where Tutor_id='$class'") ;
	session_destroy(); 
	unset($_SESSION['username1']); 

  echo "<script>window.location.href='login tutor.php';</script>";

}


?>

    </body>

    </html>