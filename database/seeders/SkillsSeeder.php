<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        Skill::create(['name'=>'jhdkslc']);
        Skill::create(['name'=>'klx;lc']);
        Skill::create(['name'=>'jlkl']);
        Skill::create(['name'=>'kl;l;l']);
        Skill::create(['name'=>'bhjjkl']);
    }
}
