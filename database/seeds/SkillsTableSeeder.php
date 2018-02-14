<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills=["mind reading","flying","shapeshifting","eating","xrays"];
        foreach($skills as $skill){
            DB::table('skills')->insert([
                'skillname'=>$skill,
            ]);
        }
    }
}
