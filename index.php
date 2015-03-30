<?php


require 'lib/functions.php';
$guitars = get_guitars(6);
$guitarCount = count($guitars);
?>
<?php require 'layout/header.php'; ?>
    <div class="jumbotron">
        <div class="container">
            <h1>Buy or Sell a Guitar!</h1>
            <p>We currently have over <?php echo $guitarCount; ?> in stock!</p>
        </div>
    </div>

<div class="container">
  <div class="row">
    <?php foreach ($guitars as $guitar) : ?>
      <div class="col-lg-4 guitar-list-item">
        <h2>
            <a href="show.php?id=<?php echo $guitar['id'] ?>">
                <?php echo $guitar['name']; ?>
            </a>
        </h2>

        <img src="/guitars1/images/<?php echo $guitar['image']; ?>" class="img-rounded img-thumbnail">

        <blockuote class="guitar-details"><span class="label label-info"><?php echo $guitar['make']; ?></span>
          <?php
          if (!array_key_exists('age', $guitar)|| $guitar['age'] == '' || !is_numeric( $guitar['age'] )) {
            echo "Unknown";
          } else {
              echo $guitar['age'] . " years old";
            }
          ?>
          <?php echo $guitar['strings']; ?> strings
        </blockquote>

        <p>
          <?php echo $guitar['description']; ?>
        </p>
  </div>
<?php endforeach; ?>
<hr>

<?php require 'layout/footer.php' ?>