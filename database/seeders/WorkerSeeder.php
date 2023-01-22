<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Models\VideoRolling\Worker;
use Illuminate\Support\Facades\Crypt;
class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Worker::truncate();
        Worker::create([
            'first_name'=>'Vasya',
            'last_name'=>'Gavrilow',
            'mail'=>'gavrilow99@gmail.com',
            'password'=>Crypt::encryptString('secure'),
        ]);
        Worker::create([
            'first_name'=>'Gosha',
            'last_name'=>'Gavriloff',
            'mail'=>'gosha.gavriloff2018@ya.ru',
            'password'=>Crypt::encryptString('secure'),
        ]);
        //
    }
}
