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

    public function workerData(){

        $skills=(new workerService)->setSkills();

        $workers=Worker::with('notes')->with('points')->get();

        return [$workers, $skills];
    }



    public function workerChange(Request $request)
    {


        switch ($request->type) {

            case "newNote":
                return (new workerService)->newNote();

            case "newWorker":
                return (new workerService)->newWorker($request);

            case "changeNote":
                (new workerService)->changeNote();
                break;

            case "modifyNawme":
                (new workerService)->modifyWorkerName();
                break;

            case "deleteWorker":
                Worker::find(request('id'))->delete();
                break;

            case "deleteNote":
                (new workerService)->deleteNote($request);
                break;
        }

    }

}