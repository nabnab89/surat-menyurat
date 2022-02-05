<?php

namespace Database\Seeders;

use App\Models\Incoming;
use Illuminate\Database\Seeder;

class IncomingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = [
            'Surat ke Bali',
            'Surat ke Jogja',
            'Surat ke Surabaya',
            'Surat ke Jakarta',
            'Surat ke Dubai',
            'Surat ke USA',
            'Surat ke Malang',
            'Surat ke Sidoarjo',
        ];

        $letter = [
            'http://127.0.0.1:8000/teacher/dashboard',
        ];

        $id_type = [
            2,
        ];

        $id_admin = [
            1,
        ];

        $id_teacher = [
            1,
        ];

        $status = [
            0,
        ];

        for ($i = 0; $i < count($title); $i++) {
            $user = Incoming::create([
                'title'             => $title[$i],
                'letter'            => $letter[0],
                'id_type'           => $id_type[0],
                'id_admin'          => $id_admin[0],
                'id_teacher'        => $id_teacher[0],
                'status'            => $status[0],
            ]);
            $user->save();
        };
    }
}
