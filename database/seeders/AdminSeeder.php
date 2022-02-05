<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Hari Subagyo',
            'Mai Nur Arbain',
        ];

        $id_user = [
            '3',
            '4',
        ];

        $nip = [
            '193307003',
            '193307004',
        ];


        for ($i = 0; $i < count($name); $i++) {
            $user = Admin::create([
                'name'             => $name[$i],
                'id_user'          => $id_user[$i],
                'nip'              => $nip[$i],
            ]);
            $user->save();
        };
    }
}
