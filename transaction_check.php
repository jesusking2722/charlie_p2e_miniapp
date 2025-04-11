<?php

function ethertransactions($url) {
    $flag = 0;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36');
    $html = curl_exec($ch);
    curl_close($ch);
    
    // Debugging: Check if the HTML was retrieved
    if (empty($html)) {
        die("Failed to retrieve content. Check cURL settings or URL.");
    }
    
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    
    // Updated XPath query to match the correct table structure
    $transactions = $xpath->query('//tbody//tr');
    
    // Debugging: Check the number of transactions found
    if ($transactions->length === 0) {
        die("No transactions found. Check the XPath query.");
    }
    
    // Initialize an empty string to hold the HTML output
    $outputHtml = '<h1>Transaction Hashes</h1><ul>';
    
    foreach ($transactions as $transaction) {
        // Get the second <td> element which contains the transaction hash
        $hashElement = $xpath->query('./td[contains(@class, "showDate")]/span', $transaction);
        
        if ($hashElement->length > 0) {
            $hash = $hashElement->item(0)->textContent;
            if(time() - strtotime($hash) < 300) {
                $flag = 1;
                break;
            }
        }
    }
    return $flag;
}
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

function toCamelCase($string) {
    return lcfirst(str_replace(' ', '', ucwords(preg_replace('/[^a-z0-9]+/i', ' ', $string))));
}
function checkSolanaBuy() {
    $flag = 0;
    $url = 'https://docs.google.com/spreadsheets/d/18ZcSqIUvyx7diuMVsSdF5HpNM5dkKQMU-OJIWA8fg98/gviz/tq?tqx=out:json';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === false) {
        return ['error' => 'Failed to fetch data'];
    }

    curl_close($ch);

    $jsonText = substr($response, 47, -2);
    $data = json_decode($jsonText, true);

    $keyMapping = [
        "Solana Wallet" => "solanaWallet",
        "BSC Wallet" => "bscWallet",
        "Amount (SOL)" => "amount",
        "Tokens Received" => "tokens",
        "Transaction ID" => "txId",
        "USD Value" => "usd",
        "Timestamp" => "timestamp"
    ];

    foreach ($data['table']['rows'] as $row) {
        foreach ($row['c'] as $index => $cell) {
            $columnLabel = $data['table']['cols'][$index]['label'];
            $mappedKey = $keyMapping[$columnLabel] ?? toCamelCase($columnLabel);
            $value = $cell['v'] ?? '';

            // Format and check timestamp
            if ($mappedKey === 'timestamp' && !empty($value)) {
                if (preg_match('/Date\((\d+),(\d+),(\d+),(\d+),(\d+),(\d+)\)/', $value, $matches)) {
                    $year   = (int)$matches[1];
                    $month  = (int)$matches[2] + 1;
                    $day    = (int)$matches[3];
                    $hour   = (int)$matches[4];
                    $minute = (int)$matches[5];
                    $second = (int)$matches[6];

                    $formatted = sprintf('%04d-%02d-%02d %02d:%02d:%02d', $year, $month, $day, $hour, $minute, $second);
                    $timestamp = strtotime($formatted);

                    // If within 8 days (691200 seconds)
                    if ((time() - $timestamp) < 300) {
                        $flag = 1;
                        break 2; // Exit both loops
                    }
                }
            }
        }
    }

    return $flag;
}
$url1 = 'https://etherscan.io/address/0x07D2AF0Dd0D5678C74f2C0d7adF34166dD37ae22';
$url2 = 'https://polygonscan.com/address/0xb821B7fb4a82443Ff6D8480408F9558Db409FE2F';
$address1 = '0x1Ddf0E740219960f9180eF73cBC7A5383ADFC701';
$apiKey1 = 'CFVVC9C25VDMVI26A6E2HT33TMBW14XU16';
$address2 = '0x9C29D024c6CdFae7eA5df76068A3B63b904dC3b9';
$apiKey2 = 'PGU5INYKBI7NIBR33TW9YP7ZPDVNZCXICA';
$flag1 = ethertransactions($url1);
$flag2 = bsctransaction($address1, $apiKey1);
$flag3 = ethertransactions($url2);
$flag4 = bsctransaction($address2, $apiKey2);
$flag5 = checkSolanaBuy();


if($flag1 == 1 || $flag2 == 1 || $flag3 == 1 || $flag4 == 1 || $flag5 == 1 ) {
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