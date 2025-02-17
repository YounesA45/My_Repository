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
        Schema::create('poste_comptables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code_poste_comptable');
            $table->String('intitule_poste_comptable');
            $table->foreignId('ordonnateur_id')->constrained('ordonnateurs')->onDelete('cascade');
            $table->foreignId('drt_id')->constrained('drts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_poste_comptables');
    }
};
