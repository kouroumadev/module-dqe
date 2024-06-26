<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();
            $table->string('no_conf');
            $table->string('nom');
            $table->string('prenom');
            $table->string('no_employe')->nullable();
            $table->string('adresse');
            $table->string('email');
            $table->string('agence');
            $table->string('nature');
            $table->string('prestation');
            $table->string('date_rendezvous');
            $table->string('heure_rendezvous');
            $table->string('telephone');
            $table->string('valider')->nullable();
            $table->string('user_id');
            $table->text('detail');
            $table->string('date_validation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvous');
    }
};