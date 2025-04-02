<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'company_id' => Company::inRandomOrder()->first()->id,
        ]);

        $role = Role::inRandomOrder()->first();
        $user->syncRoles([$role->name]);

    }
}
