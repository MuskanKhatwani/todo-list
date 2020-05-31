<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "work";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['submit'])){
	$work=$_POST['work'];
	if(empty($work)){
	$errors="fill the work in the list";
	}else{
	mysqli_query( $conn,"INSERT INTO work (title, deadline_date,deadline_time) VALUES('$title','$deadline_date','$deadline_time')");
	header('location: delete.php');
}}
if(isset($_GET['delete_work'])){
	$id=$_GET['delete_work'];
	mysqli_query($conn,"DELETE FROM work WHERE id='$id'");
	header('location: index.php');
	}

$work = mysqli_query($conn,"SELECT * FROM work");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=TimesNewRoman|Ubuntu" rel="stylesheet">

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 <style type="text/css">

 body{
  background-color: #204051;
  color: white;
  text-align: center;
  padding-left: 275px;
  padding:7% 7% 7% 275px;
  margin:20px;
 
}
*{
  font-family:"Times New Roman";
  text-align: center;
}
h1, h2, h3, h4, h5, h6 {
  font-weight: "bold";
  padding: 5px;
}
table{
  padding-bottom: 10px;
  margin-bottom: 5px;
}
tr,td,button{
  padding: 7px;
  margin:2px;
}

.content{
  padding: 20px;
  margin: 10px;
  background-color: #00909e;
  color: #000;
  font-weight: 600;
  font-size: 20px;
  width: 750px;
  height: 450px;
  text-decoration: none;
  text-align: center;
}
.content a{
  font-size: 18px;
  width: 100px;
  text-decoration: none;
  color: #000;
  cursor: pointer;
  padding: 5px;
  margin: 10px;
  text-align: center;
}
button{
  width: 100px;
}
</style>


  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>List out work</title>
</head>
<body>
  <div class="content">
  	<form method="post" action="delete.php">
  		<?php
  		if(isset($error)){ ?>
  			<p><?php echo $errors; ?> </p>
  		<?php } ?>
  	</form>
    <table width="600" border="1" cellspacing="1" cellpadding="1">
    <thead>
	  <tr>
		<th>id</th>
		<th>title</th>
		<th>deadline_date</th>
		<th>deadline_time</th>
		<th>action</th>
	  </tr>	
	</thead>
	<tbody>
	
	<?php 
	$i=1;
		// output data of each row
		while($row = mysqli_fetch_array($work)) {    
	?>	
	  <tr>
	  	<td><?php echo $i; ?></td>
		<td><?php echo $row['title']; ?></td>
		<td><?php echo $row['deadline_date'];?></td>
		<td><?php echo $row['deadline_time'];?></td>
		<td><a href="delete.php?delete_work=<?php echo $row["id"]; ?>">Delete</a></td>
	  </tr>	
	<?php	
		$i++;} 
	?>
	</tbody>
  </table>
</div>	
</body>
</html>