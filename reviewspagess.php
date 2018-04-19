[Enter code here]<?php session_start(); ?>
<!DOCTYPE html>
<html>

<?php
require('address.php');
?>
<?php require_once('head.php'); ?>

<h1>Bombay Talk</h1>

<body>


  <div class="pumpkin-border">
    <?php include_once('navbar.php'); ?>
    <h1><?php echo( $address ); ?></h1>
    <?php
     /* Attempt MySQL server connection.*/


              $dbhost = "mysql.hostinger.in";
              $dbname = "u619702512_web";
              $dbuser = "u619702512_admin";
              $dbpass = "hacktcnj";

              $link = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname");
    $sql = "SELECT status FROM houses WHERE address='$address'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p class='lead'><strong>Status:</strong> " . $row["status"]."</p>";
        }
    }
    ?>
    <style>
    iframe {
      width: 100%;
    }
    </style>

    <div class="container-fluid">
      <div class="row">

        <div class="col-xs-12 col-md-8">
          <h3>Reviews</h3>
<style>
h3 {
    width: 100px;
    background-color: orange;
    border-radius: 5px;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}
</style>
          <?php



          if (isset($_POST['review']) && isset($_POST['comment']) && isset($_POST['address']) && isset($_SESSION['user'])) {
            $address = mysqli_real_escape_string( $link, $_POST['address'] );
            $comment = mysqli_real_escape_string( $link, $_POST['comment'] );
            $review  = mysqli_real_escape_string( $link, $_POST['review'] );


            if (preg_match("/^[12345]$/", $review) == 1) {  // attempt insert query execution

              $sql = "INSERT INTO address (address, review, comment) VALUES ('$address', '$review', '$comment')";

              if(mysqli_query($link, $sql)){

                echo '<div class="alert alert-success">Thank you for submitting a review.</div>';

              } else{

                echo '<div class="alert alert-danger">Aw shoot, our database failed. I hate errors, don\'t you? ' . mysqli_error($link) . "</div>";

              }

            } else {
              echo("<div class='alert alert-danger'>Your rating should be a number from 1 to 5.</div>");
            }
          }
          $sql = "SELECT Review, Comment, timestamp FROM address WHERE Address='$address'";

          $result = mysqli_query($link, $sql);
          if ($result->num_rows > 0) {
            $sql = "SELECT AVG(Review) as average FROM address WHERE Address='$address'";
            $averageResult = mysqli_query($link, $sql);
            if ($averageResult->num_rows > 0) {
              // outputs data of each row
              while($row = $averageResult->fetch_assoc()) {
                $average=round($row["average"]) ;
                echo "<h4 class='ratings " . $average . "-stars'>Average: </h4>";
              }
            }
            // output data of each row
            ?><div class="list-group"><?php
            while($row = $result->fetch_assoc()): ?>
            <div class="list-group-item">
              <h4 class="list-group-item-heading"><?php echo("<span class='ratings " . $row['Review'] . "-stars'></span>"); ?></h4>
              <p class="list-group-item-text" style="position:absolute; right:10px; top:10px;"><?php echo(date('n/j/y g:i a', strtotime($row['timestamp']))); ?></p>
              <p class="list-group-item-text"><?php echo($row['Comment']); ?></p>
            </div>
          <?php endwhile; ?>
        </div>
        <?php } else {
          echo "Be the first to write a review!";
        }
        ?>

        <?php if (isset($_SESSION['user'])): ?>
        <p><strong>Submit a Review</strong></p>
        <form action="reviews.php" method="post">
          <input type="hidden" name="address" class="form-control" value="<?php echo( $address ); ?>">
          <input type="hidden" name="timestamp" class="form-control" value="<?php echo( $timestamp ); ?>">
          <div class="input-group">
            <span class="input-group-addon">Rating</span>
            <input type="number" id="review-box" name="review" class="form-control" style="width: 5em;" min="1" max="5" pattern="[12345]">
          </div>
          <textarea id="comment-box" class="form-control" name="comment" placeholder="Your thoughts here..."></textarea>
          <button type="submit" class="btn btn-danger" name="submit">Post</button>
        </form>
      <?php else: ?>
        <div class="alert alert-info">Log in to post reviews.</div>
      <?php endif; ?>
      </div>
      <div class="col-xs-12 col-md-4">
        <form method="post" action="/updatestatus.php">
          <input type="hidden" name="address" class="form-control" value="<?php echo( $address ); ?>">
          <?php
            $mode = 'fail';
            if (mysqli_query($link, "SELECT * FROM houses WHERE address='$address';")->num_rows > 0) {
              if (isset($_SESSION['user'])) {
                if (mysqli_query($link, "SELECT * FROM houses WHERE address='$address' AND ownerId='" . $_SESSION['user']['id'] . "';")->num_rows > 0) {
                  $mode = "update";
                }
              }
            } else {
              $mode = "claim";
            }
            if ($mode != 'fail'): ?>
          <button type="submit" class="btn btn-lg btn-success" style="margin-bottom: 1em;"><?php echo(($mode == "update") ? "Update status" : "Claim address"); ?></button>
        <?php endif; ?>
        </form>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3031.1817737407787!2d-74.31357958506213!3d40.55966295485889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b67f59d6eb81%3A0x8246c7d99829ca2e!2s<?php echo( $address ); ?>!5e0!3m2!1sen!2sus!4v1446938762727" width="600" height="450" frameborder="2" style="border:yellow;" allowfullscreen></iframe>
        <?php include('key.php'); ?>
     </div>
    </div>
  </div>
</div>
</body>

</html>

<?php
// close connection

mysqli_close($link);
?>
