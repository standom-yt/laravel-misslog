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
            <a class="nav-link active" href="{{route('home')}}">HOME</a>
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