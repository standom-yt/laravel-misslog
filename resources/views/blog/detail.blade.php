@extends('layout')
@section('title', 'missLog detail')
@include('header')
@section('content')
<div class="row mt-5 mb-5 col-md-8 mx-auto border border-dark rounded p-5 bg-dark">
  <div class="col-md-offset-2">
      <h2 class="text-info">{{$blog->title}}</h2>
	  <p class="text-light mt-2">ユーザー名：{{$blog->getUserName()}}</p>
      <span class="text-light me-2">作成日{{$blog->created_at->format('Y/m/d')}}</span>
      <span class="text-light">更新日{{$blog->updated_at->format('Y/m/d')}}</span>
	  <p class="text-info mt-3">どんな失敗をした？</p>
      <p class="text-light">{{$blog->content_a}}</p>
	  <p class="text-info mt-3">原因は何だった？</p>
      <p class="text-light">{{$blog->content_b}}</p>
	  <p class="text-info mt-3">みんなに同じミスをして欲しくないとしたら、どうアドバイスする？</p>
      <p class="text-light">{{$blog->content_c}}</p>
  </div>
  <div>
<!-- もしユーザーが「いいね」をしていたら -->
@if($nice)
<!-- 「いいね」取消用ボタンを表示 -->
		<a href="{{ route('unnice', $blog->id) }}" class="btn btn-info btn-sm me-2 text-dark">
			いいね
			<!-- 「いいね」の数を表示 -->
			<span class="badge text-dark">
				{{ $blog->nices->count() }}
			</span>
		</a>
@else
<!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
		<a href="{{ route('nice', $blog->id) }}" class="btn btn-secondary btn-sm me-2">
			いいね
			<!-- 「いいね」の数を表示 -->
			<span class="badge">
				{{ $blog->nices->count() }}
			</span>
		</a>
@endif
<!-- もしユーザーがストックをしていたらストック取消用ボタンを表示 -->
@if($stock)
		<a href="{{ route('unstock', $blog->id) }}" class="btn btn-info btn-sm text-dark">
			保存解除
			<!-- ストックの数を表示 -->
			<span class="badge text-dark">
				{{ $blog->stocks->count() }}
			</span>
		</a>
@else
<!-- まだユーザーがストックをしていなければ、ストックボタンを表示 -->
		<a href="{{ route('stock', $blog->id) }}" class="btn btn-secondary btn-sm text-light">
			保存する
			<!-- ストックの数を表示 -->
			<span class="badge">
				{{ $blog->stocks->count() }}
			</span>
		</a>
@endif
	</div>
</div>
@endsection
@include('footer')