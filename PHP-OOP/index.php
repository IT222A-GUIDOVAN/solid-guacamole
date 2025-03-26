<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'Class.php';
    include 'FileClass.php';
    
    echo $account->getacc();
    echo "<br>";
    echo $account->getbalance();
    
    ?>
    <hr>

    <?php
    echo $customer->getName();
    echo "<br>";
    echo $customer->getAge();
    ?>
    
</body>
</html>