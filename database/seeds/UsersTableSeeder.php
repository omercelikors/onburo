<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => "Hikmet",
            'email' => 'tsctomer@gmail.com ',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(1)->assignRole('admin');

        DB::table('users')->insert([
            'id' => 2,
            'name' => " Hikmet",
            'email' => 'hikmet.y@turkeystudycenter.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(2)->assignRole('admin');

        DB::table('users')->insert([
            'id' => 3,
            'name' => "Halil",
            'email' => 'halil.s@turkeystudycenter.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(3)->assignRole('admin');

        DB::table('users')->insert([
            'id' => 4,
            'name' => "Muhammet",
            'email' => 'marali@turkeystudycenter.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(4)->assignRole('admin');

        DB::table('users')->insert([
            'id' => 5,
            'name' => "Mesud Ahmadi",
            'email' => 'mesud.a@turkeystudycenter.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(5)->assignRole('recorder');

        DB::table('users')->insert([
            'id' => 6,
            'name' => "Fatma Dalla",
            'email' => 'fatma.d@turkeystudycenter.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(6)->assignRole('recorder');

        DB::table('users')->insert([
            'id' => 7,
            'name' => "A.Ömer Çelikörs",
            'email' => 'omerr.celikors@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(7)->assignRole('admin');

        DB::table('users')->insert([
            'id' => 8,
            'name' => "R.Ömer Çelikörs",
            'email' => 'celikorsomerwebdev@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(8)->assignRole('recorder');
    }
}
