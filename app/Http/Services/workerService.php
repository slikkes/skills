<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Worker;
use App\Skill;
use App\Note;
use Cache;
use Carbon\Carbon;


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

       /* DB::table('notes')->insert([
            'worker_id' => request('worker_id'),
            'skill_id'=> request('skill_id'),
            'level'=>request('level'),
        ]);*/

           $note= new Note();
           $note->worker_id=request('worker_id');
           $note->skill_id=request('skill_id');
           $note->level=request('level');
           $note->save();

           return back();
    }

    public function changeNote()
    {

        $note=Note::find(request('id'));
        $note->level=request('level');
        $note->save();

        return back();

        /* DB::table('workers')
             ->where('id','=',request('worker_id'))
             ->update(['updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
         return back();}*/


    }

    public function newWorker($request){
        $request->validate([
            'number'=>'required',
            'surname'=>'required|max:20',
            'firstname'=>'required|max:20',

        ]);
        DB::table('workers')->insert([
            'number' => request('number'),
            'surname'=> request('surname'),
            'firstname'=> request('firstname'),
        ]);
        return back();
    }



    public function filter(){

        $skill_id=request('skill_id');

        if($skill_id[0]>0){

            $qwer=Worker::select('workers.*','notes.skill_id', 'notes.level')
                ->join('notes','workers.id','=','notes.worker_id')
                ->whereIn('notes.skill_id',request('skill_id'))
                ->whereBetween('notes.level',[request('minLevel'),request('maxLevel')])
                ->orderBy('notes.level','desc')
                ->get();

        }else{

            $qwer=Worker::all();
        }

        return $qwer;
    }

    public function deleteWorker(){
         Worker::find(request('id'))->delete();
         return back();
    }


}