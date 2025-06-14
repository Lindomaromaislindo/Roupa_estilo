<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';

    protected $fillable = ['colecao_id', 'nome', 'preco', 'descricao', 'imagem'];

    public function colecao()
    {
        return $this->belongsTo(Colecao::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($produto) {
            if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
                Storage::disk('public')->delete($produto->imagem);
            }
        });
    }
}
