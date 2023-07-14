<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Livewire\Topik\Index as Topikindex;
use App\Http\Livewire\Topik\create as Topikcreate;
use App\Http\Livewire\Topik\edit as Topikedit;
use App\Http\Livewire\Rumpun\Index as Rumpunindex;
use App\Http\Livewire\Rumpun\create as Rumpuncreate;
use App\Http\Livewire\Rumpun\edit as Rumpunedit;
use App\Http\Livewire\Pustaka\Index as Pustakaindex;
use App\Http\Livewire\Pustaka\create as Pustakacreate;
use App\Http\Livewire\Pustaka\edit as Pustakaedit;
use App\Http\Livewire\Kategori\Index as Kategoriindex;
use App\Http\Livewire\Kategori\create as Kategoricreate;
use App\Http\Livewire\Kategori\edit as Kategoriedit;
use App\Http\Livewire\Cpl\Index as Cplindex;
use App\Http\Livewire\Cpl\create as Cplcreate;
use App\Http\Livewire\Cpl\edit as Cpledit;
use App\Http\Livewire\Matakuliah\Index as Matakuliahindex;
use App\Http\Livewire\Matakuliah\create as Matakuliahcreate;
use App\Http\Livewire\Matakuliah\edit as Matakuliahedit;
use App\Http\Livewire\Pertemuan\Index as Pertemuanindex;
use App\Http\Livewire\Pertemuan\create as Pertemuancreate;
use App\Http\Livewire\Pertemuan\edit as Pertemuanedit;
use App\Http\Livewire\RPS\Index as RPSindex;
use App\Http\Livewire\RPS\create as RPScreate;
use App\Http\Livewire\RPS\edit as RPSedit;
use App\Http\Livewire\RpsOnesubmit\Index as RpsOnesubmitindex;
use App\Http\Livewire\RpsOnesubmit\create as RpsOnesubmitcreate;

use App\Http\Livewire\RpsOnesubmit\Duplicates as RpsOnesubmitduplicates;
use App\Http\Livewire\Dosen\RpsOnesumbit\Create as DosenRpsOnesubmitcreate;
use App\Http\Livewire\Dosen\RpsOnesumbit\Index as DosenRpsOnesubmitindex;
use App\Http\Livewire\Dosen\RpsOnesumbit\Detail as DosenRpsOnesubmitdetail;
use App\Http\Livewire\RpsOnesubmit\Detail as RpsOnesubmitdetail;

use App\Http\Livewire\RpsOnesubmit\Myrps as RpsOnesubmitmyrps;
use App\Http\Livewire\RpsOnesubmit\edit as RpsOnesubmitedit;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['login'=>false,'register'=>false]);

route::middleware('guest')->group(function() {
    Route::get('/login',Login::class)->name('login');
    Route::get('/register',Register::class)->name('register');
});

Route::get('/topik/index',Topikindex::class)->name('topikindex');
Route::get('/topik/create',Topikcreate::class)->name('topikcreate');
Route::get('/topik/edit/{id}',Topikedit::class)->name('topikedit');

Route::get('/rumpun/index',Rumpunindex::class)->name('rumpunindex');
Route::get('/rumpun/create',Rumpuncreate::class)->name('rumpuncreate');
Route::get('/rumpun/edit/{id}',Rumpunedit::class)->name('rumpunedit');

Route::get('/pustaka/index',Pustakaindex::class)->name('pustakaindex');
Route::get('/pustaka/create',Pustakacreate::class)->name('pustakacreate');
Route::get('/pustaka/edit/{id}',Pustakaedit::class)->name('pustakaedit');

Route::get('/kategori/index',Kategoriindex::class)->name('kategoriindex');
Route::get('/kategori/create',Kategoricreate::class)->name('kategoricreate');
Route::get('/kategori/edit/{id}',Kategoriedit::class)->name('kategoriedit');

Route::get('/cpl/index',Cplindex::class)->name('cplindex');
Route::get('/cpl/create',Cplcreate::class)->name('cplcreate');
Route::get('/cpl/edit/{id}',Cpledit::class)->name('cpledit');

Route::get('/matakuliah/index',Matakuliahindex::class)->name('matakuliahindex');
Route::get('/matakuliah/create',Matakuliahcreate::class)->name('matakuliahcreate');
Route::get('/matakuliah/edit/{id}',Matakuliahedit::class)->name('matakuliahedit');

Route::get('/pertemuan/index',Pertemuanindex::class)->name('pertemuanindex');
Route::get('/pertemuan/create',Pertemuancreate::class)->name('pertemuancreate');
Route::get('/pertemuan/edit/{id}',Pertemuanedit::class)->name('pertemuanedit');

Route::get('/rps/index',RPSindex::class)->name('rpsindex');
Route::get('/rps/create',RPScreate::class)->name('rpscreate');
Route::get('/rps/edit/{id}',RPSedit::class)->name('rpsedit');

Route::get('/rpsonesubmit/index',RpsOnesubmitindex::class)->name('rpsonesubmitindex');
Route::get('/rpsonesubmit/create',RpsOnesubmitcreate::class)->name('rpsonesubmitcreate');


Route::get('/rpsonesubmit/duplicates',RpsOnesubmitduplicates::class)->name('rpsonesubmitduplicates');

Route::get('/dosenrpsonesubmit/create',DosenRpsOnesubmitcreate::class)->name('dosen.rpsonesubmitcreate');
Route::get('/dosenrpsonesubmit/index',DosenRpsOnesubmitindex::class)->name('dosen.rpsonesubmitindex');
Route::get('/dosenrpsonesubmit/detail/{id}',DosenRpsOnesubmitdetail::class)->name('dosen.rpsonesubmitdetail');

Route::get('/rpsonesubmit/detail/{id}',RpsOnesubmitdetail::class)->name('rpsonesubmitdetail');
// Route::get('/rpsonesubmit/detail/{id}',RpsOnesubmitdetail::class)->name('detail');

Route::get('/rpsonesubmit/myrps',RpsOnesubmitmyrps::class)->name('rpsonesubmitmyrps');
Route::get('/rpsonesubmit/edit/{id}',RpsOnesubmitedit::class)->name('rpsonesubmitedit');

Route::get('/redundancy', function() {
    return view('livewire/rps-onesubmit/redundancy');
})->name('redundancy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dosenhome', [App\Http\Controllers\HomeController::class, 'index2'])->name('dosenhome');
