<?php
namespace App\Bank;
// require_once "./Account.php";

class CheckingAccount extends Account
{

        /**
     * Account Debt
     *
     * @var int
     */
    private $debt;

    /**
     * CheckingAccount constructor
     * 
     */

     public function __construct(string $name, float $amount, int $debt)
     {
        parent::__construct($name,$amount);
        $this->debt = $debt;
     }


     public function withdrawFromChecking(float $amount)
     {
        echo var_dump($amount);
        echo var_dump($this->amount);
        echo var_dump($this->debt);
        // Check if debt authorize withdrawal
        if($amount > 0 && (($this->amount - $amount) >= $this->debt)){
            $this->amount -= $amount;  
        }else{
            echo 'Insufficient funds';
        }
     }

}

?>