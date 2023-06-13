@extends('layout.main')

@section('content')
    <div>

        {{-- stampo l'alert solo se in sessione è presente la variabile "deleted"  --}}
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif

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
                            <a href="{{ route('pastas.show', $pasta) }}" title="VAI" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('pastas.edit', $pasta) }}" class="btn btn-primary" title="Modifica"><i class="fa-solid fa-pencil"></i></a>

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
