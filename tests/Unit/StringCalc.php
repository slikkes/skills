<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 03. 22.
 * Time: 8:48
 */

namespace Tests\Unit;


class StringCalc
{
    public $solution=0;
    public $numbers=[];

    public function add($string){

        $this->separator($string);

        foreach($this->numbers as $number){
            $this->solution+=$number;
        }

    }


    public function separator($string){

        $substring="";
        $chars = str_split($string);

        foreach($chars as $char){

            if(is_numeric($char)){
                $substring.=$char;
            }else{
                array_push($this->numbers,(int)$substring);
                $substring="";
            }
        }
        array_push($this->numbers,(int)$substring);
    }


}