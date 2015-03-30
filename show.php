<?php

require 'lib/functions.php';
$id = $_GET['id'];
$guitar = get_guitar($id);
?>
<?php require 'layout/header.php'; ?>


<div class="container">
	<h1><?php echo $guitar['name']; ?></h1>
    <div class="row">
        <div class="col-xs-3 guitar-list-item">
            <img src="images/<?php echo $guitar['image'] ?>" class="pull-left img-rounded img-thumbnail" />
        </div>
        <div class="col-xs-6">
            <p>
                <?php echo $guitar['description']; ?>
            </p>

            <table class="table">
                <tbody>
                    <tr>
                        <th>Make</th>
                        <td><?php echo $guitar['make']; ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?php echo $guitar['age']; ?></td>
                    </tr>
                    <tr>
                        <th>String Count</th>
                        <td><?php echo $guitar['strings']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require 'layout/footer.php' ?>