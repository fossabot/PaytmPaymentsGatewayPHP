<?php
$checkSum    = "";
$paramList   = array();
$callbackurl = "https://" . $_SERVER['HTTP_HOST'] . "/response/";

$ORDER_ID         = $_POST["ORDER_ID"];
$CUST_ID          = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID       = $_POST["CHANNEL_ID"];
$TXN_AMOUNT       = $_POST["TXN_AMOUNT"];

// Create an array having all required parameters for creating checksum.
$paramList["MID"]              = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"]         = $ORDER_ID;
$paramList["CUST_ID"]          = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"]       = $CHANNEL_ID;
$paramList["TXN_AMOUNT"]       = $TXN_AMOUNT;
$paramList["WEBSITE"]          = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"]     = $callbackurl;
/*
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList, PAYTM_MERCHANT_KEY);
?>
