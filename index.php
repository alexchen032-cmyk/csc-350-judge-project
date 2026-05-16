<?php
	session_start();

	$wrong = 0;

	if(isset($_GET['logout'])){
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
		header("location:score.php");
	}

	if(isset($_POST['username']) && isset($_POST['password'])) {

		if($_POST['username'] == "judge1" && $_POST['password'] == "pass1") {
			$_SESSION['loggedin'] = true;
			$_SESSION['judge'] = "judge1";
			header("location:score.php");
		}
		elseif($_POST['username'] == "judge2" && $_POST['password'] == "pass2") {
			$_SESSION['loggedin'] = true;
			$_SESSION['judge'] = "judge2";
			header("location:score.php");
		}
		elseif($_POST['username'] == "judge3" && $_POST['password'] == "pass3") {
			$_SESSION['loggedin'] = true;
			$_SESSION['judge'] = "judge3";
			header("location:score.php");
		}
		else {
			$wrong = 1;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Judge Login</title>
<style>
table, td {
   border: 1px solid gray;
}
</style>
</head>
<body>

<center>

<h1>Computer Science Project</h1>
<h3>Judge Login</h3>

<form action="index.php" method="post">

<table style="width:300px">
<tr>
<td>Username:</td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="text" name="password"></td>
</tr>
</table>

<br>

<input type="submit" value="Login">

</form>

<?php
	if($wrong == 1) {
		echo "<br>";
		echo "<font color='#FF0000'>";
		echo "Username or password is incorrect";
		echo "</font>";
	}
?>

<br><br>

<p>Valid judges: judge1, judge2, judge3 (passwords: pass1, pass2, pass3)</p>

</center>

</body>
</html>
