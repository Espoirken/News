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
<<<<<<< HEAD
                    <input type="text" class="form-control" id="category_name" name="category_name" autofocus>
=======
                    <input type="text" class="form-control" id="category_name" name="category_name">
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
                    </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success">Create</button>
                </fieldset>
            </form>
        </div>
    </div>
<<<<<<< HEAD
    @include('../../inc.messages')
    @include('../../inc.errormessage')
=======
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
</div>
@endsection