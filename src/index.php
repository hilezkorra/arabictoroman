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
$error=false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['int'])) {

    $input=$_POST['int'];
    if(is_numeric($input) && floor( $input ) == $input && $input>=0){
        $output = romannumerals($input);
        if( $input === "0") {
        $output = "N";
        }
    }else{    
        $error=true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Be amazed!</title>
    <style>
        body{
            text-align:center;
        }
        .head{
            text-align:center;
        }
        .head h1{
            display:inline-block;
            width:50%;
            font-size: 300%;
            border-radius:50px;
            background: #d5deeb;            
            box-shadow: 12px 12px 20px 2px rgba(0, 0, 0, .8);
            border: 2px solid grey;
        }
        .input{
            font-size:35px;
            display:inline-block;
            width:48%;
            margin:1%;
            padding:1%;
            background:silver;
            border-radius:30px;
            text-align:center;
            box-shadow: 12px 12px 20px 2px rgba(0, 0, 0, .8);
            border: 2px solid grey;
        }
        .input label{
            display: block;
            text-align:center;
        }
        .input input{
            display:inline-block;
            width:50%;
            text-align:center;
            font-size: 35px;
            border-radius:20px;
            border:3px solid grey;
            background:#ebedf0;
        }
        .output{
            font-size:35px;
            display:inline-block;
            width:48%;
            margin:1%;
            padding:1%;
            background:silver;
            border-radius:30px;
            text-align:center;
            box-shadow: 12px 12px 20px 2px rgba(0, 0, 0, .8);
            border: 4px solid grey;
        }
        .images{
            position:absolute;
            width:100%;
            z-index:-1;
        }
        #img1{
            position:absolute;
            left:0;
            opacity:0.5;
            max-width:400px;
            z-index:-1;
        }
        #img2{
            position:absolute;
            right:0;
            opacity:0.5;
            max-width:400px;
            z-index:-1;
        }

    </style>
</head>
<body>
    <div class="images">
        <img src="arab.png" alt="cartoon arab" id="img1">
        <img src="roman.png" alt="cartoon roman warrior" id="img2">
    </div>
    <div class="head">
        <h1>Igor's arabic to roman numeral converter</h1>
    </div>
    <div class="input">
        <form action="index.php" method="post">
            <label for="int">Input a positiv whole number to be converted to Roman numerals:</label>
            <input type="text" name="int" id="int">
            <?php if($error===true) :?>
                <p style="color:red">Input is invalid.</p>
            <?php endif ; ?>
        </form>
    </div>
    <div class="output">
        <?php if(! isset($output)) :?>
            <p class="roman">Waiting for input...</p> 
        <?php else :?>
            <p class="roman"><?= $input . " = " . $output ?></p>
        <?php endif ; ?>
    </div>
</body>
</html>
