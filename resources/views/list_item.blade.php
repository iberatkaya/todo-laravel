<li class="list-group-item completed">
    <div class="form-check">
        <div class="d-flex row">
            <div class="col-md-9">
                {{ $note['name'] }}
            </div>

            <div class="col-md-2 text-muted date">
                {{ \Carbon\Carbon::parse($note['created_at'])->format('h:i, j F Y') }}
            </div>
            <div class="col-md-1">
                <input type="hidden" name="noteIds[{{ $note['id'] }}]" value='0'>
                <input name="noteIds[{{ $note['id'] }}]" class="checkbox" value='1' type="checkbox" @if ($note['done'] == '1') checked @endif>
            </div>
        </div>
        <i class="input-helper"></i>
    </div>
    <i class="remove mdi mdi-close-circle-outline"></i>
</li>
