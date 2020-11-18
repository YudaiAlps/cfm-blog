@extends('layouts.app')

@section('content')
<h1>検索</h1>
<form action="{{url('/')}}" method='get'>
  <p>キーワード：<input type="text" name='keyword'></p>
  <input type="submit" value="search">
</form>
<a href="/">リセット</a>
<table>
<tr>
  <th>Data</th>
</tr>
@foreach($items as $item)
<tr>
  <td><a href="{{ route('show', ['id'=>$item->id])}}">{{$item->getData()}}</a></td>
</tr>
<tr>
  <td>{{$item->content}}</td>
</tr>
<tr>
  <td>{{$item->created_at}}</td>
    
  <td> 
    <form action="{{ action('PostsController@destroy', $item->id)}}" method='POST'>
      <input type="hidden" value='{{$item->id}}'>
      {{ csrf_field()}}
      {{method_field('delete')}}
      <input type="submit" value='削除'>
    </form>
  </td>
</tr>
 
@endforeach
</table>



<a href="/mypage">マイページへ</a>
<a href="/post/add">投稿ページへ</a>

@endsection