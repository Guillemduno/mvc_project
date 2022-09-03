<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello <?=$name?> from Home!</h1>
    <p>Your favourite colours are:</p>
    <ul>
    <?php 
        foreach ($colours as $key => $value) {
            echo "<li>".htmlspecialchars($value)."</li>";
        }
    ?>
    </ul>
   
</body>
</html>
