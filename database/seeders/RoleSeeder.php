<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Teacher',
            'Headmaster',
            'Admin',
            'Student',
        ];

        foreach ($name as $data) {
            $user = Role::create([
                'name'             => $data,
            ]);
            $user->save();
        }
    }
}
