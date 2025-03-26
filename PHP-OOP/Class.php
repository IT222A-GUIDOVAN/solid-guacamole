<?php
class BankAccount{

    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $balance){
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;

    }
    
    public function getacc(){
        return $this->accountNumber;
    }
    public function getbalance(){
        return $this->balance;
    }


    public function deposit($amount){

        if($amount > 0){
            $this->balance += $amount; 
        }
    }

    public function withdraw($amount){
        if($amount <= $this->balance){
            $this->balance -= $amount;
            return true;
        }
          return false;

    }

    public function transaction($action, $amount){
        if($action == 'deposit'){
            $this->deposit($amount);
        }

        if($action ='withdraw'){
            $this->withdraw($amount);
        }
    }


}

Class Customer{
    private $name;
    private $age;

    public function getName(){
        return $this->name;
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

$account = new BankAccount(1,100);
// $account->accountNumber = 1;
// $account->balance = 100;

$account->deposit(100);
$account->deposit(800);

$account->withdraw(-500);
$account->transaction("deposit", 100);
$account->transaction("withdraw", 200);

$customer = new Customer();
$customer->setName(" JOHN ROOSEVELT ");
$customer->setAge( 18);



?>