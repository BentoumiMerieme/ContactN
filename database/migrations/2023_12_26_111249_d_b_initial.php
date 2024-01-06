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
        Schema::create('naltis_contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('id_parent');
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('tel2');
            $table->string('mail');
            $table->string('address');
            // $table->string('groupe');
            $table->binary('photos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naltis_contacts');
    }
};


