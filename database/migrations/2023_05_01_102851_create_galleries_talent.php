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
        Schema::create('galleries_talent', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('talents_id'); //ini yg mau direlasiin
            $table->text('image'); //ini biar gambarnya masuk ke folder tp connect jg ke db, kalo image di db bakal berat dbnya
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries_talent');
    }
};
