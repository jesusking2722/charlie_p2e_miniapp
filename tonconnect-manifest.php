<?php
header('Content-Type: application/json'); // Set the content type to JSON
header('Access-Control-Allow-Origin: *');
$manifest = [
    "url"=> "https://4653-65-21-85-18.ngrok-free.app", 
    "name"=> "Charlie Game",
    "iconUrl"=> "https://4653-65-21-85-18.ngrok-free.app/icon.png", 
    "termsOfUseUrl"=> "https://4653-65-21-85-18.ngrok-free.app/terms.php",
    "privacyPolicyUrl"=> "https://4653-65-21-85-18.ngrok-free.app/privacy.php"
];

echo json_encode($manifest); // Convert the array to JSON and output it
?>