<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Models
use App\Models\Grammar;
use App\Models\Wordtype;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class GrammarSeeder extends Seeder
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
        Grammar::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Get the word types
        $adj=Wordtype::where('name', '=', 'Adjective')->firstOrFail();
        $verb=Wordtype::where('name', '=', 'Verb')->firstOrFail();
        $noun=Wordtype::where('name', '=', 'Noun')->firstOrFail();
        $part=Wordtype::where('name', '=', 'Participle')->firstOrFail();

        //Create the grammars
        $g1=Grammar::create([]);
        $g1->language()->sync([$adj->id => ["order"=>1],$part->id => ["order"=>2],$noun->id => ["order"=>3]]);

        $g2=Grammar::create([]);
        $g2->language()->sync([$adj->id => ["order"=>1],$verb->id => ["order"=>2],$noun->id => ["order"=>3]]);


    }
}
