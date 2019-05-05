# Paytm Payments Gateway in PHP

## Information

This product is extracted and redesigned from Paytm Source Code of Web Payments Gateway. The Software can be used by Individual Merchants to accept payments using their own website. While we suggest you to use Paytm Payment Links for transactions. This software is free and can be modified to fit Business needs.

## Usage

* Click on Deploy Button Below.
* Open https://dashboard.paytm.com/next/apikeys
* Copy Required fields and Paste into Variables Required at Heroku.
* Deploy.
* No need of providing server address as the script pickups the host name where it is running.

## Custom Server

* For Deploying to Shared or Dedicated Hosting (with PHP Support).
* Open lib/config.php and Replace with this code.

      <?php
      /*
      - Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
      - Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
      - Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
      - Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
      - Above details will be different for testing and production environment.
      */
      define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
      define('PAYTM_MERCHANT_KEY', 'xxxxxxxxxxxxxxxxxxxxxxxx'); //Change this constant's value with Merchant key received from Paytm.
      define('PAYTM_MERCHANT_MID', 'xxxxxxxxxxxxxxxxxxxxxxx'); //Change this constant's value with MID (Merchant ID) received from Paytm.
      define('PAYTM_MERCHANT_WEBSITE', 'xxxxxxx'); //Change this constant's value with Website name received from Paytm.
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
      
* Replace TEST with PROD for Production Use (updates url's automatically)
* Merchant Key and Merchant MID with Required Data from https://dashboard.paytm.com/next/apikeys
* Replace Merchant Website from Paytm Site (Default is WEBSITE)

![API KEYS](https://raw.githubusercontent.com/ParveenBhadooOfficial/PaytmPaymentsGatewayPHP/master/images/apikeys.png)

## Deploy to Heroku

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FParveenBhadooOfficial%2FPaytmPaymentsGatewayPHP.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2FParveenBhadooOfficial%2FPaytmPaymentsGatewayPHP?ref=badge_shield)

Original Source is available at [Paytm Github](https://github.com/Paytm-Payments/Paytm_Web_Sample_Kit_PHP)


## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FParveenBhadooOfficial%2FPaytmPaymentsGatewayPHP.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2FParveenBhadooOfficial%2FPaytmPaymentsGatewayPHP?ref=badge_large)