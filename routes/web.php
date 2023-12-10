<?php

use App\Livewire\OrderEntry;
use App\Livewire\OrderRecipients;
use App\Livewire\OrderSummary;
use App\Livewire\Welcome;
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

Route::get('/', Welcome::class);

//order stuff
Route::get('/order/entry', OrderEntry::class);
Route::get('/order/recipients', OrderRecipients::class);
Route::get('/order/summary', OrderSummary::class);
