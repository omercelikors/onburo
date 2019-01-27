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
            'name' => "A.Ömer Çelikörs",
            'email' => 'omerr.celikors@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(1)->assignRole('admin');

        DB::table('users')->insert([
            'id' => 2,
            'name' => "R.Ömer Çelikörs",
            'email' => 'celikorsomerwebdev@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(2)->assignRole('recorder');

        DB::table('users')->insert([
            'id' => 3,
            'name' => "Test Deneme",
            'email' => 'testdeneme@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        App\User::find(3)->assignRole('recorder');
    }
}
