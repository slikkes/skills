<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Worker;
use App\Test;
use App\Note;
use App\Point;
use Cache;
use App\Http\Services\workerService;

class workersController extends Controller
{

    public function index(){

        $skills=(new workerService)->setSkills();
       // $qwer=Worker::with('notes')->with('points')->get();
        $qwer=Worker::select('workers.*','points.point')
            ->join('points','workers.id','=','points.worker_id')
            ->orderBy('points.point','desc')->get();

       // return response()->json($qwer);
        return view('asdf')->with([
            'qwer'=>$qwer,
            'skills'=>$skills,
            'asd'=>0,
            'revalue'=>[0,1,10]]);
    }

    //$request->type
    //
    //1 new note
    //2 new card
    //3 filter
    //4 new skill confirm
    //5 modify workername

    public function form(Request $request){
        $skills=(new workerService)->setSkills();
        $submit=$request->type;
        switch ($submit){
            case 1:
                return (new workerService)->newNote();
                //return $request->all();
            case 2:
                return (new workerService)->newWorker($request);
            case 3:
                $qwer=(new workerService)->filter();
                return view('asdf')->with([
                    'qwer'=>$qwer,
                    'skills'=>$skills,
                    'revalue'=>[request('skill_id'),request('minLevel'),request('maxLevel')]]);
            case 4:
                return (new workerService)->changeNote();
            case 5:
                return (new workerService)->modifyWorkerName();

        }
    }

    public function deleteWorker(Request $request){
        Worker::find(request('id'))->delete();

    }

    public function deleteNote(Request $request){
        Note::find(request('id'))->delete();
        $point=Point::find(request('worker_id'));
        return $point->point;
        //return $request->all();
    }





    public function test (Request $request){
        return $request->all();
    }

}