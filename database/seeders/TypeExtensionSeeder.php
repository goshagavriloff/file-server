<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Models\VideoRolling\TypeExtension;

class TypeExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeExtension::truncate();
        TypeExtension::Create(
            ['ext_id' => 1,'type_id'=>1]
        );
        TypeExtension::Create(
            ['ext_id' => 2,'type_id'=>1]
        );
        TypeExtension::Create(
            ['ext_id' => 3,'type_id'=>1]
        );
        TypeExtension::Create(
            ['ext_id' => 4,'type_id'=>1]
        );
        TypeExtension::Create(
            ['ext_id' => 5,'type_id'=>1]
        );  
                TypeExtension::Create(
            ['ext_id' => 6,'type_id'=>1]
        );  

        TypeExtension::Create(
            ['ext_id' => 7,'type_id'=>2]
        );
        TypeExtension::Create(
            ['ext_id' => 4,'type_id'=>2]
        );
        TypeExtension::Create(
            ['ext_id' => 5,'type_id'=>2]
        );
        TypeExtension::Create(
            ['ext_id' => 6,'type_id'=>2]
        );   
        TypeExtension::Create(
            ['ext_id' => 2,'type_id'=>2]
        );  
        TypeExtension::Create(
            ['ext_id' => 1,'type_id'=>2]
        );

        TypeExtension::Create(
            ['ext_id' => 8,'type_id'=>3]
        );
        TypeExtension::Create(
            ['ext_id' => 9,'type_id'=>3]
        );
        TypeExtension::Create(
            ['ext_id' => 5,'type_id'=>3]
        );
        TypeExtension::Create(
            ['ext_id' => 6,'type_id'=>3]
        ); 
        
        TypeExtension::Create(
            ['ext_id' => 10,'type_id'=>1]
        );
        TypeExtension::Create(
            ['ext_id' => 10,'type_id'=>2]
        );
        
        TypeExtension::Create(
            ['ext_id' => 10,'type_id'=>3]
        );
    }
}
