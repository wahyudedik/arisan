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
        Schema::create('chattings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_arisan_id');
            $table->string('pesan');
            $table->string('gambar');
            $table->string('video');
            $table->timestamps();

            $table->foreign('group_arisan_id')->references('id')->on('groups_arisans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chattings');
    }
};
