<?php

require('actions/database.php');

function prixbinance($symbol)
{
    $url = "https://api.binance.com/api/v3/ticker/price?symbol={$symbol}USDT";
    $get = file_get_contents($url);
    $data = json_decode($get, true);
    $price = number_format($data['price'], 2);

    return $price;
}


// prix sur binance 

$prix1 = prixbinance('KDA');
$prix2 = prixbinance('BTC');
$prix3 = prixbinance('ETH');
$prix4 = prixbinance('FLUX');
$prix5= prixbinance('BNB');
$prix6= prixbinance('MATIC');
$prix7= prixbinance('SOL');
$prix8= prixbinance('ATOM');
$prix9= prixbinance('FTM');
$prix10= prixbinance('AVAX');
$prix11= prixbinance('DOGE');
$prix12= prixbinance('ADA');
$prix13= prixbinance('APT');
$prix14= prixbinance('LINK');
$prix15= prixbinance('EGLD');
$prix16= prixbinance('SHIB');
$prix17= prixbinance('LTC');
$prix18= prixbinance('OP');
$prix19= prixbinance('DOT');
$prix20= prixbinance('CHZ');
$prix21= prixbinance('GALA');
$prix22= prixbinance('MAGIC');
$prix23= prixbinance('AAVE');
$prix24= prixbinance('NEAR');
$prix25= prixbinance('HIGH');
$prix26= prixbinance('OCEAN');
$prix27= prixbinance('RNDR');
$prix28= prixbinance('LRC');
$prix29= prixbinance('MANA');
$prix30= prixbinance('VET');
$prix31= prixbinance('INJ');
$prix32= prixbinance('SAND');
$prix33= prixbinance('FET');


$monnaie = array(
    "KDA",
    "BTC",
    "ETH",
    "FLUX",
    "BNB",
    "MATC",
    "SOL",
    "ATOM",
    "FTM",
    "AVAX",
    "DOGE",
    "ADA",
    "APT",
    "LINK",
    "EGLD",
    "SHIB",
    "LTC",
    "OP",
    "DOT",
    "CHZ",
    "GALA",
    "MAGIC",
    "AAVE",
    "NEAR",
    "HIGH",
    "OCEAN",
    "RNDR",
    "LRC",
    "MANA",
    "VET",
    "INJ",
    "SAND",
    "FET",
);


$elements = array(
    $prix1,
    $prix2,
    $prix3,
    $prix4,
    $prix5,
    $prix6,
    $prix7,
    $prix8,
    $prix9,
    $prix10,
    $prix11,
    $prix12,
    $prix13,
    $prix14,
    $prix15,
    $prix16,
    $prix17,
    $prix18,
    $prix19,
    $prix20,
    $prix21,
    $prix22,
    $prix23,
    $prix24,
    $prix25,
    $prix26,
    $prix27,
    $prix28,
    $prix29,
    $prix30,
    $prix31,
    $prix32,
    $prix33,
);

function message($symbol,$plateforme,$prix)
{
    $message = "<h4> prix {$symbol} sur {$plateforme}   " . $prix."$</h4>" ;
    return $message;
}



