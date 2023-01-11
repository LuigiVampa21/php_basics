<?php

use App\Autoloader;
use App\Customer\Account as CustomerAccount;
use App\Bank\{CheckingAccount, SavingAccount}; 

require_once "./classes/Autoloader.php";
Autoloader::register();

// require_once "./classes/Bank/Account.php";
// require_once "./classes/Bank/Checking_account.php";
// require_once "./classes/Bank/Saving_account.php";

// require_once "./classes/Customer/Account.php";

// Init Account

// $account1 = new CheckingAccount('ntn', 100 ,-20);
// $account2 = new SavingAccount('numa', 200, 5);

$account3 = new CustomerAccount();

// echo var_dump($account3);

// $account1->amount = 23.00;

// $account1->fill_in(23.47);

// $account1->withdraw(100000);

// $account1->show_amount();





// echo $account1->getOwner();
// echo $account1->setOwner(' ');
// echo $account1->getOwner();

// echo $account1->getAmount();
// echo $account1->setAmount();
// echo $account1->earned_interests();
// echo $account1->getAmount();

// Get constant from class
// echo Account::INTEREST_RATE;



// echo $account1->owner;
// echo var_dump($account2);
// echo $account2->getAmount();


// $account1->withdrawFromChecking(100);
// echo $account1->getAmount();

// $account2->earnInterests();
// echo $account2->getAmount();
?>