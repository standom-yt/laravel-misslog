<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MissLogFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\User;
use App\Models\Stock;
use App\Models\Nice;

class BlogController extends Controller
{
    /**
     * みんなの投稿一覧を表示する
     * 
     * return view
     */

    function showAll(){
        $blogs = Blog::orderBy('updated_at', 'desc')->simplePaginate(13);
        $search = "";
        return view('login.home', compact('blogs', 'search'));
    }

    /**
     * 検索されたみんなの投稿一覧を表示する
     * 
     * @param str $search
     * return view
     */

    function exeSearch(Request $request){
        $search = $request->search;
        $blogs = Blog::where('title', 'like', '%' . $search . '%')->orWhere('content_a', 'like', '%' . $search . '%')->orWhere('content_b', 'like', '%' . $search . '%')->orWhere('content_c', 'like', '%' . $search . '%')->orderBy('updated_at', 'desc')->simplePaginate(13);
        if(!is_null($request->search)){
            if($blogs->isEmpty()){
                    \Session::flash('search_msg', '検索に一致する結果はありません');
                    return view('login.home', compact('blogs', 'search'));
            } else {
                return view('login.home', compact('blogs', 'search'));
            }
        } else {
            return redirect(route('home'));
        }
    }


    /**
     * ブログ詳細を表示する
     * 
     * @param int $id
     * return view
     */

    function showDetail($id){ 
        $blog = Blog::find($id);

        // idがない場合のエラー処理
        if(is_null($blog)){
            \Session::flash('err_msg', '投稿データがありません');
            return redirect(route('home'));
        }
        // いいねをしているかどうかのチェック
        $nice = Nice::where('blog_id', $blog->id)->where('user_id', auth()->user()->id)->first();
        
        // ストックをしているかどうかのチェック
        $stock = Stock::where('blog_id', $blog->id)->where('user_id', auth()->user()->id)->first();

        return view('blog.detail', compact('blog', 'stock', 'nice'));  
    }
    /**
     * ブログ登録画面を表示する
     * 
     * return view
     */
    function showCreate(){
        return view('blog.create');
    }
    /**
     * ブログ登録処理
     * 
     * @param object $request
     * return view
     */
    function exeStore(MissLogFormRequest $request){

        $missLog = new Blog;
        $form = $request->all();
        unset($form['_token']);

        \DB::beginTransaction();
        try {
            $missLog->fill($form)->save();
            \DB::commit();
        } catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        
        \Session::flash('save_msg', '投稿を保存しました');
        return redirect(route('home'));
    }

    /**
     * 自分の投稿一覧を表示する
     * 
     * return view
     */

    function showMyMissLog(){
        return view('blog.myMissLog');
    }

    /**
     * 自分の投稿の詳細を表示する
     * 
     * @param int $id
     * return view
     */

    function showMyDetail($id){ 
        $myBlog = Blog::find($id);

        // idがない場合のエラー処理
        if(is_null($myBlog)){
            \Session::flash('err_msg', '投稿データがありません');
            return redirect(route('myMissLog'));
        }
        return view('blog.myDetail', ['myBlog' => $myBlog]);  
    }

    /**
     * 投稿編集画面を表示する
     * 
     * return view
     */

    function showEdit($id){
        $missLog = Blog::find($id);
        return view('blog.edit', ['missLog' => $missLog]);
    }

    /**
     * ブログ更新処理
     * 
     * @param object $request
     * return view
     */
    function exeUpdate(MissLogFormRequest $request){

        $missLog = Blog::find($request->id);
        $form = $request->all();
        unset($form['_token']);

        \DB::beginTransaction();
        try {
            $missLog->fill($form)->save();
            \DB::commit();
        } catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        
        \Session::flash('update_msg', '投稿内容を更新しました');
        return redirect(route('myMissLog'));
    }

    /**
     * ブログを削除する
     * 
     * @param int $id
     * return view
     */
    function exeDelete($id){
        // エラー処理
        if(is_null($id)){
            \Session::flash('err_msg', '投稿データがありません');
            return redirect(route('myMissLog'));
        }
        try {
            Blog::find($id)->delete();
        } catch(\Throwable $e){
            abort(500);
        }
        
        \Session::flash('save_msg', '投稿データを削除しました');
        return redirect(route('myMissLog'));
    }

    /**
     * 自分の保存した投稿一覧を表示する
     * 
     * return view
     */

    function showStock(Request $request){
        $user = \Auth::user();
        $stocks = $user->stocks_blogs()->get();
        return view('blog.stock', ['stocks' => $stocks]);
    }

    /**
     * 保存した投稿の詳細を表示する
     * 
     * @param int $id
     * return view
     */

    function showStockDetail($id){ 
        $stockBlog = Blog::find($id);

        // idがない場合のエラー処理
        if(is_null($stockBlog)){
            \Session::flash('err_msg', '投稿データがありません');
            return redirect(route('showStock'));
        }
        // いいねをしているかどうかのチェック
        $nice = Nice::where('blog_id', $stockBlog->id)->where('user_id', auth()->user()->id)->first();  
        
        // ストックをしているかどうかのチェック
        $stock = Stock::where('blog_id', $stockBlog->id)->where('user_id', auth()->user()->id)->first();

        return view('blog.stockDetail', compact('stockBlog', 'stock', 'nice'));   
    }

    

}
