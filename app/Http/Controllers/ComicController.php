<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comic;
use App\Models\Artist;
use App\Models\Writer;
use Faker\Generator as Faker;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", ["comics" => $comics, "links" => config("data.links"), "dcComics" => config("data.dcComics"), "shops" => config("data.shops"), "dcs" => config("data.dcs"), "sites" => config("data.sites"), "categories" => config("data.categories")]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("comics.create", ["links" => config("data.links"), "dcComics" => config("data.dcComics"), "shops" => config("data.shops"), "dcs" => config("data.dcs"), "sites" => config("data.sites"), "categories" => config("data.categories")]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Faker $faker)
    {
        $validated = $request->validate([
            "title" => "required|max:255",
            "thumb" => "required",
            "description" => "required",
            "price" => "required|max:20",
            "series" => "required|max:100",
            "sale_date" => "required|date_format:Y/m/d"
        ]);

        $comic = new Comic();
        $comic->fill($request->all());
        $comic->save();
        $id = $comic->id;

        $random = rand(1, 3);
        for($i = 0; $i < $random; $i++){
            $artist = new Artist();
            $artist->name = $faker->name();
            $artist->comic_id = $id;
            $artist->save();
        }

        $random = rand(1, 3);
        for($i = 0; $i < $random; $i++){
            $writer = new Writer();
            $writer->name = $faker->name();
            $writer->comic_id = $id;
            $writer->save();
        }

        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        $artists = DB::table("artists")
                    ->select("artists.name")
                    ->join("comics", "artists.comic_id", "=", "comics.id")
                    ->where("artists.comic_id", "=", $comic->id)
                    ->get();

        $writers = DB::table("writers")
                    ->select("writers.name")
                    ->join("comics", "writers.comic_id", "=", "comics.id")
                    ->where("writers.comic_id", "=", $comic->id)
                    ->get();

        return view("comics.show", ["comic" => $comic, "artists" => $artists, "writers" => $writers, "links" => config("data.links"), "dcComics" => config("data.dcComics"), "shops" => config("data.shops"), "dcs" => config("data.dcs"), "sites" => config("data.sites")]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
