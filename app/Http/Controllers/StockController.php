<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nice;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function exeStock($blog_id, Request $request){
        $stock = new Stock();
        $stock->blog_id = $blog_id;
        $stock->user_id = Auth::user()->id;
        $stock->save();
        return back();
    }

    public function exeUnstock($blog_id, Request $request){
        $user = Auth::user()->id;
        $stock = Stock::where('blog_id', $blog_id)->where('user_id', $user)->first();
        $stock->delete();
        return back();
    }

    
}
