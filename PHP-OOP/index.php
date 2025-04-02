<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'Class.php';
    //creating acount numbers
    $account1 = new Account("123");
    $account2 = new Account("222");

    //Create BankAccounts object
    $saveAccount = new SavingAccount(1000,0.05);
    $checkingAccount = new CheckingAccount(500, 200);
    
    //Creating customer
    $customer1 = new Customer("JOHN ROOSEVELT","001",26);
    $customer2 = new Customer("CHRIS DOE","002",28);

    $customer1->openAccount($account1,$saveAccount);
    $customer2->openAccount($account2, $checkingAccount);

    //Create a bank
    $bank = new Bank();

    $bank->addCustomer($customer1);
    $bank->addCustomer($customer2);

    //vertify customers
    echo $bank->verifyCustomer($customer1) ;
    echo PHP_EOL;

    //prosessing transaction

    $bank->processTransaction($customer1->getAccounts()[0], -200);
    $bank->processTransaction($customer2->getAccounts()[0], 300);

    $saveAccount->addInterest();

    //display account balance
    foreach($customer1->getAccounts() as $account){
        echo "Account Number:" . $account['account']->getAccounts(). "<br>".
        "Balances; PHP".$account['bankAccount']->getBalance(). "<br>";
    }

    foreach($customer2->getAccounts() as $account){
        echo "Account Number:" . $account['account']->getAccounts(). "<br>".
        "Balances; PHP".$account['bankAccount']->getBalance(). "<br>";
    }

    // $account = new BankAccount(100);

    // $account->deposit(100);

    // $account->withdraw(-500);

    // $account->transaction("deposit", 100);
    // $account->transaction("withdraw", 200);

    
    // $saveaccount->deposit(100);
    // $saveaccount->withdraw(50);

    // $saveaccount->setInterestRate(0.05);
    // $saveaccount->addInterest();

    // // include 'FileClass.php';
    
    // echo "<br>";
    // echo $account->getbalance();
    
    // ?>
    // <hr>
    // <?php
    // echo "<br>";
    // echo $saveaccount->getbalance();
    // echo "<br>";
    // echo $saveaccount->getInterestRate();
    // ?>
    // <hr>

    // <?php
    // echo $customer->getName();
    // echo "<br>";
    // echo $customer->getAge();
    // ?>
    // <hr>

    // <?php
    

    // echo "Balance:". $checkingAccount->getbalance(). "<br>";

    // if($checkingAccount->withdraw(300)){
    //     echo "Withdraw success" . "<br>". "Balance:". $checkingAccount->getbalance(). "<br>";
    // }else {
    //     echo "Withdraw failed";
    // }

    // if($checkingAccount->withdraw(850)){
    //     echo "Withdraw success" . "<br>". "Balance:". $checkingAccount->getbalance(). "<br>";
    // }else {
    //     echo "Withdraw failed";
    // }
    // ?>

    
</body>
</html>