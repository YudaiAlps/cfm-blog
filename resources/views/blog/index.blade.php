@if(Auth::check())
<p>ここはindexページです</p>

<p>{{ $item->name }}さんようこそ！</p>

@else
<p>ログインしてください（<a href='/login'>ログイン</a>|<a href="/register">登録</a>）</p>
@endif