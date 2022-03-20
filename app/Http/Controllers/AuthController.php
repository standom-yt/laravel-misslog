<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\SignupFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    /**
     * ログイン画面の表示
     * 
     * return view
     */
    function showLogin(){
        return view('login.login_form');
    }

    /**
     * ログイン処理
     *
     * @param  App\Http\Requests\LoginFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    function exeLogin(LoginFormRequest $request){
        
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('home');
        }
        return back()->withErrors([
            'login_error' => 'ログインに失敗しました',
        ]);
    }
    /**
     * ログアウト
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logout', 'ログアウトしました');
    }

    /**
     * 新規登録画面の表示
     * 
     * return view
     */
    function showSignup(){
        return view('login.signup_form');
    }
    /**
     * 新規登録処理
     *
     * @param  App\Http\Requests\SignupFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    function exeSignup(SignupFormRequest $request){
        $user = new User;
        $signup_form = $request->all();
        unset($signup_form['_token']);

        \DB::beginTransaction();

        try { 
            $user->name = $signup_form['name'];
            $user->email = $signup_form['email'];
            $user->password = Hash::make($signup_form['password']);
            $user->save();      
            \DB::commit();
        } catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        
        \Session::flash('signup_msg', '新規登録に成功しました');
        return redirect(route('showLogin'));
    }
}