@extends('layout')
@section('title', 'home')
@include('header')
@section('content')    
    <div class="col-md-8 mx-auto mb-5">
    <x-alert type="danger" :session="session('err_msg')"/>
    <x-alert type="info" :session="session('save_msg')"/>
        <form action="{{route('search')}}" method="POST">
            @csrf
            <input type="text" name="search" value="{{$search}}">
            <button type="submit" class="btn btn-dark">検索</button>
        </form>
        <table class="table table-striped table-dark">
            <tr>
                <th style="width: 20%">ユーザー名</th>
                <th style="width: 60%">タイトル</th>
                <th style="width: 20%">日付</th>
            </tr>
            @foreach($blogs as $blog)
            <tr>
                <td>{{$blog->getUserName()}}</td>
                <td><a href="home/detail/{{$blog->id}}" class="text-decoration-none link-info">{{$blog->title}}</a></td>
                <td>{{$blog->updated_at->format('Y/m/d')}}</td>
            </tr>
            @endforeach
        </table>
        {{$blogs->links()}}
        <x-alert type="info" :session="session('search_msg')"/>
    </div>
@endsection
@include('footer')