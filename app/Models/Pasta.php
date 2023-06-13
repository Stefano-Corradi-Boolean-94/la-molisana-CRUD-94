<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pasta extends Model
{
    use HasFactory;

    protected $fillable = [
        'src',
        'src_h',
        'src_p',
        'titolo',
        'slug',
        'cottura',
        'peso',
        'descrizione',
        'tipo'
    ];

    public static function generateSlug($str){

        $slug = Str::slug($str, '-');
        $original_slug = $slug;
        $slug_exixts = Pasta::where('slug', $slug)->first();
        $c = 1;
        while($slug_exixts){
            $slug = $original_slug . '-' . $c;
            $slug_exixts = Pasta::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
