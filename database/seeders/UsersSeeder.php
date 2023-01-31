<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'admin',
            'email' => 'admin_hrm@eclick.hu',
            'password' => 'admin',
            'position' => 'admin'
        ];

        User::create($admin);
    }
}
