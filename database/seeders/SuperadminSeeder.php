<?php

namespace Database\Seeders;

use App\Models\Superadmin;
use Illuminate\Database\Seeder;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Indri Riani',
        ];

        $id_user = [
            '7',
        ];

        $nip = [
            '193307000',
        ];


        for ($i = 0; $i < count($name); $i++) {
            $user = Superadmin::create([
                'name'             => $name[$i],
                'id_user'          => $id_user[$i],
                'nip'              => $nip[$i],
            ]);
            $user->save();
        };
    }
}
