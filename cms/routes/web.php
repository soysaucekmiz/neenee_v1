<?php

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

use App\Item;
use Illuminate\Http\Request; 

// ※テスト中
use App\User;

/*
|==========================================================================
| USER (MyPage)
|==========================================================================
*/

// マイページ（表示画面）
// Route::get('/mypage', 'UsersController@show'); // UsersControllerは未製作


/*
|==========================================================================
| ITEM
|==========================================================================
*/

/*
|--------------------------------------------------------------------------
| Create
|--------------------------------------------------------------------------
*/

// アイテム 作成 （画面）
Route::get('/items_create', 'ItemsController@create');

// アイテム 作成 （処理）
Route::post('/items/create', 'ItemsController@store');


/*
|--------------------------------------------------------------------------
| Read
|--------------------------------------------------------------------------
*/

// // 元のコード
// Route::get('/', function () {
//     return view('welcome');
    
// });

// ※テスト中
// neeneeのテスト用(その1)
// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', 'ItemsController@showIndex');

// neeneeのテスト用(その２)
Route::get('/new', function () {
    return view('new');
    
});

// ※テスト中
// neeneeのテスト用(アイテム詳細) // (プロフィールページ)
// Route::get('/items_detail_search', function () {
//     return view('items_detail_search');
// });
// Route::post('/items_detail_search/{items}', 'ItemsController@showDetail');
Route::get('/items_detail_search/{items}', 'ItemsController@showDetail');

// アイテム詳細出品（画面）
Route::get('/items_detail_sell/{items}', 'ItemsController@showDetailSell');

// ※テスト中
// neeneeのテスト用(購入画面)
// Route::get('/items_tran', function () {
//     return view('items_tran');
// });
Route::get('/items_tran/{items}', 'ItemsController@showTran');

// neeneeのテスト用(購入確認画面)
// Route::get('/items_tran_confirm', function () {
//     return view('items_tran_confirm');
// });
Route::get('/items_tran_confirm/{items}', 'ItemsController@showTranConfirm');

// neeneeのテスト用(チャットページ)
// Route::get('/chat', function () {
//     return view('chat');
// });
Route::get('/chat/{items}', 'ItemsController@showChat');

// neeneeのテスト用(ボイスチャットページ)
// Route::get('/call', function () {
//     return view('call');
// });
Route::get('/call/{items}', 'ItemsController@showCall');


// neeneeのテスト用(ビデオチャットページ)
// Route::get('/video', function () {
//     return view('video');
// });
Route::get('/video/{items}', 'ItemsController@showVideo');

// neeneeのテスト用(myページ)
Route::get('/mypage', function () {
    return view('mypage');
});
// Route::get('/mypage', function(User $user){
//   $user = Auth::user()->id;
//   return view('mypage', [
//       'user' => $user,
//       ]);
// });




// アイテム(一覧画面) = ホーム
Route::get('items_list_search', 'ItemsController@show');

// アイテム 一覧 出品 (画面) 
Route::get('/items_list_sell', 'ItemsController@showSellingItems');

// アイテム 一覧 購入 (画面) 
Route::get('/items_list_tran.', 'ItemsController@showPurchasedItems');




// 過去のやつ
// アイテム 一覧 購入 (read) 
/*
Route::get('/hoge', function(){
    // 
});
*/

// アイテム 詳細 検索 (read)
/*
Route::get('/hoge', function(){
    // 
});
*/

// あとで書く！
// アイテム 詳細 出品 (read) ※優先度低い
/*
Route::get('/hoge', function(){
    // 
});
*/

// あとで書く！
// アイテム 詳細 購入 (read) ※優先度低い
/*
Route::get('/hoge', function(){
    // 
});
*/


/*
|--------------------------------------------------------------------------
| Update
|--------------------------------------------------------------------------
*/

// アイテム 編集 出品 (画面)
Route::post('/items_edit/{items}', 'ItemsController@edit');

// アイテム 編集 出品 (処理)
Route::post('/items/update', 'ItemsController@update');


/*
|--------------------------------------------------------------------------
| Delete
|--------------------------------------------------------------------------
*/

// アイテム 削除 出品 (delete)
Route::post('/items/delete/{item}', 'ItemsController@destroy');

// 今回は対象外・・・
// アイテム 削除 購入 (delete) ※優先度低い
/* 
Route::post('/hoge', function(){
    // 
});
 */


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
