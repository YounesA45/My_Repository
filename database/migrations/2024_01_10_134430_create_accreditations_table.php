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
        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('NumeroDenvoi');
            $table->date('DateDenvoi');
            $table->String('Sender');
            $table->String('FamilyName');
            $table->String('Name');
            $table->String('Poste');
            $table->String('Wilaya');
            $table->bigInteger('NumeroDecision');
            $table->date('DateDecision');
            $table->String('Statut')->default('En attente');
            $table->String('fileDemande');
            $table->String('fileDecision');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accreditations');
    }
};
