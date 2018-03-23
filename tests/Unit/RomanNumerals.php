<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 03. 23.
 * Time: 7:58
 */

namespace Tests\Unit;


class RomanNumerals
{

    private $digits=[
        1000=>'M',
        900=>'CM',
        500=>'D',
        400=>'CD',
        100=>'C',
        90=>'XC',
        50=>'L',
        40=>'XL',
        10=>'X',
        9=>'IX',
        5=>'V',
        4=>'IV',
        1=>'I',
    ];

    function convert($number){


        $romanNumber="";

        foreach($this->digits as $limit => $roman){


            while($number>=$limit){
                $romanNumber.=$roman;
                $number-=$limit;
            }
        }

        return $romanNumber;
    }
}