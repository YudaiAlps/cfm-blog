<table>
<tr>
  <th>Data</th>
</tr>
@foreach($items as $item)
<tr>
  <td><a href="{{ route('show', ['id'=>$item->id])}}">{{$item->getData()}}</a></td>
</tr>
@endforeach
</table>



<a href="/blog">マイページへ</a>
<a href="/post/add">投稿ページへ</a>