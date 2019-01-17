@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="col-lg-12">
    <div class="card text-left">
        <div class="card-body">
        <h4 class="card-title">Select a date</h4>
            <form action="{{ route ('news.results')}}" method="POST">
                @include('../inc.messages')
                @include('../inc.errormessage')
                {{ csrf_field() }}
                <div class="form-row align-items">
                    <div class="col-auto">
                        <div class="form-check">
                        <label for="published_from">Published From</label>   
                        </div>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Published From</label>
                        <input type="date" class="form-control mb-2" id="published_from" name="published_from" required>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                        <label for="published_to">Published To</label>   
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="input-group mb-2">
                        <input type="date" class="form-control" id="published_to" name="published_to" required>
                    </div>
                    </div>
                    <div class="col-auto">
                    <button type="submit" class="btn btn-success mb-2">Submit</button>
                    </div>
                </div>
            </form>

            <form class="form-inline" action="{{ route('search.news')}}" method="POST">
                <div class="form-group">
                    @csrf
                        <input type="text" class="form-control" id="search" name="search">
                    <select class="form-control" id="category_id" name="category">
                        @foreach ($categories as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-primary" class="form-control" value="Search">
                </div>
            </form>

            
        </div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Content</th>
                <th>Published From</th>
                <th>Published To</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (count($titles)> 0)
            @foreach ($titles as $title)
            <tr>
                <td><img class="mx-auto d-block" src="https://picsum.photos/200/100/?random" alt="test"></td>
                <td>{{$title->title}}</td>
                <td>{{$title->category->category_name}}</td>
                <td>{{$title->content}}</td>
                <td>{{$title->published_from->toDay()}}</td>
                <td>{{$title->published_to}}</td>
                <td><a href="{{ route('news.edit', $title->id)}}" class="btn-sm btn-primary">Edit</a></td>
                <td><a href="{{ route('news.delete', $title->id)}}" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger">Delete</a></td>
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="10" class="text-center">No news found</th>
            </tr>
            @endif
        </tbody>
    </table>
</div>
=======
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

>>>>>>> 5a773785949cc9482452adef7156e70b83305850
@endsection