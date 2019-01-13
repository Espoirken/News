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
                    <label for="from">From</label>
                    <input type="date" class="form-control" id="from" name="from">
                    </div>
                    <div class="form-group">
                    <label for="to">To</label>
                    <input type="date" class="form-control" id="to" name="to">
                    </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection