<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Writer;

class WritersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comicDatas = config("dbseeder.comics");

        for($i = 0; $i < count($comicDatas); $i++){
            $writersNames = $comicDatas[$i]["writers"];
            foreach($writersNames as $writerName){
                $writer = new Writer();
                $writer->comic_id = $i + 1;
                $writer->name = $writerName;
                $writer->save(); 
            }
        }
    }
}
