@if(Auth::check())

<h1>詳細ページ</h1>

<h2>{{ $item->title}}</h2>

<p>{{ $item->content}}</p>

<p>{{ $item->category }}</p>

<img src="../../../uploads/{{ $item->image}}" alt="" style='width:100px;'>
<a href="/post">一覧へ戻る</a>

@else
<p>ログインしてください（<a href='/login'>ログイン</a>|<a href="/register">登録</a>）</p>
@endif