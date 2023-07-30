<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModele extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'numero_telephone'];

    public function comptes()
    {
        return $this->hasMany(CompteModele::class, 'utilisateur_id');
    }
}
