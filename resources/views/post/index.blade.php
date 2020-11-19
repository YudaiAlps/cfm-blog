@extends('layouts.app')

@section('content')
<div class='post'>
  <div class="search">
    <h1>検索</h1>
    <form action="{{url('/')}}" method='get'>
      <p>キーワード：<input type="text" name='keyword'></p>
      <input type="submit" value="search" class='btn'>
    </form>
    <a href="/" class='btn'>リセット</a>
  </div>
  <table class='post-table'>
  <tr>
    <th>投稿一覧</th>
  </tr>
  @foreach($items as $item)
    <tr class='post-item'>
      <td><input type="hidden" value="{{$item->id}}"></td>
      <td class='title'><a href="{{ route('show', ['id'=>$item->id])}}">{{$item->getData()}}</a></td>

      <td class='content'>{{$item->content}}</td>
 
      <td class='time'>{{$item->created_at}}</td>
        
      <td> 
        <form action="{{ url('post/'. $item->id)}}" method='POST'>
          @csrf
          @method('DELETE')
          <input type="submit" value='削除' class='btn delete'>
        </form>
      </td>
    </tr>
  @endforeach
  </table>



  <a href="/mypage" class='btn'>マイページへ</a>
  <a href="/post/add" class='btn'>投稿ページへ</a>
</div>
@endsection