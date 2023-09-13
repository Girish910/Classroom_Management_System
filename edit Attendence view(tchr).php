<!DOCTYPE html>
<html>
<head>
<style> 


label{ font-weight: italic; color: #696969;}



button {
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  font-size:20px;
  border-radius:50%;
  
}

button:hover {
  opacity: 0.8;
}



</style>
</head>
<body>
<center>
<center><h1 style="background-color:lightgrey;">Edit Students Attendence Upload</h1></center>

<form id="attendence" method="post">

<table cellspacing="5px"cellpading="5px" width=600px>



<tr>
    <td><label for="name">Student Name</label></td>
    <td><input type="text" id="name" name="name"></td>
</tr>





<tr>
    <td><label for="attendence">Number of Attendence</label></td>
    <td> <input type="text" id="attendence" name="attendence"></td>
</tr>





<tr>
</tr>


</table><br><br>
<div>
  <button type="submit">Update</button></div>
</form>
</center>

</body>
</html>

