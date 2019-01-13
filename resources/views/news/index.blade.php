@extends('layouts.app')

@section('content')
@foreach ($titles as $title)
<div class="col-lg-5">
    <img class="mx-auto d-block" src="https://picsum.photos/500/400/?random" alt="test">
    <h1 class="col-lg-4 offset-lg-4">{{$title->title}}</h1>
    <p>{{$title->category->category_name}}</p>
    <p>Published Date: {{$title->created_at->timezone('Asia/Singapore')->format('M. d, Y - D  h:i:s A')}}</p>
    <p class="text-justify">{{$title->content}}</p>
    <a href="{{ route('news.edit', $title->id)}}" class="btn-sm btn-primary">Edit</a>
    <a href="{{ route('news.delete', $title->id)}}" class="btn-sm btn-danger">Delete</a>
</div>
@endforeach

@endsection