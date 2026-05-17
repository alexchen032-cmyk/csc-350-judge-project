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
<style>table, th, td { border: 1px solid gray; }</style>
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
function check1() {
	if (document.scoreform.dev1.value != "") {
		document.scoreform.acc1.disabled = true;
	} else {
		document.scoreform.acc1.disabled = false;
	}
	if (document.scoreform.acc1.value != "") {
		document.scoreform.dev1.disabled = true;
	} else {
		document.scoreform.dev1.disabled = false;
	}
}
function check2() {
	if (document.scoreform.dev2.value != "") {
		document.scoreform.acc2.disabled = true;
	} else {
		document.scoreform.acc2.disabled = false;
	}
	if (document.scoreform.acc2.value != "") {
		document.scoreform.dev2.disabled = true;
	} else {
		document.scoreform.dev2.disabled = false;
	}
}
function check3() {
	if (document.scoreform.dev3.value != "") {
		document.scoreform.acc3.disabled = true;
	} else {
		document.scoreform.acc3.disabled = false;
	}
	if (document.scoreform.acc3.value != "") {
		document.scoreform.dev3.disabled = true;
	} else {
		document.scoreform.dev3.disabled = false;
	}
}
function check4() {
	if (document.scoreform.dev4.value != "") {
		document.scoreform.acc4.disabled = true;
	} else {
		document.scoreform.acc4.disabled = false;
	}
	if (document.scoreform.acc4.value != "") {
		document.scoreform.dev4.disabled = true;
	} else {
		document.scoreform.dev4.disabled = false;
	}
}
</script>
</head>
<body>
<?php
$judge = $_SESSION['judge'];
echo "<p>Logged in as: <b>$judge</b> <a href='index.php?logout=1'>Logout</a></p>";
echo "<center>";
if(isset($_POST['members'])) {
	$members = $_POST['members'];
	$groupnum = $_POST['groupnum'];
	$title = $_POST['title'];
	if (isset($_POST['dev1']) && $_POST['dev1'] != "") {
		$dev1 = $_POST['dev1'];
	} else {
		$dev1 = 0;
	}
	if (isset($_POST['acc1']) && $_POST['acc1'] != "") {
		$acc1 = $_POST['acc1'];
	} else {
		$acc1 = 0;
	}
	if (isset($_POST['dev2']) && $_POST['dev2'] != "") {
		$dev2 = $_POST['dev2'];
	} else {
		$dev2 = 0;
	}
	if (isset($_POST['acc2']) && $_POST['acc2'] != "") {
		$acc2 = $_POST['acc2'];
	} else {
		$acc2 = 0;
	}
	if (isset($_POST['dev3']) && $_POST['dev3'] != "") {
		$dev3 = $_POST['dev3'];
	} else {
		$dev3 = 0;
	}
	if (isset($_POST['acc3']) && $_POST['acc3'] != "") {
		$acc3 = $_POST['acc3'];
	} else {
		$acc3 = 0;
	}
	if (isset($_POST['dev4']) && $_POST['dev4'] != "") {
		$dev4 = $_POST['dev4'];
	} else {
		$dev4 = 0;
	}
	if (isset($_POST['acc4']) && $_POST['acc4'] != "") {
		$acc4 = $_POST['acc4'];
	} else {
		$acc4 = 0;
	}
	$comments = $_POST['comments'];
	$total = $dev1 + $acc1 + $dev2 + $acc2 + $dev3 + $acc3 + $dev4 + $acc4;
	$servername = "sql5.freesqldatabase.com";
	$username = "sql5827094";
	$password = "cwNi1Ae3GI";
	$dbname = "sql5827094";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "INSERT INTO scores (judge, members, groupnum, title, dev1, acc1, dev2, acc2, dev3, acc3, dev4, acc4, total, comments) VALUES ('$judge', '$members', '$groupnum', '$title', $dev1, $acc1, $dev2, $acc2, $dev3, $acc3, $dev4, $acc4, $total, '$comments')";
	if (mysqli_query($conn, $sql)) {
		echo "<h2>Scores Submitted Successfully !!!</h2>";
	} else {
		echo "<h2>Error: " . mysqli_error($conn) . "</h2>";
	}
	mysqli_close($conn);
	echo "<table style='width:600px'>";
	echo "<tr><td><b>Group Members:</b></td><td>$members</td></tr>";
	echo "<tr><td><b>Group Number:</b></td><td>$groupnum</td></tr>";
	echo "<tr><td><b>Project Title:</b></td><td>$title</td></tr>";
	echo "<tr><td><b>Articulate requirements</b></td><td>Developing: $dev1 | Accomplished: $acc1</td></tr>";
	echo "<tr><td><b>Choose appropriate tools and methods</b></td><td>Developing: $dev2 | Accomplished: $acc2</td></tr>";
	echo "<tr><td><b>Clear and coherent oral presentation</b></td><td>Developing: $dev3 | Accomplished: $acc3</td></tr>";
	echo "<tr><td><b>Functioned well as a team</b></td><td>Developing: $dev4 | Accomplished: $acc4</td></tr>";
	echo "<tr><td><b>Total Score:</b></td><td><b>$total</b></td></tr>";
	echo "<tr><td><b>Judge's Name:</b></td><td>$judge</td></tr>";
	echo "<tr><td><b>Comments:</b></td><td>$comments</td></tr>";
	echo "</table>";
	echo "<br>";
	echo "<a href='score.php'>Score Another Group</a>";
} else {
	echo "<h2>Computer Science Project</h2>";
	echo "<form name='scoreform' action='score.php' method='post'>";
	echo "<table style='width:600px'>";
	echo "<tr><td><b>Group Members:</b><br><input type='text' name='members' size='40'></td><td><b>Group Number:</b><br><input type='text' name='groupnum' size='5'></td></tr>";
	echo "</table>";
	echo "<table style='width:600px'>";
	echo "<tr><td><b>Project Title:</b><br><input type='text' name='title' size='60'></td></tr>";
	echo "</table>";
	echo "<br>";
	echo "<table style='width:600px'>";
	echo "<tr><th>Criteria</th><th>Developing (0-10)</th><th>Accomplished (11-15)</th></tr>";
	echo "<tr><td>Articulate requirements</td><td><center><input type='text' name='dev1' size='3' onkeydown='check1()'></center></td><td><center><input type='text' name='acc1' size='3' onkeydown='check1()'></center></td></tr>";
	echo "<tr><td>Choose appropriate tools and methods for each task</td><td><center><input type='text' name='dev2' size='3' onkeydown='check2()'></center></td><td><center><input type='text' name='acc2' size='3' onkeydown='check2()'></center></td></tr>";
	echo "<tr><td>Give clear and coherent oral presentation</td><td><center><input type='text' name='dev3' size='3' onkeydown='check3()'></center></td><td><center><input type='text' name='acc3' size='3' onkeydown='check3()'></center></td></tr>";
	echo "<tr><td>Functioned well as a team</td><td><center><input type='text' name='dev4' size='3' onkeydown='check4()'></center></td><td><center><input type='text' name='acc4' size='3' onkeydown='check4()'></center></td></tr>";
	echo "<tr><td><b>Total:</b></td><td><center><input type='button' value='Calculate Total' onclick='calcTotal()'></center></td><td><center><input type='text' name='total' size='5' value='0'></center></td></tr>";
	echo "</table>";
	echo "<br>";
	echo "<table style='width:600px'>";
	echo "<tr><td><b>Judge's Name:</b><br><input type='text' name='judgename' value='$judge' size='40'></td></tr>";
	echo "<tr><td><b>Comments:</b><br><input type='text' name='comments' size='60'></td></tr>";
	echo "</table>";
	echo "<br>";
	echo "<input type='submit' value='Submit Scores'>";
	echo "</form>";
}
echo "</center>";
?>
</body>
</html>
