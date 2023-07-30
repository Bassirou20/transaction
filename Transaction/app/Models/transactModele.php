<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactModele extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'montant', 'date', 'expediteur_id', 'destinataire_id', 'code'];

    // Relation avec la table Comptes pour l'expéditeur de la transaction
    public function expediteur()
    {
        return $this->belongsTo(Compte::class, 'expediteur_id');
    }

    // Relation avec la table Comptes pour le destinataire de la transaction
    public function destinataire()
    {
        return $this->belongsTo(Compte::class, 'destinataire_id');
    }
}
