<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Support\Facades\DB;
use App\Note;
use App\Worker;
use App\WorkerSkills\NoteObserver;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){


        $note=new Note();
        $note=Note::where()


        Note::where([
            ['worker_id', '=', request('worker_id')],
            ['skill_id', '=', request('skill_id')],
        ])->update(['level' => request('level')]);


    }

    public function create(){
        DB::table('tests')->insert(['title'=>'asdfasdf sdf serw fdgsdg']);
       /* $test=new Test();
        $test->title="asdfasdf asdf sdf erew wa ssdf";

        $test->save();*/
    }

    public function testfunction(Illuminate\Http\Request $request)
    {
        if ($request->isMethod('post')){
            return response()->json(['response' => 'This is post method']);
        }

        return response()->json(['response' => 'This is get method']);
    }
}
