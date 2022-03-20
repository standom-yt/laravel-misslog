@extends('layout')
@section('title', 'ログインフォーム')
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
                <a class="nav-item nav-link active" href="#">ログイン</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{route('showSignup')}}">新規登録</a>
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
    <form class="form-signin" method="POST" action="{{route('exeLogin')}}">
    @csrf
    <h3 class="h3 mb-3 font-weight-normal text-info">ログインフォーム</h3>
    @if ($errors->any())
    <div class="alert alert-danger err-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <x-alert type="danger" :session="session('login_error')"/>
    <x-alert type="danger" :session="session('logout')"/>
    <x-alert type="info" :session="session('signup_msg')"/>

    <label for="inputEmail" class="sr-only text-info">メールアドレス</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="メールアドレス"  autofocus>
    <label for="inputPassword" class="sr-only mt-3 text-info">パスワード</label>
    <input type="password" id="inputPassword" name="password" class="form-control text-info" placeholder="パスワード">
    <br>
    <button class="btn btn-lg btn-outline-info btn-block" type="submit">ログイン</button>
    </form>
</div>

@endsection
@include('footer')