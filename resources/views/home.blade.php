@extends('app')

@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    @include('errors')

                    <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">Awesome Todo list</h4>
                            <form action="/addtask" method="post">
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
                                    <form action="/updatetasks" method="post">
                                        @csrf
                                        @foreach ($notes as $note)
                                            @if ($note['done'] == '1')
                                                <li class="completed">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ $note['name'] }}, {{ $note['created_at'] }}
                                                            <input type="hidden" name="noteIds[{{ $note['id'] }}]"
                                                                value='0'>
                                                            <input name="noteIds[{{ $note['id'] }}]" class="checkbox"
                                                                value='1' type="checkbox" checked>
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                    <i class="remove mdi mdi-close-circle-outline"></i>
                                                </li>
                                            @else
                                                <li class="completed">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ $note['name'] }}, {{ $note['created_at'] }}
                                                            <input type="hidden" name="noteIds[{{ $note['id'] }}]"
                                                                value='0'>
                                                            <input name="noteIds[{{ $note['id'] }}]" class="checkbox"
                                                                value='1' type="checkbox">
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                    <i class="remove mdi mdi-close-circle-outline"></i>
                                                </li>
                                            @endif
                                        @endforeach
                                        <button type="submit"
                                            class="add btn btn-primary font-weight-bold todo-list-add-btn">Update</button>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
