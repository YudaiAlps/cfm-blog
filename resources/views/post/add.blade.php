@if(Auth::check())
@if(count($errors) > 0)
<p>入力に問題があります。再度入力してください</p>
@endif
<form action="/post/add" method='post' enctype="multipart/form-data">
  <table>
    @csrf
      <input type="hidden" name='user_id' value='{{ $user->id }}'>
      @error('title')
      <tr>
      <th>エラー</th>
      <td>{{$message}}</td>
      </tr>
      @enderror
      <tr>
        <th>title</th>
        <td><input type="text" name='title' value='{{old("title")}}'></td>
      </tr>
      @error('content')
        <tr>
          <th>エラー</th> 
          <td>{{$message}}</td>
        </tr>
        @enderror
      <tr>
        <th>content:</th>
        <td><textarea name="content" cols="30" rows="10" >{{ old('content') }}</textarea></td>
      </tr>
      <tr>
        <th>photographs:</th>
        <td><input type="file" name='image'></td>
      </tr>
      @error('category')
        <tr>
          <th>エラー</th> 
          <td>{{$message}}</td>
        </tr>
        @enderror
      <tr>
        <th>category:</th>
        <td><input type="text" name='category' value='{{ old("category") }}'></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value='send'></td>
      </tr>
  </table>
</form>
@else
<p>ログインしてください（<a href='/login'>ログイン</a>|<a href="/register">登録</a>）</p>
@endif