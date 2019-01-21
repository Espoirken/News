@extends('layouts.app')

@section('content')
<div class="col-lg-10 offset-lg-1">
    <div class="card">
      <div class="card-body">
        <a href="{{ route('categories.create')}}" class="btn-sm btn-success float-right"><i class="fa fa-plus" aria-hidden="true"></i> Create a new category</a>
        <h4 class="card-title">List of Categories</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if(count($categories)> 0)
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->category_name}}</td>
                    <td><a href="{{ route('categories.edit', $category->id)}}" class="btn-sm btn-primary">Edit</a></td>
                    <td><a href="{{ route('categories.delete', $category->id)}}" onclick="return confirm('Are you sure? This will delete all news under this category.')" class="btn-sm btn-danger">Delete</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="10" class="text-center">No categories found</th>
                </tr>
                @endif
            </tbody>
        </table>
      </div>
    </div>
    @include('../../inc.messages')
</div>

@endsection