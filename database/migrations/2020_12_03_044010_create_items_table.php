<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('codeno');
            $table->text('photo');
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->text('description');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('subcategory_id');

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            // $table->SoftDeletes();
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
        Schema::dropIfExists('items');
    }
}
