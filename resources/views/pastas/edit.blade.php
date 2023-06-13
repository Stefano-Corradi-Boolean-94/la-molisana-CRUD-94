@extends('layout.main')

@section('content')
    <div>
        <h1 class="my-3"> {{ $pasta->titolo }}</h1>

        {{-- $errors->any() è true se ci sono degli errori in sessione  --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">

                <ul>
                    {{-- $errors->all() mette tutti gli errori in un array che ciclo osolo se $errors->any() è true --}}
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif


        <form action="{{ route('pastas.update', $pasta) }}" method="POST">
            {{-- token di verifica validità del form  --}}
            @csrf
            {{-- da aggiungere perché non è possibile mettere PUT/PATCH in method in HTML  --}}
            @method('PUT')

            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo (*)</label>
                <input
                  id="titolo"
                  value="{{ old('titolo', $pasta->titolo) }}"
                  class="form-control @error('titolo') is-invalid @enderror"
                  name="titolo"
                  placeholder="Titolo"
                  type="text"
                >
                @error('titolo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="src" class="form-label">Path immagine 1 (*)</label>
                <input
                  id="src"
                  value="{{ old('src', $pasta->src) }}"
                  class="form-control @error('src') is-invalid @enderror"
                  name="src"
                  placeholder="Path immagine 1"
                  type="text"
                >
                @error('src')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="src_h" class="form-label">Path immagine 2 (*)</label>
                <input
                  id="src_h"
                  value="{{ old('src_h', $pasta->src_h) }}"
                  class="form-control @error('src_h') is-invalid @enderror"
                  name="src_h"
                  placeholder="Path immagine 2"
                  type="text"
                >
                @error('src_h')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="src_p" class="form-label">Path immagine 3 (*)</label>
                <input
                  id="src_p"
                  value="{{ old('src_p', $pasta->src_p) }}"
                  class="form-control @error('src_p') is-invalid @enderror"
                  name="src_p"
                  placeholder="Path immagine 3"
                  type="text"
                >
                @error('src_p')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo (*)</label>
                <input
                  id="tipo"
                  value="{{ old('tipo', $pasta->tipo) }}"
                  class="form-control @error('tipo') is-invalid @enderror"
                  name="tipo"
                  placeholder="Tipo"
                  type="text"
                >
                @error('tipo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cottura" class="form-label">Cottura (*)</label>
                <input
                  id="cottura"
                  value="{{ old('cottura', $pasta->cottura) }}"
                  class="form-control @error('cottura') is-invalid @enderror"
                  name="cottura"
                  placeholder="Cottura"
                  type="text"
                >
                @error('cottura')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="peso" class="form-label">Peso (*)</label>
                <input
                  id="peso"
                  value="{{ old('peso', $pasta->peso) }}"
                  class="form-control @error('peso') is-invalid @enderror"
                  name="peso"
                  placeholder="Peso"
                  type="text"
                >
                @error('peso')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descrizione" class="form-label">Descrizione</label>
                <textarea class="form-control"  name="descrizione" id="descrizione" cols="30" rows="10" placeholder="Descrizione">{{ old('descrizione', $pasta->descrizione) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>

        </form>


    </div>
@endsection
