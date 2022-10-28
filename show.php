<!DOCTYPE html>
<html>
<head>
	<title>show table</title>
</head>
<body>
<?php 

include ('connection.php');
$sql ="select * from asan";
$data =mysqli_query($con,$sql);
$total=mysqli_num_rows($data);


if ($total=mysqli_num_rows($data)) {
	?>
	<table border="2">
<tr>

<th>name</th>
<th>ph</th>

</tr>

	<?php
	
	while ($result = mysqli_fetch_array($data)) {

		echo " 
			<tr>
			
				<td>".$result['name']."</td>
				<td>".$result['ph']."</td>
				
				
			</tr>
		";
	}
}
else
{
 	echo "no record found";
}

?>
</table>
</body>
</html>	
 <!--------- echo "<br>".$result['id']."  ".$result['firstname']." ".$result['lastname']." ".$result['gmail']."  ".$result['number']."  ".$result['address']."<br>";_----->