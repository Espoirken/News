@extends('layouts.app')

@section('content')
<div class="col-lg-12">
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
</div>
@endsection