@if (count($errors) > 0 )
    <div class="alert-err">
        @foreach ($errors->all() as $err)
            {{ $err }}<br>
        @endforeach
    </div>
@endif 