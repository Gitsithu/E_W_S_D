<?php

use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $objs = array(

            
            ['id'=>'1', 'name'=>'admin', 'status'=>'1'],
            ['id'=>'2', 'name'=>'marketing_manager', 'status'=>'1'],
            ['id'=>'3', 'name'=>'marketing_coordinator', 'status'=>'1'],
            ['id'=>'4', 'name'=>'student', 'status'=>'1'],
            ['id'=>'5', 'name'=>'guest', 'status'=>'1']
           

        );

        DB::table('role')->insert($objs);
    }
    }

