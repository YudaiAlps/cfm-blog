@if(Auth::check())
@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='my-info'>
    <h1>Mypage</h1>

    <table>
    <caption>会員情報</caption>
    <tr>
      <td>名前：</td>
      <td>{{$item->name}}</td>
    </tr>
    <tr>
      <td>メールアドレス：</td>
      <td>{{$item->email}}</td>
    </tr>
    </table>
  </div>

  <div class='post-table'>
    <table>
      <caption>あなたの投稿</caption>
      @if($item->posts != null)
        @foreach($item->posts as $obj)
          <tr class='post-item'><td><a href="{{ route('show', ['id' => $obj->id]) }}">{{ $obj->getData() }}</a></td>
          
            <td>{{$obj->content}}</td>
          </tr>
        @endforeach
      @endif
    </table>
  </div>

  <div class='move'>
    <a href="/" class='btn'>一覧へ</a>
    <a href="/post/add" class='btn'>投稿ページへ</a>
  </div>
</div>
@else
<p>ログインしてください（<a href='/login'>ログイン</a>|<a href="/register">登録</a>）</p>
@endif
@endsection