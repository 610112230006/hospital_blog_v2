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


Route::resource('user', 'Api\UserController');

Route::resource('category', 'Api\CategoryController');

Route::resource('sub-category', 'Api\SubCategoryController');

Route::post('upload-image', 'Api\FileController@uploadImg');
Route::post('upload-file', 'Api\FileController@uploadFile');
Route::post('upload-popup', 'Api\FileController@uploadPopup');
Route::post('upload-slide', 'Api\FileController@uploadSlide');
// Show


Route::get('cont-new-home', 'Api\ShowController@ShowNew');
Route::get('get-job-home', 'Api\ShowController@ShowJob');
Route::get('get-all-image', 'Api\ShowController@ShowImgNew');
Route::get('subcate-by-cate/{id}', 'Api\ShowController@ShowSubCateByCate');
Route::get('subcate-by-cate-orderby/{id_cate}', 'Api\ShowController@ShowContentByCate');
Route::get('subcate-by-subcate-orderby/{id_subcate}', 'Api\ShowController@ShowContentBySubCate');

Route::get('content-all-by-create', 'Api\ShowController@ShowContentAllByCreate');
Route::get('content-by-user/{user_id}', 'Api\ShowController@ShowContentByUser');
Route::get('get-image-by-user/{user_id}', 'Api\ShowController@ShowImageByUser');
Route::get('get-content-by-id/{id_content}', 'Api\ShowController@ShowContentById');
Route::get('get-image-by-idContent/{id_content}', 'Api\ShowController@ShowImageByIdContent');
Route::get('get-image-all', 'Api\ShowController@ShowImageAll');
Route::get('get-image-by-cate/{id_cate}', 'Api\ShowController@ShowImageByIdCate');
Route::get('get-image-by-subcate/{id_subcate}', 'Api\ShowController@ShowImageByIdSubCate');
Route::get('get-img-job-home', 'Api\ShowController@ShowImageJob');
Route::get('check-permiss-detail-content', 'Api\ShowController@CheckPermissDetailContent');
Route::get('push-statistic/{id_content}', 'Api\ShowController@PushStatis');
Route::get('get-statistic-all', 'Api\ShowController@ShowStatisAll');
Route::get('get-statistic-by-content/{id_content}', 'Api\ShowController@ShowStatisByContent');
Route::get('del-one-image/{id_file}', 'Api\ShowController@DelOneImage');
Route::get('del-one-file/{id_file}', 'Api\ShowController@DelOneFile');
Route::get('get-one-cate/{id_cate}', 'Api\ShowController@ShowOneCate');
Route::get('get-one-subcate/{id_subcate}', 'Api\ShowController@ShowOneSubCate');
Route::get('get-sub-cate-doc', 'Api\ShowController@ShowDocumentAll');
Route::get('get-content-doc/{id_subcontent}', 'Api\ShowController@ShowContentDoc');
Route::get('get-file-by-subcate/{id_subcate}', 'Api\ShowController@ShowFileBySubcate');
Route::get('get-add-sum-read', 'Api\ShowController@ShowAddSumRead');
Route::get('get-read-to-day', 'Api\ShowController@ShowReadToDay');
Route::get('get-read-to-mount', 'Api\ShowController@ShowReadToMount');
Route::get('get-read-to-all', 'Api\ShowController@ShowReadToAll');
Route::post('search-content', 'Api\ShowController@SearchContent');
Route::post('search-content-by-admin', 'Api\ShowController@SearchContentByAdmin');
Route::post('search-content-by-user', 'Api\ShowController@SearchContentByUser');

Route::get('get-img-popup', 'Api\ShowController@ShowImgPopup');
Route::get('get-img-slide', 'Api\ShowController@ShowImgSlide');