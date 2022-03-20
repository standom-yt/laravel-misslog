@extends('layout')
@section('title', 'サインアップフォーム')
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('showLogin')}}">MissLog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{route('showLogin')}}">ログイン</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link active" href="#">新規登録</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{route('showHelp')}}">HELP</a>
            </ul> 
        </div>
  </div>
</nav>
</header>
@section('content')
<div class="col-md-6 mx-auto mt-5 border border-dark rounded p-5 bg-dark">
    <form class="form-signup" method="POST" action="{{route('exeSignup')}}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal text-info">サインアップフォーム</h1>
    @if ($errors->any())
    <div class="alert alert-danger err-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <label for="inputUsername" class="sr-only text-info">ユーザー名</label>
    <input type="text" id="inputUsername" name="name" class="form-control" placeholder="ユーザー名" >
    <label for="inputEmail" class="sr-only mt-3 text-info">メールアドレス</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="メールアドレス"  autofocus>
    <label for="inputPassword" class="sr-only mt-3 text-info">パスワード</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード" >
    <label for="password_conf" class="sr-only mt-3 text-info">パスワード（確認用）</label>
    <input type="password" id="password_conf" name="password_confirmation" class="form-control" placeholder="パスワード（確認用）">
    <br>
    <button class="btn btn-lg btn-outline-info btn-block" type="submit">新規登録</button>
    </form>
</div>

@endsection
@include('footer')