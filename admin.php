<?php
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin']==false) {
	header("location:index.php");
}
$servername = "sql5.freesqldatabase.com";
$username = "sql5827094";
$password = "cwNi1Ae3GI";
$dbname = "sql5827094";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin - All Scores</title>
<style>table, th, td { border: 1px solid gray; }</style>
</head>
<body>
<p>Logged in as: <b>admin</b> <a href="index.php?logout=1">Logout</a></p>
<center>
<h2>All Submitted Scores</h2>
<table style="width:900px">
<tr><th>Group #</th><th>Judge</th><th>Project Title</th><th>Group Members</th><th>Total</th><th>Comments</th></tr>
<?php
$sum = 0;
$count = 0;
$sql = "SELECT * FROM scores";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row['groupnum'] . "</td>";
		echo "<td>" . $row['judge'] . "</td>";
		echo "<td>" . $row['title'] . "</td>";
		echo "<td>" . $row['members'] . "</td>";
		echo "<td>" . $row['total'] . "</td>";
		echo "<td>" . $row['comments'] . "</td>";
		echo "</tr>";
		$sum = $sum + $row['total'];
		$count = $count + 1;
	}
} else {
	echo "<tr><td>0 results</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
}
mysqli_close($conn);
?>
</table>
<br>
<?php
if ($count > 0) {
	$avg = $sum / $count;
	echo "<h3>Average Score: " . $avg . "</h3>";
	echo "<p>Total Submissions: " . $count . "</p>";
}
?>
</center>
</body>
</html>
