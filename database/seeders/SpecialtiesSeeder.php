<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;
class SpecialtiesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        Specialty::create(['name'=>'jhdkslc']);
        Specialty::create(['name'=>'klx;lc']);
        Specialty::create(['name'=>'jlkl']);
        Specialty::create(['name'=>'kl;l;l']);
        
    }
}
