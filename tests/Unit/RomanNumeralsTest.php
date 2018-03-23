<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 03. 23.
 * Time: 7:53
 */

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{

    private $converter;
    function StartConverter(){
        $this->converter=new RomanNumerals();
    }

    function testZero(){

        $this->StartConverter();

        $number=0;

        $this->assertEquals(null, $this->converter->convert($number));
    }

    function testOne(){

        $this->StartConverter();

        $number=1;

        $this->assertEquals('I', $this->converter->convert($number));
    }

    function testFive(){

        $this->StartConverter();

        $number=5;

        $this->assertEquals('V', $this->converter->convert($number));
    }



    function testTen(){

        $this->StartConverter();

        $number=10;

        $this->assertEquals('X', $this->converter->convert($number));
    }

    function testEleven(){

        $this->StartConverter();

        $number=11;

        $this->assertEquals('XI', $this->converter->convert($number));
    }

    function testSixTeen(){

        $this->StartConverter();

        $number=16;

        $this->assertEquals('XVI', $this->converter->convert($number));
    }

    function testHundred(){

        $this->StartConverter();

        $number=100;

        $this->assertEquals('C', $this->converter->convert($number));
    }

    function testFour(){

        $this->StartConverter();

        $number=4;

        $this->assertEquals('IV', $this->converter->convert($number));
    }

    function testABigNumber(){

        $this->StartConverter();

        $number=1568;

        $this->assertEquals('MDLXVIII', $this->converter->convert($number));
    }

}
