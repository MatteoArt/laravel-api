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
        Schema::table('projects', function (Blueprint $table) {
            //foreign key type_id
            $table->unsignedBigInteger('type_id')->nullable();

            $table->foreign('type_id')
            ->references('id')
            ->on('types')
            //se viene cancellata la categoria il campo ad essa associato ovvero la 
            //foreign key, nella tabella dei progetti viene settato a null
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //rimuovo la relazione tra le tabelle
            $table->dropForeign('projects_type_id_foreign');

            //cancello la colonna della foreign key
            $table->dropColumn('type_id');
        });
    }
};
