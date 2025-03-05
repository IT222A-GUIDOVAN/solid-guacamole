<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h1>WELCOME TO MY</h1>
    <h3>HOME PAGE</h3>
    <hr>
    <p><?php echo $fullname.' email: '.$email; ?></p>
    <p><?php echo $address; ?></p>
    <?php echo "<p>Brief History</p>"; ?>
    <hr>
</body>
<?php include 'footer.php'; ?>
</html>