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
            ['name' => 'png','type_id'=>1]
        );
        Extension::Create(
            ['name' => 'jpg','type_id'=>1]
        );
        Extension::Create(
            ['name' => 'aep','type_id'=>1]
        );
        Extension::Create(
            ['name' => 'mkv','type_id'=>1]
        );
        Extension::Create(
            ['name' => 'mp3','type_id'=>1]
        );  
                Extension::Create(
            ['name' => 'mp4','type_id'=>1]
        );  

        Extension::Create(
            ['name' => 'prproj','type_id'=>2]
        );
        Extension::Create(
            ['name' => 'mkv','type_id'=>2]
        );
        Extension::Create(
            ['name' => 'mp3','type_id'=>2]
        );
        Extension::Create(
            ['name' => 'mp4','type_id'=>2]
        );   
        Extension::Create(
            ['name' => 'jpg','type_id'=>2]
        );  
        Extension::Create(
            ['name' => 'png','type_id'=>2]
        );

        Extension::Create(
            ['name' => 'drx','type_id'=>3]
        );
        Extension::Create(
            ['name' => 'drp','type_id'=>3]
        );
        Extension::Create(
            ['name' => 'mp3','type_id'=>3]
        );
        Extension::Create(
            ['name' => 'mp4','type_id'=>3]
        ); 
        
        Extension::Create(
            ['name' => 'zip','type_id'=>1]
        );
        Extension::Create(
            ['name' => 'zip','type_id'=>2]
        );
        
        Extension::Create(
            ['name' => 'zip','type_id'=>3]
        );

    }
}
