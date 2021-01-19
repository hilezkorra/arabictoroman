<?php
function romannumerals($int){
    $int = intval($int);
    $output='';
    
    $roman_numbers = array(
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    );
    //Goes through entire array from top to bottom
    //This helps us find the highest matching roman number
    //The Matching number is written into output and input is set to input % value
    foreach($roman_numbers as $roman => $value){
        $matches = intval($int/$value);             
        $output .= str_repeat($roman,$matches);     
        $int = $int % $value;                       
    }                                               
    return $output;

}
$error=false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['int'])) {
    $input=trim($_POST['int']);
    //Validates input, if it's a positive whole number, it turns it into a roman number
    if(is_numeric($input) && floor($input) == $input && $input >= 0 && $input < 5000){
        $output = romannumerals($input);
        if( $input === "0") {
            //in case the number is a string 0 it sets output to roman N
            $output = "N";
        }
    }else{
        //If there was a problem then make "error=true" so that we can inform the user    
        $error=true;
    }
}
