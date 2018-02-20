<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($j=0; $j<10;$j++){

            $surname="";
            for($i=0;$i<8;$i++){
                $rnd=rand(97,122);
                $surname.=chr($rnd);
            }
            $firstname="";
            for($i=0;$i<8;$i++){
                $rnd=rand(97,122);
                $firstname.=chr($rnd);
            }

            DB::table('workers')->insert([
                'surname' => $surname,
                'firstname' => $firstname,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
