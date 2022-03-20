@extends('layout')
@section('title', 'missLog create')
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
            <a class="nav-item nav-link active" href="{{route('create')}}">投稿する</a>
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
                <a class="nav-link" href="{{route('showHelp')}}">HELP</a>
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
@section('content')
<div class="row col-md-8 mx-auto mt-1 border border-dark rounded p-5 bg-dark mb-5">
    <div class="col-md-offset-2">
        <h3 class="h3 mb-3 font-weight-normal text-info">ミスログ投稿フォーム</h3>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="form-group">
                <label for="title" class="text-info">タイトル
                </label>
                <input id="title" name="title" class="form-control" value="{{ old('title') }}" type="text">
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content_a" class="text-info mt-3">どんな失敗をした？</label>
                <textarea id="content_a" name="content_a" class="form-control" rows="4">{{ old('content_a') }}</textarea>
                @if ($errors->has('content_a'))
                    <div class="text-danger">
                        {{ $errors->first('content_a') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content_b" class="text-info mt-3">原因は何だった？</label>
                <textarea id="content_b" name="content_b" class="form-control" rows="4">{{ old('content_b') }}</textarea>
                @if ($errors->has('content_b'))
                    <div class="text-danger">
                        {{ $errors->first('content_b') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content_c" class="text-info mt-3">みんなに同じミスをして欲しくないとしたら、どうアドバイスする？</label>
                <textarea id="content" name="content_c" class="form-control" rows="4">{{ old('content_c') }}</textarea>
                @if ($errors->has('content_c'))
                    <div class="text-danger">
                        {{ $errors->first('content_c') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary me-3" href="{{ route('home') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-outline-info">
                    投稿する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
@include('footer')