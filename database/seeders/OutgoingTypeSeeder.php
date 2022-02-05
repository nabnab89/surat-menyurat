<?php

namespace Database\Seeders;

use App\Models\OutgoingType;
use Illuminate\Database\Seeder;

class OutgoingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Surat Keterangan',
            'Surat Pengusulan Kenaikan Pangkat',
            'Surat Pengusulan Pensiun',
        ];

        foreach ($name as $data) {
            $user = OutgoingType::create([
                'name'             => $data,
            ]);
            $user->save();
        }
    }
}
