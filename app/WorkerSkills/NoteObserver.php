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
use App\Point;

class NoteObserver{

    public function saved(Note $note){


        $this->updatePoints($note->worker_id);

    }

    public function created(Note $note){

        $test=new Test();
        $test->title="created".$note->worker_id;
        $test->save();


    }

    public function updated(Note $note){

        $test=new Test();
        $test->title="updated".$note->worker_id;
        $test->save();
    }

    public function deleted(Note $note){

        $test=new Test();
        $test->title="deleted".$note->worker_id;
        $test->save();

        $this->updatePoints($note->worker_id);
    }

    public function updatePoints($worker_id){


        $sum=Note::where('worker_id','=',$worker_id)
            ->sum('level');

        $count=Note::where('worker_id','=',$worker_id)
            ->count('level');

        $rank=$count*5*$sum;

        if (Point::find($worker_id)->exists()) {
            $point=Point::find($worker_id);
            $point->point=$rank;
            $point->save();
        }else{
            $point=new Point();
            $point->point=$rank;
            $point->save();
        }

    }
}

