<?php

use App\Http\Livewire\Login;
use App\Http\Livewire\Modal;
use App\Http\Livewire\PostList;
use App\Http\Livewire\Registration;
use App\Http\Livewire\Welcome;
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



Route::get('/home', Welcome::class)->name('welcome');
Route::get('/post', PostList::class)->name('posts');

Route::get('/', Login::class)->name('login');
