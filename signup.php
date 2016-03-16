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

	  //return $guitars;

		// A higher "cost" is more secure but consumes more processing power
		$cost = 10;

		// Create a random salt
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

		// Prefix information about the hash so PHP knows how to verify it later.
		// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
		$salt = sprintf("$2a$%02d$", $cost) . $salt;

		// Hash the password with the salt
		$hash = crypt($pword, $salt);

		$query = 'INSERT INTO users (username, password) VALUES (:username, :password)';

	  $stmt = $pdo->prepare($query);
	  $stmt->bindParam(':username', $uname, PDO::PARAM_STR);
	  $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
	  $stmt->execute();

	  header('Location: login.php');
	}
}
else {
	$errorMessage = "Error logging on";
}
?>
<div class="container">
  <div class="row">
    <div class="col-xs-6">
			<form action="signup.php" method="POST" class="form-horizontal">
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
