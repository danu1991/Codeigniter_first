<?php
$x = 'hello';
$x2 = array('camera','cooker') ;
?>
<html>
<body>
	<h1>product dispplay</h1>
<?php 
// echo $x;
// print_r($y);
?>
<hr>
<?php 
foreach ($x as $value)
{
	echo '<tr><td>' . $value . '<tr><td>';
}
?>
</body>
</html>