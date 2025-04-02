<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role "Admin" jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Ambil semua permission yang ada
        $permissions = Permission::pluck('name')->toArray();
        // Terapkan semua permission ke role Admin
        $adminRole->syncPermissions($permissions);

        echo "Role 'Admin' berhasil dibuat dan semua permission telah diberikan.\n";
    }
}
