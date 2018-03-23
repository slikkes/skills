<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 03. 22.
 * Time: 8:44
 */

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class StringCalcTest extends TestCase
{

    private $sc;

    protected function setUp()
    {
        $this->sc = new StringCalc();
    }


    public function testString()
    {

        $this->setUp();

        $this->sc->add("a");

        $this->assertEquals(null, $this->sc->solution);
    }

    public function testEmpty()
    {

        $this->setUp();

        $this->sc->add("");

        $this->assertEquals(null, $this->sc->solution);
    }


    public function testOne()
    {

        $this->setUp();

        $this->sc->add("1");

        $this->assertEquals(1, $this->sc->solution);
    }


    public function testTwoNumbers()
    {

        $this->setUp();

        $this->sc->add("1,2");

        $this->assertEquals(3, $this->sc->solution);
    }


    public function testThreeNumbers()
    {

        $this->setUp();

        $this->sc->add("3,4,5");

        $this->assertEquals(12, $this->sc->solution);
    }


    public function testNewLine()
    {

        $this->setUp();

        $this->sc->add("3\n4,5");

        $this->assertEquals(12, $this->sc->solution);
    }


    public function testThreeDigitNumber()
    {
        $this->setUp();

        $this->sc->add("301");

        $this->assertEquals(301, $this->sc->solution);
    }

    public function testLongerThanOneDeli(){

        $this->setUp();

        $this->sc->add("3*/-/-*-/-*/,.,.1");

        $this->assertEquals(4, $this->sc->solution);
    }

}


