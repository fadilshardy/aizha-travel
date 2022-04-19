<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('invoice_id');
            $table->integer('total_amount');
            $table->integer('total_days');
            $table->string('status')->default('unpaid');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
