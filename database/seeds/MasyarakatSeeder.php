<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Pemudik;


class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <= 100; $i++) {

            $data[] = [
                'no_hp' => '08778927'.$i,
                'nik' => $faker->nik,
                'nama' => $faker->name,
                'jenis_kelamin' => 'Laki-Laki',
                'usia' => '20',
                'hub_kekerabatan' => 'Orangtua',
                'pekerjaan' => 'Lainnya',
                'alamat' => $faker->address,
                'kd_Desa' => '3325010001',
                'password' => \Hash::make('123'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ];
        }

        $chunks = array_chunk($data, 10);
        foreach($chunks as $chunk){
            Pemudik::insert($chunk);
        }

        $this->command->info('User Berhasil Dibuat');
    }
}
