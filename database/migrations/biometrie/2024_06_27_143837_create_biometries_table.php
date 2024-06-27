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
        Schema::create('biometries', function (Blueprint $table) {
            $table->id();
            $table->string('no_employeur');
            $table->string('no_dossier');
            $table->string('email');
            $table->string('telephone');
            $table->text('adresse');
            $table->string('fichier');
            $table->string('nombre_employe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biometries');
    }
};
