<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./../lib/config.php");
require_once("./../lib/encryption.php");
include("./../lib/checksum.php");
?>
<html>
<head>
<title>Processing - Paytm Payments Gateway for Custom Payments - Hash Hackers</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <center><h1>Please do not refresh this page...</h1></center>
        <form method="post" action="<?php
echo PAYTM_TXN_URL;
?>" name="f1">
            <?php
foreach ($paramList as $name => $value) {
    echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
}
?>
           <input type="hidden" name="CHECKSUMHASH" value="<?php
echo $checkSum;
?>">
        <script type="text/javascript">
            document.f1.submit();
        </script>
    </form>
</body>
</html>
