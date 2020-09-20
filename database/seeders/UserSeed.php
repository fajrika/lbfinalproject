<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([[
            'name' => "Admin",
            'username' => "admin",
            'role' => 0,
            'password' => Hash::make('admin'),
        ], [
            'name' => "Gudang",
            'username' => "gudang",
            'role' => 1,
            'password' => Hash::make('gudang'),
        ]]);
    }
}
