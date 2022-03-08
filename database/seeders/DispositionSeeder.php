<?php

namespace Database\Seeders;

use App\Models\Disposition;
use Illuminate\Database\Seeder;

class DispositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 1; $i++) {
            $user = Disposition::create([
                'id_incoming'           => $i,
                'letter'                => asset('assets/test.pdf'),
            ]);
            $user->save();
        };
    }
}
