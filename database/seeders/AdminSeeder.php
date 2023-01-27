<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
         User::create(['email'=>'admin@admin.com','password'=>bcrypt('123456789'),'name'=>'admin','role'=>'admin']);
    }
}
