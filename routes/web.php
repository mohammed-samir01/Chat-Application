<?php

use App\Http\Controllers\Conversations\ConversationsController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth','verified'])->group(function(){
    Route::get('/conversations',[ConversationsController::class,'index'])->name('conversations.index');
    Route::get('/conversations/create',[ConversationsController::class,'create'])->name('conversations.create');
    Route::get('/conversations/{conversation}',[ConversationsController::class,'show'])->name('conversations.show');

});


require __DIR__.'/auth.php';


