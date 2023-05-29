<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comicDatas = config("dbseeder.comics");

        for($i = 0; $i < count($comicDatas); $i++){
            $artistsNames = $comicDatas[$i]["artists"];
            foreach($artistsNames as $artistName){
                $artist = new Artist();
                $artist->comic_id = $i + 1;
                $artist->name = $artistName;
                $artist->save(); 
            }
        }
    }
}
