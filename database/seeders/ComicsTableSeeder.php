<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comicDatas = config("dbseeder.comics");

        foreach($comicDatas as $comicData){
            $comic = new Comic;
            $comic->title = $comicData["title"];
            $comic->description = $comicData["description"];
            $comic->thumb = $comicData["thumb"];
            $comic->price = $comicData["price"];
            $comic->series = $comicData["series"];
            $comic->sale_date = $comicData["sale_date"];
            $comic->type = $comicData["type"];
            $comic->save();
        }

    }
}
