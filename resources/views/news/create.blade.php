@extends('layouts.app')

@section('content')
<div class="col-lg-8 offset-lg-2">
    @include('../inc.messages')
    @include('../inc.errormessage')
    <div class="card text-left">
        <div class="card-body">
        <h4 class="card-title">Create a news</h4>
            <form action="{{ route('news.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected="selected" @endif>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="published_from">From</label>
                        <input type="date" class="form-control" id="published_from" name="published_from" value="{{ old('published_from') }}">
                    </div>
                    <div class="form-group">
                        <label for="published_to">To</label>
                        <input type="date" class="form-control" id="published_to" name="published_to" value="{{ old('published_to') }}">
                    </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success">Create</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection