<?php

namespace Database\Seeders;

use App\Models\Outgoing;
use Illuminate\Database\Seeder;

class OutgoingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = [
            'Surat Pengajuan Gol III/a',
            'Surat Keterangan Cuti Hamil',
        ];

        $letter = [
            asset('assets/test.pdf'),
        ];

        $id_type = [
            2,
            1
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
            $user = Outgoing::create([
                'title'             => $title[$i],
                'letter'            => $letter[0],
                'id_type'           => $id_type[$i],
                'id_admin'          => $id_admin[0],
                'id_teacher'        => $id_teacher[0],
                'status'            => $status[0],
            ]);
            $user->save();
        };
    }
}
