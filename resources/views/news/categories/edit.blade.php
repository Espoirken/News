@extends('layouts.app')

@section('content')
<div class="col-lg-8 offset-lg-2">
    <div class="card text-left">
        <div class="card-body">
        <h4 class="card-title">Edit category</h4>
            <form action="{{ route('categories.update', $category->id)}}" method="POST">
                {{ csrf_field() }}
                @method('PATCH')
                <fieldset>
                    <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{$category->category_name}}">
                    </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success">Update</button>
                </fieldset>
            </form>
        </div>
    </div>
    @include('../../inc.messages')
    @include('../../inc.errormessage')
</div>
@endsection