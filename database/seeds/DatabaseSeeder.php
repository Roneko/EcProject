<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '管理者',
            'email' => 'info@eterein.com',
            'password' => bcrypt('201777'),
        ]);

        $this->call(ItemTableSeeder::class);
        }
}
