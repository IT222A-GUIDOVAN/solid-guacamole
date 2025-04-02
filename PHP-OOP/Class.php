<?php

class Account{
    private $accountNumber;

    public function __construct($accountNumber){
        $this->accountNumber = $accountNumber;
    }

    public function getAccountNumber(){
        return $this->accountNumber;
    }
}

class BankAccount{
    
    public $balance;

    public function __construct($balance){
        $this->balance = $balance;

    }
    
    public function getbalance(){
        return $this->balance;
    }


    public function deposit($amount){

        if($amount > 0){
            $this->balance += $amount; 
            return true;
        }
        return false;
    }

    public function withdraw($amount){
        if($amount <= $this->balance){
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    // public function transaction($action, $amount){
    //     if($action == 'deposit'){
    //         $this->deposit($amount);
    //     }

    //     if($action ='withdraw'){
    //         $this->withdraw($amount);
    //     }
    // }


}

Class Customer{
    private $name;
    private $age;
    private $id;
    private $accounts = [];

    public function __construct($name,$id,$age){
        $this->name = $name;
        $this->id = $id;
        $this->age = $age;
        $this->accounts = [];
    }

    public function openAccount($account, $bankAccount){
        $this->accounts[] = ['account' => $account, 'bankAccount' => $bankAccount];
    }

    public function closeAccount($accountToClose){
        foreach($this->accounts as $index => $accountData){
            if($accountData['account']->getAccountNumber() == $accountToClose->getAccountNumber()){
                unset($this->accounts[$index]);
                return true;
            }
        }
        return false;
    }

    public function getAccounts() {
        return $this->accounts ?? [];
    }
    public function getName(){
        return $this->name;
    }
    public function getID(){
        return $this->id;
    }

    public function getAge(){
        return $this->age;
    }

    public function setName($name){
        $name = trim($name);

        if($name == ''){
            return false;
        }
        $this->name = $name;

        return true;
    }

    public function setAge($age){
        $this->age = $age;
    }
}

class Bank{
    private $customers;
    public function __construct(){
        $this->customers = [];
    }

    public function getCustomers(){
        return $this->customers;
    }

    public function verifyCustomer($customer){
        return in_array($customer, $this->customers);
    }

    public function processTransaction($account, $amount){
        if($amount > 0){
            $account->deposit($amount);
        }else{
            $account->withdraw(abs($amount));
        }   
    }

    public function addCustomer($customer){
        $this->customers[] = $customer;
    }

    public function removeCustomer($customer){
        $index = array_search($customer, $this->customers);
        if($index !== false){
            unset($this->customers[$index]);
            return true;
        }
        return false;
    }



}

class SavingAccount extends BankAccount{
    private $interestRate;

    public function __construct($balance, $interestRate){
        parent::__construct($balance);
        $this->interestRate = $interestRate;
    }

    public function getInterestRate(){
        return $this->interestRate;
    }
    public function setInterestRate($interestRate){
        $this->interestRate = $interestRate;
    }

    public function addInterest(){
        //calculate interest
        $interest = $this->getbalance() * $this->interestRate;

        //deposit interest to the balance
        $this->deposit($interest);
    }
}

class CheckingAccount extends BankAccount{
    private $minBalance;

    public function __construct($balance, $minBalance){
            parent::__construct($balance);
            $this->minBalance = $minBalance;
        

    }

    public function withdraw($amount){
        if($amount > 0 &&($this->balance + $this->minBalance) >= $amount){
            $this->balance -= $amount;
            return true;
        }
            
        return false;
    }
}



?>