<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 50; $i++) {
            DB::table('mahasiswa')->insert([
                [
                    'Nim' => '194172' . $faker->randomNumber(4),
                    'Nama' => $faker->name(),
                    'Kelas' => 'TI-2G',
                    'Jurusan' => 'Teknologi Informasi',
                    'No_Handphone' => '08' . $faker->randomNumber(8),
                    'email' => $faker->email,
                    'tanggal_lahir' => $faker->date()
                ]
            ]);
        }
    }
}