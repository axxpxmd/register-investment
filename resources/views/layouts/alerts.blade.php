@if (count($errors) > 0)
<div class="alert alert-danger mb-5">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Whoops Error!</strong>&nbsp;
    <span>You have {{ $errors->count() }} error</span>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif