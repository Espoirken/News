@extends('layouts.app')

@section('content')
<div class="col-lg-8 offset-lg-2">
    <div class="card text-left">
        <div class="card-body">
        <h4 class="card-title">Select a date</h4>
            <form action="{{ route('news.results')}}" method="POST">
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group">
                    <label for="published_from">Published From</label>
                    <input type="date" class="form-control" id="published_from" name="published_from">
                    </div>
                    <div class="form-group">
                    <label for="published_to">Published To</label>
                    <input type="date" class="form-control" id="published_to" name="published_to">
                    </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection