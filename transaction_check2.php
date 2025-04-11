<?php
function getbscTransactions($address, $apiKey) {
    $url = "https://api.bscscan.com/api?module=account&action=txlist&address=$address&startblock=0&endblock=99999999&sort=asc&apikey=$apiKey";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        return ['error' => 'Failed to retrieve data from BSCScan API.'];
    }

    $data = json_decode($response, true);
    return $data['result'];
}
function bsctransaction($address, $apiKey) {
    $flag = 0;
    
    $transactions = getbscTransactions($address, $apiKey);

    if (isset($transactions['error'])) {
        echo "Error: " . $transactions['error'];
    } else {
        foreach ($transactions as $tx) {
            if ((time() - $tx['timeStamp']) < 300) {
                // Optional debug
                // echo "Recent tx: " . $tx['hash'] . "\n";
                $flag = 1;
                break; // Stop loop after finding a recent one
            }
        }
    }

    return $flag;
}

$address1 = '0x1Ddf0E740219960f9180eF73cBC7A5383ADFC701';
$apiKey1 = 'CFVVC9C25VDMVI26A6E2HT33TMBW14XU16';
$flag = bsctransaction($address1, $apiKey1);

if($flag == 1) {
    session_start();
    include "includes/init_db.php";
    $mysqli = new init_db;
    $select_user_data = $mysqli->select("users" , "id='".$_SESSION['user']," ORDER by id DESC LIMIT 1") or die('Error DB');
    $result_mysqli = $select_user_data->fetch_object();       
    if($result_mysqli->id>0){
        $select = $mysqli->update("users" , "balance_points=balance_points+1","id='".$_SESSION['user']."'") or die('Error DB');
        $select = $mysqli->update("users" , "balance_chrle=balance_chrle+10000","id='".$_SESSION['user']."'") or die('Error DB');
    }
}
?>