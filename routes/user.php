<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\profile\voteController;
use App\Http\Controllers\profile\reportController;
use App\Http\Controllers\profile\commentController;

use App\Http\Controllers\profile\profileController;
use App\Http\Controllers\vendor\postManageController;
use App\Http\Controllers\profile\ViewProfileController;
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

// Route::get('/', [profileController::class, 'index'])->name('index');
Route::post('/profile_pic_change/', [profileController::class, 'profile_pic_change'])->name('profile_pic_change.index');
Route::post('/basic_info_update/', [profileController::class, 'basic_info_update'])->name('basic_info_update.index');

Route::get('/username_check/', [profileController::class, 'username_check'])->name('username_check.index');

Route::post('/quick_link_update/', [profileController::class, 'quick_link_update'])->name('quick_link_update.index');
Route::get('/quick_link_delete/', [profileController::class, 'quick_link_delete'])->name('quick_link_delete.index');


// Profile Details update
Route::get('{id}/details/edit/', [profileController::class, 'profile_details_edit'])->name('profile_details.edit');
Route::put('{id}/details/update/', [profileController::class, 'profile_details_update'])->name('profile_details.update');
Route::delete('{id}/comment/delete/', [commentController::class, 'comment_delete'])->name('comment.delete');


Route::get('/comment', [commentController::class, 'index'])->name('comment.index');

Route::get('/vote', [voteController::class, 'index'])->name('vote.index');

Route::get('/posts', [ProfilePostController::class, 'index'])->name('post.index');



Route::post('/report', [reportController::class, 'store'])->name('report.store');



// Profile  visiting route
Route::get('/',  function () {
    return redirect()->route('home');
});

Route::get('/{id}', [ViewProfileController::class, 'index'])->name('index');
Route::get('/{id}/comment', [ViewProfileController::class, 'comment'])->name('comment');
Route::get('/{id}/vote', [ViewProfileController::class, 'vote'])->name('vote');
Route::get('/{id}/post', [ViewProfileController::class, 'post'])->name('post');




// Delete route
Route::DELETE('/{id}/post/{post}', [postManageController::class, 'destroy'])->name('post.delete');

