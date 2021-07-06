<?php

use App\Http\Controllers\Web\View3dController;
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

Route::get('/', function () {
    return redirect()->route('web.vie3d.index');
});

Route::name('web.')->group(function(){
    Route::get('view3d',[View3dController::class,'index'])->name('vie3d.index');
});
