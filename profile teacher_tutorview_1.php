<?php
  session_start(); 

  date_default_timezone_set('Asia/kolkata');
include 'config.php'; 
//include 'TU_HOMEPAGE NEW.php';
$id=$_REQUEST['id'];;
$query="select * from teacher where Email_id='$id'";
$result=mysqli_query($db,$query);
//mysqli_close($db);
if($query)
{
 // echo "result selected";
}

if(!$query)
{
  echo "result select failed!!!!!";
}


?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width", initial-scale=1">

<style>

body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 50%
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}





</style>
<body>


<pre align="right"><a href="Teacher info_1.php" ><b><font size="6px" color="Red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>


<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            

                        <?php
$rows=mysqli_fetch_assoc($result);

?>



<div class="card-block text-center text-white">
                    <center><div class="m-b-25"> <img src="teacher_imageview_tutor_1.php?id=<?php echo $rows['Email_id']; ?>" class="img-radius" alt="User-Profile-Image" height=100 width=100>  </div>
                                <h3 class="f-w-600"><?php  echo $rows['Teacher_name'];?></h3>
                                <br> 
                            </div><center>


                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                

                                <h4>
                                <table align="center" cellpadding=5px cellspacing=25%>


<tr>  <th align=left> <i> Contact Number<i></th>   <td>:</td>   <td> <b><?php  echo $rows['Contact_no'];?></b> </td>    </tr>
<tr>  <th align=left> <i>E-mail<i> </th>   <td>:</td>   <td> <b> <?php  echo $rows['Email_id'];?></b> </td>    </tr>
<tr>  <th align=left> <i>From</i> </th>   <td>:</td>   <td><b> <?php  echo $rows['Department']." Department";?> </b> </td>    </tr>
<!--<tr>  <th align=left><i> Year Of Admission </i></th>   <td>:</td>   <td><b> <?php  echo $rows['Year_of_Addmission'];?> </b>  </td>    </tr>-->

</table>

<center>

<br><br>

<font color="blue"><b><u>CLASSES INVOLVED IN</b></u></font>
<br>
<?php



$st="select * from users where Email_id='$id'";
$query=mysqli_query($db,$st);
$row=mysqli_fetch_assoc($query);


$class2=$row['class2'];
//echo $class2;
$class3=$row['class3'];
//echo $class3;
$class4=$row['class4'];
//echo $class4;
$class5=$row['class5'];
//echo $class5;
$class6=$row['class6'];
//echo $class6;
$class7=$row['class7'];
//echo $class7;
$class8=$row['class8'];
//echo $class8;
$class9=$row['class9'];
//echo $class9;
$class10=$row['class10'];
//echo $class10;
//echo "<br><br>";
$count=0;

if($class2!=0)
{
  
  $count++;
  $st1="select * from tutor where tutor_id='$class2'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  $type1=$row1['class_type'];

  if($type1=="core")
  {
      $type1="";
  }
  //echo "2";
?>

<div><br>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <button><b> <?php echo  $row1['UG_PG']." ".$type1." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?> </b></button>
</div>

<?php
}

if($class3!=0)
{
  $count++;
  //echo "3";
  $st1="select * from tutor where tutor_id='$class3'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  $type1=$row1['class_type'];

  if($type1=="core")
  {
      $type1="";
  }
  //echo "2";
?>

<div><br>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <button><b> <?php echo  $row1['UG_PG']." ".$type1." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?> </b></button>
</div>


<?php
}

if($class4!=0)
{
  $count++;
 // echo "4";
  $st1="select * from tutor where tutor_id='$class4'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  $type1=$row1['class_type'];

  if($type1=="core")
  {
      $type1="";
  }
  //echo "2";
?>

<div><br>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <button><b> <?php echo  $row1['UG_PG']." ".$type1." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?> </b></button>
</div>



<?php
}

if($class5!=0)
{
  $count++;
  //echo "5";
  $st1="select * from tutor where tutor_id='$class5'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  $type1=$row1['class_type'];

  if($type1=="core")
  {
      $type1="";
  }
  //echo "2";
?>

<div><br>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <button><b> <?php echo  $row1['UG_PG']." ".$type1." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?> </b></button>
</div>


<?php
}

if($class6!=0)
{
  $count++;
 // echo "6";
  $st1="select * from tutor where tutor_id='$class6'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  $type1=$row1['class_type'];

  if($type1=="core")
  {
      $type1="";
  }
  //echo "2";
?>

<div><br>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <button><b> <?php echo  $row1['UG_PG']." ".$type1." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?> </b></button>
</div>


<?php
}

if($class7!=0)
{
  $count++;
  //echo "7";
  $st1="select * from tutor where tutor_id='$class7'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  $type1=$row1['class_type'];

  if($type1=="core")
  {
      $type1="";
  }
  //echo "2";
?>

<div><br>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <button><b> <?php echo  $row1['UG_PG']." ".$type1." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?> </b></button>
</div>


<?php
}

if($class8!=0)
{
  $count++;
 // echo "8";
  $st1="select * from tutor where tutor_id='$class8'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  $type1=$row1['class_type'];

  if($type1=="core")
  {
      $type1="";
  }
  //echo "2";
?>

<div><br>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <button><b> <?php echo  $row1['UG_PG']." ".$type1." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?> </b></button>
</div>


<?php
}

if($class9!=0)
{
  $count++;
 // echo "9";
  $st1="select * from tutor where tutor_id='$class9'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  $type1=$row1['class_type'];

  if($type1=="core")
  {
      $type1="";
  }
  //echo "2";
?>

<div><br>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <button><b> <?php echo  $row1['UG_PG']." ".$type1." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?> </b></button>
</div>


<?php
}

if($class10!=0)
{
  $count++;
  //echo "10";
  $st1="select * from tutor where tutor_id='$class10'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  $type1=$row1['class_type'];

  if($type1=="core")
  {
      $type1="";
  }
  //echo "2";
?>

<div><br>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <button><b> <?php echo  $row1['UG_PG']." ".$type1." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?> </b></button>
</div>



<?php
}
if( $count==0)

{

  echo "<pre>



 <big><center><i>No Other Classes</i></center></big>



</pre>";
}

?>

</h4>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

