@extends('app')

@section('content')
    <form action="/signup" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input name="name" type="name" class="form-control" aria-describedby="nameHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @include('errors')
    </form>
@endsection
