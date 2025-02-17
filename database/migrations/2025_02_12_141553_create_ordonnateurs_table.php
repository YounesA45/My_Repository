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
        Schema::create('ordonnateurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code_ordonnateur');
            $table->String('intitule_ordonnateur');
            $table->foreignId('poste_comptable_id')->constrained('poste_comptables')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordonnateurs');
    }
};
