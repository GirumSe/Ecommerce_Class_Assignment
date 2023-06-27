<?php
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">About</span> us
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<div id="content">
  <div class="container">

    <div class="col-md-12">

      <div class="box">

        <?php

        $get_about_us = "select * from about_us";

        $run_about_us = mysqli_query($con, $get_about_us);

        $row_about_us = mysqli_fetch_array($run_about_us);

        $about_heading = $row_about_us['about_heading'];

        $about_short_desc = $row_about_us['about_short_desc'];

        $about_desc = $row_about_us['about_desc'];

        ?>

        <h1> <?php echo $about_heading; ?> </h1>

        <p class="lead"> <?php echo $about_short_desc; ?> </p>

        <p> <?php echo $about_desc; ?> </p>

      </div>

    </div>

  </div>
</div>

<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>

</html>