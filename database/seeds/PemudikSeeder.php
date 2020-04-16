<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PemudikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <= 5; $i++) {
            $user = new \App\Pemudik;
            $user->no_hp = $faker->unique()->phoneNumber ;
            $user->nik = $faker->nik;
            $user->nama = $faker->name;
            $user->jenis_kelamin = 'Laki-Laki';
            $user->nama = $faker->age;
            $user->hub_kekerabatan = 'Orangtua';
            $user->pekerjaan = 'Lainnya';
            $user->alamat = $faker->address;
            $user->kd_desa = '3326120008';
            $user->password = \Hash::make('123');
            $user->save();
        }


        $this->command->info('User Berhasil Dibuat');

    }
}
