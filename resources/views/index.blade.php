<form action="{{ route('login') }}" method="POST">
    @csrf
    ...
</form>

<form action="/login" method="POST">
    @csrf
    ...
</form>