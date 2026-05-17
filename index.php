<?php
session_start();
$wrong = 0;
if(isset($_GET['logout'])){
	session_unset();
	session_destroy();
}
if(isset($_SESSION['admin']) && $_SESSION['admin']==true) {
	header("location:admin.php");
}
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
	header("location:score.php");
}
if(isset($_POST['username']) && isset($_POST['password'])) {
	if($_POST['username'] == "mwilson" && $_POST['password'] == "Wilson@2026") {
		$_SESSION['loggedin'] = true;
		$_SESSION['judge'] = "mwilson";
		header("location:score.php");
	}
	elseif($_POST['username'] == "dbrown" && $_POST['password'] == "Brown!99") {
		$_SESSION['loggedin'] = true;
		$_SESSION['judge'] = "dbrown";
		header("location:score.php");
	}
	elseif($_POST['username'] == "akumar" && $_POST['password'] == "Kumar#42") {
		$_SESSION['loggedin'] = true;
		$_SESSION['judge'] = "akumar";
		header("location:score.php");
	}
	elseif($_POST['username'] == "slee" && $_POST['password'] == "Lee\$2024") {
		$_SESSION['loggedin'] = true;
		$_SESSION['judge'] = "slee";
		header("location:score.php");
	}
	elseif($_POST['username'] == "judgeadmin" && $_POST['password'] == "admincenter@12") {
		$_SESSION['admin'] = true;
		header("location:admin.php");
	}
	else { $wrong = 1; }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>table, td { border: 1px solid gray; }</style>
</head>
<body>
<center>
<h1>Computer Science Project</h1>
<h3>Login</h3>
<form action="index.php" method="post">
<table style="width:300px">
<tr><td>Username:</td><td><input type="text" name="username"></td></tr>
<tr><td>Password:</td><td><input type="text" name="password"></td></tr>
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
</center>
</body>
</html>
