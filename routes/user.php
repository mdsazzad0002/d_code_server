<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profile\voteController;
use App\Http\Controllers\profile\reportController;
use App\Http\Controllers\profile\commentController;
use App\Http\Controllers\profile\profileController;

use App\Http\Controllers\profile\postController as ProfilePostController;

/*
|--------------------------------------------------------------------------
| users oR pROFILE Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// Overview Page Profile

Route::get('/', [profileController::class, 'index'])->name('index');
Route::post('/profile_pic_change/', [profileController::class, 'profile_pic_change'])->name('profile_pic_change.index');
Route::post('/basic_info_update/', [profileController::class, 'basic_info_update'])->name('basic_info_update.index');

Route::get('/username_check/', [profileController::class, 'username_check'])->name('username_check.index');

Route::post('/quick_link_update/', [profileController::class, 'quick_link_update'])->name('quick_link_update.index');
Route::get('/quick_link_delete/', [profileController::class, 'quick_link_delete'])->name('quick_link_delete.index');


Route::get('profile/details/edit/{id}', [profileController::class, 'profile_details_edit'])->name('profile_details.edit');

Route::put('profile/details/update', [profileController::class, 'profile_details_update'])->name('profile_details.update');


Route::get('/comment/', [commentController::class, 'index'])->name('comment.index');

Route::get('/vote/', [voteController::class, 'index'])->name('vote.index');

Route::get('/posts/', [ProfilePostController::class, 'index'])->name('post.index');



Route::post('/report', [reportController::class, 'store'])->name('report.store');
