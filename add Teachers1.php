<?php include "refresh_prevent.js"; 
include 'config.php'; 
//include 'TU_HOMEPAGE NEW.php';
session_start(); 

date_default_timezone_set('Asia/kolkata');

$id=$_SESSION['username'];
$query="select * from tutor where Login_id='$id'";
$result=mysqli_query($db,$query);
//mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

body {background:url('add.jpg') no-repeat center fixed;
background-size: cover;}

/*h2 {
  font-family: Merriweather, serif;
  font-size: 40px;
  }*/

/*h2 {
    font-family: 'Andika';font-size: 46px;
}*/

h2 {
  font-family: Cinzel, serif;
  font-size: 46px;  
}

p {text-align:left;}
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: #20b2aa;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid #20b2aa;
}

/* Set a style for the submit button */
.btn {
  background-color: #20b2aa;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
   
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body leftmargin=250px>
<br>
<pre align="right"><a href="Teacher info.php" ><b><font size="6px" color="Red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>


<form action="add Teachers.php" method="post" style="max-width:500px;">

<br>

  <h3><b><font color="grey">Add Teacher</font></b></h3>
<br>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Teacher's Name" name="username" required>
  </div>

  

 <!-- <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Contact Number" name="contactNo" required>
  </div>


  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Email" name="email" required>
  </div>-->

  <?php
$rows=mysqli_fetch_assoc($result);

?>



  <!-- <div class="input-container">
    <i class="fa fa-address-card icon"></i>
    <textarea rows=6 cols=62% placeholder="Adress" name=adress required></textarea>
  </div>


  <div class="input-container">
    <i class="fa fa-male icon,fa fa-female icon"></i>
    <input class="input-field" type="text" placeholder="Parent's Name" name="parent" required>
  </div>

    <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Parent's Contact Number" name="parenttNo" required>
  </div>-->


    <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Login Id" name="LoginId" required>
 
</div>
  
  
<div class="input-container">
<i class="fa fa-user icon"></i>  
<!--<input class="input-field" type="password" placeholder="Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>-->
    <input class="input-field" type="password" placeholder="Password" name="psw" required>
  
  
    </div>
  
  
<div class="input-container">  
    <input class="input-field" type="hidden" value="<?php  echo $rows['UG_PG'];?>" name="graguation" readonly>
  


  

    <input class="input-field" type="hidden" value="<?php  echo $rows['Department'];?>" name="department" readonly>
  

 
    <!--<i class="fa fa-hacker-news icon"></i> -->
    <input class="input-field" type="hidden" value="<?php  echo $rows['Year_of_Admission'];?>" name="AdmissionYear" readonly>
  </div>

 <!-- <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="Password" placeholder="Confirm Password" name="confirmpsw" required>
  </div>-->


<br>

 <center> <button type="submit" name="submit" id="submit" class="btn"><b>ADD</b></button></center>



<?php

if(isset($_POST['submit']))
{
 // echo "1234";
  $username = $_POST['username'];
  
  //$contactNo = $_POST['contactNo'];
  //$email = $_POST['email'];
  $graguation = $_POST['graguation'];
  
  $department = $_POST['department'];
  $AdmissionYear = $_POST['AdmissionYear'];
 // $adress = $_POST['address'];
  //$parent = $_POST['parent'];
  //$parentNo = $_POST['parentNo'];
  $LoginId = $_POST['LoginId'];
  $psw = $_POST['psw'];
  //$confirmpsw = $_POST['confirmpsw'];
  //echo "567";

  $query = "SELECT * FROM teacher WHERE Login_id='$LoginId'"; 
  //$query1 = "SELECT * FROM users WHERE Login_id='$LoginId'"; 
  $results = mysqli_query($db, $query); 
  
  if (mysqli_num_rows($results)>=1)
    { 
       die("<font color='red'><b><br>&nbsp;&nbsp;&nbsp;&nbsp;UserId Already exist</b></font> ");
    }

  $statement="INSERT INTO teacher(Teacher_name, Login_id, Password ,UG_PG, Department, Year_of_Addmission) VALUES('$username','$LoginId','$psw','$graguation','$department','$AdmissionYear')";
  $sql=mysqli_query($db,$statement);
  
  //echo "890"; 
  if($sql)
    {
      echo "<b><br>&nbsp;&nbsp;&nbsp;&nbsp;Registered sucessfully</b>";
      $statement1="update teacher set added='1' where Login_id='$LoginId'";
      $sql1=mysqli_query($db,$statement1);
    }

    if(!$sql)
    {
      echo "Registration failed!!!!!";
    }

}

mysqli_close($db);
?>


</form>
<pre>

</pre>
</body>
</html>

