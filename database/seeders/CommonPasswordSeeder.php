<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\CommonPassword;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommonPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Clear data
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        CommonPassword::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Create the Common password
        CommonPassword::create([
            'content' => "1234",
            'pos' => "1",
        ]);
        CommonPassword::create([
            'content' => "Password123",
            'pos' => "2",
        ]);
        CommonPassword::create([
            'content' => "qwerty",
            'pos' => "3",
        ]);
        CommonPassword::create([
            'content' => "iloveyou",
            'pos' => "4",
        ]);
        CommonPassword::create([
            'content' => "ashley",
            'pos' => "5",
        ]);

    }
}
