<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="work";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
     die( "connection failed" . $conn->connect_error);
}
if(isset($_POST['submit'])){
	$work=$_POST['work'];
	if(empty($work)){
	$errors="fill the work in the list";
	}else{
	mysqli_query( $conn,"INSERT INTO work (title, deadline_date,deadline_time) VALUES('$title','$deadline_date','$deadline_time')");
	header('location: work.php');
	}}
$work = mysqli_query($conn,"SELECT id, title, deadline_date, deadline_time FROM work");	
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
  color: #fff;
  font-weight: 600;
  font-size: 20px;
  width: 750px;
  height: 410px;
  text-decoration: none;
  text-align: center;
}
.content h1{
  text-decoration: none;
  font-weight: bolder;
  margin: 20px ;
  font-weight: 600;
  color: #fff;
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
.content a:hover{
  font-size: 18px;
  width: 100px;
  text-decoration: underline;
  color: #00909e;
  cursor: pointer;
  padding: 5px;
  margin: 10px;
  text-align: center;
}
hr{
	border-color: #fff;
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
  	<h1>TO-DO LIST</h1><hr><hr>
	<form method="post" action="delete.php" >
		<table cellpadding="1" cellspacing="1">
			<tr>
				<td>title : <i class="fas fa-list"></i></td>
				<td><input type="text" name="title" style="width: 450px;"> </td>
			</tr>
			<tr>
				<td>deadline_date : <i class="far fa-calendar-minus"></i></td>
				<td><input type="date" name="date" > </td>
			</tr>
			<tr>
				<td>deadline_time : <i class="far fa-clock"></i></td>
				<td><input type="time" name="time"> </td>
			</tr>
		</table><hr>
		
		<button type="submit" name="submit"><a href="delete.php"> SUBMIT </a></button> <button type="clear" name="clear"><a href="work.php"> CLEAR </a></button>
	</form>
</div>

</body>
</html>