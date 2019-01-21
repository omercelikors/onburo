<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(ClassroomsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        // $this->call(InstallmentsTableSeeder::class);
    }
}
