<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <div>
            <label for="number1">Number1:</label>
            <input type="number" id="number1" name="nb1">
            
        </div>
        <div>
            <label for="number2">Number2:</label>
            <input type="number" id="number2" name="nb2">

        </div>
        <button type="submit">Compute</button>
    </form>

    <?php
       // http://localhost/php_practice/test.php?nb1=3&nb2=127
       echo "<pre>" ;
       var_dump($_GET);    
       echo "</pre>" ;
       
    ?>

</body>
</html>