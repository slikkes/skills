<?php

use Illuminate\Database\Seeder;
use App\Note;
use App\Worker;
class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workerNumber=Worker::count();
        for($i=1;$i<$workerNumber;$i++){
            $skillNumber=rand(1,3);
            for($j=0;$j<$skillNumber;$j++){
                DB::table('notes')->insert([
                    'worker_id' => $i,
                    'skill_id'=> rand(1,5),
                    'level'=>rand(1,10),
                ]);
            }
        }
    }
}
