@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="card text-left">
        <div class="card-body">
        <h4 class="card-title">Select a date</h4>
            <form action="{{ route ('news.results')}}" method="POST">
                @include('../inc.messages')
                @include('../inc.errormessage')
                {{ csrf_field() }}
                <div class="form-row align-items">
                    <div class="col-auto mt-2">
                        <label for="published_from">Published From</label>   
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control mb-1" id="published_from" name="published_from" >
                    </div>

                    <div class="col-auto mt-2">
                        <label for="published_to">Published To</label>   
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" id="published_to" name="published_to" required>
                    </div>
                    <div class="col-auto">
                    <button type="submit" class="btn btn-success mb-2">Submit</button>
                    </div>
            </form>

            <form class="form-inline" action="{{ route('search.news')}}" method="POST">
                <div class="form-group">
                    @csrf
                    <div class="col-auto">
                        <input type="text" class="form-control mr-2" id="search" name="search" placeholder="Search..." required>
                    </div>
                    
                    <div class="col-auto">
                    <select class="form-control" id="category_id" name="category">
                        @foreach ($categories as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="col-auto">
                    <input type="submit" class="btn btn-primary" class="form-control col-auto" value="Search">
                    </div>
                </div>
            </form>
        </div>
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
                <td><img class="thumbnail" src="storage/image/{{$title->image}}" alt="{{$title->image}}" width="100px" height="100px" class="rounded-circle"></td>
                <td>{{$title->title}}</td>
                <td>{{$title->category->category_name}}</td>
                <td>{{$title->content}}</td>
                {{-- Add published_from and published_to to your protected dates > News.php to access Carbon --}}
                <td>{{$title->published_from->timezone('Asia/Singapore')->format('M. d, Y - D  h:i:s A')}}</td>
                <td>{{$title->published_to->timezone('Asia/Singapore')->format('M. d, Y - D  h:i:s A')}}</td>
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
@endsection