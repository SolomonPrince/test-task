<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Test';
        $user->email = 'test@gmail.com';
        $user->merchant_key = 'KaTf5tZYHx4v7pgZ';
        $user->app_key = 'rTaasVHeteGbhwBx';
        $user->password = Hash::make('test1234');
        $user->save();
    }
}
