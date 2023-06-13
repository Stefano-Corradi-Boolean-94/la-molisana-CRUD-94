@extends('layout.main')

@section('content')
    <div>
        <h1 class="my-3">
            {{ $pasta->titolo }}
            <a href="{{ route('pastas.edit', $pasta) }}" class="btn btn-primary" title="Modifica">
                <i class="fa-solid fa-pencil"></i>
            </a>
            <form
                class="d-inline"
                action="{{ route('pastas.destroy', $pasta) }}"
                method="POST"
                onsubmit="return confirm('Confermi l\'eliminazione del prodotto:  {{ $pasta->titolo }} ?')"
            >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="Elimina"><i class="fa-solid fa-eraser"></i></button>
            </form>
        </h1>

        <div class="row row-cols-3 text-center">
            <div class="col p-2">
                <img class="img-fluid border border-1" src="{{ $pasta->src }}" alt="">
            </div>
            <div class="col p-2">
                <img class="img-fluid border border-1" src="{{ $pasta->src_h }}" alt="">
            </div>
            <div class="col p-2">
                <img class="img-fluid border border-1"src="{{ $pasta->src_p }}" alt="">
            </div>
        </div>
        <p>
            Tipo: {{ $pasta->tipo }} | Cottura: {{ $pasta->cottura }} | Peso: {{ $pasta->peso }}
        </p>
        <p>
            {{-- stampo testo HTML  --}}
            {!! $pasta->descrizione !!}
        </p>
    </div>
@endsection
