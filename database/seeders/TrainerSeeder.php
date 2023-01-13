<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainer')->insert([
            [
                'nama'              => 'Rafi',
                'umur'              =>  28,
                'jadwal'            => '07.00 - 10.00',
                'created_at'        => date("Y-m-d H:i:s")
            ],
            [
                'nama'              => 'Rehan',
                'umur'              => '20',
                'jadwal'            => '10.00 - 13.00',
                'created_at'        => date("Y-m-d H:i:s")
            ],
            [
                'nama'              => 'Raisa',
                'umur'              => '23',
                'jadwal'            => '13.00 - 16.00',
                'created_at'        => date("Y-m-d H:i:s")
            ],
            [
                'nama'              => 'Udin',
                'umur'              => '30',
                'jadwal'            => '16.00 - 19.00',
                'created_at'        => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
