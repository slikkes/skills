<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Support\Facades\DB;
use App\Note;
use App\Worker;
use App\Point;
use App\WorkerSkills\NoteObserver;

use App\Http\Services\workerService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $skills=(new workerService)->setSkills();
        $qwer=Worker::select('workers.*','points.point')
            ->join('points','workers.id','=','points.worker_id')
            ->get();
        //->orderBy('points.point','desc')
    return view("testing")->with([
        'qwer'=>$qwer,
        'skills'=>$skills,]);

    }

    public function create(){
        //DB::table('tests')->insert(['title'=>'asdfasdf sdf serw fdgsdg']);
        $test=new Test();
        $test->title=request('test');

        $test->save();
       return response()->json(['response' => 'This is get method']);
    }

    public function delete(Request $request){
        //Test::first()->delete();
        Test::find(request('id'))->delete();
        return $request->all() ;
    }


    public function updatePoints(){


        $workerNumber=Worker::count();

        for($i=1;$i<=$workerNumber;$i++){

            $sum=Note::where('worker_id','=',$i)
                ->sum('level');

            $count=Note::where('worker_id','=',$i)
                ->count('level');

            $rank=$count*5*$sum;
            $point=new Point;
            $point->point=$rank;
            $point->save();


        }
    return "done";
    }


    public function promiseTest(){
        return request('data');
    }

}
