<?php
namespace VendingMachine;

class FirstTest extends \PHPUnit_Framework_TestCase
{
    public function testInitialDisplay()
    {
        $machine = new VendingMachine;
        $this->assertEquals('INSERT COINS', $machine->display());
    }

    public function testDisplayNickel()
    {
        $machine = new VendingMachine;
        $machine->insert('Nickel');
        $this->assertEquals('0.05', $machine->display());
    }

    public function testDisplayTwoNickels()
    {
        $machine = new VendingMachine;
        $machine->insert('Nickel');
        $machine->insert('Nickel');
        $this->assertEquals(0.1, $machine->display());
        $this->assertInternalType('string', $machine->display());
    }

    public function testDisplayTwoDimes()
    {
        $machine = new VendingMachine;
        $machine->insert('Dime');
        $machine->insert('Dime');
        $this->assertEquals(0.2, $machine->display());
        $this->assertInternalType('string', $machine->display());
    }

    public function testDisplayQuarterDimeAndNickel()
    {
        $machine = new VendingMachine;
        $machine->insert('Quarter');
        $machine->insert('Dime');
        $machine->insert('Nickel');
        $this->assertEquals(0.4, $machine->display());
        $this->assertInternalType('string', $machine->display());
    }

    public function testRefuseCoins()
    {
        $machine = new VendingMachine;
        $machine->insert('Penny');
        $machine->insert('Penny');
        $this->assertEquals(['Penny', 'Penny'], $machine->coinReturn());
    }

    public function testComplexRefuseCoins()
    {
        $machine = new VendingMachine;
        $machine->insert('Penny');
        $machine->insert('Foo');
        $machine->insert('Dime');
        $machine->insert('Bar');
        $this->assertEquals(['Penny', 'Foo', 'Bar'], $machine->coinReturn());
        $this->assertEquals('0.10', $machine->display());
    }
}
