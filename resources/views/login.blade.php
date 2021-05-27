@extends('app')

@section('content')
    <div class="col">
        <form action="/login" method="post">
            @csrf
            <div class="form-group">
                <label>Email address</label>
                <input name="email" type="email" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="container pb-2">
                <div class="row">
                    <a href="/signup" class="link-primary">Sign Up</a>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @include('errors')
    </div>
@endsection
