<?php

namespace App\Http\Controllers;

use App\Models\Pasta;
use Illuminate\Http\Request;
use App\Http\Requests\PastaRequest;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::orderBy('id','desc')->paginate(5);
        return view('pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Restituisco il form di creazione di una nuova pasta
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastaRequest $request)
    {
        // prima di tutto valido i dati
        // il metodo $request->validate() controlla se i dati presenti in $request sono validi.
        // se non lo sono reindirizza al form
        // Per validare i dati devo passare un array di controlli come primo parametro
        // come secondo parametro (ozpionale) inserisco i messaggi di errore custom

        // Validazione senza PastaRequest
        // $request->validate([
        //     'titolo' => 'required|min:3|max:100',
        //     'src' => 'required|min:3|max:255',
        //     'src_h' => 'max:255',
        //     'src_p' => 'max:255',
        //     'tipo' => 'required|min:2|max:20',
        //     'cottura' => 'required|min:2|max:20',
        //     'peso' => 'required|min:2|max:20',
        // ],[
        //     'titolo.required' => 'Il titolo è un campo obbligatorio',
        //     'titolo.min' => 'Il titolo deve avere almeno :min caratteri',
        //     'titolo.max' => 'Il titolo non deve avere più di :max caratteri',
        //     'src.required' => 'Il path dell\'immagine 1 è un campo obbligatorio',
        //     'src.min' => 'Il path dell\'immagine 1 deve avere almeno :min caratteri',
        //     'src.max' => 'Il path dell\'immagine 1 non deve avere più di :max caratteri',
        //     'src_h.max' => 'Il path dell\'immagine 2 non deve avere più di :max caratteri',
        //     'src_p.max' => 'Il path dell\'immagine 3 non deve avere più di :max caratteri',
        //     'tipo.required' => 'Il tipo è un campo obbligatorio',
        //     'tipo.min' => 'Il tipo deve avere almeno :min caratteri',
        //     'tipo.max' => 'Il tipo non deve avere più di :max caratteri',
        //     'cottura.required' => 'La cottura è un campo obbligatorio',
        //     'cottura.min' => 'La cottura deve avere almeno :min caratteri',
        //     'cottura.max' => 'La cottura non deve avere più di :max caratteri',
        //     'peso.required' => 'Il peso è un campo obbligatorio',
        //     'peso.min' => 'Il peso deve avere almeno :min caratteri',
        //     'peso.max' => 'Il peso non deve avere più di :max caratteri'
        // ]);


        //con la $request ricevo tutti i dati inviati dal form
        // per avere le chiavi che mi servono chiamo $request->all()
        $form_data = $request->all();

        $new_pasta = new Pasta();

        // se non preparo nel model la proprietà protected $fillable creo tutte le chiavi dell'entità da salvare

        // $new_pasta->src = $form_data['src'];
        // $new_pasta->src_h = $form_data['src_h'];
        // $new_pasta->src_p = $form_data['src_p'];
        // $new_pasta->titolo = $form_data['titolo'];
        // $new_pasta->slug = Pasta::generateSlug($new_pasta->titolo);
        // $new_pasta->cottura = $form_data['cottura'];
        // $new_pasta->peso = $form_data['peso'];
        // $new_pasta->descrizione = $form_data['descrizione'];
        // $new_pasta->tipo = $form_data['tipo'];

        // se uso fillble devo aggiungere la chiave slug perché non è presente in $form_data
        $form_data['slug']  = Pasta::generateSlug($form_data['titolo']);

        // con fillable tutte le associazione chiave valore vengono fatte implicitiamente
        $new_pasta->fill($form_data);

        $new_pasta->save();

       // dd($new_pasta);

        // una volta salvato il dato reindirizzo alla pagina show
        return redirect()->route('pastas.show', $new_pasta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function show(Pasta $pasta)
    {
        // show(Pasta $pasta) implicitamente fa $pasta = Pasta::find($id);
        return view('pastas.show', compact('pasta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasta $pasta)
    {
        return view('pastas.edit', compact('pasta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function update(PastaRequest $request, Pasta $pasta)
    {
        $form_data = $request->all();

        // se il titolo è stato modificato genero un nuovo slug
        if($pasta->titolo !== $form_data['titolo']){
            $form_data['slug']  = Pasta::generateSlug($form_data['titolo']);
        }else{
            // altrimenti salvo il slug il vecchio slug
            $form_data['slug']  = $pasta->slug;
        }

        // con update fillo tutti i dati
        $pasta->update($form_data);

        return view('pastas.show', compact('pasta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {
        $pasta->delete();

        // dopo l'eliminazione del prodotto reindirizzo alla index passando in sessione l'avvenuta eliminazione
        // with(chiave, valore) accetta 2 parametri. Il primo è la chiave della variabile di sessione e il secono è il valore
        return redirect()->route('pastas.index')->with('deleted', "La pasta $pasta->titolo è stata eliminata correttamente");
    }
}
