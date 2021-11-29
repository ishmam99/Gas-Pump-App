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
            $table->integer('client_id');
            $table->integer('fuel_id');
            $table->string('paid_amount');
            $table->string('due_amount');
            $table->string('total_amount');
            $table->string('quantity');
            $table->string('vehicle_number');
            $table->integer('employee_id');
            $table->integer('company_id')->nullable();
            $table->string('phone')->nullable();
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
