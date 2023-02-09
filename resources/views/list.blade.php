<!DOCTYPE html>
<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<body>

<h2>HTML Table</h2>
<a href="{{url('add/')}}">Add</a>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif
<table>
    <input type ="search" id="search" onkeyup="search(this.value)"/>
  <tr>
    <th>SL</th>
    <th>Name</th>
    <th>Action</th>
  </tr>
  @foreach($data->records as $key=>$item)
  <tr>
    <td>{{$key + 1}}</td>
    <td>{{$item->name}}</td>
    <td><a href="{{url('/delete/'.$key)}}">Delete</a>&nbsp;&nbsp;<a href="{{url('/edit/'.$key)}}">Edit</a></td>
  </tr>
  @endforeach

</table>
<script>
    function search(string){
      console.log(string)
    }
</script>
</body>
</html>

