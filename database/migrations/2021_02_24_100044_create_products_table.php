<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->constrained();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('cost_price');
            $table->string('price');
            $table->string('tax_type');
            $table->integer('minimum')->unsigned();

            $table->string('type'); //fixed or percent
            $table->string('margin'); 
            $table->integer('qty')->unsigned();
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
        Schema::dropIfExists('products');
    }
}
