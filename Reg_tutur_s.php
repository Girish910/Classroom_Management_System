


<?php include "refresh_prevent.js";
session_start(); 
?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

body {background:url('classroom.jpg') no-repeat center fixed;
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
  background: dodgerblue;
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
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: black;
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

<pre align="right"><a href="login tutor.php" ><b><font size="6px" color="red">Back</font></b></a>            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>

<form action="Reg_tutur_s.php" method="post" style="max-width:500px;" enctype="multipart/form-data" name="frm_usr">

<H2><center><font color="midnightblue">Class Management</font></center></h2>

  <h3><font color="grey"> Tutor Registration Form</font></h3>



  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Your name" name="username" required>
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="tel" placeholder="Contact Number" name="contactNo" pattern="^\d{10}$" title="phone number contain 10 digits" required>
  </div>


  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email" required>
  </div>



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


    <div class="input-container">
    <i class="fa fa-id-badge icon"></i>
    <input class="input-field" type="text" placeholder="Login Id" name="LoginId" required>
  </div>

  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="Password" placeholder="Confirm Password" name="confirmpsw" required>
  </div>


 
 <div class="input-container">
    <i class="fa fa-registered icon"></i>
    <select class="input-field"  name="question" required>

   <option value="" selected disabled hidden><font color="grey">-Select a Security Question(Always remember your chosen Question)-</font></option>
   
   

   <option value="1">1. What is the name of your first pet?</option>

<option value="2">2. Who was your favourate teacher when you were a child?</option>



<option value="3">3. What is your favourate Restaurant?</option>

<option value="4">4. Who is your favourate author?</option>


<option value="5">5. Which was your first movie that you watched from theature ?</option>

<option value="6">6. Who is your favourate cartoon charector ?</option>


      </select>
  </div>



  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Answer of above Security Question" name="ans" required>
  </div>


  <div><label for=myfile>Select Photo <font size="small">(use croped photo of your face only)</font></label></div>
 <br> <input type="file" name="myfile"  height=100 width=100 required></div>
 <br>
<br>


<center> <button type="submit" name="submit" id="submit" class="btn">Register</button></center>


</form>

<?php
if (count($_FILES) > 0) {
      if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
        $imageProperties = getimageSize($_FILES['myfile']['tmp_name']);
      }
  }
?>

<font color="red"><b>
<center>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php

/* $mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "classroom";
$bd = new mysqli($mysql_hostname, $mysql_user, $mysql_password);

if($bd)
{
echo "connected successfully to database";
}

if(!$bd)
{
die("Could not connect database");
}
$selectdb = mysqli_select_db($bd,$mysql_database);
if(!$selectdb)
{
   die("Could not select database");
}
if($selectdb)
{
   echo " selected successfully database";
} */

// Starting the session, necessary 
// for using session variables 


// Declaring and hoisting the variables 
$username = ""; 
$email = ""; 
$errors = array(); 
$_SESSION['success'] = ""; 

// DBMS connection code -> hostname, 
// username, password, database name 
$db = mysqli_connect('localhost', 'root', '', 'classroom'); 
if($db)
{
//echo "connected successfully to database";
}

if(!$db)
{
die("Could not connect database");
}

if(isset($_POST['submit']))
{


  
 


  
  $username = $_POST['username'];
  
  $contactNo = $_POST['contactNo'];
  $email = $_POST['email'];
  $graguation = $_POST['graguation'];
  $department = $_POST['department'];
  $AdmissionYear = $_POST['AdmissionYear'];
  $LoginId = $_POST['LoginId'];
  $psw = $_POST['psw'];
  $confirmpsw = $_POST['confirmpsw'];
  $type = $_POST['type'];
  $question = $_POST['question'];
  $ans = $_POST['ans'];

  if($psw!=$confirmpsw)
  { 
    echo "<script>
    alert('Password do not match')
    
    </script>";
  die(); 
  }
    // Checking if the passwords match 
 

    $query = "SELECT * FROM users WHERE Login_id='$LoginId'"; 
$results = mysqli_query($db, $query); 

if (mysqli_num_rows($results) >= 1)
  { 
    echo "<script>
    alert('UserId Already exist')
   
    </script>";
     die();
  }


  $query11 = "SELECT * FROM users WHERE Email_id='$email'"; 
  $results11 = mysqli_query($db, $query11); 
  
  if (mysqli_num_rows($results11) >= 1)
    { 
      echo "<script>
      alert('This Email id has already Registered')
      
      </script>";
       die();
    }





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



    $st55="select * from tutor where UG_PG='$graguation' AND Department='$department' AND Year_of_Admission=' $AdmissionYear'";
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


    

 // $statement="INSERT INTO tutor(Tutor_name, Contact_no, Email_id,UG_PG,Department,Year_of_Admission, Login_id, passwrd) VALUES('$username', '$contactNo', '$email','$graguation', '$department', '$AdmissionYear', '$LoginId', '$psw')";
 // $sql=mysqli_query($db,$statement);
 // echo "890"; 


 $statement="INSERT INTO tutor(Tutor_name, Contact_no, Email_id,UG_PG,Department,Year_of_Admission,class_type, Login_id, passwrd) VALUES('$username', '$contactNo', '$email','$graguation', '$department', '$AdmissionYear','$type', '$LoginId', '$psw')";
 $sql=mysqli_query($db,$statement);


//'{$imageProperties['mime']}','{$imgData}'
 
// echo "890"; 
if($sql)
{
 $statement1="INSERT INTO teacher(Teacher_name, Contact_no, Email_id,Login_id,passwrd,question,ans) VALUES('$username', '$contactNo', '$email', '$LoginId', '$psw','$question','$ans')";
 $sql1=mysqli_query($db,$statement1);
}
if($sql)
{
 $statement2="INSERT INTO users(username, Login_id, Email_id,class_type, passwrd) VALUES('$username', '$LoginId' , '$email','10', '$psw')";
 $sql2=mysqli_query($db,$statement2);

 $statement3="select * from tutor where Login_id='$LoginId'";
$sql3=mysqli_query($db,$statement3);
$rows3=mysqli_fetch_assoc($sql3);
$class=$rows3['tutor_id'];

 $statement4="update users set class1='$class' where Login_id='$LoginId'";
 $sql4=mysqli_query($db,$statement4);

//$sql5=mysqli_query($db,"UPDATE tutor set photo_type='{$imageProperties['mime']}' ,photo='{$imgData}' where Login_id='$LoginId'");

$sql6=mysqli_query($db,"UPDATE teacher set photo_type='{$imageProperties['mime']}' ,photo='{$imgData}' where Login_id='$LoginId'");


}  



 if(!$sql && !$sql1 && !$sql2 && !$sql4 )
 {
  echo "<script>
        alert('Registration Failed!!!!')
        
        </script>"; 
 }


  if($sql && $sql1 && $sql2 && $sql4)
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
}

?>
</center>
</b></font> 
</form>

<pre>

</pre>

</body>
</html>

