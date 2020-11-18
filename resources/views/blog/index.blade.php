@if(Auth::check())
@extends('layouts.app')

@section('content')

<p>ここはマイページです</p>

<table>
<caption>会員情報</caption>
<tr>
  <th>name</th>
  <td>{{$item->name}}</td>
</tr>
<tr>
  <th>email</th>
  <td>{{$item->email}}</td>
</tr>
</table>

<table>
  <caption>あなたの投稿</caption>
  @if($item->posts != null)
    @foreach($item->posts as $obj)
      <tr><td><a href="{{ route('show', ['id' => $obj->id]) }}">{{ $obj->getData() }}</a></td></tr>
    @endforeach
  @endif
</table>

<a href="/">一覧へ</a>
<a href="/post/add">投稿ページへ</a>

@else
<p>ログインしてください（<a href='/login'>ログイン</a>|<a href="/register">登録</a>）</p>
@endif
@endsection