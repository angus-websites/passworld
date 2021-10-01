<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Word;
use App\Models\Wordtype;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WordSeeder extends Seeder
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
        Word::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Get the word types
        $adj=Wordtype::where('name', '=', 'Adjective')->firstOrFail();
        $verb=Wordtype::where('name', '=', 'Verb')->firstOrFail();
        $noun=Wordtype::where('name', '=', 'Noun')->firstOrFail();
        $part=Wordtype::where('name', '=', 'Participle')->firstOrFail();


        //============Adjectives============
        Word::create([
            'content' => "big",
            'pres' => "3",
            'wordtype_id' => $adj->id,
        ]);
        Word::create([
            'content' => "large",
            'pres' => "3",
            'wordtype_id' => $adj->id,
        ]);
        Word::create([
            'content' => "little",
            'pres' => "3",
            'wordtype_id' => $adj->id,
        ]);
        Word::create([
            'content' => "old",
            'pres' => "4",
            'wordtype_id' => $adj->id,
        ]);
        Word::create([
            'content' => "wet",
            'pres' => "7",
            'wordtype_id' => $adj->id,
        ]);
        Word::create([
            'content' => "sharp",
            'pres' => "5",
            'wordtype_id' => $adj->id,
        ]);
        Word::create([
            'content' => "hairy",
            'pres' => "7",
            'wordtype_id' => $adj->id,
        ]);

        //============Nouns============
        Word::create([
            'content' => "skunk",
            'wordtype_id' => $noun->id,
        ]);
        Word::create([
            'content' => "clitoris",
            'wordtype_id' => $noun->id,
        ]);
        Word::create([
            'content' => "bubble",
            'wordtype_id' => $noun->id,
        ]);
        Word::create([
            'content' => "cock",
            'wordtype_id' => $noun->id,
        ]);
        Word::create([
            'content' => "golbin",
            'wordtype_id' => $noun->id,
        ]);
        Word::create([
            'content' => "horse",
            'wordtype_id' => $noun->id,
        ]);
        Word::create([
            'content' => "anus",
            'wordtype_id' => $noun->id,
        ]);

        //============Verbs============
        Word::create([
            'content' => "fart",
            'wordtype_id' => $verb->id,
        ]);
        Word::create([
            'content' => "piss",
            'wordtype_id' => $verb->id,
        ]);
        Word::create([
            'content' => "spunk",
            'wordtype_id' => $verb->id,
        ]);
        Word::create([
            'content' => "cum",
            'wordtype_id' => $verb->id,
        ]);
        Word::create([
            'content' => "sex",
            'wordtype_id' => $verb->id,
        ]);
        Word::create([
            'content' => "wank",
            'wordtype_id' => $verb->id,
        ]);

        //============Participles============
        Word::create([
            'content' => "fucking",
            'wordtype_id' => $part->id,
        ]);
        Word::create([
            'content' => "raging",
            'wordtype_id' => $part->id,
        ]);
        Word::create([
            'content' => "pulsating",
            'wordtype_id' => $part->id,
        ]);
        Word::create([
            'content' => "freezing",
            'wordtype_id' => $part->id,
        ]);

    }
}
