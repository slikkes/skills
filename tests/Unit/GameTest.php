<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 03. 21.
 * Time: 15:28
 */

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;


class GameTest extends TestCase
{

    private $g;

    protected function setUp(){
        $this->g= new Game();
    }


    private function rollMany($n, $pins){

        for ($i=0; $i<$n; $i++){
            $this->g->roll($pins);
        }

    }


    public function testGutterGame(){

        $this->setUp();
        $this->rollMany(20,0);

        $this->assertEquals(0, $this->g->score());
    }


    public function testAllOnes(){

        $this->setUp();
        $this->rollMany(20,1);

        $this->assertEquals(20, $this->g->score());
    }


    public function testOneSpare(){

        $this->rollSpare();
        $this->g->roll(3);

        $this->rollMany(17,0);

        $this->assertEquals(16, $this->g->score());
    }


    public function testOneStrike(){

        $this->rollStrike();
        $this->g->roll(3);
        $this->g->roll(4);

        $this->rollMany(16,0);

        $this->assertEquals(24, $this->g->score());
    }


    public function testPerfectGame(){

        $this->rollmany(12,10);

        $this->assertEquals(300,$this->g->score());
    }


    private function rollSpare(){

        $this->g->roll(5);
        $this->g->roll(5);
    }

    private function rollStrike(){

        $this->g->roll(10);
    }

}
