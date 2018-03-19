<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Worker;
use App\Skill;
use App\Note;
use App\Point;
use Cache;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class workerService
{

    public function setSkills(){

        if ((Cache::has('skills'))) {
            return Cache::get('skills');
        }else{
            $query=Skill::all();
            Cache::put('skills', $query,1);
            return $query;
        }
    }



    public function newNote(){

           $note= new Note();
           $note->worker_id=request('worker_id');
           $note->skill_id=request('skill_id');
           $note->level=request('level');
           $note->save();

           $point=Point::find(request('worker_id'));
           $response=[$note->id, $point->point];

           return $response;
    }


    public function changeNote(){

        $note=Note::find(request('id'));
        $note->level=request('level');
        $note->save();

    }


    public function newWorker($request){

        $worker = new Worker();
        $worker->surname = request('surname');
        $worker->firstname = request('firstname');
        $worker->save();

        return $worker->id;
    }


    public function modifyWorkerName(){

        $worker=Worker::find(request('id'));
        $worker->surname=request('surname');
        $worker->firstname=request('firstname');
        $worker->save();
    }


    public function deleteNote(Request $request){

        Note::find(request('id'))->delete();
        $point=Point::find(request('worker_id'));

        return $point->point;
    }
}