


<?php include "refresh_prevent.js"; ?>




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

<form action="Reg_tutur_s.php" method="post" style="max-width:500px;">

<H2><center><font color="midnightblue">Class Management</font></center></h2>

  <h3><font color="grey">Registration Form</font></h3>



  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Your name" name="username" required>
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="tel" placeholder="Contact Number" name="contactNo" pattern="^\d{10}$" title="incorrect phone number" required>
  </div>


  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email" required>
  </div>


  <div class="input-container">
    <i class="fa fauniversity icon"></i>
    <select class="input-field"  name="graguation" required>
    <option disabled selected hidden>--select UG/PG--</option>
    <option value="UG">UG</option>
    <option value="PG">PG</option>
    </select>
  </div>



   <div class="input-container">
    <i class="fa fa-university icon"></i>
    <input class="input-field" type="text" placeholder="department Name" name="department" required>
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



 <center> <button type="submit" name="submit" id="submit" class="btn">Register</button></center>

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
session_start(); 

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
  
  if($psw!=$confirmpsw)
  { 
    die("<br>Two passwords do not match"); 
  }
    // Checking if the passwords match 
 

    $query = "SELECT * FROM tutor WHERE Login_id='$LoginId'"; 
$results = mysqli_query($db, $query); 

if (mysqli_num_rows($results) >= 1)
  { 
     die("<br>UserId Already exist ");
  }


  $statement="INSERT INTO tutor(Tutor_name, Contact_no, Email_id,UG_PG,Department,Year_of_Admission, Login_id, passwrd) VALUES('$username', '$contactNo', '$email','$graguation', '$department', '$AdmissionYear', '$LoginId', '$psw')";
  $sql=mysqli_query($db,$statement);
  //$statement1="INSERT INTO teacher(Teacher_name, Contact_no, Email_id, Login_id, password) VALUES('$username', '$contactNo', '$email','$LoginId', '$psw')";
  //$sql1=mysqli_query($db,$statement1);
 // $statement2="INSERT INTO users(username, Email_id, Login_id, password) VALUES('$username', '$email','$LoginId', '$psw')";
 // $sql2=mysqli_query($db,$statement2);

 // echo "890"; 

 if($sql)
 {
   echo "Registered sucessfully";
 }

 if(!$sql)
 {
   echo "Registration failed!!!!!";
 }

}


    

   // Storing username of the logged in user, 
		// in the session variable 
		$_SESSION['username'] = $LoginId; 
		
		// Welcome message 
		$_SESSION['success'] = "<br>You have logged in"; 
		
		// Page on which the user will be 
		// redirected after logging in 
		header('location: TU_HOMEPAGE NEW.php'); 

  


?>
</center>
</b></font> 
</form>

<pre>

</pre>

</body>
</html>

