@extends('layout.main')

@section('content')
    <div>
        <h1 class="my-3">Creazione nuova pasta</h1>

        <form action="{{ route('pastas.store') }}" method="POST">
            {{-- token di verifica validità del form  --}}
            @csrf

            <div class="mb-3">
                <label for="src" class="form-label">Path immagine 1</label>
                <input type="text" class="form-control" id="src" name="src" >
            </div>
            <div class="mb-3">
                <label for="src_h" class="form-label">Path immagine 2</label>
                <input type="text" class="form-control" id="src_h" name="src_h" >
            </div>
            <div class="mb-3">
                <label for="src_p" class="form-label">Path immagine 3</label>
                <input type="text" class="form-control" id="src_p" name="src_p" >
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>

        </form>


    </div>
@endsection
