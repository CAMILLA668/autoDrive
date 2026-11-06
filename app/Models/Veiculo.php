<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Marca;

class Veiculo extends Model
{
    protected $fillable = [
        'marca_id',
        'modelo',
        'ano',
        'preco',
        'status',
    ];

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }
}
