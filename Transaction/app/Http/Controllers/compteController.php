<?php

namespace App\Http\Controllers;

use App\Models\CompteModele;
use Illuminate\Http\Request;

class compteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comptes= CompteModele::all();
        return response()->json($comptes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = CompteModele::create($request->all());
        return response()->json($client);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
