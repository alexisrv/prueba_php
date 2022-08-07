<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('dni', 45)->primary()->comment('Documento de Identidad');
            $table->unsignedBigInteger('fk_reg');
            $table->foreign('fk_reg')->references('id_reg')->on('regions')->onDelete('cascade');
            $table->unsignedBigInteger('fk_com');
            $table->foreign('fk_com')->references('id_com')->on('communes')->onDelete('cascade');
            $table->string('email',120)->unique()->comment('Correo Electrónico');
            $table->string('name',45)->comment('Nombre');
            $table->string('last_name',45)->comment('Apellido');
            $table->string('address',255)->nullable()->comment('Dirección');
            $table->timestamp('date_reg')->useCurrent = true;
            $table->enum("status", ["A", "I", "trash"])->default("A")->comment("estado del registro:\nA
            : Activo\nI : Desactivo\ntrash : Registro eliminado");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
