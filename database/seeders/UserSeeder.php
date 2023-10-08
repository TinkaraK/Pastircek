<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::query()->create([
            "name" => "Tinkara Admin",
            "email" => "tinkara.dev@gmail.com",
            "password" => Hash::make("test1234")
        ]);

        $admin->assignRole("super_admin");

        $userMarko = User::query()->create([
            "name" => "Marko Končan",
            "email" => "marko@varikon.com",
            "password" => Hash::make("test1234"),
            "farm_id" => 1
        ]);

        $userMarko->assignRole("user");

        $userTinkara = User::query()->create([
            "name" => "Tinkara User",
            "email" => "tinkara.koncan@gmail.com",
            "password" => Hash::make("test1234"),
            "farm_id" => 1
        ]);

        $userTinkara->assignRole("user");


    }
}
