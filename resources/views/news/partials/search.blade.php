@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="card text-left">
        <div class="card-body">
        <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Content</th>
                <th>Published From</th>
                <th>Published To</th>
                {{-- <th>Edit</th>
                <th>Delete</th> --}}
            </tr>
        </thead>
        <tbody>
            @if (count($searches)> 0)
            @foreach ($searches as $search)
            <tr>
                <td><img class="thumbnail" src="storage/image/{{$search->image}}" alt="{{$search->image}}" width="100px" height="100px" class="rounded-circle"></td>
                <td>{{$search->title}}</td>
                <td>{{$search->category->category_name}}</td>
                <td>{{$search->content}}</td>
                <td>{{$search->published_from}}</td>
                <td>{{$search->published_to}}</td>
                {{-- <td><a href="{{ route('news.edit', $search->id)}}" class="btn-sm btn-primary">Edit</a></td>
                <td><a href="{{ route('news.delete', $search->id)}}" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger">Delete</a></td> --}}
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="10" class="text-center">No results found</th>
            </tr>
            @endif
        </tbody>
        
    </table>
</div>
@endsection