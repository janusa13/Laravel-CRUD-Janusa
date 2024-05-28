<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lessons')->insert([
            'lessons'=>0,
            'promocion'=>0,
            'regular'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
