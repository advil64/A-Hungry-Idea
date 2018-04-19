<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include('navbar.php'); ?>
<?php require_once('head.php'); ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Restaurant</th>
                <th>Street Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zipcode</th>
                <th>Find out more!</th>
            </tr>
        </thead>
        <tbody>
       <?php
 
$user = "u619702512_admin";
$password = "hacktcnj";
 
$db = @mysql_connect('mysql.hostinger.in', $user, $password);
if (!$db) {
    die('Not connected : ' . mysql_error());
}
 
$dbname = "u619702512_web";
 
          $db_select = mysql_select_db($dbname,$db);
            if (!$db_select) {
                die("Database selection also failed miserably: " . mysql_error());
            }
            $name = $_POST['name'];
            $results = mysql_query("SELECT * FROM restaurants WHERE zipcode = '$name'");
            while($row = mysql_fetch_array($results)) {
            ?>
                <tr>
                    <th><?php echo $row['restaurant'] ?></th>
                    <th><?php echo $row['streetaddress'] ?></th>
                    <th><?php echo $row['city'] ?></th>
                    <th><?php echo $row['state'] ?></th>
                    <th><?php echo $row['zipcode'] ?></th>
                    <th><a  class="btn btn-primary" href="<?php echo $row['filename'] ?>.php"><span>Click Me </span></a></th>
                </tr>
 
            <?php
            }
            ?>  
            </tbody>
            </table>
</body>

</div>
</div>

</ht>

<style>
</style>


<!--<?php


$name = $_POST['name'];
$query = "SELECT * FROM restaurants WHERE zipcode = '$name'";
$result = mysql_query($query);
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo $line['restaurant'];
echo "<br>\n";
echo $line['streetaddress'];
echo "<br>\n";
echo $line['state'];
echo "<br>\n";
echo $line['city'];
echo "<br>\n";
echo $line['zipcode'];
echo "<br>\n";
}
?>-->




			