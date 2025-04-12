<?php
header('Content-Type: application/json'); // Set the content type to JSON
header('Access-Control-Allow-Origin: *');
$manifest = [
    "url"=> "https://website-93cb003f.akr.kwk.mybluehost.me", 
    "name"=> "Charlie Game",
    "iconUrl"=> "https://website-93cb003f.akr.kwk.mybluehost.me/icon.png", 
    "termsOfUseUrl"=> "https://website-93cb003f.akr.kwk.mybluehost.me/terms.php",
    "privacyPolicyUrl"=> "https://website-93cb003f.akr.kwk.mybluehost.me/privacy.php"
];

echo json_encode($manifest); // Convert the array to JSON and output it
?>


