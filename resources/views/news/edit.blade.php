@extends('layouts.app')

@section('content')
<div class="col-lg-8 offset-lg-2">
    <div class="card text-left">
        <div class="card-body">
        <h4 class="card-title">Update news</h4>
            <form action="{{ route('news.update', $title->id)}}" method="POST">
                {{ csrf_field() }}
                @method('PATCH')
                <fieldset>
                    <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="{{$title->title}}" id="title" name="title">
                    </div>
                    <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="{{$title->category_id}}">{{$title->category->category_name}}</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3">{{$title->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="published_from">From</label>
                        <input type="date" class="form-control" id="published_from" name="published_from" value="{{$title->from}}">
                    </div>
                    <div class="form-group">
                        <label for="published_to">To</label>
                        <input type="date" class="form-control" id="published_to" name="published_to" value="{{$title->to}}">
                    </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success">Update</button>
                </fieldset>
            </form>
        </div>
    </div>
    @include('../../inc.errormessage')
</div>
@endsection