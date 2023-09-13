
<?php 
include "refresh_prevent.js";


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
 // echo "connected successfully";
}


// User login 
if (isset($_POST['submit'])) 

{
  
  



}


?>


<doctype html>
<html>

<head>
<style>
body {
  margin: 0;
  padding: 0;
  background-color: #004882;
}

.box {
 position: relative;
 top: 50%;
 left: 50%;
  transform: translate(-50%, -50%);
}

.box select {
  background-color: #0563af;
  color: white;
  padding: 12px;
  width: 250px;
  border: none;
  font-size: 20px;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
  -webkit-appearance: button;
  appearance: button;
  outline: none;
}

.box::before {
 // content: "\f13a";
  font-family: FontAwesome;
  position: absolute;
  top: 0;
  right: 0;
  width: 20%;
  height: 100%;
  text-align: center;
  font-size: 28px;
  line-height: 45px;
  color: rgba(255, 255, 255, 0.5);
  background-color: rgba(255, 255, 255, 0.1);
  pointer-events: none;
}

.box:hover::before {
  color: rgba(255, 255, 255, 0.6);
  background-color: rgba(255, 255, 255, 0.2);
}

.box select option {
  padding: 30px;
}
</style>
</head>

<body>

<center>
<font color="red"> 
<h2>Select Classes</h2></font>
<br> <font color="orange">  <h5>You can select multiple classes.. only can join when tutor let you into the class</h5> </font>

<br><br><br><br><br><br><br><br><br><br><br>
<form action="select class.php" method="POST">
<div class="box">
<big><b><font color="grey">Graduation</font></b></big><br><br>
  <select name="graguation" id="graguation">
    <option>Option 1</option>
    <option>Option 2</option>
    <option>Option 3</option>
    <option>Option 4</option>
    <option>Option 5</option>
  </select>

<br><br><br>
<big><b><font color="grey">Department</font></b></big><br><br>
  <select>
    <option>Option 1</option>
    <option>Option 2</option>
    <option>Option 3</option>
    <option>Option 4</option>
    <option>Option 5</option>
  </select>

<br><br><br>
<big><b><font color="grey">Year</font></b></big><br><br>

  <select>
    <option>Option 1</option>
    <option>Option 2</option>
    <option>Option 3</option>
    <option>Option 4</option>
    <option>Option 5</option>
  </select>
<br><br><br>
<button name=submit>OK</button> 

</div>

</center>
</form>

</body>
</html>

