<?php

namespace Database\Seeders;

use App\Models\GamePlayer;
use Illuminate\Database\Seeder;

class GamePlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        GamePlayer::factory()->times(10)->create();
    }
}
