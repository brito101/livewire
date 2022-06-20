<?php

use App\Http\Livewire\ShowTweets;
use Illuminate\Support\Facades\Route;


Route::get('tweets', ShowTweets::class)->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
