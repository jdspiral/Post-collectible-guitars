<?php 
require 'layout/header.php'; 
require 'lib/functions.php';
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	} else {
		$name = '';
	}
	if (isset($_POST['make'])) {
		$make = $_POST['make'];
	} else {
		$make = '';
	}
	if (isset($_POST['age'])) {
		$age = $_POST['age'];
	} else {
		$age = '';
	}
	if (isset($_POST['strings'])) {
		$strings = $_POST['strings'];
	} else {
		$strings = '';
	}
	if (isset($_POST['description'])) {
		$desc = $_POST['description'];
	} else {
		$desc = '';
	}

	$newGuitar = array(
		'name' => $name,
		'make' => $make,
		'age' => $age,
		'strings' => $strings,
		'desc' => $desc,
		'img' => '',
		);


	header('Location: index.php');
	die;
}
?>
<div class="container">
  <div class="row">
    <div class="col-xs-6">
    	<div class="alert alert-info" role="alert"><p>Warning: This page is still under construction</p></div>
    	<h1>Please add your guitar</h1>
    	<form action="guitars_new.php" method="POST">
    	<div class="form-group">
		    <label for="guitar-name" class="control-label">Guitar Name</label>
		    <input type="text" name="name" id="name" class="form-control" />
			</div>
			<div class="form-group">
		    <label for="guitar-make" class="control-label">Make</label>
		    <input type="text" name="make" id="make" class="form-control" />
			</div>
			<div class="form-group">
		    <label for="guitar-age" class="control-label">Age</label>
		    <input type="number" name="age" id="age" class="form-control" />
			</div>
			<div class="form-group">
		    <label for="guitar-strings" class="control-label">Number of Strings</label>
		    <input type="number" name="strings" id="strings" class="form-control" />
			</div>
			<div class="form-group">
		    <label for="guitar-desc" class="control-label">Guitar Description</label>
		    <textarea name="desc" id="desc" class="form-control"></textarea>
				</div>
			<button type="submit" class="btn btn-primary">
  			<span class="glyphicon glyphicon-fire"></span> Add New Axe
			</button>
			</form>
      </div>
    </div>
  </div>
<?php require 'layout/footer.php' ?>