<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Models\VideoRolling\ProjectType;
class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectType::truncate();
        ProjectType::Create(
            ['name' => 'After Effects']
        );
        ProjectType::Create(['name' => 'Premiere Pro']);
        ProjectType::Create(['name' => 'Davinci Resolve']);
    }
}
