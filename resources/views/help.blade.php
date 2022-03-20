@extends('layout')
@section('title', 'help')
@auth
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">MissLog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-item nav-link" href="{{route('create')}}">投稿する</a>
        </li>
        <li class="nav-item">
            <a class="nav-item nav-link" href="{{route('myMissLog')}}">自分の投稿</a>
        </li>
        <li class="nav-item">
            <a class="nav-item nav-link" href="{{route('showStock')}}">保存した投稿</a>
        </li>
      </ul>
        <ul class="justify-content-end navbar-nav">
            <li class="nav-item me-3">
                <p class="text-info mb-0 mt-2">ログインユーザー：{{Auth::user()->name}}</p>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link active" href="{{route('showHelp')}}">HELP</a>
            </li>
        </ul>
      <form action="{{route('logout')}}" method="POST" class="d-flex mb-2 mb-lg-0">
        @csrf
        <button type="submit" class="btn btn-danger logout-btn">ログアウト</button>
    </form>
    </div>
  </div>
</nav>
</header>
@endauth
@guest
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('showLogin')}}">Misslog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{route('showLogin')}}">ログイン</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{route('showSignup')}}">新規登録</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link active" href="#">HELP</a>
            </ul> 
        </div>
  </div>
</nav>
</header>
@endguest
@section('content') 
<div class="row col-md-8 mx-auto mt-5 border border-dark rounded p-5 bg-dark mb-5">
  <div class="col-md-offset-2">
    <h2 class="h2 text-info">MissLog Information</h2>
    <p class="h4 mt-4 text-info">MissLogについて</p>
    <p class="text-light">MissLogは人々の失敗（Miss）を記録（Log）することで、人々により良い選択・行動を
        促すことを目的に作られました。
    </p>
    <p class="h4 mt-4 text-info">
        MissLogでできること
    </p>
    <p class="text-light">
        MissLogでは、自分が共有したい失敗の投稿したり、みんなの投稿した失敗を見ることができます。
        また、投稿された失敗は保存することができるので、気になった投稿があれば保存して自分の人生に役立てていきましょう。
    </p>
    <p class="h4 mt-4 text-info">
        MissLogからのお願い
    </p>
    <p class="text-light">
        MissLogの投稿に個人を特定する内容や、他人を誹謗中傷する類の内容を書くことはお控えください。 
    </p>
  </div>
</div>
@endsection
@include('footer')