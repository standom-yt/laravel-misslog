@extends('layout')
@section('title', 'missLog edit')
@include('header')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ブログ投稿フォーム</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="id" value="{{$missLog->id}}">
                <label for="title">タイトル
                </label>
                <input id="title" name="title" class="form-control" value="{{ $missLog->title }}" type="text">
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content_a">どんな失敗をした？</label>
                <textarea id="content_a" name="content_a" class="form-control" rows="4">{{$missLog->content_a}}</textarea>
                @if ($errors->has('content_a'))
                    <div class="text-danger">
                        {{ $errors->first('content_a') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content_b">原因は何だった？</label>
                <textarea id="content_b" name="content_b" class="form-control" rows="4">{{$missLog->content_b}}</textarea>
                @if ($errors->has('content_b'))
                    <div class="text-danger">
                        {{ $errors->first('content_b') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content_c">みんなに同じミスをしてほしくないとしたら、どうアドバイスする？</label>
                <textarea id="content" name="content_c" class="form-control" rows="4">{{$missLog->content_c}}</textarea>
                @if ($errors->has('content_c'))
                    <div class="text-danger">
                        {{ $errors->first('content_c') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('myMissLog') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('この内容で更新しますか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
@include('footer')