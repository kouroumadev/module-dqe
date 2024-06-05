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
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('numero')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('date_naiss')->nullable();
            $table->string('add_email')->nullable();
            $table->string('tel')->nullable();
            $table->string('adresse')->nullable();
            $table->string('prestation_id')->nullable();
            $table->json('motifs_id')->nullable();
            $table->string('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamations');
    }

};
