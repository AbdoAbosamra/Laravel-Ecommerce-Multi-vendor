<?php
$RomanSymbols =
    [
        "I"=> 1,
        "V"=> 5,
        "X"=> 10,
        "L"=> 50,
        "C"=> 100,
        "D"=> 500,
        "M"=> 1000,
    ];
$s ="III";
//$arr = explode(' ' ,$s);// That must be have seprator
// The alternative way
$arr = str_split($s);
var_dump($arr);
$result = 0;
foreach($arr as $elem){
    $result += $RomanSymbols[$elem];
}
echo $result;
