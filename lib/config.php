<?php
$MKEY    = getenv('Merchant_Secret_Key'); // Delete if deploying on custom server.
$MMID    = getenv('Merchant_ID'); // Delete if deploying on custom server.
$PENV    = getenv('Environment'); // Delete if deploying on custom server.
$WEBSITE = getenv("Website"); // Delete if deploying on custom server.

define('PAYTM_ENVIRONMENT', $PENV); // Replace $PENV with "STAGING" or "PROD"
define('PAYTM_MERCHANT_KEY', $MKEY); // Replace $MKEY with "Merchant Key" from Paytm Business Dashboard
define('PAYTM_MERCHANT_MID', $MMID); // Replace $MMID with "Merchant ID" from Paytm Business Dashboard
define('PAYTM_MERCHANT_WEBSITE', $WEBSITE); // Replace $WEBSITE with "Website Name" from Paytm Business Dashboard (default for Paytm is "WEBSITE"

$PAYTM_STATUS_QUERY_NEW_URL = 'https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
$PAYTM_TXN_URL              = 'https://securegw-stage.paytm.in/theia/processTransaction';
if (PAYTM_ENVIRONMENT == 'PROD') {
    $PAYTM_STATUS_QUERY_NEW_URL = 'https://securegw.paytm.in/merchant-status/getTxnStatus';
    $PAYTM_TXN_URL              = 'https://securegw.paytm.in/theia/processTransaction';
}

define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
?>
