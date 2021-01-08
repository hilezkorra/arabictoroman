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
        $matches = intval($int/$value);             //Finds whole number after dividing the inputed value with the value from the array
        $output .= str_repeat($roman,$matches);     //$output gets the letter from the value in the array, the amount being the number of times $int could be divided with $value from array
        $int = $int % $value;                       //$int is modulated by $value and the result becomes the new $int which is then used for the following repetitions
    }                                               //If $matches = 0 nothing get's added into $output because of it being in str_repeat()
    return $output;

}

