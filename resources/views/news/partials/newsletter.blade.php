@extends('layouts.app')

@section('content')
<div class="col-lg-8 offset-lg-2">
    <div class="card text-left">
        <div class="card-body">
        <h4 class="card-title">Subscribe to Newsletter</h4>
        <form method="post" action="{{ route('newsletter.store')}}">
            @csrf
                <div class="form-group">
                <label for="Email">Email:</label>
                <input type="text" class="form-control" name="email">
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection




