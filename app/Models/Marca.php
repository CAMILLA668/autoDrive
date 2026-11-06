<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Veiculo;

class Marca extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function veiculo(): hasMany
    {
        return $this->hasMany(Veiculo::class);
    }
}
