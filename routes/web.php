<?php

use Illuminate\Support\Facades\Route;

//
//
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
Route::get('/setup', function(){
    $credentials = [
        'email' => "admin@admin.com",
        'password' => 'admin'
    ];
    if(!Auth::attempt($credentials)){
        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();
    }
    if(Auth::attempt($credentials)){
        $user = Auth::user();
        $adminToken = $user->createToken('admin-token',['create','update','delete']);
        $updateToken = $user->createToken('update-token',['create','update']);
        $basicToken = $user->createToken('basic-token');
        return[
            'admin' => $adminToken->plainTextToken,
            'update' => $updateToken->plainTextToken,
            'basic' => $basicToken->plainTextToken,
        ];
    }
});
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/portfolio', 'PortfolioController@index')->name('portfolio');
Route::view('/contact', 'contact')->name('contact');
//Route::view('/portfolio', 'portfolio')->name('portfolio');
//Route::resource('projects', 'ProjectController');
//Route::resource('projects', 'ProjectController')->only(['index', 'show']);
//Route::resource('projects', 'ProjectController')->except(['index', 'show']);

//Route::get('/', function () {
//    return view('home');
//})->name('home');


//Route::get('contactame', function () {
//    return "Seccion de contactos";
//})->name('contactos');

//Route::get('/', function () {
//    echo "<a href='" . route('contactos') . "'>Contactos 1</a><br>";
//    echo "<a href='" . route('contactos') . "'>Contactos 2</a><br>";
//   echo "<a href='" . route('contactos') . "'>Contactos 3</a><br>";
//   echo "<a href='" . route('contactos') . "'>Contactos 4</a><br>";
//    echo "<a href='" . route('contactos') . "'>Contactos 5</a><br>";
//});

//Route::get('saludo/{nombre?}', function ($nombre = "Invitado") {
//    return "Saludos " . $nombre;
//});
//Route::get('/', function () {
//    return "Hola desde la pagina de inicio";
//});

//Route::get('/contacto', function () {
//    return "Hola desde la pagina de contacto";
//});
//Route::get():
//Route::post();
//Route::put();
//Route::patch();
//Route::delete();
