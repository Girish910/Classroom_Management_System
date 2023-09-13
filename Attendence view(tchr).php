<!DOCTYPE html>
<html>
<head>
<style>
table.table2 table {
  border-collapse: collapse;
  width: 70%;
}



table.table2 th{
  text-align: center;
  padding: 8px;
  color: gray;
  font-size: 15px;
  
}

table.table2 td {
  text-align: center;
  padding: 8px;
  border-spacing: 5px;
}

table.table2 tr:nth-child(even) {background-color: #ffe4b5; }


</style>
</head>
<body>

<center><h1 style="background-color:lightgrey;">Student's Attendence</h1></center>
<br>
<br><p align=15px>
<table class=table1 cellspacing=5px>
<tr>
<td><font color=gray>Uploaded Date</font></td>
<td>:</td>
<td> </td>
</tr>


<tr>
<td><font color=gray>Subject Name</font></td>
<td>:</td>
<td> </td>
</tr>

<tr>
<td><font color=gray>Duration of Attendence</font></td>
<td>:</td>
<td> </td>
</tr>

<tr>
<td><font color=gray>Total No: of Attendence</font></td>
<td>:</td>
<td> </td>
</tr>

</table></p>
<br>


<div>
  <table class=table2>
    <tr>
      <th>Student Name</th>
      <th>Number of Attendences</th>
      <th>Attendence in Percentage(%)</th>
      <th></th>
     
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td><button name=btn1 onclick="window.location.href='edit Attendence view(tchr).php';">edit</button></td>
      
      
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td><button name=btn1 onclick="window.location.href='edit Attendence view(tchr).php';">edit</button></td>
     
    </tr>
    <tr>
       <td> </td>
      <td> </td>
      <td> </td>
      <td><button name=btn1 onclick="window.location.href='edit Attendence view(tchr).php';">edit</button></td>
      
    </tr>
  </table>
</div>

</body>
</html>

