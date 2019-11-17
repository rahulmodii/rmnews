
@extends('news::layout.app')
@section('content')
<a href="{{route('news.create')}}">create</a>
<table class="table">
    <tr>
        <td>Image</td>
        <td>Heading</td>
        <td>Description</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    @foreach ($data as $item)
        <tr>
        <td><img src="{{\Storage::url($item->image)}}" height="150px" width="150px" alt="" srcset=""></td>
        <td>{{$item->name}}</td>
        <td>{{$item->description}}</td>
        <td><a href="{{route('news.edit',['news'=>$item->id])}}" class="btn btn-primary">edit</a></td>
        <td> <form action="{{route('news.destroy',['news'=>$item->id])}}" method="post">@method('DELETE')<button type="submit" class="btn btn-primary">delete</button></form> </td>
        </tr>
    @endforeach
</table>
@endsection
