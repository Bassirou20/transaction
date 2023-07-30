<?php

use App\Models\ClientModele;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compte_modeles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ClientModele::class);
            $table->enum('fournisseur', ['OrangeMoney', 'Wave', 'Wari', 'Compte Bancaire'])->default('OrangeMoney');
            $table->decimal('solde', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compte_modeles');
    }
};
