@extends('layout.main')

@section('content')
    <div>
        <h1 class="my-3">Elenco prodotti</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pastas as $pasta)
                    <tr>
                        <td>{{ $pasta->id }}</td>
                        <td>{{ $pasta->titolo }}</td>
                        <td>{{ $pasta->tipo }}</td>
                        <td>
                            <a href="{{ route('pastas.show', $pasta) }}" class="btn btn-success">VAI</a>
                            <a href="#" class="btn btn-primary">MODIFICA</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>

          <div>
            {{ $pastas->links() }}
          </div>

    </div>
@endsection
