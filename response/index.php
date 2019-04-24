<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./../lib/config.php");
require_once("./../lib/encryption.php");

$paytmChecksum   = "";
$paramList       = array();
$isValidChecksum = "FALSE";

$paramList     = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/icons/favicon-16x16.png">
    <link rel="mask-icon" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/bootstrap/css/bootstrap.min.css" integrity="sha256-m/h/cUDAhf6/iBRixTbuc8+Rg2cIETQtPcH9D3p2Kg0=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/fonts/font-awesome-4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/fonts/Linearicons-Free-v1.0.0/icon-font.min.css" integrity="sha256-McqPxLsZARiFGVnygpCa9Kj254K2nc++AAlP/AEIeLM=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/animate/animate.css" integrity="sha256-gKpUl/8xssABR02UMvCFPBHSAKZ+pPmFKrL37i/t2cI=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/css-hamburgers/hamburgers.min.css" integrity="sha256-5GnVu4h1nEeqkjwhs4+StqORVvYrp+XSfLJ1cYLzqk8=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/select2/select2.min.css" integrity="sha256-xJOZHfpxLR/uhh1BwYFS5fhmOAdIRQaiOul5F/b7v3s=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/css/util.css" integrity="sha256-g3SU8rSj3nvOuH156EGuSLlvgQgqJCGFjgax1dHhF/g=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/css/main.css" integrity="sha256-tAZ13BHmfteiyply1ftKqhwlBUVmwBuTRJqH23oio1k=" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
    .wrap-input100 {
    
      /* These are technically the same, but use both */
      overflow-wrap: break-word;
      word-wrap: break-word;
    
      -ms-word-break: break-all;
      /* This is the dangerous one in WebKit, as it breaks things wherever */
      word-break: break-all;
      /* Instead use this non-standard one: */
      word-break: break-word;
    
      /* Adds a hyphen where the word breaks, if supported (No Blink) */
      -ms-hyphens: auto;
      -moz-hyphens: auto;
      -webkit-hyphens: auto;
      hyphens: auto;
    
    }
    </style>
</head>
<body>


    <div class="container-contact100" style="background-image: url('https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/images/bg-01.jpg');">
        <div class="wrap-contact100">
            <form name='contact' class='contact100-form validate-form' method='POST' action='redirect/'><input type='hidden' name='form-name' value='contact' />
                <span class="contact100-form-title">
                    <a class="navbar-brand" href="/"><img src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/images/hashhackers_logo.webp" alt="Hash Hackers" width="200px" height="auto"> Status</a>
                </span>
<?php
if ($isValidChecksum == "TRUE") {
    echo "<b>Checksum Status: <b style='color: rgb(255,69,0)'>Matched</b></b>" . "<br/>";
    if ($_POST["STATUS"] == "TXN_SUCCESS") {
        echo "<br><div class='wrap-input100'><span class='label-input100'><b>Transaction Status: <b style='color: rgb(255,69,0)'>Success</b>.</span></div>" . "<br/><div class='wrap-input100'><span class='label-input100'><img src='/images/success.png' alt='Success'></span></div></br>";
        $status = "Success";
        //Process your transaction here as success transaction.
        //Verify amount & order id received from Payment gateway with your application's order id and amount.
    } else {
        echo "<br><div class='wrap-input100'><span class='label-input100'><b>Transaction Status: <b style='color: rgb(255,69,0)'>Failed</b>.</span></div>" . "<br/><div class='wrap-input100'><span class='label-input100'><img src='/images/failed.png' alt='Failed'></span></div></br>";
        $status = "Failed";
    }
    
    if (isset($_POST) && count($_POST) > 0) {
        echo "<div class='wrap-input100'><span class='label-input100'><a href='/' style='color: rgb(255,69,0)'>Go back to Homepage</a></span></div>";
        foreach ($_POST as $paramName => $paramValue) {
            echo "<div class='wrap-input100'><span class='label-input100'>" . $paramName . " = " . $paramValue . "</span></div>";
        }
        echo "<a href='/' style='color: rgb(255,69,0)'>Go back to Homepage</a>";
    }
    
    
} else {
    echo "<b>Checksum <b style='color: rgb(255,69,0)'>Mismatch</b>. Something is wrong with your configuration.</b>";
    //Process transaction as suspicious.
}
?>
   <title><?php
echo $status;
?> - Paytm Payments Gateway for Custom Payments - Hash Hackers</title>
            </form>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/jquery/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/bootstrap/js/popper.min.js" integrity="sha256-UpLmd/5xLICGNBTp5z82eNhtQJ91E5K2gDtwqUn8EBc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/bootstrap/js/bootstrap.min.js" integrity="sha256-DiWJXXyq81WlPRnDfGmgYZj2aOVCKyEdJ1l+2TmDuAs=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/vendor/select2/select2.min.js" integrity="sha256-+mWd/G69S4qtgPowSELIeVAv7+FuL871WXaolgXnrwQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/js/main.js" integrity="sha256-b7AHVAAYXastL2DcLVJRkTYnCilfJN+amUmtYN8J7HU=" crossorigin="anonymous"></script>
    <!--- A ColorLib Theme Edited and CDNed by Parveen Bhadoo -->
</body>
</html>
