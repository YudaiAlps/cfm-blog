@extends('layouts.app')

@section('content')
@if(Auth::check())
<div class='container'>
  <div class='add'>
    @if(count($errors) > 0)
    <p>入力に問題があります。再度入力してください</p>
    @endif
    <form action="/post/add" method='post' enctype="multipart/form-data">
      <table>
        @csrf
          <input type="hidden" name='user_id' value='{{ $user->id }}'>
          @error('title')
          <tr class='error'>
          <th>エラー</th>
          <td>{{$message}}</td>
          </tr>
          @enderror
          <tr>
            <th>タイトル</th>
            <td><input type="text" name='title' value='{{old("title")}}'></td>
          </tr>
          @error('content')
            <tr class='error'>
              <th>エラー</th> 
              <td>{{$message}}</td>
            </tr>
            @enderror
          <tr>
            <th>内容</th>
            <td><textarea name="content" cols="30" rows="10" >{{ old('content') }}</textarea></td>
          </tr>
          <tr>
            <th class='photo'>写真</th>
            <td><input type="file" name='image'></td>
          </tr>
          @error('category')
            <tr class='error'>
              <th>エラー</th> 
              <td>{{$message}}</td>
            </tr>
            @enderror
          <tr>
            <th>カテゴリー</th>
            <td><input type="text" name='category' value='{{ old("category") }}'></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="submit" value='投稿する'  class='btn'></td>
          </tr>
      </table>
    </form>
  </div>
</div>
@else
<p>ログインしてください（<a href='/login'>ログイン</a>|<a href="/register">登録</a>）</p>
@endif

@endsection