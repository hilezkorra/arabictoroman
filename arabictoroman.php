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
    foreach($roman_numbers as $roman => $value){
        $matches = intval($int/$value);            
        $output .= str_repeat($roman,$matches);     
        $int = $int % $value;                       
    }                                               
    return $output;

}

