<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users'];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
 
        $this->call(UsersTableSeeder::class);
        //$this->call(UsersTableSeeder::class);

        Model::reguard();
    }
}
