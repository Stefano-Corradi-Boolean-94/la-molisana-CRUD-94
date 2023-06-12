@extends('layout.main')

@section('content')
    <div>
        <h1 class="my-3">{{ $pasta->titolo }} <a href="#" class="btn btn-primary">MODIFICA</a></h1>

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
