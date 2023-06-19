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
        Schema::create('groups_arisans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('jenis_arisan_id');
            $table->unsignedBigInteger('member_id');
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('jenis_arisan_id')->references('id')->on('jenis_arisans');
            $table->foreign('member_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups_arisans');
    }
};
