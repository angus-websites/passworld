<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Wordtype;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WordtypeSeeder extends Seeder
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
        Wordtype::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Verbs
        Wordtype::create([
          'name' => "Verb",
          'description' => "A word used to describe an action, state, or occurrence",
        ]);

        //Adjectives
        Wordtype::create([
          'name' => "Adjective",
          'description' => "A word naming an attribute of a noun",
        ]);

        //Nouns
        Wordtype::create([
          'name' => "Noun",
          'description' => "A noun is a word that functions as the name of a specific object or set of objects",
        ]);

        //Participles
        Wordtype::create([
          'name' => "Participle",
          'description' => "A participle is a nonfinite verb form that has some of the characteristics and functions of both verbs and adjectives",
        ]);

    }
}
