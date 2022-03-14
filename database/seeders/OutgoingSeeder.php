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
        $detail = [
            'Surat Undangan Komite',
            'Surat Undangan Pengambilan Rapot',
            'Surat Keterangan Rekomendasi',
        ];

        $number = [
            '005/001/405.07.3.23/2022',
            '005/002/405.07.3.23/2022',
            '422/003/405.07.3.23/2022',
        ];

        $to = [
            'Pengurus Komite',
            'Wali Muri',
            'Syadhach Amaliya',
        ];

        $letter = [
            asset('assets/test.pdf'),
            asset('assets/test.pdf'),
            asset('assets/surat_keterangan.pdf'),
        ];

        $id_type = [
            1,
            1,
            4
        ];

        $id_teacher = [
            1,
            2,
            null
        ];

        $id_student = [
            null,
            null,
            1
        ];

        $status = [
            0,
        ];

        for ($i = 0; $i < count($detail); $i++) {
            $user = Outgoing::create([
                'detail'            => $detail[$i],
                'number'            => $number[$i],
                'to'                => $to[$i],
                'letter'            => $letter[$i],
                'id_type'           => $id_type[$i],
                'id_teacher'        => $id_teacher[$i],
                'id_student'        => $id_student[$i],
                'status'            => $status[0],
            ]);
            $user->save();
        };
    }
}
