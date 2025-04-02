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
    echo "<br>";

    //display customer details
    foreach($bank->getCustomers() as $customer){
        echo 
        "Customer Name: " . $customer->getName() . "<br>" .
        "Customer ID: " . $customer->getId() . "<br>" .
        "Customer Age: " . $customer->getAge() . "<br>";

        foreach ($customer->getAccounts() as $account) {
            echo "Account ID: " . $account['account']->getAccountNumber() . "<br>";
        }
        echo "<br>";
    }
    //prosessing transaction

    $bank->processTransaction($customer1->getAccounts()[0]['bankAccount'], -200);//withdrawal
    $bank->processTransaction($customer1->getAccounts()[0]['bankAccount'], 300); //deposit

    $bank->processTransaction($customer2->getAccounts()[0]['bankAccount'], 300); //deposit

    $saveAccount->addInterest();

    //display account balance

    echo "<br>";
    foreach($customer1->getAccounts() as $account){
            echo "Account Number: " . $account['account']->getAccountNumber() . "<br>" .
            "Balance: PHP " . $account['bankAccount']->getBalance() . "<br>";
    }

    echo "<br>";
    foreach($customer2->getAccounts() as $account){
            echo "Account Number: " . $account['account']->getAccountNumber() . "<br>" .
            "Balance: PHP " . $account['bankAccount']->getBalance() . "<br>";
    }
?>
    <br>
    <?php
    //close account
    echo "Closing Account: " . $account1->getAccountNumber() . "<br>";
    $customer1->closeAccount($account1);
    ?>
    
</body>
</html>