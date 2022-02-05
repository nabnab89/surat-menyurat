<?php

namespace Database\Seeders;

use App\Models\IncomingType;
use Illuminate\Database\Seeder;

class IncomingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Surat Perjanjian Kerja Sama',
            'Surat Dinas',
            'Surat Undangan',
        ];

        foreach ($name as $data) {
            $user = IncomingType::create([
                'name'             => $data,
            ]);
            $user->save();
        }
    }
}
