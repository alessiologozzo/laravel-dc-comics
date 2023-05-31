<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comic;
use App\Models\Artist;
use App\Models\Writer;
use Faker\Generator as Faker;

use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;

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
    public function store(StoreComicRequest $request, Faker $faker)
    {
        $validated = $request->validated();

        $comic = new Comic();
        $comic->fill($validated);
        $comic->save();

        $random = rand(1, 3);
        for($i = 0; $i < $random; $i++){
            $artist = new Artist();
            $artist->name = $faker->name();
            $artist->comic_id = $comic->id;
            $artist->save();
        }

        $random = rand(1, 3);
        for($i = 0; $i < $random; $i++){
            $writer = new Writer();
            $writer->name = $faker->name();
            $writer->comic_id = $comic->id;
            $writer->save();
        }

        return redirect()->route("comics.show", $comic->id)->with("mex", "Fumetto creato con successo!");
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
    public function edit(Comic $comic)
    {
        return view("comics.edit", ["comic" => $comic, "links" => config("data.links"), "dcComics" => config("data.dcComics"), "shops" => config("data.shops"), "dcs" => config("data.dcs"), "sites" => config("data.sites"), "categories" => config("data.categories")]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $validated = $request->validated();

        $comic->update($validated);
        return redirect()->route("comics.show", $comic->id)->with("mex", "Fumetto modificato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route("home")->with("mex", "Fumetto eliminato con successo!");
    }
}
