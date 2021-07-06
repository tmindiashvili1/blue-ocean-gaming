<?php

namespace Database\Seeders;

use App\Models\View3d;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         View3d::factory(100)->create();
    }
}
