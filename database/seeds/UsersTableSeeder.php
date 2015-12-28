<?php

use FlairBooks\User;
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
        factory(User::class)->create([
        	'first_name' => 'Binafew',
        	'last_name' => 'Kassa',
        	'email' => 'binalfew@example.com',
        	'password' => bcrypt('password')
        ]);
    }
}
