<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\comment_controller;
use App\Http\Controllers\frontend\categoryController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\SubcategoryController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\vendor\postManageController;
use App\Http\Controllers\ViewProfileController;
use App\Models\category;
use App\Models\comment;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
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



// Sitemap
Route::get('/sitemap', function () {
    $sitemap = Sitemap::create(config('app.url'))
    ->add(Url::create('/'));
    // ->add(Url::create(''))

    category::all()->each(function (category $category) use ($sitemap) {
        $sitemap->add(Url::create("category/{$category->slug}")
        ->setLastModificationDate($category->updated_at));
    });

    Post::all()->each(function (Post $post) use ($sitemap) {
        $sitemap->add(Url::create("post/{$post->slug}")
        ->setLastModificationDate($post->updated_at));
    });
    $sitemap->writeToFile(public_path('../sitemap.xml'));

    toastr()->success('Successfully Sitemap Generated!', 'Congrats');
    return back();
    

});
// End Sitemap






// Homepage Frontend Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
// End Homepage Frontend Homepage


// Post & Category View
Route::get('category/{slug?}', [categoryController::class, 'index'])->name('category.index');
Route::get('category/{slug?}/subcategory/{subcategory?}', [SubcategoryController::class, 'index'])->name('subcategory.index');
Route::get('category/{slug?}/subcategory/{subcategory?}/{post?}', [SubcategoryController::class, 'view'])->name('post.index');
Route::get('post/{slug}', [SubcategoryController::class, 'single_items'])->name('post.single');
// End Homepage Frontend Homepage




// comment
Route::post('comment', [comment_controller::class, 'store'])->name('comment.post');
Route::get('comment', [comment_controller::class, 'index'])->name('comment.index');
Route::get('comment/update', [comment_controller::class, 'update'])->name('comment.update');


// SET AJAX Method Set
Route::get('/post_method_set', function(){
    return view('components.backend.post_method');
})->name('post_method_set');

Route::get('/put_method_set', function(){
    return view('components.backend.put_method');
})->name('put_method_set');

Route::get('/delete_method_set', function(){
    return view('components.backend.delete_method');
})->name('delete_method_set');
// END SET AJAX Method Set


// Authentic Routes
Auth::routes();
// End Authentic Routes


// Post Filter
Route::get('/search', [HomeController::class,'get_data_search'])->name('search_data');
// End Post Filter

//One User Another Profile Visit
Route::prefix('user')
        ->middleware('web')
        ->name('user.')
        ->group(function() {
            Route::get('/{id}/', [ViewProfileController::class, 'index'])->name('index');
            Route::get('/{id}/comment', [ViewProfileController::class, 'comment'])->name('comment');
            Route::get('/{id}/vote', [ViewProfileController::class, 'vote'])->name('vote');
            Route::get('/{id}/post', [ViewProfileController::class, 'post'])->name('post');
    });
//End One User Another Profile Visit


//One User and guest Post create
Route::prefix('user-post')
        ->middleware('web')
        ->name('user-post.')
        ->group(function() {
            Route::get('/post', [postManageController::class, 'create'])->name('post.create');
            Route::post('/post', [postManageController::class, 'store'])->name('post.store');
            Route::get('/post/{post}/edit', [postManageController::class, 'edit'])->name('post.edit');
            Route::put('/post/{post}', [postManageController::class, 'update'])->name('post.update');
            Route::get('/post/{post}', [postManageController::class, 'show'])->name('post.show');
            Route::get('/post/comment/{id}', [postManageController::class, 'comment'])->name('post.comment');
});
//End One User and guest Post create









// sslcommerz
// SSLCOMMERZ Start
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
