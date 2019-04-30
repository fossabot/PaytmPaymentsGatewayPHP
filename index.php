<?php
$order = "PBG" . rand(1000, 999999999999);
$cust  = "CUST" . rand(1000, 999999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paytm Payments Gateway for Custom Payments - Hash Hackers</title>
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
</head>
<body>


    <div class="container-contact100" style="background-image: url('https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.12/images/bg-01.jpg');">
        <div class="wrap-contact100">
            <form name='contact' class='contact100-form validate-form' method='POST' action='redirect/'><input type='hidden' name='form-name' value='contact' />
                <span class="contact100-form-title">
                    <a class="navbar-brand" href="/"><img src="https://cdn.jsdelivr.net/gh/ParveenBhadooOfficial/BhadooJS@1.0.9/images/hashhackers_logo.webp" alt="Hash Hackers" width="200px" height="auto"> PG</a>
                </span>

                <div class="wrap-input100">
                    <span class="label-input100">Paytm Payments Gateway of Hash Hackers Group.<br><a href='/status' style='color: rgb(255,69,0)'>Check Transaction Status using Order Number.</a></span>
                </div>
                
                <div class="wrap-input100">
                    <span class="label-input100">ORDER NUMBER: <a href='#' style='color: rgb(255,69,0)'><?php
echo $order;
?></a></span>
                    <input class="input100" type="hidden" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php
echo $order;
?>" placeholder="Order ID for Tracking">
                </div>
                
                <div class="wrap-input100">
                    <span class="label-input100">AMOUNT</span>
                    <input class="input100" type="hidden" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php
echo $cust;
?>" placeholder="Mobile Number" required>
                    <input class="input100" type="hidden" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="RETAIL" >
                    <input class="input100" type="hidden" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WAP" >
                    <input class="input100" tabindex="10" type="number" name="TXN_AMOUNT" value=""" placeholder="Amount" required>
                </div>

                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button class="contact100-form-btn">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
            <br><center><a href='//github.com/ParveenBhadooOfficial/PaytmPaymentsGatewayPHP'>This Software is Open Source.</a></center>
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
