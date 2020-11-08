<form action="/post/add" method='post'>
  <table>
    @csrf
    <tr>
      <th>post id:</th>
      <td><input type="text" name='post_id' value='{{ old("post_id") }}'></td>
    </tr>
    <tr>
      <th>content:</th>
      <td><input type="text" name='content' value='{{ old("content") }}'></td>
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