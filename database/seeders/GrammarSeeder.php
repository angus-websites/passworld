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
        DB::table('grammar_wordtype')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Get the word types
        $adj=Wordtype::where('name', '=', 'Adjective')->firstOrFail();
        $verb=Wordtype::where('name', '=', 'Verb')->firstOrFail();
        $noun=Wordtype::where('name', '=', 'Noun')->firstOrFail();
        $part=Wordtype::where('name', '=', 'Participle')->firstOrFail();
        $adv=Wordtype::where('name', '=', 'Adverb')->firstOrFail();

        //------Create the grammars-------

        // Adj -> Verb -> Noun
        $g1=Grammar::create([]);
        $g1->language()->sync([
            ["wordtype_id"=>$adj->id, "order"=>1],
            ["wordtype_id"=>$verb->id, "order"=>2],
            ["wordtype_id"=>$noun->id, "order"=>3]
        ]);

        // Adj -> Part -> Noun
        $g2=Grammar::create([]);
        $g2->language()->sync([
            ["wordtype_id"=>$adj->id, "order"=>1],
            ["wordtype_id"=>$part->id, "order"=>2],
            ["wordtype_id"=>$noun->id, "order"=>3]
        ]);

        // Adj -> Adj -> Noun
        $g3=Grammar::create([]);        
        $g3->language()->sync([
            ["wordtype_id"=>$adj->id, "order"=>1],
            ["wordtype_id"=>$adj->id, "order"=>2],
            ["wordtype_id"=>$noun->id, "order"=>3]
        ]);

        // Adv -> Adj -> Noun
        $g4=Grammar::create([]);        
        $g4->language()->sync([
            ["wordtype_id"=>$adv->id, "order"=>1],
            ["wordtype_id"=>$adj->id, "order"=>2],
            ["wordtype_id"=>$part->id, "order"=>3],
            ["wordtype_id"=>$noun->id, "order"=>4]

        ]);






    }
}
