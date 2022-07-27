<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        if(\DB::table('users')->where('email','superadmin@isbi.ac.id')->count() > 0)
        {
            return "Akun Sudah didaftarkan";
        }
        \DB::table('users')->insert([ [
                  'name' => $faker->name,
                  'email' => 'superadmin@isbi.ac.id',
                  'role' => 'admin',
                  'password' => Hash::make('12345678'),
                ]]);
    }
}
