<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteModele extends Model
{
    use HasFactory;

    protected $fillable = ['utilisateur_id', 'fournisseur', 'solde'];

    public function client()
    {
        return $this->belongsTo(ClientModele::class, 'utilisateur_id');
    }
    public function transactions()
    {
        return $this->hasMany(transactModele::class, 'destinataire_id');
    }

}
