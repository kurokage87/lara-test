<?php
use App\Test;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/test', 'TestController@index');
Route::get('/cobas', 'CobaController@index');
//tambah data melalui link secara otomatis
Route::get('/tambah', function()
{
    $test = new Test;
    $test->judul = 'Ini judul sob';
    $test->desc = 'Ya gtu dah isinya';
    $test->save();
});

//update data melalui link secara otomatis;
Route::get('/update', function()
{
    $test = Test::find(1); //ambil data dengan id 1
    $test->judul = "Dibilang ini judul";
    $test->desc = "Serah lu aja dah udah gw bilang juga apa";
    $test->save();
});

//munculkan data menggunakan route Link secara otomatis tanpa view
Route::get('/tampil', function()
{
    $test = Test::all(); //select data seluruhnya
    echo '<ul>';
    foreach ($test as $t) {
        echo "<li>";
        echo "Judul : ";
        echo $t->judul;
        echo "Deskripsi : ";
        echo $t->desc;
        echo "</li>";
    }
    echo '</ul>';
});

//hapus data dari link
Route::get('/hapus', function(){
    $test = Test::find(1);
    $test->delete;
});
Route::resource('coba', 'CobaController');