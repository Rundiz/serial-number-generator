<?php 
require dirname(dirname(__DIR__)) . '/Rundiz/SerialNumberGenerator/SerialNumberGenerator.php';


//$act = (isset($_REQUEST['act']) ? trim($_REQUEST['act']) : '');

//if ($act == 'generate') {
    $SNG = new \Rundiz\SerialNumberGenerator\SerialNumberGenerator();
    $serialnumber_result = $SNG->generate();
    
    $SNG->numberChunks = 1;
    $SNG->numberLettersPerChunk = 9;
    $serialnumber_result2 = $SNG->generate();

    $SNG->reset();
    $SNG->numberChunks = 3;
    $SNG->numberLettersPerChunk = 7;
    $serialnumber_result3 = $SNG->generate();

    $SNG->reset();
    $SNG->numberChunks = 3;
    $SNG->numberLettersPerChunk = 3;
    $SNG->separateChunkText = ':';
    $serialnumber_result4 = $SNG->generate();
    unset($SNG);
//}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Serial number generator</title>
        <style>
            h1, h2, h3, h4, h5, h6 {
                margin: 0 0 10px;
                padding: 0;
            }
            .result {
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
                border: 1px dashed #ccc;
                display: block;
                margin-bottom: 20px;
                padding: 10px;
                width: 300px;
            }
        </style>
    </head>
    <body>
        <h3>Result:</h3>
        Normal<br>
        <input class="result" type="text" value="<?php 
            if (
                isset($serialnumber_result) && 
                (is_string($serialnumber_result) || is_numeric($serialnumber_result))
            ) {
                echo $serialnumber_result;
            } 
            ?>">
        Chunks = 1, Letters per chunk = 9<br>
        <input class="result" type="text" value="<?php 
            if (
                isset($serialnumber_result2) && 
                (is_string($serialnumber_result2) || is_numeric($serialnumber_result2))
            ) {
                echo $serialnumber_result2;
            } 
            ?>">
        Chunks = 3, Letters per chunk = 7<br>
        <input class="result" type="text" value="<?php 
            if (
                isset($serialnumber_result3) && 
                (is_string($serialnumber_result3) || is_numeric($serialnumber_result3))
            ) {
                echo $serialnumber_result3;
            } 
            ?>">
        Chunks = 3, Letters per chunk = 3, Separate text = :<br>
        <input class="result" type="text" value="<?php 
            if (
                isset($serialnumber_result4) && 
                (is_string($serialnumber_result4) || is_numeric($serialnumber_result4))
            ) {
                echo $serialnumber_result4;
            } 
            ?>">
        <?php /*form method="post">
            <input type="hidden" name="act" value="generate">
            <button type="submit">Generate</button>
        </form*/ ?> 
    </body>
</html>