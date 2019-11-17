@extends('news::layout.app')
@section('content')
{{-- {{dd($data)}} --}}
<form action="{{route('news.update',['news'=>$data->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <img src="{{\Storage::url($data->image)}}" height="200px" width="200px" alt="" srcset=""><br>
    <input type="file" name="image"><br>
    <input type="text" name="name" id="" placeholder="name" value="{{$data->name}}"><br>
    <textarea name="description" id="" cols="30" rows="10" placeholder="description">{{$data->description}}</textarea><br>
    <input type="submit">
</form>
@endsection
