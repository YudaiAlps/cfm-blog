@if(Auth::check())
<p>ここはindexページです</p>

<table>
<tr>
  <th>user</th>
  <th>post</th>
</tr>
@foreach($items as $item)
<tr>
  <td>{{$item->getData()}}</td>
  <td>
    @if ($item->post != null)
    <table>
      @foreach($item->posts as $obj)
        <tr>
          <td>{{$obj->getData()}}</td>
        </tr>
      @endforeach
    </table>
    @endif
  </td>
</tr>
@endforeach
</table>

@else
<p>ログインしてください（<a href='/login'>ログイン</a>|<a href="/register">登録</a>）</p>
@endif