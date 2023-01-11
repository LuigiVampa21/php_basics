<?php

namespace App\Bank;

/**
 * Bank Account Object
 */

// class Account
abstract class Account
{
    /**
     * Account Owner
     *
     * @var string
     */
    // public $owner;
    private $owner;

    /**
     * Account Amount
     *
     * @var float
     */
    // private $amount;
    protected $amount;
    


    // Constants
    const INTEREST_RATE = 3;


    /**
     * Account constructor
     * 
     * @param string $name
     * @param float $cash
     */

    
    public function __construct(string $name, float $cash = 100)
    {
    $this->owner = $name;
    $this->amount = $cash;
    }


    // Accessors
    // --------- GETTERS
    
    public function getOwner()
    {
        return $this->owner;
    }
    
    public function getAmount()
    {
        return $this->amount;
    }
    
    
    // --------- GETTERS

    public function setOwner(string $owner)
    {
        if(!$owner || $owner === ' ') 
        {
            die('Need a name boss');
        }
        $this->owner = $owner;
    }
    
    public function setAmount(float $amount)
    {
        if(!$amount || $amount <= 0)
        {
            die('Could not set this amount');
        }
        $this->amount = $amount;
    }

    



    /**
     * fill_in Method
     * 
     * @param float //amount to fill
     * @return void
     * 
     */


     public function fill_in(float $cash)
     {
        // Check amount
        if($cash > 0){
            $this->amount += $cash;
        }
     }


    /**
     * withdraw Method
     * 
     * @param float //amount to fill
     * @return void
     * 
     */


     public function withdraw(float $cash)
     {
        // Check amount
        if($cash > 0 && $cash <= $this->amount){
            $this->amount -= $cash;
        }else{
            echo "Not enough money bruv";
        }
     }



     /**
      * show_amount 
      *
      * @return string
      */


     public function show_amount()
     {
        echo "Amount on your account is $this->amount";
     }



     /**
      * compute_earned_interests
      *
      * @return string
      */


     public function earned_interests(): void
     {
        $this->amount += ($this->amount * self::INTEREST_RATE / 100); 
     }


}



?>