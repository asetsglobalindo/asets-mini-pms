<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->insert([
            'id' => 1,
            'name' => 'Company Dummy',
            'phone' => '+6285893668749',
            'email' => 'raditprogrammer.asets@gmail.com',
            'address' => 'Jakarta, Indonesia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
