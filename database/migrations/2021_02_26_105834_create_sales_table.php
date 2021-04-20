<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->text('details')->nullable();
            $table->string('sub_total');
            $table->string('tax_rate')->nullable();
            $table->string('tax_amount')->default(0);
            $table->string('total_amount');
            $table->string('paid_amount')->nullable();
            $table->string('discount_rate')->nullable();
            $table->string('discount_amount')->default(0);
            $table->string('due_amount')->default(0);

            $table->enum('payment_type',['cash','bank']);
            $table->string('chq_no')->nullable();
            $table->string('chq_date')->nullable();
            
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('sales');
    }
}
