<?php
/**
 * Created by PhpStorm.
 * User: Fodor István
 * Date: 2018. 02. 16.
 * Time: 8:11
 */
namespace App\WorkerSkills;

use App\Note;
use App\Worker;
use App\Test;

class NoteObserver{

    public function saved(Note $note){


        $this->updateWorker($note->worker_id);

    }

    public function created(Note $note){

        $test=new Test();
        $test->title=$note->worker_id."created";
        $test->save();


    }

    public function updated(Note $note){
        $test=new Test();
        $test->title="updated".$note->worker_id;
        $test->save();
    }

    public function deleted(Note $note){
        $test=new Test();
        $test->title=$note->worker_id."deleted";
        $test->save();

        $this->updateWorker($note->worker_id);
    }

    public function updateWorker($worker_id){


        $sum=Note::where('worker_id','=',$worker_id)
            ->sum('level');

        $count=Note::where('worker_id','=',$worker_id)
            ->count('level');

        $rank=$count*5*$sum;
        $worker=Worker::find($worker_id);
        $worker->number=$rank;
        $worker->save();

    }
}

