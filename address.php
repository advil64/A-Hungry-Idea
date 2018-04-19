<?php

// the array
$arrX = array("AIzaSyCQvndbicD-2PIqbVC4N2IkA02SoDtrv4U", "AIzaSyCpvJwe0xUkrpIW7qp_t2Qef2YgYq1lJcE", "AIzaSyCWLcPWfXDVMnk2cHj2jsU8DyHgVsg_2UI", "AIzaSyBrVMweX7b4hw4JGySCNl2nOkVX_rkvsW4", "AIzaSyAut0RoOA25jLA0ikFXhnYDEjfOMjMtnl0");

// get random index from array $arrX
$randIndex = array_rand($arrX);

// output the value for the random index
$apiKey = $arrX[$randIndex];

$addressRequest = $_REQUEST['address'];
$searchurl = str_replace(' ', '+', "https://maps.googleapis.com/maps/api/place/textsearch/json?key=$apiKey&query=$addressRequest&types=street_address");
$searchjson = file_get_contents($searchurl);
$search = json_decode($searchjson, TRUE);
$address = "";
if ($search["status"] == "OK") {
  $address = $search["results"][0]["formatted_address"];
}
?>
