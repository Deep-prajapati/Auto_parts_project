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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('slug')->unique();
            $table->text('short_dis');
            $table->text('discription');
            $table->text('features');
            $table->text('spacifications');
            $table->string('sku' , 100);
            $table->string('brand' , 100);
            $table->decimal('price' , 10 , 2);
            $table->string('thumbnail' , 100);
            $table->text('sub_image');
            $table->text('show_in');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
