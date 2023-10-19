<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'nama' => 'Admin'
            ],
            [
                'id' => 2,
                'nama' => 'Seller'
            ],
            [
                'id' => 3,
                'nama' => 'Customer'
            ],
            [
                'id' => 99,
                'nama' => 'Guest'
            ],
        ];
        Role::query()->insert($roles);
    }
}
