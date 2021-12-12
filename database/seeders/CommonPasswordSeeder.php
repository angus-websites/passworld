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

        $csvFile = fopen(base_path("csvData/common.csv"), "r");
        $firstline = true;
        $counter=-1;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                $counter+=1;
                CommonPassword::create([
                    'content' => $data['0'],
                    'pos' => $counter,
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);

    }
}
