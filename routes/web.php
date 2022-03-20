<?php

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





// ログインしていない時にアクセスできるアドレス
Route::middleware(['guest'])->group(function () {

    // 新規登録画面表示
    Route::get('/signup', 'App\Http\Controllers\AuthController@showSignup')->name('showSignup');

    // 新規登録処理
    Route::post('/signup/exeSignup', 'App\Http\Controllers\AuthController@exeSignup')->name('exeSignup');

    // ログイン画面表示
    Route::get('/', 'App\Http\Controllers\AuthController@showLogin')->name('showLogin');

    // ログイン処理
    Route::post('/login', 'App\Http\Controllers\AuthController@exeLogin')->name('exeLogin');

});


// ログインしている時にアクセスできるアドレス
Route::middleware(['auth'])->group(function () {

//ホーム画面（みんなの投稿一覧）表示
Route::get('home', 'App\Http\Controllers\BlogController@showAll')->name('home'); 

// 検索されたみんなの投稿一覧の表示
Route::post('home', 'App\Http\Controllers\BlogController@exeSearch')->name('search'); 

// みんなの投稿一覧の詳細を表示
Route::get('home/detail/{id}', 'App\Http\Controllers\BlogController@showDetail')->name('detail');

// 保存した投稿を表示
Route::get('home/stock', 'App\Http\Controllers\BlogController@showStock')->name('showStock'); 
// 保存した投稿詳細を表示
Route::get('home/stock/detail/{id}', 'App\Http\Controllers\BlogController@showStockDetail')->name('showStockDetail'); 

// 自分の投稿一覧を表示
Route::get('home/myMissLog', 'App\Http\Controllers\BlogController@showMyMissLog')->name('myMissLog'); 

// 自分の投稿の詳細を表示
Route::get('home/missLog/detail/{id}', 'App\Http\Controllers\BlogController@showMyDetail')->name('myDetail'); 


// 投稿登録画面を表示
Route::get('home/create', 'App\Http\Controllers\BlogController@showCreate')->name('create');

// 投稿登録
 Route::post('home/store', 'App\Http\Controllers\BlogController@exeStore')->name('store');

// 投稿編集画面を表示
Route::get('home/missLog/edit/{id}', 'App\Http\Controllers\BlogController@showEdit')->name('edit');

// 投稿内容更新
Route::post('home/missLog/update', 'App\Http\Controllers\BlogController@exeUpdate')->name('update');

// 投稿を削除
Route::post('home/missLog/delete/{id}', 'App\Http\Controllers\BlogController@exeDelete')->name('delete');
  
// ログアウト
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

// いいね機能
Route::get('home/detail/nice/{blog_id}', 'App\Http\Controllers\NiceController@exeNice')->name('nice');
Route::get('home/detail/unnice/{blog_id}', 'App\Http\Controllers\NiceController@exeUnnice')->name('unnice');

// ストック機能
Route::get('home/detail/stock/{blog_id}', 'App\Http\Controllers\StockController@exeStock')->name('stock');
Route::get('home/detail/unstock/{blog_id}', 'App\Http\Controllers\StockController@exeUnstock')->name('unstock');
});

// ログインに関係なくアクセスできるアドレス
Route::get('/help', function(){
    return view('help');
})->name('showHelp');