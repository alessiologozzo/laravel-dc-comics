<?php

use App\Http\Controllers\ComicController;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home', ["links" => config("data.links"), "categories" => config("data.categories"), "dcComics" => config("data.dcComics"), "shops" => config("data.shops"), "dcs" => config("data.dcs"), "sites" => config("data.sites")]);
// })->name("home");

Route::get("/", [ComicController::class, "index"])->name("home");

Route::resource("/comics", ComicController::class);
