<?php

namespace Database\Seeders;

use App\Models\Setup;
use Illuminate\Database\Seeder;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setup = new Setup;
        $setup->incoming_start = '035';
        $setup->outgoing_start = '035';
        $setup->periode = '2021/2022';
        $setup->save();
    }
}
