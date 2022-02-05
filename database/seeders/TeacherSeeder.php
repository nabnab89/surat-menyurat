<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Muhammad Inam Eka Pramuka',
            'Eka Novita Sari',
        ];

        $id_user = [
            '1',
            '2',
        ];

        $nip = [
            '193307001',
            '193307002',
        ];


        for ($i = 0; $i < count($name); $i++) {
            $user = Teacher::create([
                'name'             => $name[$i],
                'id_user'          => $id_user[$i],
                'nip'              => $nip[$i],
            ]);
            $user->save();
        };
    }
}
