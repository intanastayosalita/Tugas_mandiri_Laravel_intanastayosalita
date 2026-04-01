@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('absen.masuk') }}" method="POST">
    @csrf
    <button class="btn btn-success">Absen Masuk</button>
</form>

<form action="{{ route('absen.pulang') }}" method="POST" class="mt-2">
    @csrf
    <button class="btn btn-danger">Absen Pulang</button>
</form>
