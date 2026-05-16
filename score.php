<?php
	session_start();

	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false) {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Score a Group</title>

<style>
table, th, td {
   border: 1px solid gray;
}
</style>

<script>
function calcTotal() {
	var dev1 = Number(document.scoreform.dev1.value);
	var acc1 = Number(document.scoreform.acc1.value);
	var dev2 = Number(document.scoreform.dev2.value);
	var acc2 = Number(document.scoreform.acc2.value);
	var dev3 = Number(document.scoreform.dev3.value);
	var acc3 = Number(document.scoreform.acc3.value);
	var dev4 = Number(document.scoreform.dev4.value);
	var acc4 = Number(document.scoreform.acc4.value);

	var sum = dev1 + acc1 + dev2 + acc2 + dev3 + acc3 + dev4 + acc4;

	document.scoreform.total.value = sum;
}
</script>

</head>
<body>

<p>Logged in as: <b><?php echo $_SESSION['judge']; ?></b>
<a href="index.php?logout=1">Logout</a></p>

<center>

<?php if(isset($_POST['members'])) {
	$total = $_POST['dev1'] + $_POST['acc1'] + $_POST['dev2'] + $_POST['acc2'] + $_POST['dev3'] + $_POST['acc3'] + $_POST['dev4'] + $_POST['acc4'];
?>

<h2>Scores Submitted Successfully !!!</h2>

<table style="width:600px">
<tr>
<td><b>Group Members:</b></td>
<td><?php echo $_POST['members']; ?></td>
</tr>
<tr>
<td><b>Group Number:</b></td>
<td><?php echo $_POST['groupnum']; ?></td>
</tr>
<tr>
<td><b>Project Title:</b></td>
<td><?php echo $_POST['title']; ?></td>
</tr>
<tr>
<td><b>Articulate requirements</b></td>
<td>Developing: <?php echo $_POST['dev1']; ?> | Accomplished: <?php echo $_POST['acc1']; ?></td>
</tr>
<tr>
<td><b>Choose appropriate tools and methods</b></td>
<td>Developing: <?php echo $_POST['dev2']; ?> | Accomplished: <?php echo $_POST['acc2']; ?></td>
</tr>
<tr>
<td><b>Clear and coherent oral presentation</b></td>
<td>Developing: <?php echo $_POST['dev3']; ?> | Accomplished: <?php echo $_POST['acc3']; ?></td>
</tr>
<tr>
<td><b>Functioned well as a team</b></td>
<td>Developing: <?php echo $_POST['dev4']; ?> | Accomplished: <?php echo $_POST['acc4']; ?></td>
</tr>
<tr>
<td><b>Total Score:</b></td>
<td><b><?php echo $total; ?></b></td>
</tr>
<tr>
<td><b>Judge's Name:</b></td>
<td><?php echo $_POST['judgename']; ?></td>
</tr>
<tr>
<td><b>Comments:</b></td>
<td><?php echo $_POST['comments']; ?></td>
</tr>
</table>

<br>

<a href="score.php">Score Another Group</a>

<?php } else { ?>

<h2>Computer Science Project</h2>

<form name="scoreform" action="score.php" method="post">

<table style="width:600px">
<tr>
<td><b>Group Members:</b><br>
<input type="text" name="members" size="40"></td>
<td><b>Group Number:</b><br>
<input type="text" name="groupnum" size="5"></td>
</tr>
</table>

<table style="width:600px">
<tr>
<td><b>Project Title:</b><br>
<input type="text" name="title" size="60"></td>
</tr>
</table>

<br>

<table style="width:600px">
<tr>
<th>Criteria</th>
<th>Developing (0-10)</th>
<th>Accomplished (11-15)</th>
</tr>
<tr>
<td>Articulate requirements</td>
<td><center><input type="text" name="dev1" size="3" value="0"></center></td>
<td><center><input type="text" name="acc1" size="3" value="0"></center></td>
</tr>
<tr>
<td>Choose appropriate tools and methods for each task</td>
<td><center><input type="text" name="dev2" size="3" value="0"></center></td>
<td><center><input type="text" name="acc2" size="3" value="0"></center></td>
</tr>
<tr>
<td>Give clear and coherent oral presentation</td>
<td><center><input type="text" name="dev3" size="3" value="0"></center></td>
<td><center><input type="text" name="acc3" size="3" value="0"></center></td>
</tr>
<tr>
<td>Functioned well as a team</td>
<td><center><input type="text" name="dev4" size="3" value="0"></center></td>
<td><center><input type="text" name="acc4" size="3" value="0"></center></td>
</tr>
<tr>
<td><b>Total:</b></td>
<td><center>
<input type="button" value="Calculate Total" onclick="calcTotal()">
</center></td>
<td><center>
<input type="text" name="total" size="5" value="0">
</center></td>
</tr>
</table>

<br>

<table style="width:600px">
<tr>
<td><b>Judge's Name:</b><br>
<input type="text" name="judgename" value="<?php echo $_SESSION['judge']; ?>" size="40"></td>
</tr>
<tr>
<td><b>Comments:</b><br>
<input type="text" name="comments" size="60"></td>
</tr>
</table>

<br>

<input type="submit" value="Submit Scores">

</form>

<?php } ?>

</center>

</body>
</html>
