<?php



session_start();
if (!isset($_SESSION['user'])) {
  header("Location: /login.php");
}

$dbhost = "mysql.hostinger.in";
$dbname = "u619702512_web";
$dbuser = "u619702512_admin";
$dbpass = "hacktcnj";

$link = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname");

$mode = "die";

if (isset($_POST['address'])) {
  $address = mysqli_real_escape_string($link, $_POST['address']);
  if (mysqli_query($link, "SELECT * FROM houses WHERE address='$address';")->num_rows > 0) {
    if (mysqli_query($link, "SELECT * FROM houses WHERE address='$address' AND ownerId='" . $_SESSION['user']['id'] . "';")->num_rows > 0) {
      $mode = "update";
    }
  } else {
    $mode = "claim";
  }
  if (($mode != "die") && (isset($_POST['status']))) {
    $status = mysqli_real_escape_string($link, $_POST['status']);
    if ($mode == "update") {
      mysqli_query($link, "UPDATE houses SET status='$status' WHERE address='$address';");
    } else {
      mysqli_query($link, "INSERT INTO houses (address, ownerId, status) VALUES ('$address', '" . $_SESSION['user']['id'] . "', '$status');");
      $mode = "update";
    }
  }
}

?>
<!DOCTYPE html>
<html>
<?php require_once('head.php'); ?>
<body>
  <div class="pumpkin-border">
  <form method="get" action="/reviews.php">
    <input type="hidden" name="address" class="form-control" value="<?php echo( $address ); ?>" />
    <button type="submit" class="btn btn-xs btn-info">Back to Reviews</button>
  </form>
  <?php include('navbar.php'); ?>
  <h1>
    <?php
      $address = $_POST['address'];
      if ($mode == "die") {
        echo('Enter in a valid address</h1></div></body></html>');
        die();
      } else {
        echo(($mode == "update") ? 'Update Status' : 'Claim Address');
      }
    ?>
  </h1>
  <p>Claiming your address allows others to have look at how much of candy you have - or your overall status.</p>
  <form action="updatestatus.php" method="post">
    <input type="hidden" name="address" class="form-control" value="<?php echo( $address ); ?>" />
    <textarea class="form-control" name="status" placeholder="How's your house on Halloween?" style="margin-bottom: 0.5em;"><?php

      if ($mode == "update") {
      $sql = "SELECT status FROM houses WHERE address='$address'";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
              echo $row["status"];
          }
      }
    }
      ?></textarea>
    <button type="submit" name="submit" class="btn btn-large btn-success"><?php echo(($mode == "update") ? 'Update' : 'Claim & Update'); ?></button>
  </form>
</div>
</body>
</html>
