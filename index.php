<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include('navbar.php'); ?>
<?php require_once('head.php'); ?>
<body style="margin: 0; padding-top: 200px;">
<center>
<div class="jumbotron">
  <h1 class="display-3">A Hungry Idea!</h1>
  <p class="lead">This website links restaurants and shelters to give all access to food.</p>
  <hr class="my-4">
  <!--<p>Click below if you are a shelter or a restaurant.</p>-->


<form method="post" name="display" action="display.php" />

  <p class="lead">
  <div class="col-lg-6">
    <div class="input-group">

      <input type="text" class="form-control" name="name" placeholder="Enter Zip Code" maxlength="5">
      <span class="input-group-btn">
        <button class="btn btn-secondary" name="Submit" type="submit"><span><strong>Go!</strong></span></button>
      </span>
    </div>
  </div>
  </p>
<br></br>
  <div class="hyper-group">
    <a href="/restaurant.php" id="link"><span>Are you a restaurant? </span> Click here!</a>
  </div>
</div>





</form>
</center>



<style>
.col-lg-6
{
display: block;
left: 23%;
}

.btn-secondary {
  display: inline-block;

  background-color: opaque;
text-align:center
  color: #FFFFFF;
 transition: all 0.5s;
  cursor: pointer;
}
.btn-secondary span 
{
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.btn-secondary span:after 
{
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.btn-secondary:hover span 
{
  padding-right: 25px;

}

.btn-secondary:hover span:after 
{
  opacity: 1;
  right: 0;

}

.hyper-group
  {
  text-align: center;
  color: black;
}

.hyper-group span 
{
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.hyper-group span:after 
{
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.hyper-group:hover span 
{
  padding-right: 25px;

}

.hyper-group:hover span:after 
{
  opacity: 1;
  right: 0;


}
#link 
{
    background: white;
    color: black;
    display: inline-block;
    padding: 10px;
}
.jumbotron
{
height: 500px;
width: 900px;

.form-control:hover
{
box-shadow: 0px 2px 10px 1px;
}

</style>							
