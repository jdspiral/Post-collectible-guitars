<?php
require 'layout/header.php'	;
require 'lib/functions.php';


$errorMessage = "";
$num_rows = 0;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$uname = $_POST['username'];
	$pword = $_POST['password'];

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);

	$pdo = get_connection();

	if ($pdo) {

	  $query = 'SELECT password FROM users WHERE username = :username';

	  $stmt = $pdo->prepare($query);
	  $stmt->bindParam(':username', $uname, PDO::PARAM_STR);
	  //$stmt->bindParam(':password', $pword, PDO::PARAM_STR);
	  $stmt->execute();

		$user = $stmt->fetch(PDO::FETCH_OBJ);

		// Hashing the password with its hash as the salt returns the same hash
		if ( hash_equals($user->password, crypt($pword, $user->password)) ) {
		  session_start();
			$_SESSION['login'] = "1";
			header ("Location: admin.php");
		}
		else {
			$errorMessage = "Invalid Login";
			session_start();
			$_SESSION['login'] = '';
		}
	}
}
else {
	$errorMessage = "Error logging on";
}
?>
<div class="container">
  <div class="row">
    <div class="col-xs-6">
			<form action="login.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<input name="username" type="text" class="form-control">
				</div>
				<div class="form-group">
				<input name="password" type="password" class="form-control">
				</div>
				<div class="form-group">
				<input type="submit" class="btn btn-default">
				</div>
			</form>
		</div>
	</div>
</div>
