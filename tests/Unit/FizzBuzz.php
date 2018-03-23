<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 03. 22.
 * Time: 11:14
 */

namespace Tests\Unit;


class FizzBuzz
{
    private $numbers=[];

    public function initNumbersArray(){

        for($i=1;$i<100;$i++){

            if($i%3==0 || $this->hasThreeInIt($i)){
                array_push($this->numbers, "Fizz");
            }elseif($i%5==0) {
                array_push($this->numbers, "Buzz");
            }else{
                array_push($this->numbers, $i);
            }
        }
    }

    public function getElement($n){

        return $this->numbers[$n-1];
    }

    protected function hasThreeInIt($number){

        if($number<100){
            $firsNum=floor($number/10);
            $secondNum=$number-floor($number/10)*10;
            return ($firsNum==3 || $secondNum==3)? true : false;
        }else{
            return false;
        }
    }

}