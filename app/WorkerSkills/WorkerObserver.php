<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 02. 20.
 * Time: 10:02
 */

namespace App\WorkerSkills;

use App\Worker;
use App\Test;
use App\Point;
class WorkerObserver
{
    public function created(Worker $worker){

        $test=new Test();
        $test->title="worker created ".$worker->id;
        $test->save();

        $point=new Point();
        $point->worker_id=$worker->id;
        $point->point=0;
        $point->save();


    }
    public function deleted(Worker $worker){
        $test=new Test();
        $test->title="worker deleted ".$worker->id;
        $test->save();
    }
}