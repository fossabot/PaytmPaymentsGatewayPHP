<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./../lib/config.php");
require_once("./../lib/encryption.php");

$ORDER_ID          = "";
$requestParamList  = array();
$responseParamList = array();

if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {
    
    // In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
    $ORDER_ID = $_POST["ORDER_ID"];
    
    // Create an array having all required parameters for status query.
    $requestParamList = array(
        "MID" => PAYTM_MERCHANT_MID,
        "ORDERID" => $ORDER_ID
    );
    
    $StatusCheckSum = getChecksumFromArray($requestParamList, PAYTM_MERCHANT_KEY);
    
    $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;
    
    // Call the PG's getTxnStatusNew() function for verifying the transaction status.
    $responseParamList = getTxnStatusNew($requestParamList);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Support | Hash Hackers</title>
    <meta charset="UTF-8">
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
    <style>.label-input100 { word-wrap: break-word; }</style>
</head>
<body>


    <div class="container-contact100" style="background-image: url('https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/images/bg-01.jpg');">
        <div class="wrap-contact100">
            <form name='contact' class='contact100-form validate-form' method='POST' action=''><input type='hidden' name='form-name' value='contact' />
                <span class="contact100-form-title">
                    <a class="navbar-brand" href="/"><img src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/images/hashhackers_logo.webp" alt="Hash Hackers" width="200px" height="auto"> PG</a>
                </span>

                <div class="wrap-input100">
                    <span class="label-input200">Paytm Payments Gateway of Hash Hackers Group.</span>
                </div>
                
                <div class="wrap-input100">
                    <span class="label-input300">Transaction Status Query using Order ID</span>
                </div>

                <div class="wrap-input100">
                    <span class="label-input100">Order ID</span>
                    <input class="input100" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php
echo $ORDER_ID;
?>" placeholder="Order ID" required>
                </div>


                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button class="contact100-form-btn">
                            Submit
                        </button>
                    </div>
                </div>

        <br/></br/>
        <?php
if (isset($responseParamList) && count($responseParamList) > 0) {
?>
               <div class="wrap-input100">
                    <span class="label-input300"><br/>Response to your query:</span>
                </div>

                <?php
    foreach ($responseParamList as $paramName => $paramValue) {
?>
                   <div class='wrap-input100'><span class='label-input100'><?php
        echo $paramName;
?> = <?php
        echo $paramValue;
?></span></div>
                <?php
    }
?>

        <?php
}
?>
   </form>
    
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
