<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Utilisateurs;
use App\Http\Livewire\Articles;
use App\Http\Livewire\Classes\ClasseRooms;
use App\Models\Article;
use App\Http\Livewire\Students\Students;
use App\Http\Livewire\Inscriptions\Inscriptions;
use App\Models\TypeArticle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Le groupe des routes relatives aux administrateurs uniquement
Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){

    Route::group([
        "prefix" => "habilitations",
        'as' => 'habilitations.'
    ], function(){

        Route::get("/utilisateurs", Utilisateurs::class)->name("users.index");
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");
        //

    });

    Route::group([
        "prefix" => "articles",
        "as"     => "articles."   
    ], function(){
        Route::get('articles', Articles::class)->name('articles.index');
    });

    Route::group([
        "prefix" => "classes",
        "as"     => "classes."   
    ], function(){
        Route::get('classes', ClasseRooms::class)->name('index');
    });

    Route::group([
        "prefix" => "students",
        "as"     => "students."   
    ], function(){
        Route::get('liste', Students::class)->name('index');
    });

    Route::group([
        "prefix" => "students",
        "as"     => "inscriptions."   
    ], function(){
        Route::get('caisse', Inscriptions::class)->name('index');
    });


});


