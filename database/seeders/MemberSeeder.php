<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member')->insert([
            [
                'nama'              => 'Redho',
                'tinggi_badan'      => 174,
                'berat_badan'       => 70,
                'program_latihan'   => 'Dada & Lengan',
                'trainer_id'        => 2,
                'created_at'        => date("Y-m-d H:i:s")
            ],
            [
                'nama'              => 'Joko',
                'tinggi_badan'      => 165,
                'berat_badan'       => 50,
                'program_latihan'   => 'Menambah Berat Badan',
                'trainer_id'        => 1,
                'created_at'        => date("Y-m-d H:i:s")
            ],
            [
                'nama'              => 'Budi',
                'tinggi_badan'      => 180,
                'berat_badan'       => 100,
                'program_latihan'   => 'Menurunkan Berat Badan',
                'trainer_id'        => 4,
                'created_at'        => date("Y-m-d H:i:s")
            ],
            [
                'nama'              => 'Felicia',
                'tinggi_badan'      => 160,
                'berat_badan'       => 40,
                'program_latihan'   => 'Membentuk Massa Otot',
                'trainer_id'        => 3,
                'created_at'        => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
