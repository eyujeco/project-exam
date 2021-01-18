<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\TemplateController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get(
    '/dashboard',
    [PagesController::class,'home'],
    function() { return view('dashboard'); }
)->name('dashboard');

Route::get('create-thread',[TemplateController::class,'viewCreateThread']);
Route::post('create-thread',[TemplateController::class,'postThread']);

Route::get('thread/{slug}',[TemplateController::class,'viewThread'])->name('view_thread');
Route::delete('thread',[TemplateController::class,'deleteThread'])->name('delete_thread');
Route::get('{id}/edit',[TemplateController::class,'getEditThread'])->name('get_edit_thread');
Route::post('edit',[TemplateController::class,'saveEditThread'])->name('save_edit_thread');

Route::post('content',[TemplateController::class,'saveContent'])->name('save_content');
Route::delete('content',[TemplateController::class,'deleteContent'])->name('delete_content');
Route::post('editcontent',[TemplateController::class,'saveEditContent'])->name('save_edit_content');