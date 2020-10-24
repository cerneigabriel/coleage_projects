<?php

namespace Database\Seeds;

// Core
use App\Classes\Core\Seeds;
use Database\Seeds\QuestionsSeeder;

class Seeder extends Seeds
{
    public static function run()
    {
        QuestionsSeeder::run();
    }
}
