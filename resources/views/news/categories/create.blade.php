@extends('layouts.app')

@section('content')
<div class="col-lg-8 offset-lg-2">
    <div class="card text-left">
        <div class="card-body">
        <h4 class="card-title">Create a new category</h4>
            <form action="{{ route('categories.store')}}" method="POST">
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name">
                    </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success">Create</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection