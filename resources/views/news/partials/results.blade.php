@extends('layouts.app')

@section('content')
<div class="col-lg-12">
<<<<<<< HEAD
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
=======
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Results</h4>
        <hr>
            @if (count($results) > 0)
                @foreach ($results as $result)
                    <img class="mx-auto d-block" src="https://picsum.photos/500/400/?random" alt="test">
                    <h1 class="col-lg-7 offset-lg-5">{{$result->title}}</h1>
                    <p>{{$result->category->category_name}}</p>
                    <p>Published Date: {{$result->created_at->timezone('Asia/Singapore')->format('M. d, Y - D  h:i:s A')}}</p>
                    <p class="text-justify">{{$result->content}}</p>
                    {{-- <a href="{{ route('news.edit', $result->id)}}" class="btn-sm btn-primary">Edit</a> --}}
                    {{-- <a href="{{ route('news.delete', $result->id)}}" class="btn-sm btn-danger">Delete</a> --}}
                @endforeach
            @else
                <span class="col-lg-7 offset-lg-5">No results</span>
            @endif
        </div>
    </div>
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
</div>
@endsection