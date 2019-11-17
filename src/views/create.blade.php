@extends('news::layout.app')
@section('content')
<form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image"><br>
    <input type="text" name="name" id="" placeholder="name"><br>
    <textarea name="description" id="" cols="30" rows="10" placeholder="description"></textarea><br>
    <input type="submit">
</form>
@endsection
