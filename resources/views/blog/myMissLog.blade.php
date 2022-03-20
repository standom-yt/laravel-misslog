@extends('layout')
@section('title', 'myMissLogs')
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
            <a class="nav-item nav-link active" href="{{route('myMissLog')}}">自分の投稿</a>
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
    <x-alert type="success" :session="session('update_msg')"/>
    <x-alert type="danger" :session="session('err_msg')"/>
    <div class="col-md-10 mx-auto mb-5">
        <table class="table table-striped table-dark">
            <tr>
                <th style="width: 60%">タイトル</th>
                <th style="width: 20%">日付</th>
                <th style="width: 10%"></th>
                <th style="width: 10%"></th>
            </tr>
            @if(Auth::user()->blogs != null)
            @foreach(Auth::user()->blogs as $obj)
            <tr>
                <td><a href="missLog/detail/{{$obj->id}}" class="text-decoration-none link-info">{{$obj->title}}</a></td>
                <td>{{$obj->updated_at->format('Y/m/d')}}</td>
                <td><button type="button" class="btn btn-outline-info" onclick="location.href='missLog/edit/{{$obj->id}}'">編集</button></td>
                <td>
                <form method="POST" action="{{ route('delete',$obj->id) }}" onSubmit="return checkDelete()">
                @csrf
                <button type="submit" class="btn btn-outline-danger">削除</button>
                </form>
                </td>
                
            </tr>
            @endforeach
            @endif
        </table>
    </div>
    
      <script>
function checkDelete(){
if(window.confirm('削除してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
@include('footer')