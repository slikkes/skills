<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 03. 22.
 * Time: 14:00
 */

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
class WrapperTest extends TestCase
{
    public $wrapper;

    function setUpWrapper(){

        $this->wrapper=new Wrapper();
    }


    function testItShouldWrapAnEmptyString(){

        $this->setupWrapper();

        $this->assertEquals('',$this->wrapper->wrap('',0));
    }


    function testNotWrapShorterThanMax(){

        $this->setupWrapper();

        $textToBeParsed='word';
        $maxLineLength=5;

        $this->assertEquals($textToBeParsed,$this->wrapper->wrap($textToBeParsed,$maxLineLength));
    }


    function testWrapsLongerThanMaxWord(){

        $this->setUpWrapper();

        $textToBeParsed='alongword';
        $maxLineLength=5;

        $this->assertEquals("along\nword",$this->wrapper->wrap($textToBeParsed,$maxLineLength));
    }


    function testItWrapsOnSeveralLines(){

        $this->setUpWrapper();

        $textToBeParsed='averyverylongword';
        $maxLineLength=5;

        $this->assertEquals("avery\nveryl\nongwo\nrd", $this->wrapper->wrap($textToBeParsed,$maxLineLength));
    }


    function testTwoWordsWrapOnSpace(){

        $this->setUpWrapper();

        $textToBeParsed='word word';
        $maxLineLength=5;

        $this->assertEquals("word\nword", $this->wrapper->wrap($textToBeParsed,$maxLineLength));
    }


    function testItWrapsTwoWordsWhenLineIsAfterFirstWord(){

        $this->setUpWrapper();

        $textToBeParsed='word word';
        $maxLineLength=7;

        $this->assertEquals("word\nword", $this->wrapper->wrap($textToBeParsed,$maxLineLength));
    }


    function testWrapping3WrodsOn2Lines(){

        $this->setUpWrapper();

        $textToBeParsed='word word word';
        $maxLineLength=12;

        $this->assertEquals("word word\nword", $this->wrapper->wrap($textToBeParsed,$maxLineLength));
    }


    function testItWraps2WordsAtBoundry(){

        $this->setUpWrapper();

        $textToBeParsed='word word';
        $maxLineLength=4;

        $this->assertEquals("word\nword", $this->wrapper->wrap($textToBeParsed,$maxLineLength));
    }
}
