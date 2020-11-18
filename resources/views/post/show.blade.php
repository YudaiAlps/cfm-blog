@extends('layouts.app')

@section('content')
@if(Auth::check())

<h1>詳細ページ</h1>

<h2>{{ $item->title}}</h2>

<p>{{ $item->content}}</p>

<p>{{ $item->category }}</p>

{{$item->id}}

<img src="../../../uploads/{{ $item->image}}" alt="" style='width:100px;'>
<form action="{{ action('PostsController@destroy', $item->id)}}" method='POST'>
      <input type="hidden" value='{{$item->id}}'>
      {{ csrf_field()}}
      {{method_field('delete')}}
      <input type="submit" value='削除'>
    </form>

<a href="/">一覧へ戻る</a>

@else
<p>ログインしてください（<a href='/login'>ログイン</a>|<a href="/register">登録</a>）</p>
@endif
@endsection