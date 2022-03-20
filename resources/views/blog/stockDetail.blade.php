@extends('layout')
@section('title', 'stock detail')
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
            <a class="nav-item nav-link active" href="{{route('showStock')}}">保存した投稿</a>
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
<div class="row mt-5 mb-5 col-md-8 mx-auto border border-dark rounded p-5 bg-dark">
  <div class="col-md-offset-2">
      <h2 class="text-info">{{$stockBlog->title}}</h2>
	  <p class="text-light mt-2">ユーザー名：{{$stockBlog->getUserName()}}</p>
      <span class="text-light me-2">作成日{{$stockBlog->created_at->format('Y/m/d')}}</span>
      <span class="text-light">更新日{{$stockBlog->updated_at->format('Y/m/d')}}</span>
	  <p class="text-info mt-3">どんな失敗をした？</p>
      <p class="text-light">{{$stockBlog->content_a}}</p>
	  <p class="text-info mt-3">原因は何だった？</p>
      <p class="text-light">{{$stockBlog->content_b}}</p>
	  <p class="text-info mt-3">みんなに同じミスをして欲しくないとしたら、どうアドバイスする？</p>
      <p class="text-light">{{$stockBlog->content_c}}</p>
  </div>
  <div>
<!-- もしユーザーが「いいね」をしていたら -->
@if($nice)
<!-- 「いいね」取消用ボタンを表示 -->
	<a href="{{ route('unnice', $stockBlog->id) }}" class="btn btn-info btn-sm me-2 text-dark">
		いいね
		<!-- 「いいね」の数を表示 -->
		<span class="badge text-dark">
			{{ $stockBlog->nices->count() }}
		</span>
	</a>
@else
<!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	<a href="{{ route('nice', $stockBlog->id) }}" class="btn btn-secondary btn-sm me-2">
		いいね
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $stockBlog->nices->count() }}
		</span>
	</a>
@endif
<!-- もしユーザーがストックをしていたらストック取消用ボタンを表示 -->
@if($stock)
	<a href="{{ route('unstock', $stockBlog->id) }}" class="btn btn-info btn-sm text-dark">
		保存解除
		<!-- ストックの数を表示 -->
		<span class="badge text-dark">
			{{ $stockBlog->stocks->count() }}
		</span>
	</a>
@else
<!-- まだユーザーがストックをしていなければ、ストックボタンを表示 -->
	<a href="{{ route('stock', $stockBlog->id) }}" class="btn btn-secondary btn-sm">
		保存する
		<!-- ストックの数を表示 -->
		<span class="badge">
			{{ $stockBlog->stocks->count() }}
		</span>
	</a>
@endif
	</div>
</div>
@endsection
@include('footer')