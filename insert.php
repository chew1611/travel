<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href=
"https://unpkg.com/@primer/css@^18.0.0/dist/primer.css" /> 

	<title>Insert Page page</title>
	<style>
.wq{
  border: 1px solid white;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
 
  border-radius: 5px;
  background-color: lavenderblush;
margin-top: 7%;
}
		</style>
</head>

<body>
	<center>
		<?php
//error_reporting(0);
		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "root", "travelling");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		
		$a= $_POST['name'];
		$b = $_POST['ph'];
		//$c=$_POST['ii'];
		$d=$_POST['pas'];
		$e=$_POST['de'];
		//$id=$_POST['id'];
		$sql = "INSERT INTO booking VALUES ('$a',
			'$b','$d','$e')";
		
		 
		if(mysqli_query($conn, $sql)){
			echo "<div class=anim-fade-up><h3 style=text-align:center>Sucessfully Submit</h3>
			<h3 style=text-align:center>Thank you your Booking</h3>
			</div>";

?>
<div class="anim-fade-up">
<div class="wq">
	Your Name is&nbsp;<i><?php echo  $a ?></i><br>
	You PhNo is&nbsp;<i><?php echo $b ?></i><br>
	
	You Passenger Count is&nbsp;<i><?php echo $d ?></i><br>
	You Depart date is&nbsp;<i><?php echo $e?></i><br>
	
	


	<p>---------------------------</p><br>
	<small>You have to pirchase in your depart</small>
</div>
</div>

<?php
	
			
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);


		//$regex = '/^[a-zA-Z ]*$/';
		
		

		?>
		
	</center>
</body>

</html>
