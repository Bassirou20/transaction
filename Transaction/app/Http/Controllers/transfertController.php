<?php

namespace App\Http\Controllers;

use App\Models\CompteModele;
use Illuminate\Http\Request;
use App\Models\transactModele;

class transfertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = transactModele::all();
        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = transactModele::create($request->all());
        return response()->json($transaction, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = transactModele::find($id);
        return response()->json($transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = transactModele::find($id);
        $transaction->update($request->all());
        return response()->json($transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function depot(Request $request, $id)
    {

        $compte = CompteModele::find($id);

        if (!$compte) {
            return response()->json(['message' => 'Compte introuvable'], );
        }

        // Valider le montant du dépôt
        $request->validate([
            'montant' => 'required|numeric|min:500',
        ]);

        // Mettre à jour le solde du compte
        $nouveauSolde = $compte->solde + $request->montant;
        $compte->update(['solde' => $nouveauSolde]);

        // Enregistrer la transaction de dépôt
        $transaction = transactModele::create([
            'type' => 'depot',
            'montant' => $request->montant,
            'date' => now(),
            'expediteur_id' => null,
            'destinataire_id' => $compte->id,
            'code' => null,
         ]);

        return response()->json(['message' => 'Dépôt effectué avec succès', 'transaction' => $transaction], 201);
    }

    public function transactionsByCompte($id)
    {
        // Vérifier si le compte existe
        $compte = CompteModele::find($id);

        if (!$compte) {
            return response()->json(['message' => 'Compte introuvable'], 404);
        }

        // Récupérer les transactions associées au compte
        $transactions = $compte->transactions;

        return response()->json($transactions);
    }


    public function retraitXaliss(Request $request, $id)
    {

        $compte = CompteModele::find($id);

        if (!$compte) {
            return response()->json(['message' => 'Compte introuvable'], 404);
        }


        $request->validate([
            'montant' => 'required|numeric|min:0',
        ]);


        if ($compte->solde < $request->montant) {
            return response()->json(['message' => 'Solde insuffisant pour effectuer le retrait'], 400);
        }


        $nouveauSolde = $compte->solde - $request->montant;
        $compte->update(['solde' => $nouveauSolde]);


        $transaction = transactModele::create([
            'type' => 'retrait',
            'montant' => $request->montant,
            'date' => now(),
            'expediteur_id' => $compte->id, // Le compte lui-même est l'expéditeur lors d'un retrait
            'destinataire_id' => null, // Pour un retrait, il n'y a pas de destinataire
            'code' => null, // Pour un retrait, il n'y a pas de code
        ]);

        return response()->json(['message' => 'Retrait effectué avec succès', 'transaction' => $transaction], 201);
    }

    public function transfert(Request $request)
    {

        $request->validate([
            'montant' => 'required|numeric|min:500',
            'expediteur_id' => 'required|exists:compte_modeles,id',
            'destinataire_id' => 'required|exists:compte_modeles,id|different:expediteur_id',
        ]);

        // Vérifier si les comptes existent
        $expediteur = CompteModele::find($request->expediteur_id);
        $destinataire = CompteModele::find($request->destinataire_id);

        if (!$expediteur || !$destinataire) {
            return response()->json(['message' => 'Compte(s) introuvable(s)']);
        }


        if ($expediteur->solde < $request->montant) {
            return response()->json(['message' => 'Solde insuffisant pour effectuer le transfert']);
        }

        // Mettre à jour les soldes des comptes après le transfert
        $nouveauSoldeExpediteur = $expediteur->solde - $request->montant;
        $nouveauSoldeDestinataire = $destinataire->solde + $request->montant;

        $expediteur->update(['solde' => $nouveauSoldeExpediteur]);
        $destinataire->update(['solde' => $nouveauSoldeDestinataire]);

        // Enregistrer la transaction de transfert
        $transaction = transactModele::create([
            'type' => 'transfert compte vers compte',
            'montant' => $request->montant,
            'date' => now(),
            'expediteur_id' => $expediteur->id,
            'destinataire_id' => $destinataire->id,
            'code' => null,
        ]);

        return response()->json(['message' => 'Transfert effectué avec succès', 'transaction' => $transaction], );
    }


}
