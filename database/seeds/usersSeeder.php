<?php

use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
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

            // default password is 'aaaaaaaa'
            ['id'=>'1', 'name'=>'stns', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'admin@gmail.com', 'role_id' =>'1', 'faculty_id'=> '0', 'phone'=>'95250676233','address'=>'ygn'],
            ['id'=>'2', 'name'=>'sithu', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'manager@gmail.com', 'role_id' =>'2', 'faculty_id'=> '0', 'phone'=>'959254490447','address'=>'ygn'],
            ['id'=>'3', 'name'=>'st', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'coordinator@gmail.com', 'role_id' =>'3', 'faculty_id'=> '1', 'phone'=>'959753272603','address'=>'ygn'],
            ['id'=>'4', 'name'=>'Sithu', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'student@gmail.com', 'role_id' =>'4', 'faculty_id'=> '1', 'phone'=>'959256809786','address'=>'ygn'],
            ['id'=>'5', 'name'=>'STNS', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'guest@gmail.com', 'role_id' =>'5',  'faculty_id'=> '0', 'phone'=>'959451839854','address'=>'ygn']
          

        );

        DB::table('users')->insert($objs);
    }
}
