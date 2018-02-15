<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 02. 15.
 * Time: 12:14
 */
namespace App\TestObserver;

use App\Test;

class TestObserver{
    public function creating(Test $test){
            return $test->slug=str_slug($test->title);
    }
}