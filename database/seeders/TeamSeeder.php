<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = new Team();
        $team->name = "Wahyu Nuzul Bahri";
        $team->role = "Programmer";
        $team->description = "<p>IG : @wahyubahri12</p>";
        $team->image = "20221005032256.jpg";
        $team->save();
    }
}
