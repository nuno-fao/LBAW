<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'resources/sql/database.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Database seeded!');

        $path2 = 'resources/sql/populate.sql';
        DB::unprepared(file_get_contents($path2));
        $this->command->info('Database Populated!');
    }
}
