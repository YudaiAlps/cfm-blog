@extends('layouts.app')

@section('content')
@if(Auth::check())
<div class='container'>
  <div class='show'>
  <h1>詳細ページ</h1>

  <h2 class='title'>{{ $item->title}}</h2>

  <p class='content detail'>{{ $item->content}}</p>

  <p>{{ $item->category }}</p>

  <p>{{$item->created_at}}</p>

  <img src="../../../uploads/{{ $item->image}}" alt="" style='width:100px;'>

  <li>
    <form action="{{ url('post/'. $item->id)}}" method='POST'>
        @csrf
        @method('DELETE')
        <input type="submit" value='削除' class='btn'>
      </form>

    <a href="/" class='btn'>一覧へ戻る</a>
  </li>
    
  </div>
</div>
@else
<p>ログインしてください（<a href='/login'>ログイン</a>|<a href="/register">登録</a>）</p>
@endif
@endsection