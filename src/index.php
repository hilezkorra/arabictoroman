<?php include 'arabictoroman.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Be amazed!</title>
    <link rel="stylesheet" href="style.css">
    <script src="mobileview.js" type="text/javascript"></script>
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

            <!-- If there are problems with the input display an error message -->
            <?php if($error===true && isset($input)) :?>
                <p style="color:red">Input is invalid.</p>
            <?php endif ; ?>

        </form>
    </div>
    <div class="output">

        <!-- If there are no problems and output is set, show it -->        
        <?php if(! isset($output)) :?>
            <p class="roman">Waiting for input...</p> 
        <?php else :?>
            <p class="roman"><?= $input . " = " . $output ?></p>
        <?php endif ; ?>

    </div>
</body>
</html>
