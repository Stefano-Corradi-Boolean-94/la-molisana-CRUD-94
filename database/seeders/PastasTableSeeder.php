<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasta;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pastas = config('products');
        foreach($pastas as $pasta){
            $new_pasta = new Pasta();
            $new_pasta->src = $pasta['src'];
            $new_pasta->src_h = $pasta['src-h'];
            $new_pasta->src_p = $pasta['src-p'];
            $new_pasta->titolo = $pasta['titolo'];
            $new_pasta->slug = $pasta['slug'];
            $new_pasta->cottura = $pasta['cottura'];
            $new_pasta->peso = $pasta['peso'];
            $new_pasta->descrizione = $pasta['descrizione'];
            $new_pasta->tipo = $pasta['tipo'];
            $new_pasta->save();
        }
    }
}
