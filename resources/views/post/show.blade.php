@if(Auth::check())

@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='show'>
  <h1>詳細ページ</h1>

  <h2 class='title'>{{ $item->title}}</h2>

  <p class='content detail'>{{ $item->content}}</p>

  <p>{{ $item->category }}</p>

  <p>{{$item->created_at}}</p>

  <img src="../../../uploads/{{ $item->image}}" alt="" style='width:100px;'>

  @if (!empty($reply))
  @foreach($reply as $reply_item)
  <p>{{$reply_item->getReply()}}</p>
  @endforeach
  @endif

  <div>
  <h3>返信</h3>
    <form action="{{ url('post/'.$item->id.'/show')}}" method='POST'>
      @csrf
      <input type="hidden" value="{{ $item->id }}" name='reply_id'>
      <textarea name="reply" id="reply" cols="30" rows="10" placeholder="返信内容を入力してください"></textarea>

      <input type="submit" value='返信' class='btn'>
    </form>
  </div>

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