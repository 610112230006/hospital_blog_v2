<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});

Route::get('forgett-password', [ForgotCustom::class, 'showForgetPasswordForm']);
Route::post('forgett-password', [ForgotCustom::class, 'submitForgetPasswordForm']);
Route::get('reset-password/{token}', [ForgotCustom::class, 'showResetPasswordForm']);
Route::post('resett-password', [ForgotCustom::class, 'submitResetPasswordForm']);


Route::get('/auth-user', function () {
    return response()->json(Auth::user());
});


Route::get('/user', function () {
    return view('pages.admin.user.manage-user');
});
Route::get('/edit-user', function () {
    if (isset($_GET['id_user'])) {
        return view('pages.admin.user.edit-user')->with('id_user', $_GET['id_user']);
    }
});
Route::get('/user-create', function () {
    return view('pages.admin.user.create-user');
});

Route::get('/user-edit-personal', function () {
    return view('pages.user-edit-personal');
});
Route::get('/content-create', function () {
    return view('pages.content.create-content');
});
Route::get('/manage-content', function () {
    return view('pages.content.manage-content');
});
Route::get('/contact', function () {
    return view('pages.contact');
});


Route::get('/delete-content/{id_content}', 'Api\ContentController@destroy');
Route::get('/edit-content', 'Api\ContentController@edit');
Route::get('/detail-content', 'DetailController@show_detail');


Route::post('/content', 'Api\ContentController@store');
Route::post('/update-content/{id_content}', 'Api\ContentController@update');


Auth::routes();

Route::get('/manage-category', function () {
    return view('pages.admin.category.manage-category');
});


Route::get('/content-by-cate','ShowController@ShowContentByCate');
Route::get('/content-by-subcate','ShowController@ShowContentBySubCate');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
