@extends('app')

@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding d-flex justify-content-center">
            <div class="row container d-flex justify-content-center">
                <div class="col-lg-10 col-md-12 col-sm-12 d-flex justify-content-center">
                    <div class="card px-3 w-100 mt-4">
                        <div class="card-body">
                            @auth

                                <h4 class="card-title">Notes</h4>
                                <form action="/addnote" method="post">
                                    @csrf
                                    <div class="add-items d-flex">
                                        <input name="name" type="text" class="form-control todo-list-input"
                                            placeholder="Add a new note.">
                                        <button type="submit"
                                            class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
                                    </div>
                                </form>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse todo-list">
                                        @push('styles')
                                            <link href="{{ asset('css/list_item.css') }}" rel="stylesheet">
                                        @endpush

                                        <form action="/updatenotes" method="post" class="mt-4">
                                            @csrf
                                            <ul class="list-group">
                                                @foreach ($notes as $note)
                                                    @include('list_item', array('note' => $note))
                                                @endforeach
                                            </ul>

                                            <div class="row justify-content-center mt-4">
                                                <button type="submit"
                                                    class="add btn btn-primary font-weight-bold todo-list-add-btn">Update</button>
                                            </div>
                                        </form>
                                    </ul>
                                </div>
                            @endauth

                            @guest
                                <a class="nav-link" href="/login">Please log in!</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('errors')
    </div>
@endsection
