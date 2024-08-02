<?php


use App\Models\post;
use App\Models\category;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\DetailsController;



use App\Http\Controllers\frontend\categoryController;
use App\Http\Controllers\frontend\comment_controller;
use App\Http\Controllers\frontend\FeedController;
use App\Http\Controllers\vendor\postManageController;
use App\Http\Controllers\frontend\subcategoryController;
use Database\Seeders\DatabaseSeeder;

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




// Homepage Frontend Homepage
Route::get('/category', [HomeController::class, 'index'])->name('home.category');

Route::get('/', [FeedController::class, 'index'])->name('home');

Route::get('/feed_load_data_posst', [FeedController::class, 'feed_load'])->name('feed_load_data_post');

// End Homepage Frontend Homepage


// Post & Category View
Route::get('category/{slug?}', [categoryController::class, 'index'])->name('category.index');

Route::get('category/{slug?}/subcategory/{subcategory?}', [subcategoryController::class, 'index'])->name('subcategory.index');
Route::get('subcategory/{id?}/{slug?}', [subcategoryController::class, 'index_subcategory'])->name('subcategory_by_id.index');


Route::get('category/{slug?}/subcategory/{subcategory?}/{post?}', [DetailsController::class, 'index'])->name('post.index');
Route::get('post/{slug}', [DetailsController::class, 'single_items'])->name('post.single');
// End Homepage Frontend Homepage


// ajax quick_services
Route::get('category_by_subcategory/{category_id}', [subcategoryController::class, 'category_by_subcategory'])->name('category_by_subcategory');
// end ajax quick services


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




// clear
Route::get('clear', function () {
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    toastr()->success('Successfully cleared', 'Congrats');
    return back();
});






// command access
Route::get('/migrate', function(){
    Artisan::call('migrate');
    toastr()->success('Successfully migrated', 'Congrats');
    return back();
});


Route::get('/migrate/seed', function(){
    $db_seeder = new DatabaseSeeder;
    $db_seeder->run();
    toastr()->success('Successfully seed', 'Congrats');
    return back();
});



Route::get('/route_list', function(){
    Artisan::call('route:list');
    toastr()->success('Successfully get route', 'Congrats');
    $data = Artisan::output();
    dd($data);
    return back();
});
// end command access





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


