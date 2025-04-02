<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'daftar_listing', 'display_name' => 'Daftar Listing', 'group' => 'inventory'],
            ['name' => 'fasilitas_listing', 'display_name' => 'Fasilitas Listing', 'group' => 'inventory'],
            ['name' => 'fasilitas_umum', 'display_name' => 'Fasilitas Umum', 'group' => 'inventory'],
            ['name' => 'jenis_ruangan', 'display_name' => 'Jenis Ruangan', 'group' => 'inventory'],

            ['name' => 'kategori_bisnis', 'display_name' => 'Kategori Bisnis', 'group' => 'management_bisnis'],
            ['name' => 'tenant', 'display_name' => 'Tenant', 'group' => 'management_bisnis'],
            ['name' => 'bisnis_status', 'display_name' => 'Bisnis Status', 'group' => 'management_bisnis'],
            ['name' => 'item', 'display_name' => 'Item', 'group' => 'management_bisnis'],
            ['name' => 'bisnis', 'display_name' => 'Bisnis', 'group' => 'management_bisnis'],
            ['name' => 'invoice', 'display_name' => 'Invoice', 'group' => 'management_bisnis'],
            ['name' => 'document', 'display_name' => 'Document', 'group' => 'management_bisnis'],

            ['name' => 'pendapatan_total', 'display_name' => 'Pendapatan Total', 'group' => 'laporan'],
            ['name' => 'pendapatan_listing', 'display_name' => 'Pendapatan Listing', 'group' => 'laporan'],

            ['name' => 'account', 'display_name' => 'Account', 'group' => 'setting'],
            ['name' => 'role', 'display_name' => 'Role', 'group' => 'setting'],
            ['name' => 'permission', 'display_name' => 'Permission', 'group' => 'setting'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        echo "Berhasil membuat permission.\n";
    }
}
