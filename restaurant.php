<?php session_start(); ?>
<!DOCTYPE html>
<html>
 <?php include('navbar.php'); ?>
<?php

require_once('head.php');



// First we execute our common code to connection to the database and start the session
    require("common.php");
    
    // At the top of the page we check to see whether the user is logged in or not
    if(empty($_SESSION['user']))
    {
        // If they are not, we redirect them to the login page.
        header("Location: login.php");
        
        // Remember that this die statement is absolutely critical.  Without it,
        // people can view your members-only content without logging in.
        die("Redirecting to login.php");
    }?>
<body style="margin: 0; padding-top: 100px;">

<html>



<form action="insert.php" method="post">


 <h2 class="form-signin-heading">
<font color = "white">Restaurant Information Form</font>
</h2>



<div class="form-group row"><center>
  <label for="restaurant" class="col-2 col-form-label"></label>
  <div class="col-xs-4">
    <input class="form-control" type="text" name="restaurant" id="restaurant" placeholder="Restaurant Name" required>
  </div>
</div>
<div class="form-group row">
  <label for="streetAddress" class="col-2 col-form-label"></label>
  <div class="col-xs-4">
    <input class="form-control" name="streetaddress" id="streetAddress" placeholder="Street Address" required>
  </div>
</div>
<div class="form-group row">
  <label for="City" class="col-2 col-form-label"></label>
  <div class="col-xs-4">
    <input class="form-control" type="text" name="city" id="City" placeholder="City" required>
  </div>
</div>
<div class="form-group row">
	<label for="state" class="col-2 col-form-label"></label>
	<div class="col-xs-4">
		<select class="form-control" id="state" name="state" required>
			<option value="Alabama">Alabama</option>
    <option value="Alaska">Alaska</option>
    <option value="Arizona">Arizona</option>
    <option value="Arkansas">Arkansas</option>
    <option value="California">California</option>
    <option value="Colorado">Colorado</option>
    <option value="Connecticut">Connecticut</option>
    <option value="Delaware">Delaware</option>
    <option value="District of Columbia">District Of Columbia</option>
    <option value="Florida">Florida</option>
    <option value="Georgia">Georgia</option>
    <option value="Hawaii">Hawaii</option>
    <option value="Idaho">Idaho</option>
    <option value="Illinois">Illinois</option>
    <option value="Indiana">Indiana</option>
    <option value="Iowa">Iowa</option>
    <option value="Kansas">Kansas</option>
    <option value="Kentucky">Kentucky</option>
    <option value="Louisana">Louisiana</option>
    <option value="Maine">Maine</option>
    <option value="Maryland">Maryland</option>
    <option value="Massachusetts">Massachusetts</option>
    <option value="Michigan">Michigan</option>
    <option value="Minnesota">Minnesota</option>
    <option value="Mississippi">Mississippi</option>
    <option value="Missouri">Missouri</option>
    <option value="Montana">Montana</option>
    <option value="Nebraska">Nebraska</option>
    <option value="Nevada">Nevada</option>
    <option value="New Hampshire">New Hampshire</option>
    <option value="New Jersey">New Jersey</option>
    <option value="New Mexico">New Mexico</option>
    <option value="New York">New York</option>
    <option value="North Carolina">North Carolina</option>
    <option value="North Dakota">North Dakota</option>
    <option value="Ohio">Ohio</option>
    <option value="Oklahoma">Oklahoma</option>
    <option value="Oregon">Oregon</option>
    <option value="Pennsylvania">Pennsylvania</option>
    <option value="Rhode Island">Rhode Island</option>
    <option value="South Carolina">South Carolina</option>
    <option value="South Dakota">South Dakota</option>
    <option value="Tennessee">Tennessee</option>
    <option value="Texas">Texas</option>
    <option value="Utah">Utah</option>
    <option value="Vermont">Vermont</option>
    <option value="Virginia">Virginia</option>
    <option value="Washington">Washington</option>
    <option value="West Virginia">West Virginia</option>
    <option value="Wisconsin">Wisconsin</option>
    <option value="Wyoming">Wyoming</option>
		</select>
	</div>
</div>
<div class="form-group row">
  <label for="Zip Code" class="col-2 col-form-label"></label>
  <div class="col-xs-4">
    <input class="form-control" type="text" name="zipcode" id="zipCode" placeholder="Zip Code" required>
  </div>
</center>
</div>
<input type="hidden" name="filename" value="reviewwwspage"/>
<input type="submit" value="Enter" class="btn btn-primary" style="width: 400px" ;="">


</form>
</html>




<style>
form {
    margin-left: 33%;
margin-right:25%;
width: 100%;
    }
</style>