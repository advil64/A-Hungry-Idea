<?php

    $link = mysqli_connect("mysql.hostinger.in", "u619702512_admin", "hacktcnj", "u619702512_web");

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $restaurant = mysqli_real_escape_string($link, $_REQUEST['restaurant']);

    $streetaddress = mysqli_real_escape_string($link, $_REQUEST['streetaddress']);

    $city = mysqli_real_escape_string($link, $_REQUEST['city']);

    $state = mysqli_real_escape_string($link, $_REQUEST['state']);

    $zipcode = mysqli_real_escape_string($link, $_REQUEST['zipcode']);

    $filename = mysqli_real_escape_string($link, $_REQUEST['filename']);

    $sql = "INSERT INTO restaurants (restaurant, streetaddress, city, state, zipcode, filename) VALUES ('$restaurant', '$streetaddress', '$city', '$state', '$zipcode', '$filename')";

    if(mysqli_query($link, $sql)){

        echo "<script>window.location = 'http://www.ahungryidea.com'</script>";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
    mysqli_close($link);
  
?>