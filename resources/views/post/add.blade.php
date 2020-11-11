@if(Auth::check())
<form action="/post/add" method='post' enctype="multipart/form-data">
  <table>
    @csrf
      <input type="hidden" name='user_id' value='{{ $user->id }}'>
    <tr>
      <th>title</th>
      <td><input type="text" name='title' value='{{old("title")}}'></td>
    </tr>
    <tr>
      <th>content:</th>
      <td><textarea name="content" cols="30" rows="10" >{{ old('content') }}</textarea></td>
    </tr>
    <tr>
      <th>photographs:</th>
      <td><input type="file" name='image'></td>
    </tr>
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