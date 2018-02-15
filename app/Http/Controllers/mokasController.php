<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Worker;
use Cache;
use App\Http\Services\workerService;

class mokasController extends Controller
{

    public function index(){

        $skills=(new workerService)->setSkills();
        $qwer=Worker::with('notes')->get();

        return view('asdf')->with([
            'qwer'=>$qwer,
            'skills'=>$skills,
            'asd'=>0,
            'revalue'=>[0,1,10]]);
    }

    //$request->type
    //
    //1 new skill
    //2 new card
    //3 filter
    //4 new skill confirm

    public function form(Request $request){
        $skills=(new workerService)->setSkills();
        $submit=$request->type;
        switch ($submit){
            case 1:
                return (new workerService)->newSkill();
            case 2:
                return (new workerService)->newCard($request);
            case 3:
                $qwer=(new workerService)->filter();
                return view('asdf')->with([
                    'qwer'=>$qwer,
                    'skills'=>$skills,
                    'revalue'=>[request('skill_id'),request('minLevel'),request('maxLevel')]]);
            case 4:
                return (new workerService)->changeSkill();
        }
    }

}