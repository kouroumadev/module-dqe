<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->string('num_dossier')->nullable();
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
            $table->string('is_done')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('reclamations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};