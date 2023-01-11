<?php
namespace App\Bank;
// require_once "./Account.php";

class SavingAccount extends Account 
{
        /**
     * Account Interest
     *
     * @var int
     */
    private $interest;

    /**
     * CheckingAccount constructor
     * 
     */

     public function __construct(string $name, float $amount, int $interest)
     {
        parent::__construct($name,$amount);
        $this->interest = $interest;
     }


     public function earnInterests()
     {
        echo var_dump($this->amount);
        echo var_dump($this->interest);
        // Check if debt authorize withdrawal
        if($this->amount > 0){
            $this->amount += ($this->amount * ($this->interest / 100));  
        }else{
            echo 'Could not get Interest on $0';
        }
     }

}
?>