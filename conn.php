<?php
$servername="";
$username="";
$password="";
$dbname="";
$con=mysqli_connect($servername,$username,$password,$dbname);

$sql="SELECT count(id) AS total FROM items";
$result=mysqli_query($con,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
echo $num_rows;
?>