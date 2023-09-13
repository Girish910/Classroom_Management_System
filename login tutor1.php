<?php 
//include "refresh_prevent.js";

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
  echo "<br>";
 // echo "connected successfully";
}


// User login 
if (isset($_POST['login']))
{ 
	
	// Data sanitization to prevent SQL injection 
	$username = $_POST['uname']; 
	$password = mysqli_real_escape_string($db, $_POST['psw']); 

	// Error message if the input field is left blank 
	if (empty($username))
  { 
		array_push($errors, "Username is required"); 
    //echo "username is required";
	} 
	if (empty($password)) 
  { 
		array_push($errors, "Password is required"); 
	} 

	// Checking for the errors 
//	if (count($errors) == 0) { 
		
		// Password matching 
		//$password = md5($password); 
		
		$query = "SELECT * FROM tutor WHERE Login_id='$username' AND Passwrd='$password'"; 
		$results = mysqli_query($db, $query); 



if($results)
{
  echo "<br><br>";
  
 // echo "result is equal to ONE";
  echo "<br>";
    $q=mysqli_num_rows($results);
    //echo "$q";
    echo "<br>";
}
else
{
  
  echo "<br>result failed";
}


		// $results = 1 means that one user with the 
		// entered username exists 
		if (mysqli_num_rows($results) == 1)
   { 
			
			// Storing username in session variable 
			$_SESSION['username'] = $username; 
			
			// Welcome message 
			$_SESSION['success'] = "You have logged in!"; 
			
			// Page on which the user is sent 
			// to after logging in 
			header('location: TU_HOMEPAGE NEW.php'); 
		} 
		else
   { 
      	// If the username and password doesn't match 
		//	array_push($errors, "Username or password incorrect"); 
    echo "<h3 style='background-color:white'><font color='red'>";
    echo " Incorrect Username or password ";
    echo "</font></h3>";
  } 
}

	 


?> 






<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

body {background:url('Class2.jpg') no-repeat center fixed;
background-size: cover;}


/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */




button {
  background-color: #008cba;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: 25px;
  cursor: pointer;
  width: 100%;
  
  font-size:20px;
}


button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}


.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}










/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}






/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 200px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<br><br><br><br><br><br><br><br><br><br>
<h1 style="background-color:tomato;"><pre>    C L A S S   M A N A G M E N T</pre></h1>
<br> <br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>&nbspLogin as....</b><br><br> &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn1">Tutor</button>&nbsp;&nbsp;
<br><br>


<div id="id01" class="modal">
  
  <form class="modal-content animate" action="login tutor.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">

      <label for="uname"><b>Login Id</b></label>
      <input type="text" placeholder="Enter Login Id" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="login" id="login">Login</button>
      <label>
       
      </label>
    </div>
    
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
     <span class="psw"><a href="#">Forgot password?</a> &nbsp; &nbsp;&nbsp; &nbsp; <a href=Reg_tutur_s.php> Register </a></span>

    </div>

    



  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>






