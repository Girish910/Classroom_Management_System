<?php include "refresh_prevent.js"; 
include 'config.php'; 
//include 'TU_HOMEPAGE NEW.php';
session_start(); 

date_default_timezone_set('Asia/kolkata');

//$id=$_SESSION['username'];
//$query="select * from tutor where Login_id='$id'";
//$result=mysqli_query($db,$query);
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
<pre align="right"><a href="login tutor.php" ><b><font size="6px" color="Red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>


<form action="reg_tutor.php" method="post" style="max-width:500px;">

<br>

  <h3><b><font color="grey">Form for who Already Registered as Teacher</font></b></h3>
<br>

  <!--<div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Teacher's Name" name="username" required>
  </div>-->

  

 <!-- <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Contact Number" name="contactNo" required>
  </div>-->


  
  <?php
//$rows=mysqli_fetch_assoc($result);

?>


<!--<div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Email" name="email" required>
  </div>-->



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
  
  
<!--<div class="input-container">  
    <input class="input-field" type="hidden" value="<?php  echo $rows['UG_PG'];?>" name="graguation" readonly> -->
  


  

   <!-- <input class="input-field" type="hidden" value="<?php  echo $rows['Department'];?>" name="department" readonly>-->
  

 
   <!-- <i class="fa fa-hacker-news icon"></i> 
    <input class="input-field" type="hidden" value="<?php  echo $rows['Year_of_Admission'];?>" name="AdmissionYear" readonly></div> -->

 <!-- <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="Password" placeholder="Confirm Password" name="confirmpsw" required>
  </div>-->




  <div class="input-container">
    <i class="fa fauniversity icon"></i>
    <select class="input-field"  name="type" required>
    <option disabled selected hidden value="">--Select Class Type--</option>
    <option value="core">Core Department</option>
    <option value="Complementary">Complementary</option>
    <option value="Language">Language</option>
    <option value="OpenCourse">OpenCourse</option>
    </select>
  </div>


  <div class="input-container">
    <i class="fa fauniversity icon"></i>
    <select class="input-field"  name="graguation" required>
    <option disabled selected hidden value="">--select UG/PG--</option>
    <option value="UG">UG</option>
    <option value="PG">PG</option>
    </select>
  </div>



   <div class="input-container">
    <i class="fa fa-university icon"></i>
    <input class="input-field" type="text" placeholder="Department OR Class Name" name="department" required>
  </div>

 <div class="input-container">
    <i class="fa fa-hacker-news icon"></i>
    <input class="input-field" type="text" placeholder="Year of Admission of Students in the class" name="AdmissionYear" required>
  </div>


<br>

 <center> <button type="submit" name="submit" id="submit" class="btn"><b>ADD</b></button></center>



<?php

if(isset($_POST['submit']))
{
 // echo "1234";
  //$username = $_POST['username'];
  
  
  //$email = $_POST['email'];
 $graguation = $_POST['graguation'];
  
  $department = $_POST['department'];
  $AdmissionYear = $_POST['AdmissionYear'];

  $LoginId = $_POST['LoginId'];
  $psw = $_POST['psw'];
  $type = $_POST['type'];





  $query = "SELECT * FROM teacher WHERE Login_id='$LoginId' AND Passwrd='$psw'"; 
  $results = mysqli_query($db, $query); 
  
  if (mysqli_num_rows($results) >= 1)
    { 
      
    }


    else
    { 
      echo "<script>
      alert('Incorrect UserId or Password')
     
      </script>";
       die();
    }


    $st55="select * from tutor where UG_PG='$graguation' AND Department='$department' AND Year_of_Admission='$AdmissionYear' AND class_type='$type'";
 $query55=mysqli_query($db,$st55);
 $row55=mysqli_fetch_assoc($query55);



 

if($row55==NULL)
{

}


else
{

echo "<script>
    
      alert('Class Already EXIST')
      </script>";
      die();

}
  
$rr=mysqli_fetch_assoc($results);
$email=$rr['Email_id'];
$username=$rr['Teacher_name'];
//$ph=$rr['photo']; 
$//ph_type=$rr['photo_type']; 
$contactNo=$rr['Contact_no']; 



$st555="select * from tutor where Email_id='$email' or Login_id='$LoginId'";
$query555=mysqli_query($db,$st555);

if($row555==NULL)
{

}


else
{

echo "<script>
    
      alert('This LoginId or Email_id Already EXIST as Tutor')
      </script>";
      die();

}





  




$statement="INSERT INTO tutor(Tutor_name, Contact_no, Email_id,UG_PG,Department,Year_of_Admission,class_type, Login_id, passwrd)
 VALUES('$username', '$contactNo', '$email','$graguation', '$department', '$AdmissionYear','$type', '$LoginId', '$psw')";

$sql=mysqli_query($db,$statement);

//$sql5=mysqli_query($db,"UPDATE tutor set photo_type='$ph_type' ,photo='$ph' where Login_id='$LoginId'");

$statement3="select * from tutor where Login_id='$LoginId'";
$sql3=mysqli_query($db,$statement3);
$rows3=mysqli_fetch_assoc($sql3);
$class=$rows3['tutor_id'];

 $statement4="update users set class1='$class' where Login_id='$LoginId'";
 $sql4=mysqli_query($db,$statement4);


  
  //echo "890"; 
  


 
if($sql && $sql4)
{
    {
        echo "<script>
        alert('You have registered successfully')
        
        </script>";
      }
  
      
  
     // Storing username of the logged in user, 
          // in the session variable 
         
          
          // Welcome message 
          $_SESSION['success'] = "<br>You have logged in"; 
          
          // Page on which the user will be 
          // redirected after logging in 
  
  
  
  
      $query123 = "SELECT * FROM tutor WHERE Login_id='$LoginId'"; 
      $results123 = mysqli_query($db, $query123); 
      $row123=mysqli_fetch_assoc($results123);
      $class_type=$row123['class_type'];
      
      if($class_type=="core")
      {
        $_SESSION['username'] = $LoginId; 
      echo "<script>	window.location.href='TU_HOMEPAGE NEW_.php'</script>"; 
      }
  
      else{
        $_SESSION['username1'] = $LoginId; 
        echo "<script>	window.location.href='TU_HOMEPAGE NEW1_.php'</script>"; 
        //header('location: TU_HOMEPAGE NEW1.php');
          }
  
    }



 if(!$sql && !$sql4)
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

