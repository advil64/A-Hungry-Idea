<?php
require('address.php');
?>
<?php require_once('head.php'); ?>
<?php session_start(); ?>
<?php include('common.php'); ?>
<html>

         
<?php


if (isset($_GET['id'])) {
    $id = mysql_real_escape_string($_GET['id'], $con);
    $q = "SELECT
            *
        FROM
            `restaurants`
        WHERE
            `id` = '$id'
        LIMIT 1;";


    if(mysqli_query($link, $q)){
        echo $row['restaurant'];
    } else {
        echo '<h1>Hello</h1>';
    }
}

?>