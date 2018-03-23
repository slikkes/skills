<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 03. 22.
 * Time: 11:11
 */

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    private $fb;

    protected function set(){
        $this->fb=new FizzBuzz();
        $this->fb->initNumbersArray();
    }

    public function testFirst(){

        $this->set();

        $this->assertEquals(1,$this->fb->getElement(1));
    }

    public function testSecond(){

        $this->set();

        $this->assertEquals(2, $this->fb->getElement(2));
    }


    public function testThird(){

        $this->set();

        $this->assertEquals("Fizz", $this->fb->getElement(3));
    }

    public function testFifth(){

        $this->set();

        $this->assertEquals("Buzz", $this->fb->getElement(5));
    }

    public function testThreeInIt(){

        $this->set();

        $this->assertEquals("Fizz",$this->fb->getElement(13));
    }

}
