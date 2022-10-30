<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mechanic_id')->unsigned();
            $table->foreign('mechanic_id')->references('id')->on('mechanics')->onDelete('cascade')->onUpdate('cascade');
            $table->string('customer_name');
            $table->date('date');
            $table->bigInteger('total_price');
            $table->boolean('finalized');
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
        Schema::dropIfExists('quotations');
    }
}
