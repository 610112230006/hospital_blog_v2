<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\ShowController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::resource('user', UserController::class);
Route::resource('user', 'Api\UserController');

// Route::resource('category', CategoryController::class);
Route::resource('category', 'Api\CategoryController');

// Route::resource('sub-category', SubCategoryController::class);
Route::resource('sub-category', 'Api\SubCategoryController');

// Route::post('upload-image', [FileController::class,'uploadImg']);
Route::post('upload-image', 'Api\FileController@uploadImg');

// Route::post('upload-file', [FileController::class,'uploadFile']);
Route::post('upload-file', 'Api\FileController@uploadFile');


// Show
// Route::get('cont-new-home',[ShowController::class,'ShowNew']);
// Route::get('get-all-image',[ShowController::class,'ShowImgNew']);
// Route::get('subcate-by-cate/{id}',[ShowController::class,'ShowSubCateByCate']);
// Route::get('content-all-by-create',[ShowController::class,'ShowContentAllByCreate']);
// Route::get('content-by-user/{user_id}',[ShowController::class,'ShowContentByUser']);
// Route::get('get-image-by-user/{user_id}',[ShowController::class,'ShowImageByUser']);
// Route::get('get-content-by-id/{id_content}',[ShowController::class,'ShowContentById']);
// Route::get('get-image-by-idContent/{id_content}',[ShowController::class,'ShowImageByIdContent']);
// Route::post('check-permiss-detail-content',[ShowController::class,'CheckPermissDetailContent']);
// Route::get('del-one-image/{id_file}',[ShowController::class,'DelOneImage']);
// Route::get('del-one-file/{id_file}',[ShowController::class,'DelOneFile']);

Route::get('cont-new-home', 'Api\ShowController@ShowNew');
Route::get('get-all-image', 'Api\ShowController@ShowImgNew');
Route::get('subcate-by-cate/{id}', 'Api\ShowController@ShowSubCateByCate');
Route::get('subcate-by-cate-orderby/{id_cate}', 'Api\ShowController@ShowContentByCate');
Route::get('subcate-by-subcate-orderby/{id_subcate}', 'Api\ShowController@ShowContentBySubCate');

Route::get('content-all-by-create', 'Api\ShowController@ShowContentAllByCreate');
Route::get('content-by-user/{user_id}', 'Api\ShowController@ShowContentByUser');
Route::get('get-image-by-user/{user_id}', 'Api\ShowController@ShowImageByUser');
Route::get('get-content-by-id/{id_content}', 'Api\ShowController@ShowContentById');
Route::get('get-image-by-idContent/{id_content}', 'Api\ShowController@ShowImageByIdContent');
Route::get('get-image-by-cate/{id_cate}', 'Api\ShowController@ShowImageByIdCate');
Route::get('get-image-by-subcate/{id_subcate}', 'Api\ShowController@ShowImageByIdSubCate');
Route::get('check-permiss-detail-content', 'Api\ShowController@CheckPermissDetailContent');
Route::get('push-statistic/{id_content}', 'Api\ShowController@PushStatis');
Route::get('get-statistic-all', 'Api\ShowController@ShowStatisAll');
Route::get('get-statistic-by-content/{id_content}', 'Api\ShowController@ShowStatisByContent');
Route::get('del-one-image/{id_file}', 'Api\ShowController@DelOneImage');
Route::get('del-one-file/{id_file}', 'Api\ShowController@DelOneFile');
Route::get('get-one-cate/{id_cate}', 'Api\ShowController@ShowOneCate');
Route::get('get-one-subcate/{id_subcate}', 'Api\ShowController@ShowOneSubCate');