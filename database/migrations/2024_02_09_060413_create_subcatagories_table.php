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
        Schema::create('subcatagories', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('catagory_id');
            $table->foreignId('catagory_id')->references('id')->on('catagories')->onDelete('cascade');
            $table->string('subcatagory',255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcatagories');
    }
};
