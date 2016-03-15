<?php
require 'layout/header.php';
require 'lib/functions.php';
?>
<?php

$id = $_GET['id'];
$guitar = get_guitar($id);


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

//checkImage($_FILES['image']);
	$guitar = array(
		'name' => $name,
		'make' => $make,
		'age' => $age,
		'strings' => $strings,
		'description' => $desc
		);

	edit_guitar($guitar);

header('Location: index.php');
}
?>
<div class="container">
  <div class="row">
    <div class="col-xs-6">
    	<h1>Please add your guitar</h1>
    	<form action="edit.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
    	<div class="form-group">
		    <label for="guitar-name" class="control-label">Guitar Name</label>
		    <input type="text" name="name" id="name" class="form-control" placeholder="<?php echo $guitar['name'];?>"/>
			</div>
			<div class="form-group">
		    <label for="guitar-make" class="control-label">Make</label>
		    <input type="text" name="make" id="make" class="form-control" placeholder="<?php echo $guitar['make'];?>"/>
			</div>
			<div class="form-group">
		    <label for="guitar-age" class="control-label">Age</label>
		    <input type="number" name="age" id="age" class="form-control" placeholder="<?php echo $guitar['age'];?>"/>
			</div>
			<div class="form-group">
		    <label for="guitar-strings" class="control-label">Number of Strings</label>
		    <input type="number" name="strings" id="strings" class="form-control" placeholder="<?php echo $guitar['strings'];?>"/>
			</div>
			<div class="form-group">
		    <label for="guitar-desc" class="control-label">Guitar Description</label>
		    <textarea name="description" id="desc" class="form-control"><?php echo $guitar['description'];?></textarea>
			</div>
			<div class="form-group">
		    <label for="guitar-image" class="control-label">Guitar Image</label>
		    <input type="file" name="image" id="image" class="form-control"/>
			</div>
			<button type="submit" class="btn btn-primary">
  			<span class="glyphicon glyphicon-fire"></span> Edit Axe
			</button>
			</form>
      </div>
    </div>
  </div>
<?php require 'layout/footer.php' ?>