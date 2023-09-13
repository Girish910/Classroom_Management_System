<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width", initial-scale="1">

<style>
body {background:url('forgot.jpg') no-repeat center fixed;
background-size: cover;}

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

h4 {
  font-family: Cinzel, serif;
  font-size: 33px;  
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
  background: #b0e0e6;
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
  border: 2px solid #b0e0e6;
}

/* Set a style for the submit button */
.btn {
  background-color: red;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
  
}

.btn:hover {
  opacity: 1;
}

</style>
</head>
<body>



<center><h4>Reset UserId & Password &nbsp;<a href="login tutor.php" ><b><font size="5px" color="red">Back</font></b></a></h4> </center>

<center>
<form action="reset_tutor.php" method="POST" style="max-width:500px;">


<div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="email" placeholder="Your Email Id" name="email" required>
  </div>


 <div class="input-container">
    <i class="fa fa-registered icon"></i>
    <select class="input-field"  name="question" required>

   <option value="" selected disabled hidden><font color="grey">--Select Security Question that you chosen while Registration--</font></option>

   

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
    <input class="input-field" type="text" placeholder="Answer of Security Question that you entered while Registration" name="ans" required>
  </div>


  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="New LoginId" name="loginid" required>
  </div>

<div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="password" placeholder="New Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
  </div>

  

 <center> <button type="submit" class="btn" name="submit">Submit</button></center>
</form>



<?php

include "config.php";

if(isset($_POST['submit']))
{

  $email = $_POST['email'];
  $question = $_POST['question'];
  
  $ans = $_POST['ans'];
  $loginid = $_POST['loginid'];
  $psw = $_POST['psw'];

$q=mysqli_query($db,"SELECT * from teacher where Email_id='$email' AND question='$question' AND ans='$ans'");

if (mysqli_num_rows($q) >= 1)
    {

       $q1=mysqli_query($db,"UPDATE teacher set Login_id='$loginid',passwrd='$psw' where Email_id='$email'");
       $q11=mysqli_query($db,"UPDATE users set Login_id='$loginid',passwrd='$psw' where Email_id='$email'");
       
       if($q1 && $q11)
       {
        
        echo "<script>
      alert('Login Id and Password Reseted Successfully')
      window.location.href='login tutor.php'
      </script>";
       die();

       }
    

    }


    else
    { 

      echo "<script>
      alert('Email id , Security Question and Answer does NOT MATCH')
      window.location.href='reset_tutor.php'
      </script>";
       die();

    }

}

?>


</body>
</html>


