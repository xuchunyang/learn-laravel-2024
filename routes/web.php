<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\LearnkuTopic;
use App\Models\LolChampion;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/learnku', function () {
    return view('learnku', [
        'topics' => LearnkuTopic::latest()->get(),
    ]);
});

Route::get('/lol', function () {
    return view('lol', [
        'champions' => LolChampion::paginate(10),
        'champions2' => LolChampion::simplePaginate(10),
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
