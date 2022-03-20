<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    public function exeNice($blog_id, Request $request){
        $nice=New Nice();
        $nice->blog_id=$blog_id;
        $nice->user_id=Auth::user()->id;
        $nice->save();
        return back();
    }

    public function exeUnnice($blog_id, Request $request){
        $user=Auth::user()->id;
        $nice=Nice::where('blog_id', $blog_id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }

}
