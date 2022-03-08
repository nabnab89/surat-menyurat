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
            'Pembinaan Sekolah Adiwiyata',
        ];

        $letter = [
            asset('assets/test.pdf'),
        ];

        $id_type = [
            2,
        ];

        $id_admin = [
            1,
        ];

        $id_headmaster = [
            1,
        ];

        $number = [
            '005/034/405.07.3.23/2022'
        ];
        $letter_number = [
            '005/96/405.23/2022'
        ];
        $letter_date = [
            '2022-02-02'
        ];
        $from = [
            'Pemerintah kab. Ponorogo Dinas Lingkungan Hidup'
        ];
        $detail = [
            'Undangan pembinaan calon sekolah adiwiyata kabupate, calon sekolah adiwiyata provinsi, dan calon sekolah adiwiyata nasional tahun 2022'
        ];

        for ($i = 0; $i < count($title); $i++) {
            $user = Incoming::create([
                'title'             => $title[$i],
                'number'             => $number[$i],
                'letter_number'             => $letter_number[$i],
                'letter_date'             => $letter_date[$i],
                'from'             => $from[$i],
                'detail'             => $detail[$i],
                'letter'            => $letter[0],
                'id_type'           => $id_type[0],
                'id_admin'          => $id_admin[0],
                'id_headmaster'        => $id_headmaster[0]
            ]);
            $user->save();
        };
    }
}
