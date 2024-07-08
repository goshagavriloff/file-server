<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Models\VideoRolling\Extension;
class ExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Extension::truncate();
        Extension::Create(
            ['name' => 'png','size'=>500]
        );
        Extension::Create(
            ['name' => 'jpg','size'=>500]
        );
        Extension::Create(
            ['name' => 'aep','size'=>500]
        );
        Extension::Create(
            ['name' => 'mkv','size'=>500]
        );
        Extension::Create(
            ['name' => 'mp3','size'=>500]
        );  
                Extension::Create(
            ['name' => 'mp4','size'=>500]
        );  

        Extension::Create(
            ['name' => 'prproj','size'=>500]
        );

        Extension::Create(
            ['name' => 'drx','size'=>500]
        );
        Extension::Create(
            ['name' => 'drp','size'=>500]
        );
        
        Extension::Create(
            ['name' => 'zip','size'=>500]
        );

    }
}
