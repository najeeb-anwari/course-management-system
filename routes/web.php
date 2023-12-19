<?php

use App\Livewire\Instructors\InstructorCreate;
use App\Livewire\Instructors\InstructorEdit;
use App\Livewire\Instructors\InstructorList;
use App\Livewire\Instructors\InstructorView;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('instructors', InstructorList::class)->name('instructors.index');
        Route::get('instructors/create', InstructorCreate::class)->name('instructors.create');
        Route::get('instructors/edit/{instructor}', InstructorEdit::class)->name('instructors.edit');
        Route::get('instructors/{instructor}', InstructorView::class)->name('instructors.view');
        Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
