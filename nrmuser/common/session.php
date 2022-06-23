<?php
session_start();
if($_SESSION["userrole"] == 1)
{
    if(!isset($_SESSION['useremail']))
    {
        header("LOCATION: ../nrmuser/index.php");
    }

}
else if($_SESSION["userrole"] != 1 )
{
    header("LOCATION: ../nrmuser/index.php");

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
