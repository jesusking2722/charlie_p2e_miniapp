<?php
$url = 'https://bscscan.com/address/0x1Ddf0E740219960f9180eF73cBC7A5383ADFC701';

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
$transactions = $xpath->query('//*');

// Debugging: Check the number of transactions found
if ($transactions->length === 0) {
    die("No transactions found. Check the XPath query.");
}

// Initialize an empty string to hold the HTML output
$outputHtml = '<h1>Transaction Hashes</h1><ul>';

foreach ($transactions as $transaction) {
    // Get the second <td> element which contains the transaction hash
    $hashElement = $xpath->query('//*', $transaction);
    
    if ($hashElement->length > 0) {
        $hash = $hashElement->item(0)->textContent;
        // if(time() - strtotime($hash) < 5*60) {
            $outputHtml .= "<li>$hash</li>";
        // }
    }
}

$outputHtml .= '</ul>';

// Display the results as HTML
echo $outputHtml;
?>