<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 03. 22.
 * Time: 14:11
 */

namespace Tests\Unit;


class Wrapper
{

    function wrap($text, $maxLength){

        $text= trim($text);
        if(strlen($text)<=$maxLength){
            return $text;}
        if(strrpos(substr($text, 0, $maxLength), ' ')!=0){
            return substr($text,0,strrpos($text, ' '))."\n".$this->wrap(substr($text,strrpos($text,' ')+1),$maxLength);
        }
        return substr($text,0,$maxLength)."\n".$this->wrap(substr($text,$maxLength),$maxLength);

    }
}