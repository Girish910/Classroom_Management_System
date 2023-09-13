<?php

include "config.php";

$s=mysqli_query($db,"select * from metirials where id_no='4'");
$s2=mysqli_fetch_assoc($s);
?>
<html>
<head></head>

<body>
<img src="view.php?id=<?php echo ?>">



</body>