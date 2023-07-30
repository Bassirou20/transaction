<?php

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
        Schema::create('transact_modeles', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['depôt', 'retrait', 'transfert compte vers compte'])->default('depôt');;
            $table->decimal('montant', 10, 2);
            $table->dateTime('date');
            $table->unsignedBigInteger('expediteur_id')->nullable();
            $table->unsignedBigInteger('destinataire_id')->nullable();
            $table->string('code')->nullable();
            $table->foreign('expediteur_id')->references('id')->on('compte_modeles');
            $table->foreign('destinataire_id')->references('id')->on('compte_modeles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transact_modeles');
    }
};
