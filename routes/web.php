<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard2Controller;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AbsenController;

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

//ini aawal route dari chesa, kalau ada apa apa balik ke sini karena semua aman sampe console log
Route::get('/chesa', function () {
    return view('welcome');
});
//sampe sini

Route::get('/', function () {
    return view('about.index');
});

//halaman utama ('/') adalah tempat absen, kalau belom login diarahkan ke about aja
//mulai buat lagi route absen, jadi home nya akan berisni info tentang girisa aja
Route::get('/absen', [AbsenController::class, 'index'])->middleware('auth');
Route::post('/absen', [AbsenController::class, 'submitabsen'])->middleware('auth');

// Route::get('/register', function () {
//     return view('register');
// });

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', [AboutController::class, 'index']);

//halaman dashboard untuk mlihat hasil absen

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth','role:admin']);
Route::post('/dashboard', [DashboardController::class, 'pilihTanggal'])->middleware(['auth','role:admin']);
Route::get('/dashboard2', [Dashboard2Controller::class, 'index'])->middleware(['auth','role:admin']);
Route::post('/dashboard2', [Dashboard2Controller::class, 'pilihUser'])->middleware(['auth','role:admin']);

//upload ke git hub atau update
// git add .
// git commit -m "First commit"
// git push


// ----------------SOP------------------
// 1. backup code first by adding "_backup" at their name before the "." (dot)




// ----------------Tutorial------------------
// 1. Push (setelah mengedit, di up lagi)
// click git icon in left bar (bellow search icon)
// write your commit massage, and click check
// click the three dot icon, and select "push"
// insert the url of git repo (for now: https://github.com/ememdeee/Absensi_Madrasah)
// done 




// ----------------What to do------------------
// 1. Make sure the time is correct in the dashboard (waktu datang dan pulang) its look like something wrong (https://share.getcloudapp.com/rRu5k8Pb)
// 2. delete tabel that not necessary (istirahat setelah istirahat)




// ----------------What we done------------------
// 1. up to github
// 2. remove the "jarak" 
// 2. remove tabel in view dashboard and dashboard advanced