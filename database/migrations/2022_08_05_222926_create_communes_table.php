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
        Schema::create('communes', function (Blueprint $table) {
            $table->id('id_com');
            $table->unsignedBigInteger('fk_reg');
            $table->foreign('fk_reg')->references('id_reg')->on('regions')->onDelete('cascade');
            $table->string('description', 90);
            $table->enum("status", ["A", "I", "trash"])->default("A")->comment("");
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
        Schema::dropIfExists('communes');
    }
};
