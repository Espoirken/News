@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <h1 class="col-lg-4 offset-lg-5">Results</h1>
    @include('../../inc.messages')
    @include('../../inc.errormessage')
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Content</th>
                <th>Published From</th>
                <th>Published To</th>
                {{-- <th>Edit</th> --}}
                {{-- <th>Delete</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <td><img class="d-block" src="https://picsum.photos/200/100/?random" alt="test"></td>
                <td>{{$result->title}}</td>
                <td>{{$result->category->category_name}}</td>
                <td>{{$result->content}}</td>
                <td>{{$result->published_from}}</td>
                <td>{{$result->published_to}}</td>
                {{-- <td><a href="{{ route('news.edit', $result->id)}}" class="btn-sm btn-primary">Edit</a></td> --}}
                {{-- <td><a href="{{ route('news.delete', $result->id)}}" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger">Delete</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection