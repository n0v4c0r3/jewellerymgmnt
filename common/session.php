<?php
session_start();
if($_SESSION["userrole"] == 0)
{
    if(!isset($_SESSION['useremail']))
    {
        header("LOCATION: /index.php");
    }

}
else if($_SESSION["userrole"] != 0 )
{
    session_start();
    session_unset();
    session_destroy();
    header("LOCATION: /index.php");

}


// gold api
$json = file_get_contents('https://data-asg.goldprice.org/dbXRates/INR');
$decoded = json_decode($json);
$item = $decoded->items;
$date = $decoded->date;
$gold_price = $item[0]->xauPrice;
$goldprice = round(($gold_price/28.34),2);
$_SESSION["goldprice"] = $goldprice;
?>
