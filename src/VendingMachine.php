<?php
namespace VendingMachine;

class VendingMachine
{
    /**
     * Hashmap mapping strings to floats
     * [
     *  'Nickel' => 0.05
     *  ...
     * ]
     * @var float[]
     */
    private $coins = [];

    /**
     * @var string[]
     */
    private $coinReturn = [];

    private $validCoins = [
        'Nickel'  => 0.05,
        'Dime'    => 0.1,
        'Quarter' => 0.25,
    ];

    /**
     * @var string
     */
    private $display;

    public function __construct()
    {
        $this->updateDisplay();
    }

    /**
     * @return string
     */
    public function display()
    {
        return $this->display;
    }

    public function coinReturn()
    {
        return $this->coinReturn;
    }


    /**
     * @param string $coin
     */
    public function insert($coin)
    {
        if (!array_key_exists($coin, $this->validCoins)) {
            $this->coinReturn[] = $coin;
            return;
        }

        $this->coins[] = (string) $coin;
        $this->updateDisplay();
    }

    private function updateDisplay()
    {
        $amount = $this->sum();
        if ($amount == 0.0) {
            $this->display = 'INSERT COINS';
        } else {
            $this->display = (string) $amount;
        }
    }

    /**
     * @return float
     */
    private function sum()
    {
        $result = 0.0;
        foreach ($this->coins as $coin) {
            $result += $this->validCoins[$coin];
        }
        return $result;
    }
}
