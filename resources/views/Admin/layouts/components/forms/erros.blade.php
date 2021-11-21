@if ($errors->has($name))
    <span class="text-danger" role="alert">
        @foreach($errors->get($name) as $error)
            @if(!$loop->first)
                <br>
            @endif
            <small><strong>{{ $error }}</strong></small>
        @endforeach
    </span>
@endif