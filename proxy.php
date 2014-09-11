<?php

// put your code here that does any local processing with form submit data
// print_r($_POST);

// this is the URL of the OTHER website that will receive a copy of the form submission data 
$url = "http://8637.seu.cleverreach.com/f/8637-68234/wcs/"; // change this!
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$response = curl_exec($ch);
// $response will contain the output of the OTHER website processing the form submission
// you can echo it to the screen or do your own processing if you want.
echo $response;

?>